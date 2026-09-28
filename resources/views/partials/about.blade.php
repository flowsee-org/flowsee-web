{{--
    About — "ABOUT US"
    Terminal window; clicking (or scrolling to) the command line runs
    `open about_us`, progressively loading entries.
--}}

<section id="about" class="relative px-5 py-24 sm:py-32">
    <div class="mx-auto max-w-4xl">

        <div class="term-frame">

            {{-- Window titlebar --}}
            <div class="flex items-center justify-between gap-3 border-b border-term-fg/15 px-4 py-2.5 text-xs text-term-fg/50">
                <span class="flex items-center gap-2" aria-hidden="true">
                    <span class="flex gap-1.5">
                        <span class="inline-block h-2.5 w-2.5 bg-brand/70"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                    </span>
                    <span>about_us</span>
                </span>
                <span class="sr-only">About us</span>
            </div>

            <div class="px-5 py-6 sm:px-8 sm:py-8">

                <h2 class="mb-1 text-2xl font-bold uppercase tracking-wide text-brand sm:text-3xl">
                    ABOUT US
                </h2>
                <p class="mb-6 text-sm text-term-fg/50">
                    Brand • Product • Web • Growth
                </p>

                {{-- Command line: click or scroll to execute --}}
                <div class="command-line flex flex-wrap items-center gap-x-3 gap-y-1 text-sm sm:text-base"
                     data-command="open about_us">
                    <span class="text-term-fg/50" aria-hidden="true">flowsee:~$</span>
                    <span class="cmd-text text-term-fg"></span>
                    <span class="type-caret text-term-fg" aria-hidden="true"></span>
                    <span class="cmd-status text-xs text-term-fg/40" data-status>// click or scroll to run</span>
                </div>

                {{-- 8 progressively loaded entries --}}
                <div id="about-output" class="data-block mt-6" data-reveal-group aria-live="polite">
                    @php $blogs = \App\Models\AboutBlog::latest()->get(); @endphp
                    @forelse ($blogs as $i => $blog)
                        <article class="reveal-item entry glitch border-t border-term-fg/10 py-3 first:border-t-0 first:pt-0" style="--d: {{ $i * 0.12 }}s">
                            <div class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
                                <span class="w-12 shrink-0 text-brand">[ {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }} ]</span>
                                <span class="w-24 shrink-0 text-term-fg/55">BLOG</span>
                                <div class="min-w-0 flex-1 flex flex-col gap-1 text-term-fg/75">
                                    <strong>{{ $blog->title }}</strong>
                                    <span>{{ Str::limit($blog->text, 120) }}</span>
                                </div>
                            </div>
                            @if($blog->image)
                            <div class="mt-2"><img src="/storage/{{ $blog->image }}" class="max-h-48 rounded" alt="{{ $blog->title }}"></div>
                            @endif
                        </article>
                    @empty
                        <article class="reveal-item entry glitch border-t border-term-fg/10 py-3 first:border-t-0 first:pt-0">
                            <div class="flex flex-wrap items-baseline gap-x-3 gap-y-1">
                                <span class="w-12 shrink-0 text-brand">[ 01 ]</span>
                                <span class="w-24 shrink-0 text-term-fg/55">ROOT</span>
                                <span class="min-w-0 flex-1 text-term-fg/75">No blogs yet — add from /wp-admin.</span>
                            </div>
                        </article>
                    @endforelse
                </div>

            </div>
        </div>

        <span id="team-top-spacer" class="sr-only"></span>
    </div>
</section>
