/**
 * sections.js — Terminal command-line reveal controller.
 *
 * For every element with [data-command]:
 *   • click → runs the command (types the text if empty, then marks [done])
 *   • first scroll into view → auto-runs (IntersectionObserver, fires once)
 *
 * A command run:
 *   1. Types the cmd-text via typewriter.js (instant if not yet visible).
 *   2. Sets [data-status] text to "[OK]" (terminal "done" marker).
 *   3. Adds .is-open to the next [data-reveal-group] sibling container
 *      → triggers staggered .reveal-item animations defined in app.css.
 *
 * Reduced-motion: group appears immediately (animations CSS-suppressed by
 * the global kill-switch); command text appears instantly.
 */

import { typeText } from './typewriter.js';

export function initSections() {
    // Dev shortcut: ?open forces all reveal groups open instantly.
    const forceOpen = new URLSearchParams(window.location.search).has('open');

    document.querySelectorAll('[data-command]').forEach(cmd => {
        const group = findRevealGroup(cmd);
        if (!group) return;

        const run = () => runCommand(cmd, group, forceOpen);
        let alreadyRun = false;
        const safeRun = () => { if (!alreadyRun) { alreadyRun = true; run(); } };

        cmd.addEventListener('click', safeRun, { once: false });

        // Auto-run on first visible scroll (or instantly if ?open)
        if (forceOpen) {
            safeRun();
        } else {
            const io = new IntersectionObserver(([entry]) => {
                if (entry.isIntersecting) {
                    io.disconnect();
                    setTimeout(safeRun, 400);
                }
            }, { threshold: 0.2 });
            io.observe(cmd);
        }
    });
}

async function runCommand(cmd, group, instant = false) {
    const textEl = cmd.querySelector('.cmd-text');
    const statusEl = cmd.querySelector('[data-status]');
    const cmdText = cmd.dataset.command || '';

    // Type command text if not already there (instant if ?open)
    if (textEl && !textEl.textContent) {
        if (instant) {
            textEl.textContent = cmdText;
        } else {
            await typeText(textEl, cmdText, { speed: 28, variance: 18 });
        }
    }

    // Mark done
    if (statusEl) {
        statusEl.textContent = '[OK]';
        statusEl.classList.add('text-brand');
    }

    // Reveal group
    group.classList.add('is-open');
}

/**
 * Walk forward in the DOM to find the first [data-reveal-group]
 * that is a sibling of (or inside the same parent as) the command line.
 */
function findRevealGroup(el) {
    // Walk the remaining siblings
    let next = el.nextElementSibling;
    while (next) {
        if (next.hasAttribute('data-reveal-group')) return next;
        // Also check inside container siblings (e.g. if both are in .px-5 wrapper)
        const inner = next.querySelector?.('[data-reveal-group]');
        if (inner) return inner;
        next = next.nextElementSibling;
    }
    // Fall back: walk up one level and try again
    const parent = el.parentElement;
    if (parent) return findRevealGroup(parent);
    return null;
}