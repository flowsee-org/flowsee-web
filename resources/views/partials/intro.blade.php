{{--
    Wake-up / intro overlay.
    Covers viewport until the boot sequence completes (or is skipped).
    <noscript> immediately hides it so no-JS users see the hero directly.
    prefers-reduced-motion: JS sets display:none instantly — no black screen trap.
--}}

<div id="intro"
     class="intro-overlay fixed inset-0 z-50 flex flex-col items-center justify-center
            overflow-hidden bg-term-bg text-term-fg opacity-100 transition-opacity duration-700"
     aria-hidden="true">

    {{-- Phase 1a: boot lines + dots --}}
    <div id="intro-boot" class="intro-boot flex flex-col items-start gap-2 px-6 text-sm sm:text-base transition-all duration-300">
        <div class="dots mb-4 text-lg tracking-[0.4em] text-term-fg" aria-hidden="true">
            <span class="inline-block">●</span>
            <span class="inline-block">●</span>
            <span class="inline-block">●</span>
        </div>
        <div id="boot-lines" class="min-w-[260px] text-term-fg/90"></div>
    </div>

    {{-- Phase 1b: wake-up banner (shown after "screen clear") --}}
    <div id="wake-text" class="wake-text absolute inset-0 flex flex-col items-center justify-center gap-3 px-6 text-center opacity-0 transition-opacity duration-500">
        <span class="text-3xl font-bold uppercase tracking-widest text-brand sm:text-4xl md:text-5xl">
            FLOWSEE
        </span>
    </div>

    {{-- Skip hint --}}
    <span id="intro-skip"
          class="intro-skip absolute bottom-8 left-1/2 -translate-x-1/2 text-xs text-term-fg/30 opacity-0 transition-opacity duration-300"
          aria-hidden="true">
        [press any key to skip]
    </span>
</div>

<noscript>
    <style>
        #intro { display: none !important; }
    </style>
</noscript>
