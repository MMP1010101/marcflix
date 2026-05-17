@extends('layouts.app')

@section('title', 'MARCFLIX')

@section('head')
<style>
    body {
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        overflow: hidden;
    }

    /* ── Outer screen fades to black before redirect ── */
    .intro-screen {
        position: fixed;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #000;
        z-index: 999;
    }

    /* ── Ambient red glow behind the logo ── */
    .intro-glow {
        position: absolute;
        width: min(700px, 90vw);
        height: 260px;
        background: radial-gradient(ellipse at center, rgba(229, 9, 20, 0.55) 0%, transparent 68%);
        filter: blur(60px);
        opacity: 0;
        animation: glowPulse 4.2s cubic-bezier(0.4, 0, 0.6, 1) forwards;
    }

    @keyframes glowPulse {
        0%   { opacity: 0;   transform: scale(0.5); }
        20%  { opacity: 1;   transform: scale(1.15); }
        60%  { opacity: 0.85; transform: scale(1); }
        90%  { opacity: 0.4; }
        100% { opacity: 0; }
    }

    /* ── Main logo text ── */
    .intro-logo {
        position: relative;
        z-index: 2;
        font-size: clamp(56px, 13vw, 148px);
        font-weight: 900;
        letter-spacing: clamp(-3px, -0.5vw, -1px);
        color: var(--red);
        text-transform: uppercase;
        font-family: var(--font);
        opacity: 0;
        animation: logoReveal 4.2s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        text-shadow:
            0 0  30px rgba(229, 9, 20, 0.9),
            0 0  70px rgba(229, 9, 20, 0.5),
            0 0 120px rgba(229, 9, 20, 0.2);
    }

    @keyframes logoReveal {
        0%   { opacity: 0;   transform: scaleX(1.4) scaleY(0.7); letter-spacing: 30px; filter: blur(12px); }
        18%  { opacity: 1;   transform: scaleX(1)   scaleY(1);   letter-spacing: clamp(-3px, -0.5vw, -1px); filter: blur(0); }
        65%  { opacity: 1;   transform: scale(1); filter: blur(0); }
        88%  { opacity: 0.6; transform: scale(0.97); filter: blur(2px); }
        100% { opacity: 0;   transform: scale(0.93); filter: blur(6px); }
    }

    /* ── Subtle CRT scanlines ── */
    .intro-scanlines {
        position: fixed;
        inset: 0;
        background: repeating-linear-gradient(
            0deg,
            transparent,
            transparent 3px,
            rgba(0, 0, 0, 0.06) 3px,
            rgba(0, 0, 0, 0.06) 4px
        );
        pointer-events: none;
        z-index: 3;
        opacity: 0;
        animation: scanlinesShow 4.2s ease forwards;
    }

    @keyframes scanlinesShow {
        0%   { opacity: 0; }
        18%  { opacity: 1; }
        80%  { opacity: 0.6; }
        100% { opacity: 0; }
    }

    /* ── Cinematic vignette ── */
    .intro-vignette {
        position: fixed;
        inset: 0;
        background: radial-gradient(ellipse at center, transparent 28%, rgba(0, 0, 0, 0.92) 100%);
        pointer-events: none;
        z-index: 2;
    }

    /* ── Tiny disclaimer at bottom ── */
    .intro-disclaimer {
        position: fixed;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        color: rgba(255, 255, 255, 0.22);
        font-size: 10px;
        letter-spacing: 0.4px;
        text-align: center;
        z-index: 10;
        max-width: 480px;
        line-height: 1.5;
        white-space: nowrap;
    }

    @media (max-width: 480px) {
        .intro-disclaimer { white-space: normal; padding: 0 20px; }
    }
</style>
@endsection

@section('content')
<div class="intro-screen" id="introScreen">
    <div class="intro-vignette"></div>
    <div class="intro-scanlines"></div>

    <div style="position: relative; display: flex; align-items: center; justify-content: center;">
        <div class="intro-glow"></div>
        <h1 class="intro-logo">MARCFLIX</h1>
    </div>
</div>

<p class="intro-disclaimer">
    MarcFlix is a personal portfolio. Not affiliated with or endorsed by Netflix, Inc.
</p>
@endsection

@section('scripts')
<script>
    // Wait for animation to finish, then fade screen and redirect
    setTimeout(function () {
        var screen = document.getElementById('introScreen');
        screen.style.transition = 'opacity 0.6s ease';
        screen.style.opacity    = '0';

        setTimeout(function () {
            window.location.href = '{{ route("profile") }}';
        }, 620);
    }, 3900);
</script>
@endsection
