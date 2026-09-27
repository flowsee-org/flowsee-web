/**
 * hero.js — Hero behaviours.
 *
 * 1. Types/deletes the tagline behind the prompt ("BUILT FOR DIGITAL. DESIGNED TO MOVE").
 * 2. Triggers the orange brand rule draw-in.
 *
 * The "flowsee:~$ FLOWSEE" prompt stays static (no-JS/reduced-motion safe).
 */

import { typeText, deleteText, sleep } from './typewriter.js';

const TAGLINE_WORDS = ['BUILT FOR DIGITAL. DESIGNED TO MOVE'];
const TYPE_SPEED = 60;
const TYPE_VARIANCE = 30;
const DELETE_SPEED = 35;
const DELETE_VARIANCE = 20;
const HOLD_MS = 2000;
const RECHARGE_MS = 800;

const prefersReduced =
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

export function initHero() {
    const hero = document.getElementById('hero');
    const target = document.getElementById('hero-type');
    const rule = document.getElementById('brand-rule');
    if (!hero || !target) return;

    const start = () => {
        if (rule) rule.classList.add('is-on');
        if (prefersReduced) return; // static tagline already rendered
        runLoop(target);
    };

    const io = new IntersectionObserver(
        ([entry]) => {
            if (entry.isIntersecting) {
                io.disconnect();
                setTimeout(start, 500);
            }
        },
        { threshold: 0.3 }
    );
    io.observe(hero);
}

async function runLoop(target) {
    let i = 0;
    for (;;) {
        const word = TAGLINE_WORDS[i % TAGLINE_WORDS.length];
        await sleep(HOLD_MS);
        await deleteText(target, { speed: DELETE_SPEED, variance: DELETE_VARIANCE });
        await sleep(RECHARGE_MS);
        await typeText(target, word, { speed: TYPE_SPEED, variance: TYPE_VARIANCE });
        i++;
    }
}
