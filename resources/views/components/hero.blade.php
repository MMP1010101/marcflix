@props(['project' => null, 'heroVideo' => null])

@php
$hasImage     = $project && !empty($project['cover_image']);
$imageUrl     = $hasImage ? asset('assets/projects/images/' . $project['cover_image']) : null;
$hasHeroVideo = !empty($heroVideo);
$projectId    = $project ? $project['id'] : 0;
@endphp

<section class="hero-section">

    <!-- Background layer -->
    <div class="hero-bg">
        @if($hasHeroVideo)
            <video class="hero-bg-video" autoplay muted loop playsinline>
                <source src="{{ asset('assets/hero/' . $heroVideo) }}" type="video/mp4">
            </video>
        @elseif($hasImage)
            <img class="hero-bg-img" src="{{ $imageUrl }}" alt="{{ $project['title'] ?? '' }}" onerror="this.style.display='none'">
        @endif
        <div class="hero-bg-gradient"></div>
        <div class="hero-bg-glow"></div>
        <div class="hero-bg-noise"></div>
    </div>

    <!-- Content -->
    <div class="hero-content">

        @if($project && $project['is_original'])
            <div class="hero-badge">
                <span class="hero-badge-icon">▶</span>
                MARCFLIX ORIGINAL
            </div>
        @else
            <div class="hero-badge">
                <span class="hero-badge-icon">◈</span>
                FEATURED PROJECT
            </div>
        @endif

        <h1 class="hero-title">
            {{ $project ? $project['title'] : 'Welcome to MARCFLIX' }}
        </h1>

        <p class="hero-tagline">
            {{ $project ? $project['tagline'] : 'Choose your next project.' }}
        </p>

        @if($project)
        <div class="hero-meta">
            <span class="hero-match">{{ $project['rating'] * 10 }}% Match</span>
            <span class="hero-year">{{ $project['year'] }}</span>
            @php
                $diff = match(true) {
                    $project['difficulty'] >= 8 => 'Advanced',
                    $project['difficulty'] >= 5 => 'Intermediate',
                    default                     => 'Beginner',
                };
            @endphp
            <span class="hero-diff-badge">{{ $diff }}</span>
            <span class="hero-category">{{ $project['category'] }}</span>
        </div>
        @endif

        <div class="hero-buttons">
            @if($project && $project['demo_url'])
                <a href="{{ $project['demo_url'] }}" target="_blank" rel="noopener" class="hero-btn hero-btn-primary">
                    <span class="hero-btn-icon">▶</span> Play Demo
                </a>
            @else
                <button class="hero-btn hero-btn-primary" onclick="openProjectModal({{ $projectId }})">
                    <span class="hero-btn-icon">▶</span> Play Demo
                </button>
            @endif

            <button class="hero-btn hero-btn-secondary" onclick="openProjectModal({{ $projectId }})">
                <span class="hero-btn-icon">ℹ</span> More Info
            </button>
        </div>

    </div>

    <!-- Scroll cue -->
    <div class="hero-scroll-cue">
        <span>scroll</span>
        <div class="hero-scroll-line"></div>
    </div>

</section>
