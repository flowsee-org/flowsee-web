/**
 * typewriter.js — Reusable type/delete character-by-character helper.
 *
 * Respects prefers-reduced-motion (instant writes).
 * All delays are configurable per-call.
 */

const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/** Pause helper. */
export function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, Math.max(0, ms)));
}

/**
 * Type text into `el` character by character.
 * @param {HTMLElement} el
 * @param {string}      text
 * @param {object}      opts  { speed: ms per char, variance: ± random range }
 */
export async function typeText(el, text, { speed = 40, variance = 30 } = {}) {
    if (prefersReduced || !el) {
        if (el) el.textContent = text;
        return;
    }
    el.textContent = '';
    for (const char of text) {
        el.textContent += char;
        await sleep(speed + (Math.random() - 0.5) * variance);
    }
}

/**
 * Delete text from `el` character by character (right-to-left).
 */
export async function deleteText(el, { speed = 25, variance = 20 } = {}) {
    if (prefersReduced || !el) {
        if (el) el.textContent = '';
        return;
    }
    while (el.textContent.length > 0) {
        el.textContent = el.textContent.slice(0, -1);
        await sleep(speed + (Math.random() - 0.5) * variance);
    }
}