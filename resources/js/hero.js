/**
 * hero.js — Giant FLOWSEE hero behaviours.
 *
 * 1. Starts the terminal prompt's type / delete / repeat loop once the
 *    hero is on screen (works whether or not the intro overlay played).
 * 2. Triggers the orange brand rule draw-in.
 *
 * Reduced-motion: stays static — the prompt's "FLOWSEE" is in the DOM.
 */

import { typeText, deleteText, sleep } from './typewriter.js';

// Self-typing loop target word(s). Keep it FLOWSEE-anchored.
const WORDS = ['FLOWSEE'];
const TYPE_SPEED = 90;     // ms per char
const TYPE_VARIANCE = 50;  // ± jitter
const DELETE_SPEED = 42;
const DELETE_VARIANCE = 30;
const HOLD_MS = 1300;      // pause once fully typed
const RECHARGE_MS = 650;   // pause once fully deleted

const prefersReduced =
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

export function initHero() {
    const hero = document.getElementById('hero');
    const target = document.getElementById('hero-type');
    const rule = document.getElementById('brand-rule');
    if (!hero || !target) return;

    const start = () => {
        if (rule) rule.classList.add('is-on');
        if (prefersReduced) return; // static "FLOWSEE" already rendered
        runLoop(target);
    };

    const io = new IntersectionObserver(
        ([entry]) => {
            if (entry.isIntersecting) {
                io.disconnect();
                setTimeout(start, 700);
            }
        },
        { threshold: 0.4 }
    );
    io.observe(hero);
}

/**
 * Continuously: hold (text already typed) → delete → type next word → hold…
 * Starts with a delete so the "server-typed" state feels continuous.
 */
async function runLoop(target) {
    let i = 0;
    for (;;) {
        const word = WORDS[i % WORDS.length];

        // Already fully typed the first time → pause, then delete & retype.
        await sleep(HOLD_MS);
        await deleteText(target, { speed: DELETE_SPEED, variance: DELETE_VARIANCE });
        await sleep(RECHARGE_MS);
        await typeText(target, word, { speed: TYPE_SPEED, variance: TYPE_VARIANCE });
        i++;
    }
}