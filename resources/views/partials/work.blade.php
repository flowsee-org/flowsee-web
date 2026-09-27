{{--
    Work — some of our projects (new section).
--}}

<section id="work" class="relative px-5 py-24 sm:py-32">
    <div class="mx-auto max-w-5xl">

        <div class="term-frame">
            <div class="flex items-center justify-between gap-3 border-b border-term-fg/15 px-4 py-2.5 text-xs text-term-fg/50">
                <span class="flex items-center gap-2" aria-hidden="true">
                    <span class="flex gap-1.5">
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-brand/70"></span>
                    </span>
                    <span>work — selected projects</span>
                </span>
                <span class="sr-only">Some of our work</span>
            </div>

            <div class="px-5 py-6 sm:px-8 sm:py-8">
                <h2 class="mb-1 text-2xl font-bold uppercase tracking-wide text-brand sm:text-3xl">
                    SOME OF OUR WORK
                </h2>
                <p class="mb-6 text-sm text-term-fg/50">
                    Projects that moved.
                </p>

                <div class="command-line flex flex-wrap items-center gap-x-3 gap-y-1 text-sm sm:text-base"
                     data-command="open work">
                    <span class="text-term-fg/50" aria-hidden="true">flowsee:~$</span>
                    <span class="cmd-text text-term-fg"></span>
                    <span class="type-caret text-term-fg" aria-hidden="true"></span>
                    <span class="cmd-status text-xs text-term-fg/40" data-status="// click or scroll to run</span>
                </div>

                <div class="mt-8 grid gap-3 sm:grid-cols-2 lg:grid-cols-3" data-reveal-group aria-live="polite">
                    {{-- Placeholder work cards --}}
                    <article class="reveal-item work-card border border-term-fg/12 p-4 transition-colors hover:border-term-fg/35 hover:glitch" style="--d: 0s">
                        <div class="flex flex-col gap-2 text-term-fg/75">
                            <strong class="text-brand">Project Alpha</strong>
                            <span>Brand identity + terminal interface design.</span>
                        </div>
                    </article>
                    <article class="reveal-item work-card border border-term-fg/12 p-4 transition-colors hover:border-term-fg/35 hover:glitch" style="--d: 0.12s">
                        <div class="flex flex-col gap-2 text-term-fg/75">
                            <strong class="text-brand">Project Beta</strong>
                            <span>Web platform with real-time data streams.</span>
                        </div>
                    </article>
                    <article class="reveal-item work-card border border-term-fg/12 p-4 transition-colors hover:border-term-fg/35 hover:glitch" style="--d: 0.24s">
                        <div class="flex flex-col gap-2 text-term-fg/75">
                            <strong class="text-brand">Project Gamma</strong>
                            <span>Growth system for digital products.</span>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</section>
