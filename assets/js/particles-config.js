/* ============================================================
   GLOBAL CODE — particles-config.js
   Configuraciones de Particles.js para hero y contacto
   ============================================================ */

window.GC_PARTICLES = {

  /* Configuración completa para el hero */
  hero: {
    particles: {
      number: {
        value: 60,
        density: { enable: true, value_area: 900 }
      },
      color: { value: '#018ABE' },
      shape: { type: 'circle' },
      opacity: {
        value: 0.4,
        random: true,
        anim: { enable: true, speed: 0.8, opacity_min: 0.1, sync: false }
      },
      size: {
        value: 2.5,
        random: true,
        anim: { enable: false }
      },
      line_linked: {
        enable: true,
        distance: 150,
        color: '#018ABE',
        opacity: 0.15,
        width: 1
      },
      move: {
        enable: true,
        speed: 1.2,
        direction: 'none',
        random: true,
        straight: false,
        out_mode: 'out',
        bounce: false,
        attract: { enable: false }
      }
    },
    interactivity: {
      detect_on: 'canvas',
      events: {
        onhover: { enable: true, mode: 'repulse' },
        onclick: { enable: false },
        resize: true
      },
      modes: {
        repulse: { distance: 100, duration: 0.4 }
      }
    },
    retina_detect: true
  },

  /* Configuración reducida para la sección contacto (30% density) */
  contacto: {
    particles: {
      number: {
        value: 18,
        density: { enable: true, value_area: 900 }
      },
      color: { value: '#018ABE' },
      shape: { type: 'circle' },
      opacity: {
        value: 0.25,
        random: true,
        anim: { enable: true, speed: 0.5, opacity_min: 0.05, sync: false }
      },
      size: {
        value: 2,
        random: true,
        anim: { enable: false }
      },
      line_linked: {
        enable: true,
        distance: 160,
        color: '#018ABE',
        opacity: 0.08,
        width: 1
      },
      move: {
        enable: true,
        speed: 0.7,
        direction: 'none',
        random: true,
        straight: false,
        out_mode: 'out',
        bounce: false
      }
    },
    interactivity: {
      detect_on: 'canvas',
      events: {
        onhover: { enable: false },
        onclick: { enable: false },
        resize: true
      }
    },
    retina_detect: true
  }

};
