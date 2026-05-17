@props(['title' => '', 'projects' => [], 'id' => ''])

@php
$carouselId    = $id ?: strtolower(preg_replace('/[^a-z0-9]+/i', '-', $title));
$count         = count($projects);
$isSpotlight   = $count === 1;
$sectionClass  = $isSpotlight ? 'carousel-section carousel-spotlight' : 'carousel-section';
@endphp

@if($count > 0)
<section class="{{ $sectionClass }}" id="{{ $carouselId }}">

    <div class="carousel-header">
        <h2 class="carousel-title">{{ $title }}</h2>
        <a href="#" class="carousel-see-all" onclick="return false">See all</a>
    </div>

    <div class="carousel-wrapper">

        <button class="carousel-btn carousel-prev" aria-label="Scroll left" onclick="scrollCarousel('{{ $carouselId }}', -1)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="15 18 9 12 15 6"/>
            </svg>
        </button>

        <div class="carousel-track" id="track-{{ $carouselId }}" data-count="{{ count($projects) }}">
            @foreach($projects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>

        <button class="carousel-btn carousel-next" aria-label="Scroll right" onclick="scrollCarousel('{{ $carouselId }}', 1)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 18 15 12 9 6"/>
            </svg>
        </button>

    </div>

</section>
@endif
