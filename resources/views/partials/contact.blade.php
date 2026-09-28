{{--
    Contact — terminal channels list. Rendered statically.
--}}

<section id="contact" class="relative px-5 py-24 sm:py-32">
    <div class="mx-auto max-w-3xl">

        <div class="term-frame">

            {{-- Window titlebar --}}
            <div class="flex items-center justify-between gap-3 border-b border-term-fg/15 px-4 py-2.5 text-xs text-term-fg/50">
                <span class="flex items-center gap-2" aria-hidden="true">
                    <span class="flex gap-1.5">
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-term-fg/25"></span>
                        <span class="inline-block h-2.5 w-2.5 bg-brand/70"></span>
                    </span>
                    <span>contact — channels</span>
                </span>
                <span class="text-term-fg/40">tty://open</span>
            </div>

            <div class="px-5 py-6 sm:px-8 sm:py-8">

                <h2 class="mb-1 text-2xl font-bold uppercase tracking-wide text-brand sm:text-3xl">
                    CONTACT
                </h2>
                <p class="mb-7 text-sm text-term-fg/50">
                    Reach out directly.
                </p>

                @php $setting = \App\Models\ContactSetting::first(); @endphp

                <div class="space-y-3">
                    {{-- INSTAGRAM --}}
                    <a href="{{ optional($setting)->instagram ? 'https://instagram.com/' . $setting->instagram : '#' }}"
                       class="contact-link glitch flex flex-wrap items-baseline gap-x-3 gap-y-1 border border-term-fg/12 px-4 py-3 text-sm transition-colors hover:border-term-fg/40 hover:bg-term-fg/5 focus-visible:outline-1 focus-visible:outline-brand">
                        <span class="w-28 shrink-0 text-green-400">INSTAGRAM</span>
                        <span class="text-term-fg/50" aria-hidden="true">→</span>
                        <span class="text-term-fg/80">{{ optional($setting)->instagram ?: '@flowsee' }}</span>
                        <span class="ml-auto text-[11px] text-term-fg/30" aria-hidden="true">//social</span>
                    </a>

                    {{-- TELEGRAM --}}
                    <a href="{{ optional($setting)->telegram ? 'https://t.me/' . $setting->telegram : '#' }}"
                       class="contact-link glitch flex flex-wrap items-baseline gap-x-3 gap-y-1 border border-term-fg/12 px-4 py-3 text-sm transition-colors hover:border-term-fg/40 hover:bg-term-fg/5 focus-visible:outline-1 focus-visible:outline-brand">
                        <span class="w-28 shrink-0 text-green-400">TELEGRAM</span>
                        <span class="text-term-fg/50" aria-hidden="true">→</span>
                        <span class="text-term-fg/80">{{ optional($setting)->telegram ?: 't.me/flowsee' }}</span>
                        <span class="ml-auto text-[11px] text-term-fg/30" aria-hidden="true">//chat</span>
                    </a>

                    {{-- PHONE --}}
                    <a href="{{ optional($setting)->phone ? 'tel:' . $setting->phone : '#' }}"
                       class="contact-link glitch flex flex-wrap items-baseline gap-x-3 gap-y-1 border border-term-fg/12 px-4 py-3 text-sm transition-colors hover:border-term-fg/40 hover:bg-term-fg/5 focus-visible:outline-1 focus-visible:outline-brand">
                        <span class="w-28 shrink-0 text-green-400">PHONE</span>
                        <span class="text-term-fg/50" aria-hidden="true">→</span>
                        <span class="text-term-fg/80">{{ optional($setting)->phone ?: '+98 XXX XXX XXXX' }}</span>
                        <span class="ml-auto text-[11px] text-term-fg/30" aria-hidden="true">//calls</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
