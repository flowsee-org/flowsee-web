<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="FLOWSEE — public terminal. [PLACEHOLDER: one-line company description]">
    <meta name="theme-color" content="#060806">
    <title>FLOWSEE // PUBLIC TERMINAL</title>

    {{-- Marks JS availability: enables .reveal-item gating in CSS --}}
    <script>document.documentElement.classList.add('js');</script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen overflow-x-hidden bg-term-bg font-mono text-term-fg antialiased">

    {{-- Keyboard / screen-reader skip --}}
    <a href="#main"
       class="sr-only focus:not-sr-only focus:fixed focus:left-4 focus:top-4 focus:z-[70]
              focus:bg-term-bg focus:px-4 focus:py-2 focus:text-brand focus:outline-1 focus:outline-brand">
        skip to content</a>

    {{-- Global dim binary background — filled by binary-bg.js (Phase 3) --}}
    <canvas id="binary-bg" class="fixed inset-0 z-0 h-full w-full opacity-[0.18]" aria-hidden="true"></canvas>

    {{-- CRT scanlines (non-interactive) --}}
    <div class="scanlines" aria-hidden="true"></div>

    {{-- Wake-up sequence (Phase 1). Hidden from no-JS users. --}}
    @include('partials.intro')

    {{-- Sticky terminal titlebar + nav (Phase 2) --}}
    @include('partials.topbar')

    <main id="main" class="relative z-10">
        {{ $slot }}
    </main>

    @include('partials.footer')
</body>
</html>