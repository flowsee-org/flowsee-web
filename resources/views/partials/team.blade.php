{{--
    Team — "OUR TEAM"
    Terminal window; same command/scroll reveal pattern.
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
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                    </span>
                    <span>team — members</span>
                </span>
                <span class="sr-only">Our team</span>
            </div>

            <div class="px-5 py-6 sm:px-8 sm:py-8">

                <h2 class="mb-1 text-2xl font-bold uppercase tracking-wide text-brand sm:text-3xl">
                    OUR TEAM
                </h2>
                <p class="mb-6 text-sm text-term-fg/50">
                    The people behind the build.
                </p>

                {{-- Command line --}}
                <div class="command-line flex flex-wrap items-center gap-x-3 gap-y-1 text-sm sm:text-base"
                     data-command="open team">
                    <span class="text-term-fg/50" aria-hidden="true">flowsee:~$</span>
                    <span class="cmd-text text-term-fg"></span>
                    <span class="type-caret text-term-fg" aria-hidden="true"></span>
                    <span class="cmd-status text-xs text-term-fg/40" data-status="// click or scroll to run</span>
                </div>

                {{-- Member cards --}}
                <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 gap-3" data-reveal-group aria-live="polite">
                    @php $employees = \App\Models\Employee::latest()->get(); @endphp
                    @forelse ($employees as $i => $emp)
                        <article class="reveal-item member-card flex gap-4 border border-term-fg/12 p-4
                                        transition-colors hover:border-term-fg/35 hover:glitch"
                                 style="--d: {{ $i * 0.12 }}s">
                            @if($emp->image)
                            <img src="/storage/{{ $emp->image }}" class="w-16 h-16 object-cover rounded shrink-0" alt="{{ $emp->title }}">
                            @else
                            <div class="w-16 h-16 shrink-0 bg-term-fg/10 rounded flex items-center justify-center text-xs text-term-fg/40">NO IMG</div>
                            @endif
                            <div class="min-w-0">
                                <p class="text-sm font-bold text-brand">{{ $emp->title }}</p>
                                <div class="flex flex-col gap-1">
                                    <p class="mt-0.5 text-sm text-term-fg/80">{{ Str::limit($emp->text, 100) }}</p>
                                </div>
                            </div>
                        </article>
                    @empty
                        <article class="reveal-item member-card flex gap-4 border border-term-fg/12 p-4">
                            <div class="min-w-0"><p class="text-sm font-bold text-brand">No team members yet</p><p class="text-xs text-term-fg/45">Add from /wp-admin</p></div>
                        </article>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</section>
