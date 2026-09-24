<?php
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$baseUrl = $scheme . '://' . $host;
$pageUrl = $baseUrl . strtok($_SERVER['REQUEST_URI'] ?? '/index.php', '?');
$pageTitle = 'Global Code | Transformación digital, automatización e inteligencia artificial';
$pageDescription = 'Global Code es una start-up tecnológica colombiana que ayuda a las empresas a crecer con software a medida, automatización de procesos, inteligencia artificial y business intelligence.';
$ogImage = $baseUrl . '/assets/img/logo.png';
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta name="keywords" content="Global Code, desarrollo de software, automatización de procesos, inteligencia artificial, business intelligence, transformación digital, Colombia, Neiva" />
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
  <meta property="og:image:alt" content="Logo de Global Code" />
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta name="twitter:description" content="<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>" />
  <meta name="twitter:image" content="<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>" />
  <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>

  <link rel="icon" type="image/x-icon" href="./assets/img/icon_preview.png">
  <link rel="apple-touch-icon" href="./assets/img/logo.png" />
  <link rel="preload" as="image" href="./assets/img/logo.png" />
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet" />

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "Global Code",
    "url": "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>",
    "logo": "<?php echo htmlspecialchars($ogImage, ENT_QUOTES, 'UTF-8'); ?>",
    "description": "<?php echo htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8'); ?>",
    "address": {
      "@type": "PostalAddress",
      "addressLocality": "Neiva",
      "addressRegion": "Huila",
      "addressCountry": "CO"
    },
    "contactPoint": [{
      "@type": "ContactPoint",
      "contactType": "sales",
      "telephone": "+57 314 844 64 73",
      "email": "gerencia@globalcode.com.co",
      "availableLanguage": ["es"]
    }]
  }
  </script>

  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebSite",
    "name": "Global Code",
    "url": "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>",
    "potentialAction": {
      "@type": "SearchAction",
      "target": "<?php echo htmlspecialchars($baseUrl, ENT_QUOTES, 'UTF-8'); ?>/?q={search_term_string}",
      "query-input": "required name=search_term_string"
    }
  }
  </script>

  <!-- CDN: GSAP + ScrollTrigger -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" defer></script>

  <!-- CDN: Particles.js -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js" defer></script>

  <!-- Estilos -->
  <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>

  <!-- ══════════════════════════════════════════════════════════
       LOADING SCREEN
  ══════════════════════════════════════════════════════════ -->
  <!-- Barra de progreso de scroll -->
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
    href="https://wa.me/573148446473?text=Hola%20Global%20Code%2C%20me%20interesa%20conocer%20m%C3%A1s%20sobre%20sus%20servicios."
    target="_blank"
    rel="noopener noreferrer"
    aria-label="Contactar por WhatsApp">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
    </svg>
  </a>

  <!-- ══════════════════════════════════════════════════════════
       NAVBAR
  ══════════════════════════════════════════════════════════ -->
  <nav id="navbar" role="navigation" aria-label="Navegación principal">
    <a href="#inicio" aria-label="Inicio Global Code">
      <img src="./assets/img/logo.png" alt="Global Code" class="nav-logo" />
    </a>

    <ul class="nav-links" role="list">
      <li><a href="#inicio" class="nav-link" data-section="inicio">Inicio</a></li>
      <li><a href="#productos" class="nav-link" data-section="productos">Productos</a></li>
      <li><a href="#servicios" class="nav-link" data-section="servicios">Servicios</a></li>
      <li><a href="#proceso" class="nav-link" data-section="proceso">Proceso</a></li>
      <li><a href="#tecnologias" class="nav-link" data-section="tecnologias">Tecnologías</a></li>
      <!-- <li><a href="#portafolio" class="nav-link" data-section="portafolio">Portafolio</a></li> -->
      <li><a href="#contacto" class="nav-link" data-section="contacto">Contacto</a></li>
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
      <a href="#inicio" class="mobile-nav-link">Inicio</a>
      <a href="#productos" class="mobile-nav-link">Productos</a>
      <a href="#servicios" class="mobile-nav-link">Servicios</a>
      <a href="#proceso" class="mobile-nav-link">Proceso</a>
      <a href="#tecnologias" class="mobile-nav-link">Tecnologías</a>
      <a href="#portafolio" class="mobile-nav-link">Portafolio</a>
      <a href="#contacto" class="mobile-nav-link">Contacto</a>
    </nav>
  </div>

  <main>

    <!-- ══════════════════════════════════════════════════════
         SECCIÓN 01 — HERO
    ══════════════════════════════════════════════════════ -->
    <section id="inicio" aria-label="Inicio">
      <div id="particles-js" aria-hidden="true"></div>
      <div class="hero-overlay" aria-hidden="true"></div>

      <div class="hero-layout">

        <!-- IZQUIERDA: texto -->
        <div class="hero-left">
          <span class="hero-eyebrow" id="hero-eyebrow" aria-label="Start-up tecnológica Colombia"></span>

          <h1 class="hero-headline" aria-label="No vendemos software. Vendemos transformación.">
            <span class="line"><span class="line-inner">No vendemos software.</span></span>
            <span class="line"><span class="line-inner">Vendemos transformación.</span></span>
          </h1>

          <p class="hero-subtitle">
            Ayudamos a las empresas a automatizar procesos, aprovechar sus datos e incorporar
            inteligencia artificial para crecer de manera más rápida y eficiente.
          </p>

          <div class="hero-stats" aria-label="Estadísticas">
            <div class="stat-card">
              <span class="stat-number" data-target="6" data-suffix="+">0</span>
              <span class="stat-label">Servicios especializados</span>
            </div>
            <div class="stat-card">
              <span class="stat-number" data-target="100" data-suffix="%">0</span>
              <span class="stat-label">Proyectos a medida</span>
            </div>
            <div class="stat-card">
              <span class="stat-number" data-target="2030" data-suffix="">0</span>
              <span class="stat-label">Meta nacional</span>
            </div>
          </div>

          <div class="hero-cta">
            <a href="#contacto" class="btn btn-primary" id="hero-cta-btn">
              Hablemos de tu proyecto &nbsp;→
            </a>
            <a href="#servicios" class="btn btn-secondary">
              Ver nuestros servicios
            </a>
          </div>
        </div>

        <!-- DERECHA: visual animado -->
        <div class="hero-right" aria-hidden="true">
          <div class="hv-blob b1"></div>
          <div class="hv-blob b2"></div>

          <div class="hv-card">
            <div class="hv-card-header">
              <span class="hv-dot red"></span>
              <span class="hv-dot yellow"></span>
              <span class="hv-dot green"></span>
              <span class="hv-card-title">// Global Analytics · Live</span>
            </div>

            <div class="hv-orb-wrap">
              <div class="hv-orb-ring r1"></div>
              <div class="hv-orb-ring r2"></div>
              <div class="hv-orb-ring r3"></div>
              <div class="hv-orb-core">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                  <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                  <line x1="12" y1="22.08" x2="12" y2="12" />
                </svg>
              </div>
            </div>

            <div class="hv-chart">
              <div class="hv-bar hb1"></div>
              <div class="hv-bar hb2"></div>
              <div class="hv-bar hb3"></div>
              <div class="hv-bar hb4 accent"></div>
              <div class="hv-bar hb5"></div>
              <div class="hv-bar hb6"></div>
              <div class="hv-bar hb7"></div>
            </div>

            <div class="hv-metrics-row">
              <div class="hv-metric">
                <span class="hv-metric-val">+87%</span>
                <span class="hv-metric-label">Eficiencia</span>
              </div>
              <div class="hv-metric">
                <span class="hv-metric-val">340h</span>
                <span class="hv-metric-label">Ahorradas</span>
              </div>
              <div class="hv-metric">
                <span class="hv-metric-val">3×</span>
                <span class="hv-metric-label">ROI</span>
              </div>
            </div>
          </div>

          <!-- Floating mini cards -->
          <div class="hv-float-card fc-a">
            <span class="hv-fc-label">Procesos automatizados</span>
            <span class="hv-fc-value">124</span>
            <span class="hv-fc-trend">↑ 23% este mes</span>
          </div>

          <div class="hv-float-card fc-b">
            <span class="hv-fc-label">Tiempo respuesta</span>
            <span class="hv-fc-value">0.3s</span>
            <span class="hv-fc-trend">↓ 68% mejora</span>
          </div>

          <div class="hv-float-card fc-c">
            <span class="hv-fc-label">Satisfacción</span>
            <span class="hv-fc-value">98%</span>
            <span class="hv-fc-trend">↑ Excelente</span>
          </div>
        </div>

      </div>

      <div class="scroll-indicator" aria-hidden="true">
        <div class="scroll-line"></div>
        <span class="scroll-text">scroll</span>
      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         SECCIÓN 02 — PRODUCTOS
    ══════════════════════════════════════════════════════ -->
    <section id="productos" aria-label="Productos">
      <div class="section-header centered reveal">
        <span class="eyebrow">// Nuestros productos</span>
        <h2 class="section-title">Software propio para problemas reales</h2>
        <p class="section-subtitle">
          Además de construir a la medida, desarrollamos nuestras propias plataformas
          para sectores específicos. Esta es la primera.
        </p>
      </div>

      <div class="productos-grid">
        <article class="producto-card reveal">
          <div class="producto-media">
            <img src="./assets/img/piscihelp/web/geoloc-estanques.jpg"
              alt="Panel de PisciHelp mostrando la geolocalización de estanques y jaulones de una granja acuícola"
              loading="lazy" decoding="async" width="1600" height="893" />
            <span class="producto-badge">Disponible</span>
          </div>
          <div class="producto-info">
            <span class="producto-tag">Piscicultura · Acuicultura</span>
            <h3 class="producto-titulo">PisciHelp</h3>
            <p class="producto-desc">
              La plataforma que le dice a tu granja qué tiene, dónde está y cuándo
              necesita mantenimiento. Activos, ubicaciones y reportes, en un solo lugar.
            </p>
            <a href="./piscihelp.php" class="btn btn-secondary">Conocer PisciHelp &nbsp;→</a>
          </div>
        </article>
      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         SECCIÓN 03 — FRASE IMPACTO
    ══════════════════════════════════════════════════════ -->
    <section id="frase-impacto" aria-label="Propuesta de valor">
      <div class="frase-impacto-grid">

        <div class="frase-impacto-text reveal">
          <p class="main-phrase">
            Tus datos están trabajando menos de lo que deberían.
          </p>
          <p class="sub-phrase">
            En Global Code tomamos los datos dormidos de tu empresa
            y los despertamos con inteligencia artificial.
          </p>
        </div>

        <div class="dashboard-card reveal" aria-label="Dashboard de ejemplo">
          <div class="dashboard-header">
            <span class="dashboard-title">Panel ejecutivo</span>
            <span class="dashboard-badge">● En vivo</span>
          </div>

          <div class="bar-chart" aria-hidden="true" id="bar-chart">
            <div class="bar" style="height: 40%" data-h="40"></div>
            <div class="bar" style="height: 65%" data-h="65"></div>
            <div class="bar" style="height: 50%" data-h="50"></div>
            <div class="bar" style="height: 80%" data-h="80"></div>
            <div class="bar" style="height: 55%" data-h="55"></div>
            <div class="bar" style="height: 95%" data-h="95"></div>
            <div class="bar" style="height: 70%" data-h="70"></div>
          </div>

          <div class="trend-line-wrap" aria-hidden="true">
            <svg class="trend-svg" viewBox="0 0 300 50" preserveAspectRatio="none">
              <defs>
                <linearGradient id="trendGradient" x1="0" y1="0" x2="0" y2="1">
                  <stop offset="0%" stop-color="#018ABE" stop-opacity="0.3" />
                  <stop offset="100%" stop-color="#018ABE" stop-opacity="0" />
                </linearGradient>
              </defs>
              <path class="trend-area" id="trend-area"
                d="M0,45 L40,38 L80,28 L130,22 L180,15 L230,10 L280,5 L300,3 L300,50 L0,50 Z" />
              <path class="trend-path" id="trend-path"
                d="M0,45 L40,38 L80,28 L130,22 L180,15 L230,10 L280,5 L300,3" />
            </svg>
          </div>

          <div class="kpi-row">
            <div class="kpi-item">
              <span class="kpi-label">Eficiencia</span>
              <span class="kpi-value" data-target="87" data-suffix="%">0%</span>
            </div>
            <div class="kpi-item">
              <span class="kpi-label">Ahorro hrs</span>
              <span class="kpi-value" data-target="340" data-suffix="h">0h</span>
            </div>
            <div class="kpi-item">
              <span class="kpi-label">ROI</span>
              <span class="kpi-value" data-target="3" data-suffix="x">0x</span>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         SECCIÓN 04 — SERVICIOS
    ══════════════════════════════════════════════════════ -->
    <section id="servicios" aria-label="Servicios">
      <div class="section-header centered">
        <span class="eyebrow">// Lo que hacemos</span>
        <h2 class="section-title">Soluciones que transforman negocios</h2>
        <p class="section-subtitle">
          Cada servicio está diseñado para resolver problemas reales y generar
          resultados medibles en tu empresa.
        </p>
      </div>

      <div class="servicios-grid">

        <!-- 01 -->
        <article class="servicio-card reveal" tabindex="0" aria-label="Desarrollo de Software">
          <span class="servicio-numero" aria-hidden="true">01</span>
          <svg class="servicio-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="4" y="8" width="40" height="32" rx="3" />
            <polyline points="14,20 20,26 14,32" />
            <line x1="24" y1="32" x2="34" y2="32" />
          </svg>
          <h3 class="servicio-titulo">Desarrollo de Software</h3>
          <p class="servicio-desc">
            Aplicaciones web, móviles y plataformas empresariales diseñadas a la medida
            de tus procesos y objetivos.
          </p>
        </article>

        <!-- 02 -->
        <article class="servicio-card reveal" tabindex="0" aria-label="Automatización de Procesos">
          <span class="servicio-numero" aria-hidden="true">02</span>
          <svg class="servicio-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <circle cx="24" cy="24" r="10" />
            <path d="M24 4v6M24 38v6M4 24h6M38 24h6" />
            <path d="M10.1 10.1l4.2 4.2M33.7 33.7l4.2 4.2M10.1 37.9l4.2-4.2M33.7 14.3l4.2-4.2" />
          </svg>
          <h3 class="servicio-titulo">Automatización de Procesos</h3>
          <p class="servicio-desc">
            Eliminamos tareas repetitivas y rediseñamos flujos operativos para que tu equipo
            se enfoque en lo que realmente importa.
          </p>
        </article>

        <!-- 03 -->
        <article class="servicio-card reveal" tabindex="0" aria-label="Inteligencia Artificial">
          <span class="servicio-numero" aria-hidden="true">03</span>
          <svg class="servicio-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M24 6C14 6 6 14 6 24s8 18 18 18 18-8 18-18S34 6 24 6z" />
            <circle cx="24" cy="24" r="5" />
            <path d="M24 6v7M24 35v7M6 24h7M35 24h7" />
            <circle cx="24" cy="24" r="12" stroke-dasharray="4 4" />
          </svg>
          <h3 class="servicio-titulo">Inteligencia Artificial</h3>
          <p class="servicio-desc">
            Implementamos soluciones inteligentes para análisis predictivo, optimización de
            procesos y toma de decisiones basada en datos.
          </p>
        </article>

        <!-- 04 -->
        <article class="servicio-card reveal" tabindex="0" aria-label="Business Intelligence">
          <span class="servicio-numero" aria-hidden="true">04</span>
          <svg class="servicio-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="4" y="28" width="8" height="14" rx="1" />
            <rect x="16" y="18" width="8" height="24" rx="1" />
            <rect x="28" y="10" width="8" height="32" rx="1" />
            <polyline points="6,26 20,16 32,8 44,4" />
            <circle cx="44" cy="4" r="3" fill="currentColor" />
          </svg>
          <h3 class="servicio-titulo">Business Intelligence</h3>
          <p class="servicio-desc">
            Dashboards ejecutivos, KPIs en tiempo real y análisis profundo de tu información
            con Power BI y tecnologías modernas.
          </p>
        </article>

        <!-- 05 -->
        <article class="servicio-card reveal" tabindex="0" aria-label="Integración de Sistemas">
          <span class="servicio-numero" aria-hidden="true">05</span>
          <svg class="servicio-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="4" y="16" width="14" height="10" rx="2" />
            <rect x="30" y="10" width="14" height="10" rx="2" />
            <rect x="30" y="28" width="14" height="10" rx="2" />
            <path d="M18 21h6l6-6M18 21h6l6 12" />
          </svg>
          <h3 class="servicio-titulo">Integración de Sistemas</h3>
          <p class="servicio-desc">
            Conectamos tus plataformas y herramientas existentes mediante APIs REST y SOAP
            para crear un ecosistema tecnológico unificado.
          </p>
        </article>

        <!-- 06 -->
        <article class="servicio-card reveal" tabindex="0" aria-label="Capacitación Tecnológica">
          <span class="servicio-numero" aria-hidden="true">06</span>
          <svg class="servicio-icon" viewBox="0 0 48 48" fill="none" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M24 4L4 14l20 10 20-10L24 4z" />
            <path d="M4 14v14" />
            <path d="M14 19v12c0 4 5 9 10 9s10-5 10-9V19" />
            <circle cx="4" cy="32" r="2" fill="currentColor" />
          </svg>
          <h3 class="servicio-titulo">Capacitación Tecnológica</h3>
          <p class="servicio-desc">
            Power BI · Excel Avanzado · Bases de Datos · Transformación Digital ·
            Buenas Prácticas Tecnológicas
          </p>
        </article>

      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         SECCIÓN 05 — PROCESO
    ══════════════════════════════════════════════════════ -->
    <section id="proceso" aria-label="Proceso de trabajo">
      <div class="section-header centered" style="max-width:1100px;margin:0 auto 64px;">
        <span class="eyebrow">// Cómo trabajamos</span>
        <h2 class="section-title">De la idea al resultado en 4 pasos</h2>
      </div>

      <div class="proceso-timeline">
        <div class="proceso-connector" aria-hidden="true">
          <div class="proceso-connector-fill" id="proceso-line"></div>
        </div>

        <div class="proceso-steps">

          <div class="proceso-step reveal">
            <div class="proceso-circle" data-step="1">
              <span class="proceso-num">01</span>
            </div>
            <h3 class="proceso-titulo">Analizamos</h3>
            <p class="proceso-desc">
              Entendemos tu negocio, tus procesos y tus objetivos antes de escribir
              una sola línea de código.
            </p>
          </div>

          <div class="proceso-step reveal">
            <div class="proceso-circle" data-step="2">
              <span class="proceso-num">02</span>
            </div>
            <h3 class="proceso-titulo">Diseñamos</h3>
            <p class="proceso-desc">
              Arquitectamos la solución ideal: escalable, segura y alineada con tu
              estrategia empresarial.
            </p>
          </div>

          <div class="proceso-step reveal">
            <div class="proceso-circle" data-step="3">
              <span class="proceso-num">03</span>
            </div>
            <h3 class="proceso-titulo">Implementamos</h3>
            <p class="proceso-desc">
              Desarrollamos con metodologías ágiles, iteraciones cortas y entregas
              constantes para validar en tiempo real.
            </p>
          </div>

          <div class="proceso-step reveal">
            <div class="proceso-circle" data-step="4">
              <span class="proceso-num">04</span>
            </div>
            <h3 class="proceso-titulo">Acompañamos</h3>
            <p class="proceso-desc">
              No desaparecemos al entregar. Somos tu aliado tecnológico a largo plazo.
            </p>
          </div>

        </div>
      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         SECCIÓN 06 — TECNOLOGÍAS
    ══════════════════════════════════════════════════════ -->
    <section id="tecnologias" aria-label="Stack tecnológico">
      <div class="tecnologias-header">
        <span class="eyebrow">// Nuestro Stack</span>
        <h2 class="section-title reveal">Tecnología de alto nivel para tu empresa</h2>
      </div>

      <div class="marquee-wrap" aria-label="Tecnologías que usamos">

        <!-- Fila 1: izquierda → derecha -->
        <div class="marquee-row">
          <div class="marquee-track" aria-hidden="true">
            <span class="tech-pill">Angular</span>
            <span class="tech-pill">Node.js</span>
            <span class="tech-pill">Python</span>
            <span class="tech-pill">Power BI</span>
            <span class="tech-pill">PostgreSQL</span>
            <span class="tech-pill">FastAPI</span>
            <span class="tech-pill">Laravel</span>
          </div>
          <div class="marquee-track" aria-hidden="true">
            <span class="tech-pill">Angular</span>
            <span class="tech-pill">Node.js</span>
            <span class="tech-pill">Python</span>
            <span class="tech-pill">Power BI</span>
            <span class="tech-pill">PostgreSQL</span>
            <span class="tech-pill">FastAPI</span>
            <span class="tech-pill">Laravel</span>

          </div>
        </div>

        <!-- Fila 2: derecha → izquierda -->
        <div class="marquee-row reverse">
          <div class="marquee-track" aria-hidden="true">
            <span class="tech-pill">AWS</span>
            <span class="tech-pill">n8n</span>
            <span class="tech-pill">REST APIs</span>
            <span class="tech-pill">MySQL</span>
            <span class="tech-pill">Visual Basic</span>
            <span class="tech-pill">PHP</span>
          </div>
          <div class="marquee-track" aria-hidden="true">
            <span class="tech-pill">AWS</span>
            <span class="tech-pill">n8n</span>
            <span class="tech-pill">REST APIs</span>
            <span class="tech-pill">MySQL</span>
            <span class="tech-pill">Visual Basic</span>
            <span class="tech-pill">PHP</span>
          </div>
        </div>

      </div>

      <div class="marquee-footer reveal">
        <p>La tecnología que elegimos no es por moda. Es porque resuelve problemas reales.</p>
      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         SECCIÓN 07 — POR QUÉ GLOBAL CODE
    ══════════════════════════════════════════════════════ -->
    <section id="por-que" aria-label="Por qué Global Code">
      <div class="por-que-grid">

        <div class="reveal">
          <p class="por-que-phrase">
            La tecnología no debe ser un gasto. Debe convertirse en una ventaja competitiva.
          </p>
        </div>

        <ul class="beneficios-list" role="list" aria-label="Beneficios de trabajar con Global Code">
          <li class="beneficio-item">
            <svg class="beneficio-check" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <polyline points="20 6 9 17 4 12" />
            </svg>
            <span class="beneficio-text">Entendemos primero el negocio, luego proponemos tecnología</span>
          </li>
          <li class="beneficio-item">
            <svg class="beneficio-check" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <polyline points="20 6 9 17 4 12" />
            </svg>
            <span class="beneficio-text">Soluciones diseñadas para crecer junto con tu empresa</span>
          </li>
          <li class="beneficio-item">
            <svg class="beneficio-check" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <polyline points="20 6 9 17 4 12" />
            </svg>
            <span class="beneficio-text">Metodologías ágiles y acompañamiento continuo</span>
          </li>
          <li class="beneficio-item">
            <svg class="beneficio-check" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <polyline points="20 6 9 17 4 12" />
            </svg>
            <span class="beneficio-text">Integración con sistemas existentes sin interrumpir operaciones</span>
          </li>
          <li class="beneficio-item">
            <svg class="beneficio-check" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <polyline points="20 6 9 17 4 12" />
            </svg>
            <span class="beneficio-text">Enfoque en automatización real y optimización medible</span>
          </li>
          <li class="beneficio-item">
            <svg class="beneficio-check" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <polyline points="20 6 9 17 4 12" />
            </svg>
            <span class="beneficio-text">Seguridad y escalabilidad desde el diseño</span>
          </li>
        </ul>

      </div>
    </section>

    <!-- ══════════════════════════════════════════════════════
         SECCIÓN 08 — PORTAFOLIO
    ══════════════════════════════════════════════════════ -->
    <!-- <section id="portafolio" aria-label="Portafolio de proyectos">
      <div class="section-header">
        <span class="eyebrow">// Proyectos</span>
        <h2 class="section-title reveal">Soluciones que ya están generando resultados</h2>
      </div>

      <div class="portafolio-grid">

      
        <article class="proyecto-card tall reveal" tabindex="0" aria-label="Dashboard Ejecutivo Retail">
          <div class="proyecto-placeholder">PROYECTO 01</div>
          <div class="proyecto-overlay">
            <span class="proyecto-categoria">Business Intelligence</span>
            <h3 class="proyecto-titulo">Dashboard Ejecutivo · Retail</h3>
            <span class="proyecto-anio">2024</span>
            <p class="proyecto-desc">
              Sistema de indicadores en tiempo real para cadena de tiendas.
              Reducción del 60% en tiempo de generación de reportes.
            </p>
            <span class="proyecto-btn">Ver proyecto →</span>
          </div>
        </article>

        <div class="col-right">

          <article class="proyecto-card reveal" tabindex="0" aria-label="Automatización Facturación">
            <div class="proyecto-placeholder">PROYECTO 02</div>
            <div class="proyecto-overlay">
              <span class="proyecto-categoria">Automatización de Procesos</span>
              <h3 class="proyecto-titulo">Automatización Facturación · Servicios</h3>
              <span class="proyecto-anio">2024</span>
              <p class="proyecto-desc">
                Eliminación del proceso manual de facturación. Ahorro de 40 horas
                mensuales de trabajo operativo.
              </p>
              <span class="proyecto-btn">Ver proyecto →</span>
            </div>
          </article>

          <article class="proyecto-card reveal" tabindex="0" aria-label="Plataforma Web Sector Salud">
            <div class="proyecto-placeholder">PROYECTO 03</div>
            <div class="proyecto-overlay">
              <span class="proyecto-categoria">Desarrollo de Software</span>
              <h3 class="proyecto-titulo">Plataforma Web · Sector Salud</h3>
              <span class="proyecto-anio">2025</span>
              <p class="proyecto-desc">
                Sistema de gestión de citas y pacientes para clínica. Integración
                con historia clínica electrónica.
              </p>
              <span class="proyecto-btn">Ver proyecto →</span>
            </div>
          </article>

        </div>

      </div>

      <div class="portafolio-grid" style="margin-top: 24px;">
        <article class="proyecto-card reveal" tabindex="0" aria-label="Modelo Predictivo Inventarios" style="grid-column: 1 / -1; aspect-ratio: 21/6;">
          <div class="proyecto-placeholder">PROYECTO 04</div>
          <div class="proyecto-overlay">
            <span class="proyecto-categoria">Inteligencia Artificial</span>
            <h3 class="proyecto-titulo">Modelo Predictivo · Inventarios</h3>
            <span class="proyecto-anio">2025</span>
            <p class="proyecto-desc">
              Algoritmo de predicción de demanda para empresa distribuidora.
              Reducción del 35% en exceso de inventario.
            </p>
            <span class="proyecto-btn">Ver proyecto →</span>
          </div>
        </article>
      </div>

    </section> 
-->
    <!-- ══════════════════════════════════════════════════════
         SECCIÓN 09 — CONTACTO
    ══════════════════════════════════════════════════════ -->
    <section id="contacto" aria-label="Contacto">
      <div id="particles-contacto" aria-hidden="true"></div>

      <div class="contacto-grid">

        <!-- Columna izquierda -->
        <div>
          <span class="eyebrow reveal">// Hablemos</span>
          <h2 class="contacto-title reveal">¿Listo para transformar tu empresa?</h2>
          <p class="contacto-subtitle reveal">
            Cuéntanos sobre tu proyecto. Sin compromisos, sin tecnicismos.
            Solo una conversación honesta sobre cómo podemos ayudarte a crecer.
          </p>


        </div>

        <div>
          <a href="https://wa.me/573054648486" target="_blank" rel="noopener noreferrer"
            class="contacto-dato reveal" aria-label="Contactar por WhatsApp">
            <svg class="contacto-dato-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg>
            <span class="contacto-dato-text">+57 305 464 84 86 · WhatsApp</span>
          </a>
          <a href="https://wa.me/573148446473" target="_blank" rel="noopener noreferrer"
            class="contacto-dato reveal" aria-label="Contactar por WhatsApp">
            <svg class="contacto-dato-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
              <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
            </svg>
            <span class="contacto-dato-text">+57 314 844 64 73 · WhatsApp</span>
          </a>

          <a href="mailto:gerencia@globalcode.com.co"
            class="contacto-dato reveal" aria-label="Enviar correo electrónico">
            <svg class="contacto-dato-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="2" y="4" width="20" height="16" rx="2" />
              <polyline points="2,4 12,13 22,4" />
            </svg>
            <span class="contacto-dato-text">gerencia@globalcode.com.co</span>
          </a>
        </div>
        <!-- Columna derecha: formulario -->
        <!-- <div class="form-card reveal">
          <form id="contact-form" novalidate aria-label="Formulario de contacto">

            <div class="form-group">
              <input type="text" id="nombre" name="nombre" class="form-input"
                placeholder=" " autocomplete="name" required aria-required="true"
                aria-describedby="nombre-error" />
              <label for="nombre" class="form-label">Nombre completo</label>
              <span class="form-error" id="nombre-error" role="alert">Por favor ingresa tu nombre.</span>
            </div>

            <div class="form-group">
              <input type="text" id="empresa" name="empresa" class="form-input"
                placeholder=" " autocomplete="organization" aria-describedby="empresa-error" />
              <label for="empresa" class="form-label">Empresa</label>
              <span class="form-error" id="empresa-error" role="alert"></span>
            </div>

            <div class="form-group">
              <input type="email" id="email" name="email" class="form-input"
                placeholder=" " autocomplete="email" required aria-required="true"
                aria-describedby="email-error" />
              <label for="email" class="form-label">Correo electrónico</label>
              <span class="form-error" id="email-error" role="alert">Ingresa un correo válido.</span>
            </div>

            <div class="form-group">
              <input type="tel" id="telefono" name="telefono" class="form-input"
                placeholder=" " autocomplete="tel" aria-describedby="telefono-error" />
              <label for="telefono" class="form-label">Teléfono / WhatsApp</label>
              <span class="form-error" id="telefono-error" role="alert"></span>
            </div>

            <div class="form-group select-wrap">
              <select id="servicio" name="servicio" class="form-input"
                required aria-required="true" aria-describedby="servicio-error">
                <option value="" disabled selected hidden></option>
                <option value="desarrollo">Desarrollo de Software</option>
                <option value="automatizacion">Automatización de Procesos</option>
                <option value="ia">Inteligencia Artificial</option>
                <option value="bi">Business Intelligence</option>
                <option value="integracion">Integración de Sistemas</option>
                <option value="capacitacion">Capacitación Tecnológica</option>
              </select>
              <label for="servicio" class="form-label">Servicio de interés</label>
              <span class="form-error" id="servicio-error" role="alert">Selecciona un servicio.</span>
            </div>

            <div class="form-group">
              <textarea id="mensaje" name="mensaje" class="form-input"
                placeholder=" " rows="4" required aria-required="true"
                aria-describedby="mensaje-error"></textarea>
              <label for="mensaje" class="form-label">Descripción del proyecto</label>
              <span class="form-error" id="mensaje-error" role="alert">Por favor describe tu proyecto.</span>
            </div>

            <button type="submit" class="btn-submit" id="submit-btn">
              <span id="submit-text">Enviar mensaje &nbsp;→</span>
              <span id="submit-loading" style="display:none" aria-live="polite">Enviando…</span>
            </button>

          </form>
        </div> -->

      </div>
    </section>

  </main>

  <!-- ══════════════════════════════════════════════════════════
       FOOTER
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
          <li><a href="#inicio" class="footer-link">Inicio</a></li>
          <li><a href="#productos" class="footer-link">Productos</a></li>
          <li><a href="#servicios" class="footer-link">Servicios</a></li>
          <li><a href="#proceso" class="footer-link">Proceso</a></li>
          <li><a href="#tecnologias" class="footer-link">Tecnologías</a></li>
          <!-- <li><a href="#portafolio" class="footer-link">Portafolio</a></li> -->
          <li><a href="#contacto" class="footer-link">Contacto</a></li>
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
  <script src="./assets/js/particles-config.js" defer></script>
  <script src="./assets/js/main.js" defer></script>

</body>

</html>