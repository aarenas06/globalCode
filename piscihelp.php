<?php
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$baseUrl = $scheme . '://' . $host;
$pageUrl = $baseUrl . strtok($_SERVER['REQUEST_URI'] ?? '/piscihelp.php', '?');
$pageTitle = 'PisciHelp | Gestión inteligente para granjas piscícolas y acuícolas · Global Code';
$pageDescription = 'PisciHelp es la plataforma de Global Code para empresas piscícolas y acuícolas: control de activos, geolocalización de estanques y jaulones, mantenimientos y reportes, todo desde la web.';
$ogImage = $baseUrl . '/assets/img/piscihelp/web/geoloc-estanques.jpg';

/* ── Número de WhatsApp — cambiar aquí y se actualiza en toda la página ── */
$WHATSAPP_NUMERO = '573054648486';
$WHATSAPP_MSG = rawurlencode('Hola, quiero información sobre PisciHelp.');
$WHATSAPP_URL = 'https://wa.me/' . $WHATSAPP_NUMERO . '?text=' . $WHATSAPP_MSG;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta name="keywords" content="PisciHelp, piscicultura, acuicultura, gestión de granjas acuícolas, mantenimiento de activos, geolocalización de estanques, Global Code, Colombia" />
  <meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1" />
  <link rel="canonical" href="<?php echo htmlspecialchars($pageUrl, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta name="theme-color" content="#000F2A" />
  <meta name="author" content="Global Code" />
  <meta property="og:locale" content="es_CO" />
  <meta property="og:type" content="website" />
  <meta property="og:site_name" content="Global Code" />
  <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta property="og:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta property="og:url" content="<?php echo htmlspecialchars($pageUrl, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta property="og:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta property="og:image:width" content="1600" />
  <meta property="og:image:height" content="893" />
  <meta property="og:image:alt" content="Panel de PisciHelp con geolocalización de estanques y jaulones" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>" />
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>

  <link rel="icon" type="image/x-icon" href="./assets/img/icon_preview.png">
  <link rel="apple-touch-icon" href="./assets/img/logo.png" />
  <link rel="preload" as="image" href="./assets/img/piscihelp/web/geoloc-estanques.jpg" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet" />

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "SoftwareApplication",
    "name": "PisciHelp",
    "applicationCategory": "BusinessApplication",
    "operatingSystem": "Web",
    "description": "<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>",
    "url": "<?php echo htmlspecialchars($pageUrl, ENT_QUOTES, 'UTF-8'); ?>",
    "image": "<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>",
    "publisher": {
      "@type": "Organization",
      "name": "Global Code",
      "url": "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>"
    }
  }
  </script>

  <!-- CDN: GSAP + ScrollTrigger -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>

  <!-- Estilos -->
  <link rel="stylesheet" href="./assets/css/style.css" />
  <link rel="stylesheet" href="./assets/css/piscihelp.css" />
</head>

<body class="piscihelp-page">

  <!-- ══════════════════════════════════════════════════════════
       LOADING SCREEN
  ══════════════════════════════════════════════════════════ -->
  <div id="scroll-progress" aria-hidden="true"></div>

  <div id="loading-screen" aria-hidden="true">
    <img src="./assets/img/logo.png" alt="Global Code" class="loading-logo" />
    <div id="loading-progress-bar">
      <div id="loading-progress-fill"></div>
    </div>
  </div>

  <!-- ══════════════════════════════════════════════════════════
       CURSOR PERSONALIZADO
  ══════════════════════════════════════════════════════════ -->
  <div id="cursor-dot" aria-hidden="true"></div>
  <div id="cursor-ring" aria-hidden="true"></div>

  <!-- ══════════════════════════════════════════════════════════
       WHATSAPP FLOTANTE
  ══════════════════════════════════════════════════════════ -->
  <a id="whatsapp-float"
    href="<?php echo htmlspecialchars($WHATSAPP_URL, ENT_QUOTES, 'UTF-8'); ?>"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Contactar por WhatsApp sobre PisciHelp">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
    </svg>
  </a>

  <!-- ══════════════════════════════════════════════════════════
       NAVBAR (idéntico al de Global Code, apuntando a index.php)
  ══════════════════════════════════════════════════════════ -->
  <nav id="navbar" role="navigation" aria-label="Navegación principal">
    <a href="./index.php#inicio" aria-label="Inicio Global Code">
      <img src="./assets/img/logo.png" alt="Global Code" class="nav-logo" />
    </a>

    <ul class="nav-links" role="list">
      <li><a href="./index.php#inicio" class="nav-link">Inicio</a></li>
      <li><a href="./index.php#productos" class="nav-link">Productos</a></li>
      <li><a href="./piscihelp.php" class="nav-link active">PisciHelp</a></li>
      <li><a href="./index.php#servicios" class="nav-link">Servicios</a></li>
      <li><a href="./index.php#contacto" class="nav-link">Contacto</a></li>
    </ul>

    <button class="nav-hamburger" aria-label="Abrir menú" aria-expanded="false" id="hamburger-btn">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </nav>

  <!-- Mobile menu -->
  <div id="mobile-menu" role="dialog" aria-modal="true" aria-label="Menú de navegación" aria-hidden="true">
    <nav>
      <a href="./index.php#inicio" class="mobile-nav-link">Inicio</a>
      <a href="./index.php#productos" class="mobile-nav-link">Productos</a>
      <a href="./piscihelp.php" class="mobile-nav-link">PisciHelp</a>
      <a href="./index.php#servicios" class="mobile-nav-link">Servicios</a>
      <a href="./index.php#contacto" class="mobile-nav-link">Contacto</a>
    </nav>
  </div>

  <main>

    <!-- ══════════════════════════════════════════════════════
         01 — HERO
    ══════════════════════════════════════════════════════ -->
    <section id="ph-hero" aria-label="PisciHelp">
      <video
        id="ph-hero-video"
        class="ph-hero-video"
        poster="./assets/img/piscihelp/web/geoloc-estanques.jpg"
        data-src="./assets/img/piscihelp/web/hero-granja.mp4"
        muted loop playsinline preload="none"
        aria-hidden="true">
      </video>
      <div class="ph-hero-overlay" aria-hidden="true"></div>

      <div class="ph-hero-content container">
        <img src="./assets/img/piscihelp/web/logo-piscihelp.png" alt="" class="ph-hero-logo reveal" width="76" height="77" />
        <span class="eyebrow reveal">// Un producto de Global Code</span>
        <h1 class="ph-hero-title reveal">
          Todo tu negocio acuícola,<br class="only-desktop" /> bajo control.
        </h1>
        <p class="ph-hero-subtitle reveal">
          PisciHelp le dice a tu empresa qué tiene, dónde está, en qué estado se
          encuentra y cuándo necesita mantenimiento. Sin cuadernos. Sin hojas de
          cálculo sueltas.
        </p>
        <div class="ph-hero-cta reveal">
          <a href="<?php echo htmlspecialchars($WHATSAPP_URL, ENT_QUOTES, 'UTF-8'); ?>"
            target="_blank" rel="noopener noreferrer" class="btn btn-primary">
            Solicitar información &nbsp;→
          </a>
          <a href="#ph-que-es" class="btn btn-secondary">Ver qué hace</a>
        </div>
      </div>

      <div class="scroll-indicator" aria-hidden="true">
        <div class="scroll-line"></div>
        <span class="scroll-text">scroll</span>
      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         02 — EL PROBLEMA
    ══════════════════════════════════════════════════════ -->
    <section id="ph-problema" aria-label="El problema">
      <div class="section-header centered reveal">
        <span class="eyebrow">// La realidad hoy</span>
        <h2 class="section-title">Así operan la mayoría de las granjas</h2>
        <p class="section-subtitle">
          No es falta de esfuerzo. Es falta de una herramienta pensada para el campo.
        </p>
      </div>

      <div class="ph-problema-grid">
        <article class="ph-problema-card reveal">
          <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M10 6h22l6 6v30a2 2 0 01-2 2H10a2 2 0 01-2-2V8a2 2 0 012-2z" />
            <path d="M18 18h12M18 26h12M18 34h7" />
          </svg>
          <h3>Cuadernos y memoria</h3>
          <p>Mantenimientos anotados a mano o, peor, recordados de memoria. Si la
            persona se va, el conocimiento se va con ella.</p>
        </article>

        <article class="ph-problema-card reveal">
          <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="6" y="8" width="36" height="32" rx="2" />
            <path d="M6 18h36M16 8v32M26 18v22M36 18v22" />
          </svg>
          <h3>Hojas de cálculo dispersas</h3>
          <p>Un Excel por finca, por sucursal, por persona. Nadie tiene la foto
            completa del negocio.</p>
        </article>

        <article class="ph-problema-card reveal">
          <svg viewBox="0 0 48 48" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="16" cy="16" r="8" />
            <circle cx="32" cy="32" r="8" />
            <path d="M22 16h4M16 22v4M32 16v10M22 32h4" stroke-dasharray="2 4" />
          </svg>
          <h3>Herramientas que no se hablan</h3>
          <p>Software genérico que no entiende de estanques, jaulones ni ciclos de
            mantenimiento. Todo se termina reconciliando a mano.</p>
        </article>
      </div>

      <p class="ph-problema-cierre reveal">
        Y cuando algo falla en campo, nadie sabe desde cuándo.
      </p>
    </section>

    <!-- ══════════════════════════════════════════════════════
         03 — ¿QUÉ ES PISCIHELP?
    ══════════════════════════════════════════════════════ -->
    <section id="ph-que-es" aria-label="Qué es PisciHelp">
      <div class="ph-que-es-grid">

        <div class="ph-que-es-text reveal">
          <span class="eyebrow">// La plataforma</span>
          <h2 class="section-title">¿Qué es PisciHelp?</h2>
          <p class="section-subtitle">
            Una plataforma web hecha para empresas piscícolas y acuícolas. Reúne
            todo lo que hoy vive repartido en cuadernos, chats y hojas de cálculo,
            y responde cuatro preguntas en tiempo real:
          </p>

          <div class="ph-chips">
            <span class="ph-chip">Qué tienes</span>
            <span class="ph-chip">Dónde está</span>
            <span class="ph-chip">Cómo está</span>
            <span class="ph-chip">Cuándo mantenerlo</span>
          </div>
        </div>

        <div class="ph-que-es-visual reveal">
          <div class="ph-browser-frame">
            <div class="ph-browser-bar">
              <span class="hv-dot red"></span>
              <span class="hv-dot yellow"></span>
              <span class="hv-dot green"></span>
              <span class="ph-browser-url">app.piscihelp.co</span>
            </div>
            <img src="./assets/img/piscihelp/web/fanding.jpeg"
              alt="Pantalla de inicio de sesión de la plataforma PisciHelp"
              loading="lazy" decoding="async" width="1100" height="825" />
          </div>
        </div>

      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         04 — DISPONIBLE HOY
    ══════════════════════════════════════════════════════ -->
    <section id="ph-disponible" aria-label="Funcionalidades disponibles">
      <div class="section-header centered reveal">
        <span class="eyebrow">// Disponible hoy</span>
        <h2 class="section-title">Lo que ya puedes usar</h2>
        <p class="section-subtitle">
          Funcionalidades reales, en producción, listas para tu operación.
        </p>
      </div>

      <div class="ph-feature-row reveal">
        <div class="ph-feature-media">
          <img src="./assets/img/piscihelp/web/geoloc-estanques.jpg"
            alt="Mapa aéreo con geolocalización de estanques y jaulones y su temperatura en tiempo real"
            loading="lazy" decoding="async" width="1600" height="893" />
        </div>
        <div class="ph-feature-text">
          <span class="ph-feature-num">01</span>
          <h3>Registro y control de activos fijos</h3>
          <p>Equipos e infraestructura de la granja, cada uno con su ficha:
            estado, ubicación e historial. Sabes qué tienes sin tener que preguntar.</p>
        </div>
      </div>

      <div class="ph-feature-row reverse reveal">
        <div class="ph-feature-media">
          <img src="./assets/img/piscihelp/web/ruta-ia-tablet.jpg"
            alt="Tablet montada en vehículo mostrando el mapa de ubicaciones de la granja"
            loading="lazy" decoding="async" width="1600" height="893" />
        </div>
        <div class="ph-feature-text">
          <span class="ph-feature-num">02</span>
          <h3>Geolocalización de ubicaciones</h3>
          <p>Lagos, jaulones, fincas y laboratorios ubicados en un mapa real.
            Encuentra cualquier punto de tu operación en segundos.</p>
        </div>
      </div>

      <div class="ph-feature-row reveal">
        <div class="ph-feature-media">
          <img src="./assets/img/piscihelp/web/orden-mantenimiento.jpg"
            alt="Técnico aceptando una orden de mantenimiento preventivo desde una tablet"
            loading="lazy" decoding="async" width="1600" height="893" />
        </div>
        <div class="ph-feature-text">
          <span class="ph-feature-num">03</span>
          <h3>Mantenimientos con ciclo completo</h3>
          <p>Creación, planeación, ejecución y auditoría. Cada mantenimiento
            queda registrado de principio a fin, con responsable y evidencia.</p>
        </div>
      </div>

      <div class="ph-feature-row reverse reveal">
        <div class="ph-feature-media">
          <img src="./assets/img/piscihelp/web/reporte-ruta.jpg"
            alt="Técnico revisando en tablet un reporte de ruta optimizada junto a camioneta de la empresa"
            loading="lazy" decoding="async" width="1600" height="893" />
        </div>
        <div class="ph-feature-text">
          <span class="ph-feature-num">04</span>
          <h3>Reportes por sucursal y periodo</h3>
          <p>Exportables a Excel. La información que necesitas para tomar
            decisiones, lista cuando la necesitas.</p>
        </div>
      </div>

      <div class="ph-feature-row reveal">
        <div class="ph-feature-media">
          <img src="./assets/img/piscihelp/web/dron-mapeo.jpg"
            alt="Operario con chaleco de Global Code lanzando un dron sobre la granja al amanecer"
            loading="lazy" decoding="async" width="1600" height="893" />
        </div>
        <div class="ph-feature-text">
          <span class="ph-feature-num">05</span>
          <h3>Acceso web desde cualquier lugar</h3>
          <p>Campo y administración conectados en tiempo real, desde el
            celular, la tablet o el computador.</p>
        </div>
      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         05 — BENEFICIOS
    ══════════════════════════════════════════════════════ -->
    <section id="ph-beneficios" aria-label="Beneficios">
      <div class="section-header centered reveal">
        <span class="eyebrow">// Por qué importa</span>
        <h2 class="section-title">Lo que cambia en tu operación</h2>
      </div>

      <div class="ph-beneficios-grid">
        <article class="ph-beneficio-card reveal">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="20" cy="20" r="15" /><path d="M20 11v9l6 4" />
          </svg>
          <h3>Ahorro de tiempo</h3>
          <p>Menos horas buscando información, más horas operando la granja.</p>
        </article>
        <article class="ph-beneficio-card reveal">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M20 5l13 7v11c0 8-5.5 12.7-13 15C12.5 35.7 7 31 7 23V12z" />
            <path d="M14 20l4 4 8-8" />
          </svg>
          <h3>Menos pérdidas</h3>
          <p>Mantenimientos a tiempo evitan fallas que cuestan mucho más que
            prevenirlas.</p>
        </article>
        <article class="ph-beneficio-card reveal">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M6 34V16M20 34V6M34 34V22" />
          </svg>
          <h3>Trazabilidad total</h3>
          <p>Cada activo, cada mantenimiento, cada cambio queda registrado y es
            consultable.</p>
        </article>
        <article class="ph-beneficio-card reveal">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M6 30l9-10 7 6 12-14" /><path d="M27 12h7v7" />
          </svg>
          <h3>Decisiones con datos reales</h3>
          <p>Reportes claros para decidir con información, no con intuición.</p>
        </article>
        <article class="ph-beneficio-card reveal">
          <svg viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="6" y="22" width="8" height="12" /><rect x="16" y="14" width="8" height="20" />
            <rect x="26" y="6" width="8" height="28" />
          </svg>
          <h3>Escalable</h3>
          <p>De una sola finca a múltiples sucursales, sin cambiar de sistema.</p>
        </article>
      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         06 — HACIA DÓNDE VAMOS (roadmap)
    ══════════════════════════════════════════════════════ -->
    <section id="ph-roadmap" aria-label="Hacia dónde vamos">
      <div class="section-header centered reveal">
        <span class="eyebrow">// Hacia dónde vamos</span>
        <h2 class="section-title">Lo que sigue en nuestra hoja de ruta</h2>
        <p class="section-subtitle">
          Seguimos construyendo. Esto todavía <strong>no está disponible</strong>;
          es hacia donde vamos.
        </p>
      </div>

      <ul class="ph-roadmap-list">
        <li class="ph-roadmap-item reveal">
          <span class="ph-roadmap-badge">Próximamente</span>
          <h3>Módulo de órdenes de compra</h3>
          <p>Ligado a activos, ubicaciones y mantenimientos, para cerrar el
            ciclo completo de la operación.</p>
        </li>
        <li class="ph-roadmap-item reveal">
          <span class="ph-roadmap-badge">En desarrollo</span>
          <h3>Asistente de IA para usuarios</h3>
          <p>Un asistente dentro de la plataforma para resolver dudas y agilizar
            tareas del día a día.</p>
        </li>
        <li class="ph-roadmap-item reveal">
          <span class="ph-roadmap-badge">En desarrollo</span>
          <h3>Monitoreo aéreo con drones y mapeo</h3>
          <p>Sobrevuelos programados para inspeccionar estanques y jaulones
            difíciles de recorrer a pie.</p>
        </li>
        <li class="ph-roadmap-item reveal">
          <span class="ph-roadmap-badge">En desarrollo</span>
          <h3>Rutas óptimas de mantenimiento con IA</h3>
          <p>Planificación automática de recorridos para reducir tiempo y
            distancia entre visitas.</p>
        </li>
        <li class="ph-roadmap-item reveal">
          <span class="ph-roadmap-badge">Próximamente</span>
          <h3>Alertas predictivas y órdenes preventivas automáticas</h3>
          <p>El sistema anticipa la falla y genera la orden de trabajo antes de
            que ocurra.</p>
        </li>
        <li class="ph-roadmap-item reveal">
          <span class="ph-roadmap-badge">Próximamente</span>
          <h3>Telemetría y calidad del agua con sensores IoT</h3>
          <p>Monitoreo continuo de variables del agua conectado directamente a
            la plataforma.</p>
        </li>

      
      </ul>
    </section>

    <!-- ══════════════════════════════════════════════════════
         07 — GALERÍA
    ══════════════════════════════════════════════════════ -->
    <section id="ph-galeria" aria-label="Galería PisciHelp">
      <div class="section-header centered reveal">
        <span class="eyebrow">// En video</span>
        <h2 class="section-title">PisciHelp en el campo</h2>
        <p class="section-subtitle">Haz clic en cualquier video para reproducirlo.</p>
      </div>

      <div class="ph-gallery-grid">
        <button type="button" class="ph-gallery-item reveal"
          data-video="./assets/img/piscihelp/web/clip-dron-estanques.mp4"
          data-caption="Sobrevuelo de dron sobre los estanques">
          <img src="./assets/img/piscihelp/web/geoloc-estanques.jpg" alt="" loading="lazy" decoding="async" />
          <span class="ph-gallery-play" aria-hidden="true"></span>
          <span class="ph-gallery-label">Sobrevuelo de estanques</span>
        </button>

        <button type="button" class="ph-gallery-item reveal"
          data-video="./assets/img/piscihelp/web/clip-dron-despegue.mp4"
          data-caption="Despegue del dron de mapeo">
          <img src="./assets/img/piscihelp/web/dron-mapeo.jpg" alt="" loading="lazy" decoding="async" />
          <span class="ph-gallery-play" aria-hidden="true"></span>
          <span class="ph-gallery-label">Despegue del dron</span>
        </button>

        <button type="button" class="ph-gallery-item reveal"
          data-video="./assets/img/piscihelp/web/clip-tecnico-tablet.mp4"
          data-caption="Técnico gestionando una orden de trabajo">
          <img src="./assets/img/piscihelp/web/orden-mantenimiento.jpg" alt="" loading="lazy" decoding="async" />
          <span class="ph-gallery-play" aria-hidden="true"></span>
          <span class="ph-gallery-label">Orden de trabajo en campo</span>
        </button>

        <button type="button" class="ph-gallery-item reveal"
          data-video="./assets/img/piscihelp/web/clip-camioneta-via.mp4"
          data-caption="Recorrido por la vía de acceso a la granja">
          <img src="./assets/img/piscihelp/web/reporte-ruta.jpg" alt="" loading="lazy" decoding="async" />
          <span class="ph-gallery-play" aria-hidden="true"></span>
          <span class="ph-gallery-label">Recorrido de campo</span>
        </button>

        <button type="button" class="ph-gallery-item reveal"
          data-video="./assets/img/piscihelp/web/clip-camioneta-ruta.mp4"
          data-caption="Ruta optimizada en el vehículo de servicio">
          <img src="./assets/img/piscihelp/web/ruta-ia-tablet.jpg" alt="" loading="lazy" decoding="async" />
          <span class="ph-gallery-play" aria-hidden="true"></span>
          <span class="ph-gallery-label">Ruta optimizada</span>
        </button>

      <dialog id="ph-lightbox" aria-label="Reproductor de video">
        <button type="button" id="ph-lightbox-close" aria-label="Cerrar video">&times;</button>
        <video id="ph-lightbox-video" controls playsinline>
          Tu navegador no soporta la reproducción de video.
        </video>
        <p id="ph-lightbox-caption"></p>
      </dialog>
    </section>

    <!-- ══════════════════════════════════════════════════════
         08 — LLAMADO FINAL
    ══════════════════════════════════════════════════════ -->
    <section id="ph-cta" aria-label="Contacto PisciHelp">
      <div class="ph-cta-box reveal">
        <span class="eyebrow">// Hablemos</span>
        <h2 class="section-title">¿Quieres saber cómo funciona en tu granja?</h2>
        <p class="section-subtitle">
          Escríbenos y te mostramos PisciHelp funcionando con un caso parecido
          al tuyo. El precio depende del tamaño de tu operación — te lo contamos
          por WhatsApp, sin compromiso.
        </p>
        <a href="<?php echo htmlspecialchars($WHATSAPP_URL, ENT_QUOTES, 'UTF-8'); ?>"
          target="_blank" rel="noopener noreferrer" class="btn btn-primary">
          Escríbenos por WhatsApp &nbsp;→
        </a>
      </div>
    </section>

  </main>

  <!-- ══════════════════════════════════════════════════════════
       FOOTER (idéntico al de Global Code)
  ══════════════════════════════════════════════════════════ -->
  <footer id="footer">
    <div class="footer-grid">

      <div>
        <img src="./assets/img/logo.png" alt="Global Code" class="footer-logo" />
        <p class="footer-tagline">
          Transformamos negocios mediante tecnología,<br>
          automatización e inteligencia artificial.
        </p>
      </div>

      <div>
        <p class="footer-col-title">Navegación</p>
        <ul class="footer-links" role="list">
          <li><a href="./index.php#inicio" class="footer-link">Inicio</a></li>
          <li><a href="./index.php#productos" class="footer-link">Productos</a></li>
          <li><a href="./piscihelp.php" class="footer-link">PisciHelp</a></li>
          <li><a href="./index.php#servicios" class="footer-link">Servicios</a></li>
          <li><a href="./index.php#contacto" class="footer-link">Contacto</a></li>
        </ul>
      </div>

      <div>
        <p class="footer-col-title">Contacto</p>
        <p class="footer-contact-item">+57 314 844 64 73</p>
        <p class="footer-contact-item">gerencia@globalcode.com.co</p>
        <p class="footer-contact-item">Neiva, Huila · Colombia</p>
        <p class="footer-contact-item" style="margin-top:12px; font-size:12px; opacity:0.7;">
          Atendemos todo Colombia y Latinoamérica
        </p>
      </div>

    </div>

    <div class="footer-bottom">
      <p class="footer-copy">
        © 2025 Global Code · Todos los derechos reservados<br>
        Diseñado y desarrollado por Global Code
      </p>
    </div>
  </footer>

  <!-- ── Scripts ─────────────────────────────────────────────── -->
  <script src="./assets/js/main.js" defer></script>
  <script src="./assets/js/piscihelp.js" defer></script>

</body>

</html>
