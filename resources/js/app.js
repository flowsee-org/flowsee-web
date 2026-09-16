// FLOWSEE public terminal — entry point.
// Modules added per phase; run once on DOM ready.

import { initIntro } from './intro.js';
import { initHero } from './hero.js';
import { initBinaryBg } from './binary-bg.js';
import { initSections } from './sections.js';

// Lock scroll during intro overlay
document.body.classList.add('overflow-hidden');

// Run intro on DOM ready (fires once, short-circuits if #intro is absent)
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        initIntro();
        initHero();
        initBinaryBg();
        initSections();
    }, { once: true });
} else {
    initIntro();
    initHero();
    initBinaryBg();
    initSections();
}