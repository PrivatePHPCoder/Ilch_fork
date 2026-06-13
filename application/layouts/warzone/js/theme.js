/*
 * Warzone Tactical Layout – vanilla JS (kein jQuery/Bootstrap nötig).
 * Hero-Carousel, Mobil-Offcanvas, Scroll-Header.
 */
(function () {
    'use strict';

    document.addEventListener('DOMContentLoaded', function () {
        initHero();
        initOffcanvas();
        initScrollHeader();
    });

    /* ---------------------------------------------------------------- Hero */
    function initHero() {
        var hero = document.getElementById('wzHero');
        if (!hero) {
            return;
        }

        var slides = Array.prototype.slice.call(hero.querySelectorAll('.wz-slide'));
        var dots = Array.prototype.slice.call(hero.querySelectorAll('.wz-hero-dots button'));
        var prev = hero.querySelector('.wz-hero-prev');
        var next = hero.querySelector('.wz-hero-next');
        if (slides.length < 2) {
            return;
        }

        var current = 0;
        var timer = null;
        var DELAY = 6000;

        function show(index) {
            current = (index + slides.length) % slides.length;
            slides.forEach(function (slide, i) {
                slide.classList.toggle('is-active', i === current);
            });
            dots.forEach(function (dot, i) {
                dot.classList.toggle('is-active', i === current);
            });
        }

        function go(step) {
            show(current + step);
            restart();
        }

        function restart() {
            window.clearInterval(timer);
            timer = window.setInterval(function () {
                show(current + 1);
            }, DELAY);
        }

        if (prev) {
            prev.addEventListener('click', function () { go(-1); });
        }
        if (next) {
            next.addEventListener('click', function () { go(1); });
        }
        dots.forEach(function (dot) {
            dot.addEventListener('click', function () {
                show(parseInt(dot.getAttribute('data-index'), 10) || 0);
                restart();
            });
        });

        // Pause beim Hover, weiter beim Verlassen.
        hero.addEventListener('mouseenter', function () { window.clearInterval(timer); });
        hero.addEventListener('mouseleave', restart);

        // Respektiere reduzierte Bewegung.
        if (!window.matchMedia || !window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            restart();
        }
    }

    /* ----------------------------------------------------------- Offcanvas */
    function initOffcanvas() {
        var burger = document.querySelector('.wz-burger');
        var nav = document.getElementById('wzNav');
        var backdrop = document.querySelector('.wz-backdrop');
        var closeBtn = document.querySelector('.wz-offcanvas-close');
        if (!burger || !nav) {
            return;
        }

        function open() {
            nav.classList.add('is-open');
            nav.setAttribute('aria-hidden', 'false');
            burger.setAttribute('aria-expanded', 'true');
            burger.classList.add('is-active');
            if (backdrop) {
                backdrop.hidden = false;
            }
            document.body.classList.add('wz-no-scroll');
        }

        function close() {
            nav.classList.remove('is-open');
            nav.setAttribute('aria-hidden', 'true');
            burger.setAttribute('aria-expanded', 'false');
            burger.classList.remove('is-active');
            if (backdrop) {
                backdrop.hidden = true;
            }
            document.body.classList.remove('wz-no-scroll');
        }

        burger.addEventListener('click', function () {
            nav.classList.contains('is-open') ? close() : open();
        });
        if (closeBtn) {
            closeBtn.addEventListener('click', close);
        }
        if (backdrop) {
            backdrop.addEventListener('click', close);
        }
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && nav.classList.contains('is-open')) {
                close();
            }
        });
        // Beim Klick auf einen Menülink schließen.
        nav.addEventListener('click', function (e) {
            if (e.target.closest('a')) {
                close();
            }
        });
    }

    /* -------------------------------------------------------- Scroll-State */
    function initScrollHeader() {
        var header = document.querySelector('.wz-header');
        if (!header) {
            return;
        }
        var ticking = false;
        function update() {
            header.classList.toggle('is-scrolled', window.scrollY > 24);
            ticking = false;
        }
        window.addEventListener('scroll', function () {
            if (!ticking) {
                window.requestAnimationFrame(update);
                ticking = true;
            }
        }, { passive: true });
        update();
    }
}());
