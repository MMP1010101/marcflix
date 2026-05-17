@extends('layouts.app')

@section('title', "Who's watching? — MARCFLIX")

@section('head')
<style>
    body {
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 24px;
        background:
            radial-gradient(ellipse 80% 60% at 50% 0%, rgba(229, 9, 20, 0.06) 0%, transparent 70%),
            var(--bg);
    }

    .profile-page {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 56px;
        animation: fadeUp 0.55s ease both;
    }

    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(28px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    /* ── Header ── */
    .profile-logo {
        font-size: 28px;
        font-weight: 900;
        color: var(--red);
        letter-spacing: -1px;
        text-align: center;
        margin-bottom: 28px;
    }

    .profile-title {
        font-size: clamp(26px, 5vw, 44px);
        font-weight: 400;
        color: var(--white);
        letter-spacing: 2px;
        text-align: center;
    }

    /* ── Grid ── */
    .profile-grid {
        display: flex;
        gap: 40px;
        flex-wrap: wrap;
        justify-content: center;
    }

    /* ── Card ── */
    .profile-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 14px;
        cursor: pointer;
        text-decoration: none;
    }

    .profile-avatar {
        width: 148px;
        height: 148px;
        border-radius: var(--r-lg);
        border: 3px solid transparent;
        background: linear-gradient(135deg, #1b1b2e 0%, #16213e 55%, #0f3460 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: border-color var(--ease), transform var(--ease);
        position: relative;
        overflow: hidden;
    }

    .profile-avatar::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(229, 9, 20, 0.12) 0%, transparent 55%);
    }

    .profile-avatar svg {
        position: relative;
        z-index: 1;
        width: 64px;
        height: 64px;
        color: rgba(255, 255, 255, 0.88);
    }

    .profile-card:hover .profile-avatar {
        border-color: var(--white);
        transform: scale(1.04);
    }

    .profile-name {
        font-size: 17px;
        color: var(--gray);
        letter-spacing: 1px;
        transition: color var(--ease);
    }

    .profile-card:hover .profile-name {
        color: var(--white);
    }

    /* ── Footer disclaimer ── */
    .profile-disclaimer {
        font-size: 11px;
        color: var(--muted);
        text-align: center;
        line-height: 1.65;
        max-width: 420px;
    }

    @media (max-width: 400px) {
        .profile-avatar { width: 112px; height: 112px; }
        .profile-avatar svg { width: 50px; height: 50px; }
    }
</style>
@endsection

@section('content')
<div class="profile-page">

    <div>
        <div class="profile-logo">MARCFLIX</div>
        <h1 class="profile-title">Who's watching?</h1>
    </div>

    <div class="profile-grid">
        <a href="{{ route('home') }}" class="profile-card">
            <div class="profile-avatar">
                <!-- Code/developer icon -->
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5"/>
                </svg>
            </div>
            <span class="profile-name">dev</span>
        </a>
    </div>

    <p class="profile-disclaimer">
        MarcFlix is a personal portfolio inspired by streaming platform UI references.<br>
        It is not affiliated with, endorsed by, or intended to impersonate Netflix.
    </p>

</div>
@endsection
