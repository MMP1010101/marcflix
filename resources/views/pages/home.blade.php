@extends('layouts.app')

@section('title', 'MARCFLIX — Dev Portfolio')
@section('description', 'MARCFLIX — Personal developer portfolio by Marc Mancilla Palomar. Browse projects like movies.')

{{-- ═══════════════════════════════════════════════════════════════════
     ALL HOME-PAGE CSS
     ═══════════════════════════════════════════════════════════════════ --}}
@section('head')
<style>

/* ─────────────────────────────────────────
   NAVBAR
───────────────────────────────────────── */
.navbar {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 500;
    display: flex;
    align-items: center;
    gap: 0;
    padding: 0 60px;
    height: 68px;
    background: linear-gradient(to bottom, rgba(0,0,0,0.85) 0%, transparent 100%);
    transition: background var(--ease-slow), box-shadow var(--ease-slow);
}
.navbar.scrolled {
    background: rgba(10,10,10,0.97);
    box-shadow: 0 1px 0 rgba(255,255,255,0.06);
}
.navbar-brand    { display: flex; align-items: baseline; gap: 10px; flex-shrink: 0; }
.navbar-logo     { font-size: 22px; font-weight: 900; color: var(--red); letter-spacing: -1px; }
.navbar-byline   { font-size: 11px; color: var(--muted); font-weight: 300; white-space: nowrap; }
.navbar-links    {
    display: flex;
    list-style: none;
    gap: 22px;
    margin-left: 28px;
    flex: 1;
    align-items: center;
}
.nav-link {
    font-size: 14px;
    color: var(--gray);
    transition: color var(--ease);
    white-space: nowrap;
    background: none; border: none; padding: 0;
}
.nav-link:hover { color: var(--white); }
.navbar-actions  { display: flex; align-items: center; gap: 12px; margin-left: auto; }
.navbar-search-btn {
    background: none; border: none;
    color: var(--white); padding: 7px; border-radius: var(--r);
    display: flex; align-items: center; justify-content: center;
    transition: background var(--ease);
}
.navbar-search-btn:hover { background: rgba(255,255,255,0.1); }

/* Hamburger */
.navbar-hamburger {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none; border: none; padding: 6px; cursor: pointer;
}
.navbar-hamburger span {
    display: block; width: 22px; height: 2px;
    background: var(--white);
    border-radius: 2px;
    transition: all 0.3s ease;
}

@media (max-width: 800px) {
    .navbar { padding: 0 20px; }
    .navbar-byline { display: none; }
    .navbar-hamburger { display: flex; }
    .navbar-links {
        display: none;
        position: fixed; inset: 0;
        background: rgba(0,0,0,0.97);
        flex-direction: column;
        align-items: center; justify-content: center;
        gap: 28px; margin-left: 0; z-index: 600;
    }
    .navbar-links.nav-open { display: flex; }
    .nav-link { font-size: 22px; }
    #navCloseBtn { display: block !important; }
}

/* ─────────────────────────────────────────
   HERO SECTION
───────────────────────────────────────── */
.hero-section {
    position: relative;
    min-height: 100vh;
    display: flex;
    align-items: flex-end;
    overflow: hidden;
}
.hero-bg {
    position: absolute; inset: 0;
    background:
        radial-gradient(ellipse 120% 80% at 30% 30%, rgba(229,9,20,0.10) 0%, transparent 55%),
        linear-gradient(135deg, #0a0a0a 0%, #130808 40%, #0f0f0f 100%);
}
.hero-bg-img {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    opacity: 0.35;
}
.hero-bg-gradient {
    position: absolute; inset: 0;
    background:
        linear-gradient(to right, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.6) 55%, rgba(0,0,0,0.15) 100%),
        linear-gradient(to top,   rgba(0,0,0,0.9)  0%, transparent 60%);
}
.hero-bg-glow {
    position: absolute;
    top: -10%; left: -5%;
    width: 55%; height: 80%;
    background: radial-gradient(ellipse at center, rgba(229,9,20,0.07) 0%, transparent 65%);
    pointer-events: none;
}
.hero-bg-video {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    opacity: 0.5;
    z-index: 0;
}
.hero-bg-noise {
    position: absolute; inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.035'/%3E%3C/svg%3E");
    background-size: 200px 200px;
    pointer-events: none; opacity: 0.5;
}
.hero-content {
    position: relative; z-index: 10;
    padding: 0 60px 110px;
    max-width: 620px;
    animation: fadeUp 0.7s ease 0.1s both;
}
@keyframes fadeUp {
    from { opacity: 0; transform: translateY(24px); }
    to   { opacity: 1; transform: translateY(0); }
}
.hero-badge {
    display: flex; align-items: center; gap: 8px;
    font-size: 11px; letter-spacing: 3px;
    text-transform: uppercase; color: var(--red);
    margin-bottom: 18px;
}
.hero-badge-icon { font-size: 9px; }
.hero-title {
    font-size: clamp(36px, 5.5vw, 72px);
    font-weight: 900; line-height: 1.05;
    margin-bottom: 16px;
    text-shadow: 0 2px 30px rgba(0,0,0,0.7);
}
.hero-tagline {
    font-size: clamp(15px, 1.8vw, 20px);
    color: var(--gray); margin-bottom: 22px; line-height: 1.5;
}
.hero-meta {
    display: flex; align-items: center; gap: 14px;
    margin-bottom: 28px; font-size: 13px; flex-wrap: wrap;
}
.hero-match    { color: var(--green); font-weight: 600; }
.hero-year     { color: var(--gray); }
.hero-diff-badge {
    border: 1px solid var(--gray);
    padding: 1px 7px; font-size: 11px;
    color: var(--gray); border-radius: 2px;
}
.hero-category { color: var(--gray); }
.hero-buttons  { display: flex; gap: 12px; flex-wrap: wrap; }
.hero-btn {
    display: inline-flex; align-items: center; gap: 10px;
    padding: 13px 28px; border-radius: var(--r);
    font-size: 17px; font-weight: 600;
    border: none; cursor: pointer; transition: all var(--ease);
    text-decoration: none;
}
.hero-btn-icon   { font-size: 13px; }
.hero-btn-primary  { background: var(--white); color: #000; }
.hero-btn-primary:hover { background: rgba(255,255,255,0.85); }
.hero-btn-secondary { background: rgba(109,109,110,0.65); color: var(--white); }
.hero-btn-secondary:hover { background: rgba(109,109,110,0.85); }

.hero-scroll-cue {
    position: absolute; bottom: 28px; right: 60px; z-index: 10;
    display: flex; align-items: center; gap: 10px;
    color: var(--muted); font-size: 10px; letter-spacing: 2px;
    text-transform: uppercase;
    animation: scrollCuePulse 2.5s ease-in-out infinite;
}
@keyframes scrollCuePulse {
    0%, 100% { opacity: 0.4; }
    50%       { opacity: 0.9; }
}
.hero-scroll-line {
    width: 40px; height: 1px;
    background: linear-gradient(to right, var(--muted), transparent);
}
@media (max-width: 700px) {
    .hero-content { padding: 0 24px 90px; }
    .hero-scroll-cue { display: none; }
}

/* ─────────────────────────────────────────
   CAROUSELS
───────────────────────────────────────── */
.carousels-container {
    padding-bottom: 60px;
    background:
        radial-gradient(ellipse 90% 35% at 15% 25%, rgba(229,9,20,0.04) 0%, transparent 65%),
        radial-gradient(ellipse 70% 40% at 85% 70%, rgba(229,9,20,0.03) 0%, transparent 65%);
}
.carousel-section {
    padding: 32px 0 8px;
    position: relative;
}
.carousel-header {
    display: flex; align-items: center; gap: 14px;
    padding: 0 60px 14px;
}
.carousel-title {
    font-size: 20px; font-weight: 700; letter-spacing: 0.3px;
    color: var(--white);
    display: flex; align-items: center; gap: 10px;
}
.carousel-title::before {
    content: '';
    display: block; flex-shrink: 0;
    width: 4px; height: 20px;
    background: var(--red);
    border-radius: 2px;
}
.carousel-see-all {
    font-size: 12px; color: var(--red);
    letter-spacing: 0.5px; opacity: 0; pointer-events: none;
    transition: opacity var(--ease); margin-left: 4px;
}
.carousel-section:hover .carousel-see-all { opacity: 1; pointer-events: auto; }

.carousel-wrapper { position: relative; }

.carousel-track {
    display: flex; gap: 10px;
    overflow-x: auto; overflow-y: visible;
    scroll-behavior: smooth;
    padding: 12px 60px 20px;
    scrollbar-width: none;
    -ms-overflow-style: none;
}
.carousel-track::-webkit-scrollbar { display: none; }

.carousel-btn {
    position: absolute; top: 50%; transform: translateY(-50%);
    z-index: 20;
    background: rgba(0,0,0,0.75);
    border: 1px solid rgba(255,255,255,0.12);
    color: var(--white);
    width: 44px; height: 72px;
    border-radius: 4px;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; transition: all var(--ease);
    opacity: 0;
}
.carousel-section:hover .carousel-btn { opacity: 1; }
.carousel-btn:hover { background: rgba(0,0,0,0.95); border-color: rgba(255,255,255,0.3); }
.carousel-prev { left: 8px; }
.carousel-next { right: 8px; }

@media (max-width: 700px) {
    .carousel-header { padding: 0 20px 10px; }
    .carousel-track  { padding: 10px 20px 16px; }
    .carousel-btn    { display: none; }
}

/* ─────────────────────────────────────────
   SPOTLIGHT LAYOUT  (1 solo proyecto)
───────────────────────────────────────── */
.carousel-spotlight .carousel-btn   { display: none !important; }
.carousel-spotlight .carousel-see-all { display: none; }

.carousel-spotlight .carousel-track {
    overflow: visible;
    padding-right: 60px;
    gap: 0;
}

.carousel-spotlight .project-card {
    width: 100%;
    border-radius: var(--r-lg);
    cursor: default;
}
.carousel-spotlight .project-card:hover {
    transform: none;
    z-index: auto;
    box-shadow: none;
}

/* Aspect ratio ultrawide cinematográfico */
.carousel-spotlight .card-media {
    aspect-ratio: 21 / 9;
    border-radius: var(--r-lg) var(--r-lg) 0 0;
}

/* Overlay siempre visible, gradiente lateral */
.carousel-spotlight .card-overlay {
    opacity: 1;
    background:
        linear-gradient(to right,  rgba(0,0,0,0.92) 0%, rgba(0,0,0,0.6) 35%, rgba(0,0,0,0.1) 62%, transparent 100%),
        linear-gradient(to top,    rgba(0,0,0,0.65) 0%, transparent 48%);
    align-items: flex-end;
    border-radius: var(--r-lg) var(--r-lg) 0 0;
    padding: 0;
}
/* Anular la transición de imagen/video al hacer hover en spotlight */
.carousel-spotlight .project-card:hover .card-overlay { opacity: 1; }
.carousel-spotlight .project-card:hover .card-image   { opacity: 1; }

.carousel-spotlight .card-overlay-content {
    max-width: 46%;
    padding: 0 0 38px 44px;
}
.carousel-spotlight .card-overlay-title {
    font-size: clamp(22px, 3vw, 36px);
    font-weight: 900; line-height: 1.1;
    margin-bottom: 10px;
}
.carousel-spotlight .card-overlay-meta {
    font-size: 13px; margin-bottom: 14px; gap: 12px;
}
.carousel-spotlight .card-techs    { margin-bottom: 18px; }
.carousel-spotlight .card-btn      { padding: 10px 22px; font-size: 14px; }

/* Info strip debajo del spotlight */
.carousel-spotlight .card-info {
    padding: 14px 44px 18px;
    background: var(--card);
    border-radius: 0 0 var(--r-lg) var(--r-lg);
    border-top: 1px solid var(--border);
    display: flex; align-items: center;
    justify-content: space-between;
    flex-wrap: wrap; gap: 8px;
}
.carousel-spotlight .card-title    { font-size: 15px; margin-bottom: 0; }
.carousel-spotlight .card-strip-meta { font-size: 12px; }

@media (max-width: 700px) {
    .carousel-spotlight .carousel-track { padding-right: 20px; }
    .carousel-spotlight .card-media     { aspect-ratio: 16 / 9; }
    .carousel-spotlight .card-overlay-content { max-width: 70%; padding: 0 0 20px 20px; }
    .carousel-spotlight .card-overlay-title   { font-size: 18px; }
    .carousel-spotlight .card-info      { padding: 12px 20px; }
}

/* ─────────────────────────────────────────
   PROJECT CARDS
───────────────────────────────────────── */
/* Ancho adaptativo según cuántos proyectos hay en el carrusel */
.carousel-track                  { --cw: 268px; }
.carousel-track[data-count="1"]  { --cw: min(760px, 78vw); }
.carousel-track[data-count="2"]  { --cw: min(560px, 60vw); }
.carousel-track[data-count="3"]  { --cw: min(420px, 44vw); }
.carousel-track[data-count="4"]  { --cw: min(340px, 36vw); }
.carousel-track[data-count="5"]  { --cw: min(300px, 32vw); }

.project-card {
    position: relative;
    width: var(--cw, 268px); flex-shrink: 0;
    border-radius: var(--r);
    overflow: visible;
    cursor: pointer;
    transition: transform 0.28s ease, z-index 0s 0.28s;
    outline: none;
}
.project-card:hover, .project-card:focus-visible {
    transform: scale(1.07);
    z-index: 30;
    transition: transform 0.28s ease, z-index 0s;
}

/* Media */
.card-media {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    border-radius: var(--r) var(--r) 0 0;
    overflow: hidden;
    border: 1px solid var(--border);
    border-bottom: none;
}
.card-image, .card-video {
    position: absolute; inset: 0;
    width: 100%; height: 100%;
    object-fit: cover;
}
.card-video {
    opacity: 0;
    transition: opacity 0.3s ease;
}
.card-video.card-video-cover { opacity: 1; }

/* Badges */
.card-badge {
    position: absolute; z-index: 5;
    padding: 3px 7px;
    font-size: 9px; letter-spacing: 1.2px;
    text-transform: uppercase; font-weight: 700;
    border-radius: 3px; line-height: 1.4;
}
.card-badge-original {
    top: 8px; left: 8px;
    background: var(--red); color: var(--white);
}
.card-badge-category {
    top: 8px; right: 8px;
    background: rgba(0,0,0,0.7); color: var(--gray);
    border: 1px solid rgba(255,255,255,0.1);
}

/* Hover overlay (shown on card hover) */
.card-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top,
        rgba(0,0,0,0.97) 0%,
        rgba(0,0,0,0.65) 50%,
        rgba(0,0,0,0.1)  100%
    );
    display: flex; align-items: flex-end;
    padding: 10px;
    opacity: 0;
    transition: opacity 0.25s ease;
    border-radius: var(--r);
}
.project-card:hover .card-overlay { opacity: 1; }
.project-card:hover .card-video:not(.card-video-cover) { opacity: 1; }
.project-card:hover .card-image { opacity: 0; }

.card-overlay-content { width: 100%; }
.card-overlay-title {
    font-size: 13px; font-weight: 700;
    margin-bottom: 5px; line-height: 1.3;
}
.card-overlay-meta {
    display: flex; gap: 8px; font-size: 11px;
    margin-bottom: 7px; flex-wrap: wrap;
}
.card-year     { color: var(--gray); }
.card-difficulty { color: var(--amber); }
.status-done   { color: var(--green); }
.status-wip    { color: var(--amber); }
.dot           { color: var(--muted); }
.card-score    { color: var(--red); font-size: 11px; }

.card-techs {
    display: flex; gap: 5px; flex-wrap: wrap; margin-bottom: 9px;
}
.card-tech {
    padding: 2px 7px;
    background: rgba(229,9,20,0.15);
    border: 1px solid rgba(229,9,20,0.25);
    border-radius: 3px; font-size: 10px;
    color: rgba(255,120,120,0.9);
}

.card-actions  { display: flex; gap: 6px; }
.card-btn {
    padding: 5px 11px; border-radius: 4px;
    font-size: 11px; font-weight: 700;
    border: none; cursor: pointer;
    transition: all var(--ease);
    white-space: nowrap;
}
.card-btn-play { background: var(--white); color: #000; }
.card-btn-play:hover { background: rgba(255,255,255,0.88); }
.card-btn-info {
    background: rgba(255,255,255,0.18);
    border: 1px solid rgba(255,255,255,0.28);
    color: var(--white);
}
.card-btn-info:hover { background: rgba(255,255,255,0.28); }

/* Info strip below media */
.card-info {
    padding: 10px 10px 6px;
    background: var(--card);
    border-radius: 0 0 var(--r) var(--r);
    border: 1px solid var(--border);
    border-top: none;
}
.card-title {
    font-size: 13px; font-weight: 600;
    white-space: nowrap; overflow: hidden;
    text-overflow: ellipsis; margin-bottom: 4px;
}
.card-strip-meta {
    display: flex; gap: 6px; font-size: 11px;
    color: var(--muted); align-items: center; flex-wrap: wrap;
}

/* ─────────────────────────────────────────
   PROJECT DETAIL MODAL
───────────────────────────────────────── */
.modal {
    position: fixed; inset: 0; z-index: 800;
    display: flex; align-items: center; justify-content: center;
    padding: 20px;
    visibility: hidden; opacity: 0;
    transition: opacity 0.3s ease, visibility 0s 0.3s;
}
.modal.modal-active {
    visibility: visible; opacity: 1;
    transition: opacity 0.3s ease, visibility 0s;
}
.modal-backdrop {
    position: absolute; inset: 0;
    background: rgba(0,0,0,0.84);
    backdrop-filter: blur(4px);
}
.modal-panel {
    position: relative; z-index: 1;
    background: #181818;
    border-radius: var(--r-lg);
    width: 100%; max-width: 860px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 20px 80px rgba(0,0,0,0.9);
    transform: translateY(20px);
    transition: transform 0.35s cubic-bezier(0.16,1,0.3,1);
}
.modal.modal-active .modal-panel { transform: translateY(0); }

.modal-banner {
    position: relative;
    min-height: 320px;
    background: linear-gradient(135deg, #1a0808, #0f0f0f);
    background-size: cover;
    background-position: center;
    border-radius: var(--r-lg) var(--r-lg) 0 0;
    display: flex; align-items: flex-end;
    overflow: hidden;
}
.modal-banner-overlay {
    position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(24,24,24,1) 0%, rgba(0,0,0,0.3) 60%, transparent 100%);
}
.modal-close {
    position: absolute; top: 16px; right: 16px; z-index: 10;
    background: rgba(0,0,0,0.6); border: none;
    color: var(--white); width: 36px; height: 36px;
    border-radius: 50%; display: flex;
    align-items: center; justify-content: center;
    cursor: pointer; transition: background var(--ease);
}
.modal-close:hover { background: rgba(0,0,0,0.9); }

.modal-banner-content {
    position: relative; z-index: 2;
    padding: 0 32px 28px; width: 100%;
}
.modal-badge {
    font-size: 10px; letter-spacing: 3px; text-transform: uppercase;
    color: var(--red); margin-bottom: 10px;
}
.modal-title {
    font-size: clamp(24px, 4vw, 42px);
    font-weight: 900; line-height: 1.1;
    margin-bottom: 8px;
}
.modal-tagline { font-size: 16px; color: var(--gray); margin-bottom: 14px; }
.modal-hero-meta {
    display: flex; align-items: center; gap: 14px;
    font-size: 13px; margin-bottom: 20px; flex-wrap: wrap;
}
.modal-match { color: var(--green); font-weight: 600; }
.modal-tag {
    border: 1px solid var(--gray); padding: 2px 8px;
    font-size: 11px; color: var(--gray); border-radius: 2px;
}
.modal-hero-actions { display: flex; gap: 10px; flex-wrap: wrap; }
.modal-btn {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 22px; border-radius: var(--r);
    font-size: 15px; font-weight: 600;
    border: none; cursor: pointer; transition: all var(--ease);
    text-decoration: none;
}
.modal-btn-primary  { background: var(--white); color: #000; }
.modal-btn-primary:hover { background: rgba(255,255,255,0.85); }
.modal-btn-secondary {
    background: rgba(109,109,110,0.65); color: var(--white);
}
.modal-btn-secondary:hover { background: rgba(109,109,110,0.85); }

.modal-body { padding: 24px 32px 32px; }
.modal-columns {
    display: grid;
    grid-template-columns: 1fr 220px;
    gap: 32px;
}
.modal-description { font-size: 15px; color: var(--gray); line-height: 1.65; margin-bottom: 24px; }
.modal-section { margin-bottom: 20px; }
.modal-section-title {
    font-size: 11px; letter-spacing: 2px; text-transform: uppercase;
    color: var(--muted); margin-bottom: 10px;
}
.modal-tech-list { display: flex; flex-wrap: wrap; gap: 8px; }
.tech-badge {
    padding: 5px 12px;
    background: rgba(255,255,255,0.07);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: var(--r); font-size: 13px; color: var(--gray);
}

.modal-col-stats {
    display: flex; flex-direction: column; gap: 16px;
    border-left: 1px solid var(--border); padding-left: 28px;
}
.modal-stat { display: flex; flex-direction: column; gap: 4px; }
.modal-stat-label {
    font-size: 10px; letter-spacing: 1.5px; text-transform: uppercase; color: var(--muted);
}
.modal-stat-value { font-size: 16px; font-weight: 600; color: var(--white); }
.modal-stat-score { color: var(--red); font-size: 20px; }

@media (max-width: 640px) {
    .modal          { padding: 0; align-items: flex-end; }
    .modal-panel    { max-height: 95vh; border-radius: var(--r-lg) var(--r-lg) 0 0; max-width: 100%; }
    .modal-banner   { min-height: 220px; }
    .modal-columns  { grid-template-columns: 1fr; }
    .modal-col-stats{ border-left: none; padding-left: 0; border-top: 1px solid var(--border); padding-top: 20px; flex-direction: row; flex-wrap: wrap; }
    .modal-stat     { min-width: 120px; }
    .modal-body, .modal-banner-content { padding-left: 20px; padding-right: 20px; }
}

/* ─────────────────────────────────────────
   SEARCH OVERLAY
───────────────────────────────────────── */
.search-overlay {
    position: fixed; inset: 0; z-index: 700;
    background: rgba(0,0,0,0.97);
    overflow-y: auto;
    visibility: hidden; opacity: 0;
    transition: opacity 0.25s ease, visibility 0s 0.25s;
}
.search-overlay.search-active {
    visibility: visible; opacity: 1;
    transition: opacity 0.25s ease, visibility 0s;
}
.search-header {
    position: sticky; top: 0; z-index: 10;
    background: rgba(0,0,0,0.95);
    padding: 20px 60px 16px;
    border-bottom: 1px solid var(--border);
}
.search-close-btn {
    position: absolute; top: 20px; right: 60px;
    background: none; border: none; color: var(--gray);
    cursor: pointer; padding: 6px;
    transition: color var(--ease);
}
.search-close-btn:hover { color: var(--white); }

.search-input-wrap {
    position: relative;
    display: flex; align-items: center;
    margin-bottom: 16px;
}
.search-icon {
    position: absolute; left: 0; color: var(--gray);
    pointer-events: none;
}
.search-input {
    width: 100%; background: none; border: none;
    border-bottom: 2px solid var(--border);
    color: var(--white); font-size: clamp(22px, 4vw, 38px);
    font-weight: 300; padding: 8px 44px 10px 34px;
    outline: none; font-family: var(--font);
    caret-color: var(--red);
    transition: border-color var(--ease);
}
.search-input:focus { border-color: var(--red); }
.search-input::placeholder { color: var(--muted); }
.search-clear-btn {
    position: absolute; right: 0;
    background: none; border: none; color: var(--gray);
    cursor: pointer; padding: 4px;
}

.search-filters {
    display: flex; gap: 8px; flex-wrap: wrap;
}
.filter-chip {
    padding: 5px 14px; border-radius: 20px;
    font-size: 13px; cursor: pointer;
    background: rgba(255,255,255,0.08);
    border: 1px solid rgba(255,255,255,0.12);
    color: var(--gray);
    transition: all var(--ease);
}
.filter-chip:hover { background: rgba(255,255,255,0.14); color: var(--white); }
.filter-chip.filter-chip-active {
    background: var(--red); border-color: var(--red); color: var(--white);
}

.search-body { padding: 32px 60px 60px; }
.search-hint { color: var(--muted); font-size: 15px; }
.search-results-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 20px;
}
.search-empty {
    color: var(--gray); font-size: 18px; padding: 40px 0;
}

@media (max-width: 700px) {
    .search-header { padding: 16px 20px 12px; }
    .search-close-btn { right: 20px; }
    .search-body   { padding: 24px 20px 40px; }
    .search-results-grid { grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); }
}

/* ─────────────────────────────────────────
   FOOTER
───────────────────────────────────────── */
.site-footer   { margin-top: 40px; border-top: 1px solid var(--border); padding: 40px 60px 48px; }
.footer-inner  { max-width: 520px; }
.footer-logo   { font-size: 18px; font-weight: 900; color: var(--red); letter-spacing: -0.5px; display: block; margin-bottom: 12px; }
.footer-disclaimer {
    font-size: 12px; color: var(--muted); line-height: 1.6; margin-bottom: 10px;
}
.footer-credit { font-size: 12px; color: var(--muted); }
.footer-credit strong { color: var(--gray); }

@media (max-width: 700px) {
    .site-footer { padding: 32px 20px 40px; }
}
</style>
@endsection

{{-- ═══════════════════════════════════════════════════════════════════
     HTML CONTENT
     ═══════════════════════════════════════════════════════════════════ --}}
@section('content')

<!-- Search overlay -->
<x-search-bar />

<!-- Navbar -->
<x-navbar />

<!-- Hero -->
<x-hero :project="$featured" hero-video="hero.mp4" />

<!-- Carousels -->
<div class="carousels-container" id="carouselsContainer">

    <x-project-carousel title="MarcFlix Originals"    id="originals"        :projects="$originals" />
    <x-project-carousel title="Web Development"       id="web-development"   :projects="$webDev" />
    <x-project-carousel title="Game Development"      id="games"             :projects="$games" />
    <x-project-carousel title="AI Experiments"        id="ai"                :projects="$aiProjects" />
    <x-project-carousel title="Creative Coding"       id="creative"          :projects="$creative" />
    @if(count($school) > 0)
    <x-project-carousel title="School Projects"       id="school"            :projects="$school" />
    @endif
    <x-project-carousel title="In Development"        id="in-development"    :projects="$inDevelopment" />

</div>

<!-- Project detail modal -->
<x-project-modal />

<!-- Footer -->
<x-disclaimer />

@endsection

{{-- ═══════════════════════════════════════════════════════════════════
     ALL JAVASCRIPT
     ═══════════════════════════════════════════════════════════════════ --}}
@section('scripts')
<script>
'use strict';

// ──────────────────────────────────────────
// Project data keyed by id (from PHP)
// ──────────────────────────────────────────
var PROJECTS = {!! json_encode(collect($all)->keyBy('id')) !!};

// Category gradients (match PHP-side values in project-card component)
var CAT_GRADIENTS = {
    'Web Development': 'linear-gradient(135deg,#0d1b3a 0%,#16213e 60%,#1a2744 100%)',
    'AI':              'linear-gradient(135deg,#0d0520 0%,#1a0a2e 60%,#200b3a 100%)',
    'Games':           'linear-gradient(135deg,#051a0e 0%,#0a2818 60%,#0e3520 100%)',
    'Creative':        'linear-gradient(135deg,#1a0f00 0%,#2a1a00 60%,#361f00 100%)',
    'default':         'linear-gradient(135deg,#111 0%,#1c1c1c 100%)',
};

// ──────────────────────────────────────────
// NAVBAR
// ──────────────────────────────────────────
var navbar = document.getElementById('mainNavbar');

window.addEventListener('scroll', function () {
    navbar.classList.toggle('scrolled', window.scrollY > 40);
}, { passive: true });

function toggleNav() {
    var links = document.getElementById('navLinks');
    links.classList.toggle('nav-open');
}
function closeNav() {
    document.getElementById('navLinks').classList.remove('nav-open');
}

// ──────────────────────────────────────────
// CAROUSEL NAVIGATION
// ──────────────────────────────────────────
function scrollCarousel(id, direction) {
    var track = document.getElementById('track-' + id);
    if (!track) return;
    var cardWidth = (track.querySelector('.project-card') || {}).offsetWidth || 280;
    track.scrollBy({ left: direction * (cardWidth + 10) * 3, behavior: 'smooth' });
}

// ──────────────────────────────────────────
// VIDEO HOVER BEHAVIOUR
// ──────────────────────────────────────────
function attachVideoHover(root) {
    root = root || document;
    root.querySelectorAll('.project-card').forEach(function (card) {
        var video    = card.querySelector('.card-video');
        var hasVideo = card.dataset.hasVideo === 'true';
        var hasImage = card.dataset.hasImage === 'true';

        if (!hasVideo || !video) return;

        // No image → show video first frame as static cover
        if (!hasImage) {
            video.classList.add('card-video-cover');
            if (video.dataset.src && !video.src) {
                video.src = video.dataset.src;
                video.load();
            }
        }

        card.addEventListener('mouseenter', function () {
            if (!video.src && video.dataset.src) {
                video.src = video.dataset.src;
            }
            video.play().catch(function () {});
        });

        card.addEventListener('mouseleave', function () {
            video.pause();
            if (!hasImage) {
                // keep first-frame visible
            }
        });
    });
}

// ──────────────────────────────────────────
// PROJECT MODAL
// ──────────────────────────────────────────
var modal = document.getElementById('projectModal');

function openProjectModal(id) {
    var p = PROJECTS[id];
    if (!p) return;

    // Banner
    var banner   = document.getElementById('modalBanner');
    var gradient = CAT_GRADIENTS[p.category] || CAT_GRADIENTS['default'];
    if (p.cover_image) {
        banner.style.background = gradient;
        banner.style.backgroundImage =
            'url(/assets/projects/images/' + p.cover_image + '), ' + gradient;
        banner.style.backgroundSize = 'cover';
    } else {
        banner.style.backgroundImage = 'none';
        banner.style.background      = gradient;
    }

    // Text fields
    document.getElementById('modalBadge').textContent    = p.is_original ? '▶ MARCFLIX ORIGINAL' : '◈ PROJECT';
    document.getElementById('modalTitle').textContent    = p.title;
    document.getElementById('modalTagline').textContent  = p.tagline || '';
    document.getElementById('modalDescription').textContent = p.long_description || p.description;
    document.getElementById('modalYear').textContent     = p.year;
    document.getElementById('modalCategory').textContent = p.category;
    document.getElementById('modalStatus').textContent   = p.status === 'completed' ? 'Completed' : 'In Development';
    document.getElementById('modalDifficulty').textContent = p.difficulty + ' / 10';
    document.getElementById('modalRating').textContent   = p.rating + ' / 10';
    document.getElementById('modalImpact').textContent   = p.impact + ' / 10';
    document.getElementById('modalScore').textContent    = p.score ? p.score.toFixed(1) : '—';
    document.getElementById('modalMatchScore').textContent = (p.rating * 10) + '% match';

    // Technologies
    var techList = document.getElementById('modalTechnologies');
    techList.innerHTML = p.technologies.map(function (t) {
        return '<span class="tech-badge">' + escHtml(t) + '</span>';
    }).join('');

    // Buttons — show only if URL exists
    setModalBtn('modalDemoBtn',   p.demo_url);
    setModalBtn('modalGithubBtn', p.github_url);
    setModalBtn('modalDocsBtn',   p.documentation_url);

    // Open
    modal.classList.add('modal-active');
    document.body.style.overflow = 'hidden';
}

function setModalBtn(id, url) {
    var btn = document.getElementById(id);
    if (url) {
        btn.href = url;
        btn.style.display = 'inline-flex';
    } else {
        btn.style.display = 'none';
    }
}

function closeProjectModal() {
    modal.classList.remove('modal-active');
    document.body.style.overflow = '';
}

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeProjectModal();
        closeSearch();
        closeNav();
    }
});

// Support Enter/Space on cards for accessibility
document.querySelectorAll('.project-card').forEach(function (card) {
    card.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            openProjectModal(parseInt(card.dataset.id));
        }
    });
});

// ──────────────────────────────────────────
// SEARCH
// ──────────────────────────────────────────
var searchOverlay = document.getElementById('searchOverlay');
var searchInput   = document.getElementById('searchInput');
var searchHint    = document.getElementById('searchHint');
var resultsGrid   = document.getElementById('searchResultsGrid');
var clearBtn      = document.getElementById('searchClearBtn');

var activeCategory   = 'all';
var activeStatusFilter = '';

function openSearch() {
    searchOverlay.classList.add('search-active');
    document.body.style.overflow = 'hidden';
    setTimeout(function () { searchInput.focus(); }, 80);
}

function closeSearch() {
    searchOverlay.classList.remove('search-active');
    document.body.style.overflow = '';
}

function clearSearch() {
    searchInput.value = '';
    clearBtn.style.display = 'none';
    searchHint.style.display = 'block';
    resultsGrid.innerHTML = '';
    searchInput.focus();
}

function setFilter(cat, el) {
    activeCategory = cat;
    document.querySelectorAll('[data-filter]').forEach(function (b) { b.classList.remove('filter-chip-active'); });
    el.classList.add('filter-chip-active');
    runSearch();
}

function setStatusFilter(status, el) {
    if (activeStatusFilter === status) {
        activeStatusFilter = '';
        el.classList.remove('filter-chip-active');
    } else {
        document.querySelectorAll('[data-filter-status]').forEach(function (b) { b.classList.remove('filter-chip-active'); });
        activeStatusFilter = status;
        el.classList.add('filter-chip-active');
    }
    runSearch();
}

function runSearch() {
    var q = searchInput.value.toLowerCase().trim();

    if (!q && activeCategory === 'all' && !activeStatusFilter) {
        searchHint.style.display = 'block';
        resultsGrid.innerHTML = '';
        return;
    }

    searchHint.style.display = 'none';

    var results = Object.values(PROJECTS).filter(function (p) {
        var matchQ = !q
            || p.title.toLowerCase().includes(q)
            || p.description.toLowerCase().includes(q)
            || p.category.toLowerCase().includes(q)
            || p.status.toLowerCase().includes(q)
            || String(p.year).includes(q)
            || p.technologies.some(function (t) { return t.toLowerCase().includes(q); });

        var matchCat    = activeCategory === 'all' || p.category === activeCategory;
        var matchStatus = !activeStatusFilter || p.status === activeStatusFilter;

        return matchQ && matchCat && matchStatus;
    });

    if (!results.length) {
        resultsGrid.innerHTML = '<p class="search-empty">No projects found.</p>';
        return;
    }

    resultsGrid.innerHTML = results.map(buildCardHtml).join('');
    attachVideoHover(resultsGrid);
}

if (searchInput) {
    searchInput.addEventListener('input', function () {
        clearBtn.style.display = this.value ? 'block' : 'none';
        runSearch();
    });
}

// ──────────────────────────────────────────
// DYNAMIC CARD HTML (used by search results)
// ──────────────────────────────────────────
function buildCardHtml(p) {
    var gradient    = CAT_GRADIENTS[p.category] || CAT_GRADIENTS['default'];
    var statusClass = p.status === 'completed' ? 'status-done' : 'status-wip';
    var statusLabel = p.status === 'completed' ? 'Completed' : 'In Dev';
    var techs       = p.technologies.slice(0, 3).map(function (t) {
        return '<span class="card-tech">' + escHtml(t) + '</span>';
    }).join('');
    var originBadge = p.is_original
        ? '<span class="card-badge card-badge-original">ORIGINAL</span>' : '';
    var demoAction  = p.demo_url
        ? "window.open('" + p.demo_url + "','_blank')"
        : 'openProjectModal(' + p.id + ')';

    return '<article class="project-card"'
        + ' data-id="' + p.id + '"'
        + ' data-has-image="' + (p.cover_image ? 'true' : 'false') + '"'
        + ' data-has-video="' + (p.preview_video ? 'true' : 'false') + '"'
        + ' onclick="openProjectModal(' + p.id + ')"'
        + ' tabindex="0" role="button">'
        + '<div class="card-media" style="background:' + gradient + '">'
        + (p.cover_image ? '<img class="card-image" src="/assets/projects/images/' + p.cover_image + '" alt="' + escHtml(p.title) + '" loading="lazy" onerror="this.src=\'/assets/defaults/default-cover.svg\'">' : '')
        + (p.preview_video ? '<video class="card-video' + (!p.cover_image ? ' card-video-cover' : '') + '" muted loop playsinline preload="none" data-src="/assets/projects/videos/' + p.preview_video + '"></video>' : '')
        + originBadge
        + '<span class="card-badge card-badge-category">' + escHtml(p.category) + '</span>'
        + '<div class="card-overlay"><div class="card-overlay-content">'
        + '<h3 class="card-overlay-title">' + escHtml(p.title) + '</h3>'
        + '<div class="card-overlay-meta"><span class="card-year">' + p.year + '</span>'
        + '<span class="card-difficulty">★ ' + p.difficulty + '/10</span>'
        + '<span class="' + statusClass + '">' + statusLabel + '</span></div>'
        + '<div class="card-techs">' + techs + '</div>'
        + '<div class="card-actions">'
        + '<button class="card-btn card-btn-play" onclick="event.stopPropagation();' + demoAction + '">▶ ' + (p.demo_url ? 'Play Demo' : 'Preview') + '</button>'
        + '<button class="card-btn card-btn-info" onclick="event.stopPropagation();openProjectModal(' + p.id + ')">+ Info</button>'
        + '</div></div></div></div>'
        + '<div class="card-info"><h3 class="card-title">' + escHtml(p.title) + '</h3>'
        + '<div class="card-strip-meta">'
        + '<span>' + p.year + '</span><span class="dot">·</span>'
        + '<span class="' + statusClass + '">' + statusLabel + '</span>'
        + (p.score ? '<span class="dot">·</span><span class="card-score">' + p.score.toFixed(1) + '</span>' : '')
        + '</div></div></article>';
}

// ──────────────────────────────────────────
// UTILITY
// ──────────────────────────────────────────
function escHtml(str) {
    return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;');
}

// ──────────────────────────────────────────
// INIT
// ──────────────────────────────────────────
attachVideoHover();
</script>
@endsection
