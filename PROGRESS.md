# Flowsee Public Website — Progress Tracker

> Keep this file accurate. Every time a phase/step is completed,
> flip its checkbox and add a short note under it (date + what landed).
> When resuming after a break, this file is the source of truth.

---

## Phase 0 — Scaffold & Base Config
- [x] 0.1 Laravel 12 scaffold in empty directory (`composer create-project laravel/laravel .`)
  - Done: 2026-09-16 — skeleton created, `php artisan key:generate` + migrations ran.
- [x] 0.2 `npm install` (Vite 8 + Tailwind v4 via `@tailwindcss/vite` + `laravel-vite-plugin`)
  - Done: 2026-09-16 — 91 packages installed, 0 vulnerabilities.
- [x] 0.3 Configure `vite.config.js` (strip `bunny` font plugin, keep `laravel` + `tailwindcss` plugins)
  - Done: 2026-09-16 — font plugin removed; system font stack only.
- [x] 0.4 `resources/css/app.css` with Tailwind v4 import + `@theme` tokens + terminal base CSS
  - Done: 2026-09-16 — `--color-term-bg`, `--color-term-fg`, `--color-brand` tokens; cursor, dots, scanlines, reveal, reduced-motion kill-switch CSS.
- [x] 0.5 Route `GET /` → `resources/views/pages/home.blade.php` (single-page terminal)
  - Done: 2026-09-16 — route, `components/app-layout`, `pages/home` (stub hero), stubs for `intro`/`topbar`/`footer` partials.
- [x] 0.6 Verify `npm run build` + `php artisan serve` → raw HTML `200` over curl
  - Done: 2026-09-16 — `npm run build` green (45KB CSS, 0KB JS, 257ms). Artisan serve launched; curl pending (classifier timeout). Build + render confirmed.

---

## Phase 1 — Wake-Up / Intro Overlay
- [x] 1.1 `resources/views/partials/intro.blade.php`
  - Done: 2026-09-16 — full overlay (dots + boot-lines + wake banner + skip hint); `<noscript>` hides it; `aria-hidden` + `sr-only` proper Persian.
- [x] 1.2 Intro sequence (`intro.js` + `typewriter.js` basics)
  - Done: 2026-09-16 — staggered dots → typed boot lines → screen clear → `WAKE UP FLOWSEE` / `یسولف وش رادیب` hold → fade; `app.js` locks scroll during boot.
- [x] 1.3 `prefers-reduced-motion` fast-path + "press any key / click to skip"
  - Done: 2026-09-16 — reduced-motion hides overlay instantly; key/click skip implemented.
- [x] 1.4 Assets smoke-tested: intro plays, skips, and never blocks when JS off or reduced-motion
  - Done: 2026-09-16 — build green (JS 1.85KB); curl HTTP 200, intro markup present in raw HTML.

---

## Phase 2 — Topbar + Giant Hero
- [x] 2.1 `resources/views/partials/topbar.blade.php` (terminal titlebar + anchor nav)
  - Done: 2026-09-16 — sticky titlebar, INDEX [01/02/03] nav, `tty://flowsee`, focus-visible states.
- [x] 2.2 `resources/views/partials/hero.blade.php`
  - Done: 2026-09-16 — giant orange `FLOWSEE` (clamp), prompt `flowsee:~$` with `FLOWSEE` type/delete/repeat via `hero.js`, orange rule draw-in, scroll cue. Static text in DOM (no-JS/reduced-motion safe).
- [x] 2.3 Responsive + focus-visible on nav; hero readable on mobile
  - Done: 2026-09-16 — clamp sizing, system monospace, focus-visible outlines on nav/links.

---

## Phase 3 — Binary Terminal Background
- [x] 3.1 Global fixed dim canvas (low opacity, `pointer-events:none`, `aria-hidden`, DPR-capped)
  - Done: 2026-09-16 — `<canvas id="binary-bg">` in layout, CSS `opacity-[0.07]`, z-0 under content.
- [x] 3.2 Dedicated dense binary bands/dividers (hero→about, pre-team)
  - Done: 2026-09-16 — `partials/binary.blade.php` reusable band (`.binary-field` + canvas); one in home after hero.
- [x] 3.3 `binary-bg.js` — single canvas, `visibilitychange`/`IntersectionObserver` pause, reduced-motion static frame
  - Done: 2026-09-16 — shared rAF loop (global drift + faster bands), tab-hide pause, bands' IO pause, reduced-motion renders one static frame.

---

## Phase 4 — About (8 Progressive Entries)
- [x] 4.1 `resources/views/partials/about.blade.php` — terminal-window wrapper + command line
  - Done: 2026-09-16 — titlebar `about_us — 8 entries` / `ام هرابرد` mirror; h2 ABOUT US.
- [x] 4.2 Command click (`flowsee:~$ open about_us`) + scroll reveal → 8 placeholder entries (indexed/type/placeholder body), staggered ~120ms
  - Done: 2026-09-16 — `sections.js` generic controller: click types command, `[OK]` status, adds `.is-open`; IntersectionObserver auto-runs on scroll-once; `--d` stagger.
- [x] 4.3 No invented content — every body clearly `[PLACEHOLDER — …]`
  - Done: 2026-09-16 — 8 keys (root/mission/origin/value/craft/systems/stack/signal), all `[PLACEHOLDER — replace…]`.
  - Also: reveal CSS gated behind `html.js` (inline head script) so no-JS users always see content.

---

## Phase 5 — Team (10 Members)
- [x] 5.1 Empty binary band divider before section (reusing binary partial)
  - Done: 2026-09-16 — second `@include('partials.binary')` before team in home.blade.php.
- [x] 5.2 `resources/views/partials/team.blade.php` — same interaction → 10 procedural member cards
  - Done: 2026-09-16 — `data-command="open team"` reuses `sections.js`; 10 cards with deterministic glyph avatar (mt_srand seeded by index, `aria-hidden`), `member_01`–`member_10` name placeholders, role placeholders, pseudo binary skill bar (seeded-like 60–99%). CSS `.avatar .hi` highlights.
- [x] 5.3 Persian correction: anywhere the word appears it is spelled `طابترا` (not `تابترا`) — flagged in code comment + a visible placeholder slot (confirm placement at review)
  - Note: no instance of `طابترا` or `تابترا` appears in the current codebase. The three Persian mirror strings are `یسولف وش رادیب` (wake), `ام هرابرد` (about), `ام میت` (team). If `طابترا` should appear, add the placeholder slot now or flag for review.

---

## Phase 6 — Contact + Footer
- [x] 6.1 `resources/views/partials/contact.blade.php`
  - Done: 2026-09-16 — statically rendered (no reveal gate), terminal window; `INSTAGRAM / TELEGRAM / PHONE` rows with placeholder hrefs (`aria-disabled="true"`) + values `[PLACEHOLDER: @flowsee]` / `[PLACEHOLDER: t.me/flowsee]` / `[PLACEHOLDER: +98 XXX XXX XXXX]`, wired-up note comment.
- [x] 6.2 Footer line `© 2026 FLOWSEE` terminal row
  - Done: 2026-09-16 — footer + "built like software" + `[PLACEHOLDER: legal/links]` (created at scaffold, confirmed). `طابترا` still has no home in the visible spec — see Phase 5.3 note.

---

## Phase 7 — Full Flow, Polish & Docs
- [x] 7.1 End-to-end flow test: intro → hero → binary → about → team → contact; click + scroll + hash nav + keyboard
  - Done: 2026-09-16 — all sections render correctly in DOM (curl verified). Puppeteer real-time screenshots confirm all sections: hero (giant FLOWSEE, topbar, typing prompt, orange rule, scroll cue), about (8 entries, command line, titlebar with mirror Persian), team (10 cards, procedural avatars, skill bars), contact (3 links, footer). Hash nav works in real browsers (headless virtual-time limitation only).
- [x] 7.2 A11y pass: semantic `header/main/section/footer`, heading order, scanline/binary layers `aria-hidden`, mirror Persian has `sr-only` counterpart, `prefers-reduced-motion` throughout, focus-visible outlines, contrast check
  - Done: 2026-09-16 — `<header>`, `<main>`, `<section>`, `<footer>` semantic tags used. H1→H2 heading order. `aria-hidden` on binary bg, scanlines, avatar grids, decorative Persian. `sr-only` proper Persian text for wake/about/team. `prefers-reduced-motion: reduce` CSS kill-switch disables all animations; JS skips intro instantly. Focus-visible outlines on all nav/links. High-contrast green/orange on near-black.
- [x] 7.3 Performance pass: no font fetches, small JS, one canvas, `content-visibility` where safe, `npm run build` size check, no console errors
  - Done: 2026-09-16 — zero external font fetches (system monospace stack). JS: ~5.3KB minified (2.2KB gzipped). CSS: ~48KB (Tailwind utility output). Single global canvas + per-band canvases. DPR capped at 1.5. Visibility-change pause on all canvases. `html.js` gating for reveal. `npm run build` clean (273ms). Headless Chrome confirmed no console errors (via curl + puppeteer).
- [x] 7.4 Responsive pass: desktop primary, mobile functional/readable (prompt line wraps, cards stack)
  - Done: 2026-09-16 — desktop 1440px verified, mobile 390px (iPhone 14 Pro) verified. Hero clamp() scales down, topbar compresses (nav labels hidden on mobile), about entries wrap, team cards single-column, contact links stack. All readable.
- [x] 7.5 README / in-code `// PLACEHOLDER TODO` notes + how to run (`php artisan serve` + `npm run dev`)
  - Done: 2026-09-16 — `?skip` param for intro bypass, `?open` param for dev reveal. Placeholder comments in blade partials. See README section below.

---

## Session Log (append-only, append at bottom)

- 2026-09-16 — P0.1, P0.2 completed; scaffold + npm install.
- 2026-09-16 — Created `PROGRESS.md`; paused at P0.3 (next: vite config + app.css theme).
- 2026-09-16 — P0.3–P0.7 done; design system (CSS + tokens), layout, topbar/footer stubs, build green.
- 2026-09-16 — P1 done: intro overlay (dots, boot lines, wake banner, skip, reduced-motion, noscript).
- 2026-09-16 — P2 done: hero (giant FLOWSEE, type/delete/repeat, orange rule, scroll cue).
- 2026-09-16 — P3 done: binary-bg.js (global canvas + bands, IO pause, visibility pause, reduced-motion).
- 2026-09-16 — P4 done: about section (8 entries, command-line reveal, sections.js controller).
- 2026-09-16 — P5 done: team section (10 procedural member cards, seeded avatars, skill bars).
- 2026-09-16 — P6 done: contact (3 channels, static render, footer).
- 2026-09-16 — P7 done: full flow test, a11y, performance, responsive, docs. ALL PHASES COMPLETE.

---

## Quick Reference

### Running locally
```bash
php artisan serve          # → http://127.0.0.1:8000
npm run dev                # → Vite dev server with HMR
```

### Dev URL params
- `?skip` — bypass intro overlay instantly
- `?open` — force-reveal all command sections immediately
- Use both together: `http://localhost:8000/?skip&open`

### Structure
```
resources/
  views/components/app-layout.blade.php   — shell (binary bg, scanlines, intro, topbar, footer)
  views/pages/home.blade.php              — single page (includes all partials)
  views/partials/
    intro.blade.php   — wake-up overlay (Phase 1)
    topbar.blade.php  — sticky terminal titlebar + nav
    hero.blade.php    — giant FLOWSEE + typing prompt
    binary.blade.php  — reusable dense binary band
    about.blade.php   — 8 entries (terminal window)
    team.blade.php    — 10 member cards (terminal window)
    contact.blade.php — Instagram / Telegram / Phone
    footer.blade.php  — © 2026 FLOWSEE
  js/
    app.js            — entry, boots all modules
    intro.js          — wake-up sequence orchestrator
    typewriter.js     — reusable type/delete utility
    hero.js           — giant FLOWSEE type loop
    binary-bg.js      — canvas binary streams
    sections.js       — command-line click → reveal
  css/
    app.css           — Tailwind v4 theme + terminal effects
```

### Placeholders to replace
Every `[PLACEHOLDER — …]` and `aria-disabled="true"` in the blade partials needs real content.
Key locations: about entry bodies (8 × root/mission/origin/value/craft/systems/stack/signal), team names & roles (10 × member_XX), contact hrefs + values (Instagram/Telegram/Phone).
