{{--
    Hero — logo + static prompt + typing tagline behind it.
    #hero-type holds static tagline so no-JS / reduced-motion users
    see it; hero.js types/deletes it on loop.
--}}

<section id="hero" class="relative flex min-h-[60vh] flex-col items-center justify-center gap-6 px-6 text-center">

    {{-- Logo with orange glow --}}
    <div class="relative select-none">
        <img src="/images/logo-nobg-orange.svg" alt="FLOWSEE" class="w-40 h-auto sm:w-48 md:w-56 drop-shadow-[0_0_30px_rgba(255,106,0,0.5)]" />
    </div>

    {{-- Typing tagline behind prompt --}}
    <p class="font-mono text-sm sm:text-base md:text-lg text-center relative z-10">
        <span class="text-term-fg/50" aria-hidden="true">flowsee:~$&nbsp;</span>
        <span id="hero-type" class="text-term-fg/80">BUILT FOR DIGITAL. DESIGNED TO MOVE</span>
        <span class="type-caret text-term-fg" aria-hidden="true"></span>
    </p>

    {{-- Orange brand line (draws in when hero starts) --}}
    <div id="brand-rule" class="brand-rule h-px w-56 bg-brand shadow-[0_0_22px_rgba(255,106,0,0.55)] sm:w-80" aria-hidden="true"></div>

    <a href="#about"
       class="cue-bounce mt-4 text-xl text-term-fg/50 transition-colors hover:text-brand focus-visible:outline-1 focus-visible:outline-brand"
       aria-label="scroll to about">
        <span aria-hidden="true">▾</span>
    </a>
</section>
