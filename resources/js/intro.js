/**
 * intro.js — Wake-up sequence orchestrator.
 *
 * Boot: three blinking dots → typed system lines → screen clear →
 *       "WAKE UP FLOWSEE" hold → fade → hero.
 *
 * Reduced-motion: overlay removed instantly — no black-screen trap.
 * Any key / click skips to the end immediately.
 * <noscript> hides #intro so no-JS users never see this overlay.
 */

import { typeText, sleep } from './typewriter.js';

const prefersReduced =
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const BOOT_LINES = [
    '> INITIALIZING FLOWSEE TERMINAL ...',
    '> LOADING KERNEL .................. [OK]',
    '> MOUNTING /dev/flowsee .......... [OK]',
    '> DECRYPTING WAKE SEQUENCE ........ [OK]',
    '> ESTABLISHING SECURE CHANNEL ..... [OK]',
    '> ALL SYSTEMS READY',
];

let skipped = false;
let skipHandler = null;
let skipClickHandler = null;

export function initIntro() {
    const intro = document.getElementById('intro');
    if (!intro) return;

    if (new URLSearchParams(window.location.search).has('skip')) {
        endIntro(intro, true);
        return;
    }

    if (prefersReduced) {
        endIntro(intro, true);
        return;
    }

    skipHandler = () => skip();
    skipClickHandler = () => skip();
    window.addEventListener('keydown', skipHandler, { once: true });
    window.addEventListener('click', skipClickHandler, { once: true });

    const hint = document.getElementById('intro-skip');
    if (hint) setTimeout(() => { if (!skipped) hint.style.opacity = '1'; }, 1200);

    runSequence(intro);
}

function skip() {
    skipped = true;
}

async function runSequence(intro) {
    await sleep(700);
    if (skipped) { endIntro(intro); return; }

    const bootContainer = document.getElementById('boot-lines');
    for (const line of BOOT_LINES) {
        if (skipped) { endIntro(intro); return; }
        const lineEl = document.createElement('div');
        lineEl.className = 'whitespace-nowrap';
        bootContainer.appendChild(lineEl);
        await typeText(lineEl, line, { speed: 18, variance: 22 });
        await sleep(180);
    }

    await sleep(900);
    if (skipped) { endIntro(intro); return; }

    const boot = document.getElementById('intro-boot');
    if (boot) boot.classList.add('cleared');
    await sleep(550);

    const wakeText = document.getElementById('wake-text');
    if (wakeText) wakeText.style.opacity = '1';
    await sleep(2600);

    endIntro(intro);
}

function endIntro(intro, instant = false) {
    if (instant) {
        intro.style.display = 'none';
    } else {
        intro.style.opacity = '0';
        intro.addEventListener('transitionend', () => {
            intro.style.display = 'none';
            document.body.classList.remove('overflow-hidden');
        }, { once: true });
    }

    if (skipHandler) {
        window.removeEventListener('keydown', skipHandler);
        skipHandler = null;
    }
    if (skipClickHandler) {
        window.removeEventListener('click', skipClickHandler);
        skipClickHandler = null;
    }
    skipped = false;
}
