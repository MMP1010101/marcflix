<div id="searchOverlay" class="search-overlay">

    <div class="search-header">

        <button class="search-close-btn" onclick="closeSearch()" aria-label="Close search">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>

        <div class="search-input-wrap">
            <svg class="search-icon" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input
                type="text"
                id="searchInput"
                class="search-input"
                placeholder="Search by title, category, technology…"
                autocomplete="off"
                spellcheck="false"
            >
            <button class="search-clear-btn" id="searchClearBtn" onclick="clearSearch()" aria-label="Clear search" style="display:none">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>

        <!-- Filter chips -->
        <div class="search-filters">
            <button class="filter-chip filter-chip-active" data-filter="all"      onclick="setFilter('all',this)">All</button>
            <button class="filter-chip" data-filter="Web Development"              onclick="setFilter('Web Development',this)">Web Dev</button>
            <button class="filter-chip" data-filter="AI"                           onclick="setFilter('AI',this)">AI</button>
            <button class="filter-chip" data-filter="Games"                        onclick="setFilter('Games',this)">Games</button>
            <button class="filter-chip" data-filter="Creative"                     onclick="setFilter('Creative',this)">Creative</button>
            <button class="filter-chip" data-filter-status="completed"             onclick="setStatusFilter('completed',this)">Completed</button>
            <button class="filter-chip" data-filter-status="in-development"        onclick="setStatusFilter('in-development',this)">In Dev</button>
        </div>

    </div>

    <div class="search-body">
        <p class="search-hint" id="searchHint">Start typing to search across all projects.</p>
        <div class="search-results-grid" id="searchResultsGrid"></div>
    </div>

</div>
