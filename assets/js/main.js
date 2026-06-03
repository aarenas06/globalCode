/* ============================================================
   GLOBAL CODE — main.js
   Animaciones GSAP, interactividad y lógica de UI
   ============================================================ */

/* ── Prefers-reduced-motion guard ───────────────────────────── */
const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/* ── isMobile helper ────────────────────────────────────────── */
const isMobile = () => window.innerWidth <= 768;

/* ============================================================
   LOADING SCREEN
   ============================================================ */
function initLoadingScreen() {
  const screen = document.getElementById('loading-screen');
  if (!screen) return;

  setTimeout(() => {
    screen.classList.add('hide');
    setTimeout(() => {
      screen.style.display = 'none';
      document.body.style.overflow = '';
    }, 650);
  }, 1500);

  document.body.style.overflow = 'hidden';
}

/* ============================================================
   CURSOR PERSONALIZADO
   ============================================================ */
function initCursor() {
  if (isMobile()) return;

  const dot  = document.getElementById('cursor-dot');
  const ring = document.getElementById('cursor-ring');
  if (!dot || !ring) return;

  let mx = 0, my = 0;       // mouse real
  let dx = 0, dy = 0;       // dot position
  let rx = 0, ry = 0;       // ring position
  let ringScale = 1;
  let targetRingScale = 1;

  document.addEventListener('pointermove', (e) => {
    mx = e.clientX;
    my = e.clientY;
  });

  function lerp(a, b, t) { return a + (b - a) * t; }

  function animateCursor() {
    dx = lerp(dx, mx, 0.95);
    dy = lerp(dy, my, 0.95);
    rx = lerp(rx, mx, 0.42);
    ry = lerp(ry, my, 0.42);
    ringScale = lerp(ringScale, targetRingScale, 0.26);

    dot.style.transform  = `translate(${dx - 3}px, ${dy - 3}px)`;
    ring.style.transform = `translate(${rx - 16}px, ${ry - 16}px) scale(${ringScale})`;

    requestAnimationFrame(animateCursor);
  }
  animateCursor();

  /* hover interactivos */
  const interactiveEls = 'a, button, .servicio-card, .proyecto-card, .tech-pill, .contacto-dato, .footer-link';

  document.querySelectorAll(interactiveEls).forEach(el => {
    el.addEventListener('mouseenter', () => {
      ring.classList.add('is-hovering');
      targetRingScale = 2.5;
      dot.style.opacity = '0';
    });
    el.addEventListener('mouseleave', () => {
      ring.classList.remove('is-hovering', 'is-hovering-cta');
      targetRingScale = 1;
      dot.style.opacity = '1';
    });
  });

  const ctaBtn = document.getElementById('hero-cta-btn');
  if (ctaBtn) {
    ctaBtn.addEventListener('mouseenter', () => {
      ring.classList.remove('is-hovering');
      ring.classList.add('is-hovering-cta');
      targetRingScale = 3;
      dot.style.opacity = '0';
    });
    ctaBtn.addEventListener('mouseleave', () => {
      ring.classList.remove('is-hovering-cta');
      targetRingScale = 1;
      dot.style.opacity = '1';
    });
  }
}

/* ============================================================
   NAVBAR
   ============================================================ */
function initNavbar() {
  const navbar = document.getElementById('navbar');
  if (!navbar) return;

  /* Entrada inicial */
  if (!reducedMotion) {
    gsap.to(navbar, {
      y: 0, opacity: 1, duration: 0.8, ease: 'power3.out', delay: 1.6
    });
  } else {
    navbar.style.opacity = '1';
    navbar.style.transform = 'none';
  }

  /* Scroll effect */
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 80);
    updateScrollSpy();
  }, { passive: true });

  /* Smooth scroll links */
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const target = document.querySelector(link.getAttribute('href'));
      if (!target) return;
      e.preventDefault();
      const offset = navbar.offsetHeight + 16;
      const top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top, behavior: 'smooth' });

      /* Cerrar mobile menu si está abierto */
      closeMobileMenu();
    });
  });

  /* Hamburger */
  const hamburgerBtn = document.getElementById('hamburger-btn');
  const mobileMenu   = document.getElementById('mobile-menu');

  if (hamburgerBtn && mobileMenu) {
    hamburgerBtn.addEventListener('click', () => {
      const isOpen = hamburgerBtn.classList.contains('open');
      if (isOpen) { closeMobileMenu(); } else { openMobileMenu(); }
    });
  }

  function openMobileMenu() {
    hamburgerBtn.classList.add('open');
    hamburgerBtn.setAttribute('aria-expanded', 'true');
    mobileMenu.classList.add('open');
    mobileMenu.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function closeMobileMenu() {
    if (!hamburgerBtn || !mobileMenu) return;
    hamburgerBtn.classList.remove('open');
    hamburgerBtn.setAttribute('aria-expanded', 'false');
    mobileMenu.classList.remove('open');
    mobileMenu.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }
}

/* ── Scroll progress bar ────────────────────────────────────── */
function initScrollProgress() {
  const bar = document.getElementById('scroll-progress');
  if (!bar) return;
  window.addEventListener('scroll', () => {
    const scrolled  = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    bar.style.width = (scrolled / docHeight * 100) + '%';
  }, { passive: true });
}

/* ── Hero spotlight + spotlight del mouse ───────────────────── */
function initHeroSpotlight() {
  const hero = document.getElementById('inicio');
  if (!hero || isMobile()) return;
  hero.addEventListener('mousemove', (e) => {
    const rect = hero.getBoundingClientRect();
    const x = ((e.clientX - rect.left) / rect.width  * 100).toFixed(1);
    const y = ((e.clientY - rect.top)  / rect.height * 100).toFixed(1);
    hero.style.setProperty('--mx', x + '%');
    hero.style.setProperty('--my', y + '%');
  }, { passive: true });
}

/* ── 3D Tilt en cards de servicios ─────────────────────────── */
function initCardTilt() {
  if (isMobile()) return;
  document.querySelectorAll('.servicio-card').forEach(card => {
    card.addEventListener('mousemove', (e) => {
      const rect   = card.getBoundingClientRect();
      const x      = e.clientX - rect.left;
      const y      = e.clientY - rect.top;
      const cx     = rect.width  / 2;
      const cy     = rect.height / 2;
      const rotX   = ((y - cy) / cy) * -7;
      const rotY   = ((x - cx) / cx) *  7;
      card.style.transform = `translateY(-8px) perspective(900px) rotateX(${rotX}deg) rotateY(${rotY}deg)`;
    });
    card.addEventListener('mouseleave', () => {
      card.style.transform = '';
    });
  });
}

/* ── Magnetic effect en botones primarios ───────────────────── */
function initMagneticButtons() {
  if (isMobile() || typeof gsap === 'undefined') return;
  document.querySelectorAll('.btn-primary').forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
      const rect = btn.getBoundingClientRect();
      const dx   = e.clientX - (rect.left + rect.width  / 2);
      const dy   = e.clientY - (rect.top  + rect.height / 2);
      gsap.to(btn, { x: dx * 0.28, y: dy * 0.28, duration: 0.35, ease: 'power2.out' });
    });
    btn.addEventListener('mouseleave', () => {
      gsap.to(btn, { x: 0, y: 0, duration: 0.6, ease: 'elastic.out(1, 0.5)' });
    });
  });
}

/* ── Scroll spy ─────────────────────────────────────────────── */
function updateScrollSpy() {
  const sections = ['inicio', 'servicios', 'proceso', 'tecnologias', 'portafolio', 'contacto'];
  const navLinks  = document.querySelectorAll('.nav-link[data-section]');
  const offset    = 120;

  let current = '';
  sections.forEach(id => {
    const el = document.getElementById(id);
    if (el && el.getBoundingClientRect().top <= offset) current = id;
  });

  navLinks.forEach(link => {
    link.classList.toggle('active', link.dataset.section === current);
  });
}

/* ============================================================
   PARTICLES.JS
   ============================================================ */
function initParticles() {
  const cfg = window.GC_PARTICLES;
  if (!cfg || typeof particlesJS === 'undefined') return;

  /* hero: reducir partículas en mobile */
  const heroConfig = JSON.parse(JSON.stringify(cfg.hero));
  if (isMobile()) heroConfig.particles.number.value = 30;

  if (document.getElementById('particles-js')) {
    particlesJS('particles-js', heroConfig);
  }
  if (document.getElementById('particles-contacto')) {
    particlesJS('particles-contacto', cfg.contacto);
  }
}

/* ============================================================
   TYPING EFFECT — hero eyebrow
   ============================================================ */
function initTypingEffect() {
  const el = document.getElementById('hero-eyebrow');
  if (!el) return;

  const text   = '// START-UP TECNOLÓGICA · COLOMBIA';
  const delay  = 1800; // empieza después del loading
  const speed  = 55;

  el.textContent = '';
  let i = 0;

  setTimeout(() => {
    const interval = setInterval(() => {
      el.textContent += text[i];
      i++;
      if (i >= text.length) clearInterval(interval);
    }, speed);
  }, delay);
}

/* ============================================================
   COUNTER-UP — stats con scroll trigger
   ============================================================ */
function initCounters() {
  const counters = document.querySelectorAll('[data-target]');
  if (!counters.length) return;

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting || entry.target.dataset.counted) return;
      entry.target.dataset.counted = 'true';
      animateCounter(entry.target);
    });
  }, { threshold: 0.5 });

  counters.forEach(el => observer.observe(el));
}

function animateCounter(el) {
  const target = parseInt(el.dataset.target, 10);
  const suffix = el.dataset.suffix || '';
  const duration = 1800;
  const start = performance.now();

  function step(now) {
    const progress = Math.min((now - start) / duration, 1);
    const eased    = 1 - Math.pow(1 - progress, 3); // ease-out cubic
    const current  = Math.round(eased * target);
    el.textContent = current + suffix;
    if (progress < 1) requestAnimationFrame(step);
  }
  requestAnimationFrame(step);
}

/* ============================================================
   GSAP ANIMATIONS
   ============================================================ */
function initGSAP() {
  if (reducedMotion || typeof gsap === 'undefined') return;

  gsap.registerPlugin(ScrollTrigger);

  /* ─────────────────────────────────────────────────────────────
     REGLA: el CSS .reveal ya fija opacity:0 / translateY(50px).
     Usamos gsap.to() (no from/fromTo) para animar AL estado final.
     gsap.from() leería el estado CSS (opacity:0) como destino →
     animaría invisible→invisible. Ese era el bug.
  ──────────────────────────────────────────────────────────── */

  /* Posiciones X iniciales para reveals con dirección horizontal */
  gsap.set('.frase-impacto-text', { x: -70 });
  gsap.set('.dashboard-card',     { x:  70 });

  /* ── Hero timeline ─────────────────────────────────────────── */
  const heroTL = gsap.timeline({ delay: 1.6 });

  heroTL.from('.hero-eyebrow', { opacity: 0, y: -10, duration: 0.5, ease: 'power2.out' });

  heroTL.to('.hero-headline .line-inner', {
    y: 0, duration: 1.0, ease: 'power4.out', stagger: 0.2
  }, '-=0.2');

  heroTL.to('.hero-subtitle', { opacity: 1, y: 0, duration: 0.8, ease: 'power3.out' }, '-=0.5');
  heroTL.to('.hero-stats',    { opacity: 1, y: 0, duration: 0.7, ease: 'power3.out' }, '-=0.4');
  heroTL.to('.hero-cta',      { opacity: 1, y: 0, duration: 0.7, ease: 'power3.out' }, '-=0.4');

  /* columna derecha entra desde la derecha */
  heroTL.fromTo('.hero-right',
    { opacity: 0, x: 80, scale: 0.92 },
    { opacity: 1, x: 0,  scale: 1,    duration: 1.1, ease: 'power3.out' },
    0.4
  );

  /* floating cards con stagger */
  heroTL.fromTo('.hv-float-card',
    { opacity: 0, scale: 0.7, y: 20 },
    { opacity: 1, scale: 1,   y: 0,  stagger: 0.15, duration: 0.7, ease: 'back.out(1.5)' },
    1.2
  );

  /* ── Hero parallax ─────────────────────────────────────────── */
  gsap.to('.hero-left',  { y: -60, ease: 'none', scrollTrigger: { trigger: '#inicio', start: 'top top', end: 'bottom top', scrub: 1.2 } });
  gsap.to('.hero-right', { y: -30, ease: 'none', scrollTrigger: { trigger: '#inicio', start: 'top top', end: 'bottom top', scrub: 1.8 } });

  /* ── Generic .reveal — todos salvo los que tienen animación propia ── */
  const ownAnimation = new Set([
    '.servicio-card', '.proyecto-card',
    '.frase-impacto-text', '.dashboard-card'
  ]);

  document.querySelectorAll('.reveal').forEach(el => {
    if ([...ownAnimation].some(sel => el.matches(sel))) return;

    gsap.to(el, {
      opacity: 1, y: 0,
      duration: 0.9, ease: 'power3.out',
      scrollTrigger: { trigger: el, start: 'top 85%', once: true }
    });
  });

  /* ── Frase impacto: direcciones x ─────────────────────────── */
  ScrollTrigger.create({
    trigger: '#frase-impacto', start: 'top 76%', once: true,
    onEnter: () => {
      gsap.to('.frase-impacto-text', { opacity: 1, x: 0, y: 0, duration: 0.9, ease: 'power3.out' });
      gsap.to('.dashboard-card',     { opacity: 1, x: 0, y: 0, duration: 0.9, ease: 'power3.out', delay: 0.15 });
      /* barras del dashboard de frase-impacto */
      document.querySelectorAll('.bar').forEach((bar, i) => setTimeout(() => bar.classList.add('animated'), i * 80));
      setTimeout(() => {
        document.getElementById('trend-path')?.classList.add('animated');
        document.getElementById('trend-area')?.classList.add('animated');
      }, 300);
    }
  });

  /* ── Servicios: stagger limpio ─────────────────────────────── */
  gsap.to('.servicio-card', {
    opacity: 1, y: 0,
    duration: 0.8, ease: 'power3.out', stagger: 0.1,
    scrollTrigger: { trigger: '#servicios', start: 'top 80%', once: true }
  });

  /* ── Proceso: línea scrub + círculos ───────────────────────── */
  const procesosLine = document.getElementById('proceso-line');
  if (procesosLine) {
    gsap.to(procesosLine, {
      width: '100%', ease: 'none',
      scrollTrigger: { trigger: '#proceso', start: 'top 70%', end: 'bottom 80%', scrub: 0.5 }
    });
  }

  document.querySelectorAll('.proceso-circle').forEach((circle, i) => {
    ScrollTrigger.create({
      trigger: '.proceso-steps',
      start: `top ${72 - i * 8}%`,
      once: true,
      onEnter: () => circle.classList.add('active')
    });
  });

  /* ── Por qué Global Code: beneficios ──────────────────────── */
  document.querySelectorAll('.beneficio-item').forEach((item, i) => {
    ScrollTrigger.create({
      trigger: item, start: 'top 87%', once: true,
      onEnter: () => {
        setTimeout(() => {
          item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
          item.classList.add('animated');
        }, i * 120);
      }
    });
  });

  /* ── Portafolio: stagger limpio ────────────────────────────── */
  gsap.to('.proyecto-card', {
    opacity: 1, y: 0,
    duration: 0.8, ease: 'power3.out', stagger: 0.15,
    scrollTrigger: { trigger: '#portafolio', start: 'top 82%', once: true }
  });

  /* ── Contacto ─────────────────────────────────────────────── */
  gsap.to('.contacto-grid > *', {
    opacity: 1, y: 0,
    duration: 0.9, ease: 'power3.out', stagger: 0.2,
    scrollTrigger: { trigger: '#contacto', start: 'top 82%', once: true }
  });
}

/* ============================================================
   WHATSAPP FLOAT
   ============================================================ */
function initWhatsAppFloat() {
  const btn = document.getElementById('whatsapp-float');
  if (!btn) return;

  setTimeout(() => btn.classList.add('visible'), 2000);
}

/* ============================================================
   FORMULARIO — validación en tiempo real
   ============================================================ */
function initContactForm() {
  const form = document.getElementById('contact-form');
  if (!form) return;

  const fields = {
    nombre:  { required: true, minLength: 2 },
    email:   { required: true, type: 'email' },
    servicio:{ required: true },
    mensaje: { required: true, minLength: 10 }
  };

  function validateField(id) {
    const input   = document.getElementById(id);
    const error   = document.getElementById(`${id}-error`);
    const rules   = fields[id];
    if (!input || !rules) return true;

    let valid   = true;
    let message = '';

    const val = input.value.trim();

    if (rules.required && !val) {
      valid = false;
      message = error?.textContent || 'Campo requerido.';
    } else if (rules.type === 'email' && val) {
      const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      if (!emailRe.test(val)) {
        valid = false;
        message = 'Ingresa un correo válido.';
      }
    } else if (rules.minLength && val.length < rules.minLength) {
      valid = false;
      message = `Mínimo ${rules.minLength} caracteres.`;
    }

    input.classList.toggle('valid',   valid && val.length > 0);
    input.classList.toggle('invalid', !valid);

    if (error) {
      if (!valid) {
        error.textContent = message;
        error.classList.add('show');
      } else {
        error.classList.remove('show');
      }
    }

    return valid;
  }

  /* live validation */
  Object.keys(fields).forEach(id => {
    const input = document.getElementById(id);
    if (!input) return;
    input.addEventListener('blur', () => validateField(id));
    input.addEventListener('input', () => {
      if (input.classList.contains('invalid')) validateField(id);
    });
  });

  /* submit */
  form.addEventListener('submit', (e) => {
    e.preventDefault();

    let allValid = true;
    Object.keys(fields).forEach(id => {
      if (!validateField(id)) allValid = false;
    });

    if (!allValid) return;

    const submitBtn  = document.getElementById('submit-btn');
    const submitText = document.getElementById('submit-text');
    const submitLoad = document.getElementById('submit-loading');

    submitBtn.disabled = true;
    submitText.style.display = 'none';
    submitLoad.style.display = 'inline';

    /* simulación de envío — reemplazar con fetch real */
    setTimeout(() => {
      submitLoad.style.display = 'none';
      submitText.style.display = 'inline';
      submitText.textContent   = '¡Mensaje enviado! ✓';
      submitBtn.style.background = '#2ecc71';
      form.reset();
      form.querySelectorAll('.form-input').forEach(i => {
        i.classList.remove('valid', 'invalid');
      });
      setTimeout(() => {
        submitBtn.disabled       = false;
        submitText.textContent   = 'Enviar mensaje →';
        submitBtn.style.background = '';
      }, 4000);
    }, 1500);
  });
}

/* ============================================================
   INICIALIZACIÓN
   ============================================================ */
document.addEventListener('DOMContentLoaded', () => {
  initLoadingScreen();
  initCursor();
  initNavbar();
  initTypingEffect();
  initCounters();
  initWhatsAppFloat();
  initContactForm();
  initScrollProgress();
  initHeroSpotlight();
  initCardTilt();

  /* GSAP y Particles necesitan sus CDNs cargados */
  window.addEventListener('load', () => {
    initParticles();
    initGSAP();
    updateScrollSpy();
    initMagneticButtons();
  });
});
