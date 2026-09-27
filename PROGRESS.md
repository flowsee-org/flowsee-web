# Flowsee Public Website — Progress Tracker

> Keep this file accurate. Every time a phase/step is completed,
> flip its checkbox and add a short note under it (date + what landed).
> When resuming after a break, this file is the source of truth.

---

## Phase 0 — Scaffold & Base Config
- [x] 0.1 Laravel 12 scaffold in empty directory
- [x] 0.2 `npm install` (Vite 8 + Tailwind v4)
- [x] 0.3 Configure `vite.config.js`
- [x] 0.4 `resources/css/app.css` with Tailwind v4 import + `@theme` tokens + terminal base CSS
- [x] 0.5 Route `GET /` → `resources/views/pages/home.blade.php`
- [x] 0.6 Verify `npm run build` + `php artisan serve` → raw HTML `200` over curl

---

## Phase 1 — Wake-Up / Intro Overlay
- [x] 1.1 `resources/views/partials/intro.blade.php`
- [x] 1.2 Intro sequence (`intro.js` + `typewriter.js` basics)
- [x] 1.3 `prefers-reduced-motion` fast-path + "press any key / click to skip"
- [x] 1.4 Assets smoke-tested

---

## Phase 2 — Topbar + Giant Hero
- [x] 2.1 `resources/views/partials/topbar.blade.php` (terminal titlebar + anchor nav)
- [x] 2.2 `resources/views/partials/hero.blade.php`
- [x] 2.3 Responsive + focus-visible on nav; hero readable on mobile

---

## Phase 3 — Binary Terminal Background
- [x] 3.1 Global fixed dim canvas
- [x] 3.2 Dedicated dense binary bands/dividers
- [x] 3.3 `binary-bg.js` — single canvas, visibility/IO pause, reduced-motion static frame

---

## Phase 4 — About (8 Progressive Entries)
- [x] 4.1 `resources/views/partials/about.blade.php` — terminal window wrapper + command line
- [x] 4.2 Command click + scroll reveal → 8 placeholder entries
- [x] 4.3 No invented content — every body clearly `[PLACEHOLDER — …]`

---

## Phase 5 — Team (10 Members)
- [x] 5.1 Empty binary band divider before section
- [x] 5.2 `resources/views/partials/team.blade.php` — 10 procedural member cards
- [x] 5.3 Persian correction noted

---

## Phase 6 — Contact + Footer
- [x] 6.1 `resources/views/partials/contact.blade.php` — 3 channels
- [x] 6.2 Footer line `© 2026 FLOWSEE`

---

## Phase 7 — Full Flow, Polish & Docs
- [x] 7.1 End-to-end flow test
- [x] 7.2 A11y pass
- [x] 7.3 Performance pass
- [x] 7.4 Responsive pass
- [x] 7.5 README / in-code placeholder notes

---

## Phase 8 — Major Overhaul (2026-09-27)
- [x] 8.1 Topbar: remove `FLOWSEE//PUBLIC.TERMINAL` & `tty://flowsee`, center INDEX with "navigate:" prefix
- [x] 8.2 Hero: shrink section, replace giant text with `logo-nobg-orange.svg`, orange glow around logo
- [x] 8.3 Hero prompt: `flowsee:~$` stays static, "BUILT FOR DIGITAL. DESIGNED TO MOVE" types behind it
- [x] 8.4 Binary background: increase 0s opacity
- [x] 8.5 Remove ALL Persian text (intro wake-up both languages, about mirror, team mirror)
- [x] 8.6 Contact: wire admin panel data to main site (ContactSetting model)
- [x] 8.7 Contact/team/employee labels: orange → green
- [x] 8.8 Remove "— 10 members" / "— 8 entries" from titlebars
- [x] 8.9 Section indicator squares: 4 squares, active color follows section
- [x] 8.10 Font: load Montserrat from `font/` for non-terminal texts
- [x] 8.11 Contact: remove `[PLACEHOLDER — add real links here]` text
- [x] 8.12 About: replace `[PLACEHOLDER — one-line section intro]` with "Brand • Product • Web • Growth"
- [x] 8.13 Hover glitch effect on work/blog/employee cards
- [x] 8.14 Cursor: green `$`, invisible during intro
- [x] 8.15 Contact: title + text stacked (title above, text below) — same for works
- [x] 8.16 Data persistence: storage symlink exists (`public/storage → storage/app/public`); SQLite DB (`database.sqlite`) lives in repo — recommend backing DB to persistent volume / cloud DB for deploy persistence

---

## Session Log (append-only, append at bottom)

- 2026-09-16 — P0–P7 complete. ALL PHASES COMPLETE.
- 2026-09-27 — P8 started: major overhaul per user request.
