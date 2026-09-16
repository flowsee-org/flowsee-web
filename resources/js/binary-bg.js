/**
 * binary-bg.js — Dim green binary character streams.
 *
 * Two contexts:
 * 1. Global fixed canvas (#binary-bg) — very slow drift, ~7 % CSS opacity,
 *    provides a living-but-unobtrusive backdrop.
 * 2. Dense band canvases (.binary-field canvas) — faster, denser,
 *    visible only inside their small strip; paused when off-screen.
 *
 * Both share a single rAF loop; paused when the tab is hidden.
 * Reduced-motion: each canvas renders a single static frame, never animates.
 */

const prefersReduced =
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const CHARS = '01';

// ─── public API ──────────────────────────────────────────────

export function initBinaryBg() {
    const streams = [];

    // Global fixed background
    const global = document.getElementById('binary-bg');
    if (global) streams.push(createStream(global, {
        charH: 15,
        speed: 0.35,       // px per frame (very slow)
        color: 'rgba(55,255,106,1)',   // CSS layer dims via opacity
        chanceSwap: 0.015,  // probability a column's char swaps each frame
    }));

    // Dense bands
    document.querySelectorAll('.binary-field canvas').forEach(canvas => {
        streams.push(createStream(canvas, {
            charH: 14,
            speed: 1.2,
            color: 'rgba(55,255,106,1)',
            chanceSwap: 0.04,
        }));
    });

    if (streams.length === 0) return;
    runLoop(streams);
}

// ─── internal ────────────────────────────────────────────────

function createStream(canvas, { charH = 14, speed = 1, color, chanceSwap = 0.02 }) {
    const ctx = canvas.getContext('2d');
    let columns = [];       // array of { x, y, ch }
    let w, h;

    const resize = () => {
        const dpr = Math.min(window.devicePixelRatio || 1, 1.5);
        w = canvas.clientWidth || 300;
        h = canvas.clientHeight || 200;
        canvas.width = Math.ceil(w * dpr);
        canvas.height = Math.ceil(h * dpr);
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        ctx.font = `${charH}px ui-monospace, SFMono-Regular, Menlo, Consolas, monospace`;
        columns = rebuildCols(w, h, charH);
    };

    resize();

    if (prefersReduced) {
        drawStatic(ctx, columns, color, charH);
    }

    const draw = () => {
        // subtle trail fade (for band contexts)
        ctx.clearRect(0, 0, w, h);
        ctx.fillStyle = color;
        for (const col of columns) {
            ctx.globalAlpha = 0.55 + 0.45 * (col.y / h); // fade in as it falls
            ctx.fillText(col.ch, col.x, col.y);

            col.y += speed;
            if (col.y > h + charH) {
                col.y = -charH * (1 + Math.random() * 3);
                col.ch = randomChar();
            }
            if (Math.random() < chanceSwap) col.ch = randomChar();
        }
        ctx.globalAlpha = 1;
    };

    return { canvas, resize, draw, visible: true, setupIO() { observeIO(this); } };
}

function rebuildCols(w, h, charH) {
    const gap = Math.max(charH + 2, 16);          // px between column centres
    const count = Math.floor(w / gap);
    const cols = [];
    for (let i = 0; i < count; i++) {
        cols.push({
            x: i * gap + Math.random() * 4 - 2,
            y: -Math.random() * h,                 // start off-screen
            ch: randomChar(),
        });
    }
    return cols;
}

function drawStatic(ctx, columns, color, charH) {
    ctx.clearRect(0, 0, ctx.canvas.width / (window.devicePixelRatio || 1), ctx.canvas.height / (window.devicePixelRatio || 1));
    ctx.fillStyle = color;
    ctx.globalAlpha = 1;
    for (const col of columns) {
        const y = Math.random() * (ctx.canvas.height / (window.devicePixelRatio || 1));
        ctx.fillText(col.ch, col.x, y);
    }
}

function observeIO(stream) {
    const io = new IntersectionObserver(([entry]) => {
        stream.visible = entry.isIntersecting;
    }, { threshold: 0 });
    io.observe(stream.canvas);
}

function runLoop(streams) {
    const loop = () => {
        for (const s of streams) {
            if (!s.visible || prefersReduced) continue;
            s.draw();
        }
        if (!document.hidden) requestAnimationFrame(loop);
    };

    // Respect tab visibility
    const onVis = () => { if (!document.hidden) requestAnimationFrame(loop); };
    document.addEventListener('visibilitychange', onVis, { passive: true });

    // Resize handler
    const onResize = () => streams.forEach(s => s.resize());
    window.addEventListener('resize', onResize, { passive: true });

    // Wire up IO for band canvases
    streams.filter(s => s.canvas.id !== 'binary-bg').forEach(s => s.setupIO());

    requestAnimationFrame(loop);
}

function randomChar() {
    return CHARS[Math.floor(Math.random() * CHARS.length)];
}