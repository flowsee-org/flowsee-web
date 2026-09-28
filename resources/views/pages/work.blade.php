<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $work->title }} — FLOWSEE</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen overflow-x-hidden bg-term-bg font-mono text-term-fg antialiased">
    <div class="scanlines" aria-hidden="true"></div>
    <main id="main" class="relative z-10 px-5 py-16 sm:py-24">
        <div class="mx-auto max-w-4xl">
            <a href="/" class="inline-block text-xs text-brand/60 hover:text-brand mb-8">← back to index</a>
            <div class="term-frame border border-term-fg/15 bg-black/30">
                <div class="flex items-center gap-3 border-b border-term-fg/15 px-4 py-2.5 text-xs text-term-fg/50">
                    <span class="flex gap-1.5">
                        <span class="inline-block h-2.5 w-2.5 bg-brand"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                    </span>
                    <span>work — {{ Str::slug($work->title) }}</span>
                </div>
                <div class="px-6 py-8 sm:px-10 sm:py-10">
                    <h1 class="text-3xl sm:text-4xl font-bold uppercase tracking-wide text-brand mb-4">{{ $work->title }}</h1>
                    <p class="text-sm text-term-fg/50 mb-6">Project details</p>
                    <div class="text-term-fg/75 leading-relaxed whitespace-pre-line">{{ $work->text }}</div>
                    @if($work->image)
                        <div class="mt-6"><img src="/storage/{{ $work->image }}" alt="{{ $work->title }}" class="max-h-72 rounded border border-term-fg/10"></div>
                    @endif
                </div>
            </div>
        </div>
    </main>
</body>
</html>
