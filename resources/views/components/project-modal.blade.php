<div id="projectModal" class="modal" role="dialog" aria-modal="true" aria-label="Project details">

    <div class="modal-backdrop" id="modalBackdrop" onclick="closeProjectModal()"></div>

    <div class="modal-panel">

        <!-- ── Banner ── -->
        <div class="modal-banner" id="modalBanner">
            <button class="modal-close" onclick="closeProjectModal()" aria-label="Close">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
            <div class="modal-banner-overlay"></div>
            <div class="modal-banner-content">
                <div class="modal-badge" id="modalBadge"></div>
                <h2 class="modal-title" id="modalTitle"></h2>
                <p class="modal-tagline" id="modalTagline"></p>

                <div class="modal-hero-meta" id="modalHeroMeta">
                    <span id="modalMatchScore" class="modal-match"></span>
                    <span id="modalYear"></span>
                    <span id="modalCategory" class="modal-tag"></span>
                </div>

                <div class="modal-hero-actions">
                    <a id="modalDemoBtn"  href="#" target="_blank" rel="noopener" class="modal-btn modal-btn-primary" style="display:none">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="5 3 19 12 5 21 5 3"/></svg>
                        Play Demo
                    </a>
                    <a id="modalGithubBtn" href="#" target="_blank" rel="noopener" class="modal-btn modal-btn-secondary" style="display:none">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.374 0 0 5.373 0 12c0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23A11.509 11.509 0 0112 5.803c1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576C20.566 21.797 24 17.3 24 12c0-6.627-5.373-12-12-12z"/></svg>
                        GitHub
                    </a>
                    <a id="modalDocsBtn"   href="#" target="_blank" rel="noopener" class="modal-btn modal-btn-secondary" style="display:none">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                        Docs
                    </a>
                </div>
            </div>
        </div>

        <!-- ── Body ── -->
        <div class="modal-body">

            <div class="modal-columns">

                <!-- Left: description -->
                <div class="modal-col-main">
                    <p class="modal-description" id="modalDescription"></p>

                    <div class="modal-section">
                        <h4 class="modal-section-title">Technologies</h4>
                        <div class="modal-tech-list" id="modalTechnologies"></div>
                    </div>
                </div>

                <!-- Right: stats -->
                <div class="modal-col-stats">
                    <div class="modal-stat">
                        <span class="modal-stat-label">Status</span>
                        <span class="modal-stat-value" id="modalStatus"></span>
                    </div>
                    <div class="modal-stat">
                        <span class="modal-stat-label">Difficulty</span>
                        <span class="modal-stat-value" id="modalDifficulty"></span>
                    </div>
                    <div class="modal-stat">
                        <span class="modal-stat-label">Rating</span>
                        <span class="modal-stat-value" id="modalRating"></span>
                    </div>
                    <div class="modal-stat">
                        <span class="modal-stat-label">Impact</span>
                        <span class="modal-stat-value" id="modalImpact"></span>
                    </div>
                    <div class="modal-stat">
                        <span class="modal-stat-label">MarcFlix Score</span>
                        <span class="modal-stat-value modal-stat-score" id="modalScore"></span>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
