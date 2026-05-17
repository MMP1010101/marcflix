@props(['project' => []])

@php
$hasImage  = !empty($project['cover_image']);
$hasVideo  = !empty($project['preview_video']);
$imageUrl  = $hasImage ? asset('assets/projects/images/' . $project['cover_image']) : null;
$videoUrl  = $hasVideo ? asset('assets/projects/videos/' . $project['preview_video']) : null;
$default   = asset('assets/defaults/default-cover.svg');

$categoryGradients = [
    'Web Development' => 'linear-gradient(135deg, #0d1b3a 0%, #16213e 60%, #1a2744 100%)',
    'AI'              => 'linear-gradient(135deg, #0d0520 0%, #1a0a2e 60%, #200b3a 100%)',
    'Games'           => 'linear-gradient(135deg, #051a0e 0%, #0a2818 60%, #0e3520 100%)',
    'Creative'        => 'linear-gradient(135deg, #1a0f00 0%, #2a1a00 60%, #361f00 100%)',
];
$gradient  = $categoryGradients[$project['category']] ?? 'linear-gradient(135deg, #111 0%, #1c1c1c 100%)';

$statusLabel = $project['status'] === 'completed' ? 'Completed' : 'In Dev';
$statusClass = $project['status'] === 'completed' ? 'status-done' : 'status-wip';
$techs = array_slice($project['technologies'], 0, 3);
@endphp

<article
    class="project-card"
    data-id="{{ $project['id'] }}"
    data-has-image="{{ $hasImage ? 'true' : 'false' }}"
    data-has-video="{{ $hasVideo ? 'true' : 'false' }}"
    onclick="openProjectModal({{ $project['id'] }})"
    role="button"
    tabindex="0"
    aria-label="Open {{ $project['title'] }}"
>
    <!-- ── Media area ── -->
    <div class="card-media" style="background: {{ $gradient }}">

        @if($hasImage)
            <img
                class="card-image"
                src="{{ $imageUrl }}"
                alt="{{ $project['title'] }}"
                loading="lazy"
                onerror="this.src='{{ $default }}'"
            >
        @elseif(!$hasImage && !$hasVideo)
            <img
                class="card-image card-default"
                src="{{ $default }}"
                alt="{{ $project['title'] }}"
                loading="lazy"
            >
        @endif

        @if($hasVideo)
            <video
                class="card-video{{ (!$hasImage) ? ' card-video-cover' : '' }}"
                muted
                loop
                playsinline
                preload="none"
                data-src="{{ $videoUrl }}"
            ></video>
        @endif

        <!-- Badges (always visible) -->
        @if($project['is_original'])
            <span class="card-badge card-badge-original">ORIGINAL</span>
        @endif
        <span class="card-badge card-badge-category">{{ $project['category'] }}</span>

        <!-- Hover overlay -->
        <div class="card-overlay">
            <div class="card-overlay-content">
                <h3 class="card-overlay-title">{{ $project['title'] }}</h3>

                <div class="card-overlay-meta">
                    <span class="card-year">{{ $project['year'] }}</span>
                    <span class="card-difficulty">★ {{ $project['difficulty'] }}/10</span>
                    <span class="card-status {{ $statusClass }}">{{ $statusLabel }}</span>
                </div>

                @if(count($techs) > 0)
                <div class="card-techs">
                    @foreach($techs as $tech)
                        <span class="card-tech">{{ $tech }}</span>
                    @endforeach
                </div>
                @endif

                <div class="card-actions">
                    <button
                        class="card-btn card-btn-play"
                        onclick="event.stopPropagation(); {{ $project['demo_url'] ? "window.open('" . $project['demo_url'] . "','_blank')" : 'openProjectModal(' . $project['id'] . ')' }}"
                    >▶ {{ $project['demo_url'] ? 'Play Demo' : 'Preview' }}</button>

                    <button
                        class="card-btn card-btn-info"
                        onclick="event.stopPropagation(); openProjectModal({{ $project['id'] }})"
                    >+ Info</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ── Info strip ── -->
    <div class="card-info">
        <h3 class="card-title">{{ $project['title'] }}</h3>
        <div class="card-strip-meta">
            <span>{{ $project['year'] }}</span>
            <span class="dot">·</span>
            <span class="{{ $statusClass }}">{{ $statusLabel }}</span>
            @if($project['score'])
            <span class="dot">·</span>
            <span class="card-score">{{ number_format($project['score'], 1) }}</span>
            @endif
        </div>
    </div>
</article>
