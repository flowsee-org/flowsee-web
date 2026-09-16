{{--
    Team — "OUR TEAM / ام میت"
    Terminal window; same command/scroll reveal pattern as About,
    progressively loading 10 placeholder member cards.

    CONTENT PLACEHOLDERS: names and roles are [PLACEHOLDER]. Avatars are
    procedurally generated (seeded by index) — deterministic, no photos.
--}}

<section id="team" class="relative px-5 py-24 sm:py-32">
    <div class="mx-auto max-w-5xl">

        <div class="term-frame">

            {{-- Window titlebar --}}
            <div class="flex items-center justify-between gap-3 border-b border-term-fg/15 px-4 py-2.5 text-xs text-term-fg/50">
                <span class="flex items-center gap-2" aria-hidden="true">
                    <span class="flex gap-1.5">
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-brand/70"></span>
                    </span>
                    <span>team — 10 members</span>
                </span>
                <span class="arabic text-sm text-term-fg/60" dir="rtl" aria-hidden="true">ام میت</span>
                <span class="sr-only">Our team</span>
            </div>

            <div class="px-5 py-6 sm:px-8 sm:py-8">

                <h2 class="mb-1 text-2xl font-bold uppercase tracking-wide text-brand sm:text-3xl">
                    OUR TEAM
                </h2>
                <p class="mb-6 text-sm text-term-fg/50">
                    [PLACEHOLDER — one-line team intro]
                </p>

                {{-- Command line --}}
                <div class="command-line flex flex-wrap items-center gap-x-3 gap-y-1 text-sm sm:text-base"
                     data-command="open team">
                    <span class="text-term-fg/50" aria-hidden="true">flowsee:~$</span>
                    <span class="cmd-text text-term-fg"></span>
                    <span class="type-caret text-term-fg" aria-hidden="true"></span>
                    <span class="cmd-status text-xs text-term-fg/40" data-status>// click or scroll to run</span>
                </div>

                {{-- 10 progressively loaded member cards --}}
                <div class="mt-8 grid gap-3 sm:grid-cols-2 lg:grid-cols-3" data-reveal-group aria-live="polite">
                    @for ($i = 1; $i <= 10; $i++)
                        <article class="reveal-item member-card flex gap-4 border border-term-fg/12 p-4
                                        transition-colors hover:border-term-fg/35"
                                 style="--d: {{ ($i - 1) * 0.12 }}s">

                            {{-- Procedural avatar (seeded, deterministic) --}}
                            @php
                                $rows = 6; $cols = 7;
                                mt_srand($i * 31);
                                $avi = '';
                                for ($r = 0; $r < $rows; $r++) {
                                    for ($c = 0; $c < $cols; $c++) {
                                        $n = mt_rand(0, 10);
                                        $ch = $n < 4 ? '<span>0</span>' : ($n < 8 ? '<span>1</span>' : '<span class="hi">▓</span>');
                                        $avi .= $ch . ' ';
                                    }
                                    $avi .= "\n";
                                }
                                mt_srand();
                                $percent = 60 + ($i * 37) % 40; // 60–99%, seeded-like
                                $filled = round($percent / 10); // out of 10 blocks
                            @endphp
                            <div class="shrink-0 self-start" aria-hidden="true">
                                <pre class="avatar text-[10px] leading-[1.35] text-term-fg/60">{!! $avi !!}</pre>
                            </div>

                            <div class="min-w-0">
                                <p class="text-sm font-bold text-brand">member_{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</p>
                                <p class="mt-0.5 truncate text-sm text-term-fg/80">[PLACEHOLDER — name]</p>
                                <p class="truncate text-xs text-term-fg/45">[PLACEHOLDER — role]</p>

                                {{-- Pseudo binary skill bar --}}
                                <p class="mt-3 flex items-center gap-2 text-[11px] text-term-fg/55" aria-label="pseudo skill indicator (placeholder)">
                                    <span aria-hidden="true">skill:</span>
                                    <span class="tracking-tight text-term-fg/75" aria-hidden="true">
                                        {{ str_repeat('▮', $filled) }}{{ str_repeat('▯', 10 - $filled) }}</span>
                                    <span class="text-term-fg/40">{{ $percent }}%</span>
                                </p>
                            </div>
                        </article>
                    @endfor
                </div>

            </div>
        </div>
    </div>
</section>