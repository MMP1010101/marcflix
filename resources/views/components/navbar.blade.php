<nav id="mainNavbar" class="navbar">

    <!-- Brand -->
    <div class="navbar-brand">
        <a href="{{ route('home') }}" class="navbar-logo">MARCFLIX</a>
        <span class="navbar-byline">by Marc Mancilla Palomar</span>
    </div>

    <!-- Desktop links -->
    <ul class="navbar-links" id="navLinks">
        <li><a href="{{ route('home') }}"     class="nav-link">Home</a></li>
        <li><a href="#originals"              class="nav-link">Originals</a></li>
        <li><a href="#web-development"        class="nav-link">Web Dev</a></li>
        <li><a href="#games"                  class="nav-link">Games</a></li>
        <li><a href="#ai"                     class="nav-link">AI</a></li>
        <li><a href="#creative"               class="nav-link">Creative</a></li>
        <li>
            <button class="nav-link nav-close-btn" id="navCloseBtn" onclick="closeNav()" style="display:none;background:none;border:none;color:var(--gray);font-size:28px;cursor:pointer;">✕</button>
        </li>
    </ul>

    <!-- Right actions -->
    <div class="navbar-actions">
        <button class="navbar-search-btn" onclick="openSearch()" title="Search projects" aria-label="Search">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
        </button>

        <!-- Hamburger (mobile) -->
        <button class="navbar-hamburger" id="hamburgerBtn" onclick="toggleNav()" aria-label="Menu">
            <span></span><span></span><span></span>
        </button>
    </div>

</nav>
