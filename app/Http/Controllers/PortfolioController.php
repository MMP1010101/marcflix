<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    private function score(array $project): float
    {
        $yearDiff   = (int) date('Y') - $project['year'];
        $recency    = max(1.0, 10.0 - $yearDiff * 2.0);
        $techCount  = min(10, count($project['technologies']));

        return round(
            ($project['difficulty'] * 0.25)
            + ($project['rating']   * 0.25)
            + ($project['impact']   * 0.25)
            + ($recency             * 0.15)
            + ($techCount           * 0.10),
            2
        );
    }

    private function loadProjects(): array
    {
        $projects = config('projects.projects', []);

        foreach ($projects as &$p) {
            $p['score'] = $this->score($p);
        }

        usort($projects, fn ($a, $b) => $b['score'] <=> $a['score']);

        return $projects;
    }

    public function intro()
    {
        return view('pages.intro');
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function home()
    {
        $all = $this->loadProjects();

        $featured = collect($all)->firstWhere('featured', true) ?? $all[0];

        $originals      = array_values(array_filter($all, fn ($p) => $p['is_original']));
        $trending       = array_values(array_filter($all, fn ($p) => $p['score'] >= 7.5));
        $recentlyAdded  = array_slice(
            array_values(
                array_map(fn ($p) => $p, $all)
            ) , 0, 8
        );

        usort($recentlyAdded, fn ($a, $b) => $b['year'] <=> $a['year'] ?: $b['score'] <=> $a['score']);

        $webDev        = array_values(array_filter($all, fn ($p) => $p['category'] === 'Web Development'));
        $games         = array_values(array_filter($all, fn ($p) => $p['category'] === 'Games'));
        $aiProjects    = array_values(array_filter($all, fn ($p) => $p['category'] === 'AI'));
        $creative      = array_values(array_filter($all, fn ($p) => $p['category'] === 'Creative'));
        $school        = array_values(array_filter($all, fn ($p) => in_array('school', $p['tags'])));
        $inDevelopment = array_values(array_filter($all, fn ($p) => $p['status'] === 'in-development'));

        return view('pages.home', compact(
            'all',
            'featured',
            'originals',
            'trending',
            'recentlyAdded',
            'webDev',
            'games',
            'aiProjects',
            'creative',
            'school',
            'inDevelopment',
        ));
    }

    public function search(Request $request): JsonResponse
    {
        $q        = strtolower($request->string('q'));
        $category = strtolower($request->string('category'));
        $status   = strtolower($request->string('status'));

        $projects = $this->loadProjects();

        if ($q !== '') {
            $projects = array_filter($projects, function ($p) use ($q) {
                return str_contains(strtolower($p['title']), $q)
                    || str_contains(strtolower($p['description']), $q)
                    || str_contains(strtolower($p['category']), $q)
                    || str_contains(strtolower($p['status']), $q)
                    || str_contains((string) $p['year'], $q)
                    || collect($p['technologies'])->contains(fn ($t) => str_contains(strtolower($t), $q));
            });
        }

        if ($category !== '') {
            $projects = array_filter($projects, fn ($p) => strtolower($p['category']) === $category);
        }

        if ($status !== '') {
            $projects = array_filter($projects, fn ($p) => $p['status'] === $status);
        }

        return response()->json(array_values($projects));
    }
}
