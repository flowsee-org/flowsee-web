{{--
    Hero — giant FLOWSEE brand + self-typing prompt + orange line.
    #hero-type holds static "FLOWSEE" so no-JS / reduced-motion users
    see a complete prompt; hero.js tears it down and re-types it on loop.
--}}

<section id="hero" class="relative flex min-h-screen flex-col items-center justify-center gap-6 px-6 text-center">

    {{-- Giant brand --}}
    <h1 class="select-none text-[clamp(4rem,17vw,15rem)] font-bold uppercase leading-none tracking-tight text-brand [text-shadow:0_0_70px_rgba(255,106,0,0.28)]">
        FLOWSEE
    </h1>

    {{-- Typing prompt: FLOWSEE types / deletes / repeats --}}
    <p class="font-mono text-sm sm:text-base md:text-lg">
        <span class="text-term-fg/50" aria-hidden="true">flowsee:~$&nbsp;</span>
        <span id="hero-type" class="text-term-fg">FLOWSEE</span>
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