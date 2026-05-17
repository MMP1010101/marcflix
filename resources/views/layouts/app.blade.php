<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>@yield('title', 'MARCFLIX')</title>
    <meta name="description" content="@yield('description', 'MARCFLIX — Personal developer portfolio by Marc Mancilla Palomar')">

    <style>
        :root {
            --bg:          #0f0f0f;
            --bg2:         #141414;
            --surface:     #1a1a1a;
            --card:        #1c1c1c;
            --red:         #e50914;
            --red-dark:    #b20710;
            --red-hover:   #ff2020;
            --white:       #ffffff;
            --gray:        #a3a3a3;
            --muted:       #666666;
            --border:      #2a2a2a;
            --green:       #46d369;
            --amber:       #f5a623;
            --font:        'Helvetica Neue', Helvetica, Arial, sans-serif;
            --ease:        0.25s ease;
            --ease-slow:   0.4s ease;
            --r:           6px;
            --r-lg:        12px;
        }

        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            font-family: var(--font);
            background: var(--bg);
            color: var(--white);
            overflow-x: hidden;
            min-height: 100vh;
            -webkit-font-smoothing: antialiased;
        }

        a    { color: inherit; text-decoration: none; }
        img  { display: block; max-width: 100%; }
        button { cursor: pointer; font-family: var(--font); }

        ::-webkit-scrollbar       { width: 5px; height: 5px; }
        ::-webkit-scrollbar-track { background: var(--bg2); }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--muted); }
    </style>

    @yield('head')
</head>
<body class="@yield('body-class')">
    @yield('content')
    @yield('scripts')
</body>
</html>
