/* ============================================================
   PISCIHELP — piscihelp.js
   Lógica específica de la página de producto:
   - Carga condicional del video del hero (ahorro de datos)
   - Lightbox de la galería de video (sin librerías)
   ============================================================ */

const phReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const phIsMobile = () => window.innerWidth <= 768;

/* ============================================================
   HERO VIDEO — solo se carga en desktop / conexión normal.
   En mobile o con "ahorro de datos" activado, se queda con el
   poster (imagen) y no se descarga ni un byte del video.
   ============================================================ */
function initPhHeroVideo() {
  const video = document.getElementById('ph-hero-video');
  if (!video) return;

  const saveData = navigator.connection && navigator.connection.saveData;
  const slowConnection = navigator.connection &&
    ['slow-2g', '2g'].includes(navigator.connection.effectiveType);

  if (phIsMobile() || phReducedMotion || saveData || slowConnection) {
    /* Se queda solo con el poster: no se inyecta <source>. */
    return;
  }

  const src = video.dataset.src;
  if (!src) return;

  const source = document.createElement('source');
  source.src = src;
  source.type = 'video/mp4';
  video.appendChild(source);
  video.load();
  video.play().catch(() => { /* autoplay bloqueado: se queda en el poster */ });
}

/* ============================================================
   LIGHTBOX — galería de video
   ============================================================ */
function initPhGalleryLightbox() {
  const items    = document.querySelectorAll('.ph-gallery-item');
  const lightbox = document.getElementById('ph-lightbox');
  const video    = document.getElementById('ph-lightbox-video');
  const caption  = document.getElementById('ph-lightbox-caption');
  const closeBtn = document.getElementById('ph-lightbox-close');

  if (!items.length || !lightbox || !video) return;

  function openLightbox(src, text) {
    video.querySelectorAll('source').forEach(s => s.remove());
    const source = document.createElement('source');
    source.src = src;
    source.type = 'video/mp4';
    video.appendChild(source);
    video.load();
    caption.textContent = text || '';

    if (typeof lightbox.showModal === 'function') {
      lightbox.showModal();
    } else {
      lightbox.setAttribute('open', '');
    }

    /* showModal() enfoca automáticamente un elemento del diálogo;
       si ese foco por defecto cae fuera de la caja visible, el
       navegador hace scroll de la página para mostrarlo (el salto
       raro hacia arriba). Tomamos el control del foco nosotros
       mismos, sin permitir ese scroll. */
    video.focus({ preventScroll: true });

    video.play().catch(() => {});
  }

  function requestClose() {
    if (typeof lightbox.close === 'function') {
      lightbox.close();
    } else {
      lightbox.removeAttribute('open');
      stopVideo();
    }
  }

  /* Detiene y limpia el <video> — se ejecuta una sola vez, sin
     importar si el cierre vino del botón, el backdrop o Esc
     (el <dialog> nativo dispara "close" en los tres casos). */
  function stopVideo() {
    video.pause();
    video.currentTime = 0;
    video.querySelectorAll('source').forEach(s => s.remove());
    video.removeAttribute('src');
    video.load();
  }

  items.forEach(btn => {
    btn.addEventListener('click', () => {
      openLightbox(btn.dataset.video, btn.dataset.caption);
    });
  });

  closeBtn?.addEventListener('click', requestClose);

  /* Clic en el backdrop del <dialog> cierra el video */
  lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) requestClose();
  });

  /* Esc también dispara "close" de forma nativa en <dialog> */
  lightbox.addEventListener('close', stopVideo);
}

/* ============================================================
   INICIALIZACIÓN
   ============================================================ */
document.addEventListener('DOMContentLoaded', () => {
  initPhGalleryLightbox();
  window.addEventListener('load', initPhHeroVideo);
});
