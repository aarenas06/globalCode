Actúa como un desarrollador frontend senior experto en animaciones avanzadas, UX/UI de nivel agencia internacional y experiencia de usuario memorable. Vas a construir la landing page oficial de Global Code, una start-up tecnológica colombiana especializada en desarrollo de software, automatización de procesos e inteligencia artificial.

IMPORTANTE: Esta landing NO debe verse como una página típica de "empresa de sistemas". Debe comunicar crecimiento empresarial, datos, automatización e inteligencia artificial aplicada al negocio. Nada de fotos de servidores o programadores escribiendo código. Todo debe respirar transformación digital, estrategia y resultados.

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
STACK TÉCNICO
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- HTML5 + CSS3 + JavaScript vanilla
- GSAP + ScrollTrigger via CDN para animaciones
- Particles.js via CDN para efectos de partículas en hero
- Swiper.js via CDN para carruseles
- Google Fonts para tipografía
- Sin frameworks, sin npm, corre directo en XAMPP
- Un solo archivo principal: index.html
- Estructura de carpetas obligatoria:
  /assets/css/style.css
  /assets/js/main.js
  /assets/js/particles-config.js
  /assets/img/ (banco de imágenes del cliente)
  /assets/img/logo.png
  /assets/img/proyectos/

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
PALETA DE COLOR — usar solo estas variables CSS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
:root {
  --principal: #001B48;
  --secundario: #02457A;
  --acento: #018ABE;
  --apoyo: #97CADB;
  --base: #D6E8EE;
  --oscuro: #000F2A;
  --texto-claro: #F0F8FF;
  --texto-secundario: #97CADB;
}
Uso estricto:
- Navbar y footer: --oscuro con blur
- Hero y fondos oscuros: --principal y --oscuro
- Cards y bordes: --secundario
- Acentos, hovers, CTAs: --acento
- Textos secundarios y detalles: --apoyo y --base

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
TIPOGRAFÍA
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Headings / display: "Space Grotesk" (Google Fonts)
  Moderna, geométrica, tech — perfecta para una empresa de IA
- Body / UI / párrafos: "Inter" (Google Fonts)
  Legible, limpia, estándar en productos tech de alto nivel
- Monospace / datos / stats: "JetBrains Mono" (Google Fonts)
  Para números, estadísticas, fragmentos de datos — da sensación tecnológica auténtica
- Importar las tres en el <head>

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
CURSOR PERSONALIZADO (global)
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Ocultar cursor nativo con cursor: none en body
- Crear dos elementos: #cursor-dot y #cursor-ring
  · #cursor-dot: círculo de 6px relleno --acento, position fixed, z-index 9999
  · #cursor-ring: círculo de 32px borde 1.5px solid --acento, fondo transparente, position fixed, z-index 9998
- Movimiento con lerp suave en requestAnimationFrame:
  · dot: factor 0.9 (sigue rápido)
  · ring: factor 0.10 (lag elegante)
- Al hacer hover sobre links, botones o cards:
  · ring escala a 2.5x con transition 0.3s ease
  · ring cambia a fondo --acento opacity 0.15
  · dot desaparece (opacity 0)
- Al hacer hover sobre el botón CTA principal:
  · ring cambia a fondo --acento opacity 0.3 y escala 3x
- En mobile (max-width: 768px): desactivar y restaurar cursor nativo

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
NAVBAR (position: fixed, top: 0, z-index: 100)
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Fondo inicial: transparente
- Al scroll > 80px: fondo --oscuro + backdrop-filter blur(16px) + border-bottom 1px solid rgba(1,138,190,0.15)
- Transición de cambio: 0.4s ease
- Izquierda: logo /assets/img/logo.png — max-width 140px
- Derecha: links de navegación en Inter, 13px, uppercase, letter-spacing 0.1em, color --apoyo
  Links ancla: INICIO · SERVICIOS · PROCESO · TECNOLOGÍAS · PORTAFOLIO · CONTACTO
- Scroll-spy: link activo tiene color --acento + línea inferior animada 2px --acento
- Smooth scroll a cada sección al hacer click
- Mobile: hamburger menu con ícono animado (tres líneas → X con GSAP)
  Menú mobile: fullscreen --oscuro con links centrados, entrada con clip-path top→bottom
- Entrada al cargar: gsap desde y:-80 + opacity:0 → 0 + opacity:1, delay 0.3s, ease "power3.out"

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECCIÓN 01 — HERO (id="inicio")
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Altura: 100vh mínimo
- Fondo: --oscuro con canvas de partículas animadas (Particles.js)
  Configuración partículas: puntos pequeños color --acento opacity 0.4, líneas de conexión --acento opacity 0.15, movimiento lento, efecto repulsión con el mouse
- Overlay gradiente sutil: radial desde --secundario opacity 0.3 en centro hacia transparente

CONTENIDO centrado vertical y horizontal, máximo ancho 900px:

  [1] EYEBROW — JetBrains Mono, 12px, --acento, letter-spacing 0.2em, uppercase:
  "// START-UP TECNOLÓGICA · COLOMBIA"

  [2] HEADLINE PRINCIPAL — Space Grotesk, 80px desktop / 42px mobile, --texto-claro, font-weight 700, line-height 1.1:
  "No vendemos software."
  "Vendemos transformación."
  Animación: cada línea entra con clip-path reveal de abajo hacia arriba, stagger 0.2s, ease "power4.out"

  [3] SUBTÍTULO — Inter, 18px, --texto-secundario, max-width 620px, line-height 1.7:
  "Ayudamos a las empresas a automatizar procesos, aprovechar sus datos e incorporar inteligencia artificial para crecer de manera más rápida y eficiente."
  Animación: fade + y:30→0, delay 0.6s

  [4] STATS ROW — 3 tarjetas horizontales con JetBrains Mono para números:
  "6+ Servicios especializados" | "100% Proyectos a medida" | "2030 Meta nacional"
  Estilo: borde 1px --acento opacity 0.3, fondo --secundario opacity 0.2, border-radius 4px
  Número grande en Space Grotesk --acento, label pequeño en Inter --apoyo
  Animación: counter-up al entrar en viewport

  [5] BOTONES CTA — fila horizontal:
  Botón primario: "Hablemos de tu proyecto →"
    Fondo --acento, texto --oscuro, padding 16px 40px, border-radius 4px
    Hover: brightness 1.15 + scale 1.03 + box-shadow 0 0 30px --acento opacity 0.4
    Animación hover con GSAP onEnter/onLeave
  Botón secundario: "Ver nuestros servicios"
    Borde 1px --acento, fondo transparente, texto --acento
    Hover: fondo --acento opacity 0.1

  [6] INDICADOR SCROLL: línea vertical pulsante + texto "scroll" en JetBrains Mono rotado 90°, color --acento opacity 0.5

- EFECTO PARALLAX: el contenido del hero hace y: 0 → -80px al hacer scroll, con ScrollTrigger scrub: 1

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECCIÓN 02 — FRASE IMPACTO (sin id de nav, visual separator)
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Fondo: --principal con líneas de cuadrícula sutiles (CSS grid lines, 1px --acento opacity 0.06)
- Padding: 100px 8vw
- Layout: texto centrado + elemento visual a la derecha

TEXTO IZQUIERDA:
  Título grande Space Grotesk 56px --texto-claro:
  "Tus datos están trabajando
   menos de lo que deberían."
  Subtítulo Inter 18px --apoyo:
  "En Global Code tomamos los datos dormidos de tu empresa
   y los despertamos con inteligencia artificial."

ELEMENTO VISUAL DERECHA:
  Animación CSS de un dashboard ficticio simplificado:
  - Rectángulos que simulan barras de un gráfico creciendo
  - Línea de tendencia animada con SVG stroke-dashoffset
  - Números que suben con counter-up
  - Todo en colores --acento y --apoyo
  - Fondo: tarjeta con fondo --secundario, borde 1px --acento opacity 0.3

Animación entrada: texto desde x:-60 + opacity:0, visual desde x:60 + opacity:0, ScrollTrigger start "top 75%"

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECCIÓN 03 — SERVICIOS (id="servicios")
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Fondo: --oscuro
- Padding: 120px 8vw

HEADER SECCIÓN:
  Eyebrow: "// LO QUE HACEMOS" — JetBrains Mono 12px --acento
  Título: "Soluciones que transforman negocios" — Space Grotesk 52px --texto-claro
  Subtítulo: Inter 16px --apoyo centrado, max-width 600px

GRID DE SERVICIOS — 3 columnas desktop, 2 tablet, 1 mobile:

Cada card de servicio tiene:
- Fondo: --secundario opacity 0.4, borde 1px --acento opacity 0.2, border-radius 8px
- Padding: 36px 28px
- Ícono SVG minimalista arriba (diseñar íconos simples con líneas, color --acento)
- Número de orden en JetBrains Mono: "01", "02"... color --acento opacity 0.3, tamaño 48px, posición absoluta esquina superior derecha
- Título del servicio: Space Grotesk 22px --texto-claro
- Descripción: Inter 14px --apoyo line-height 1.7
- Línea inferior: borde 0px → 100% width --acento al hacer hover, transition 0.4s

HOVER en cada card:
- Fondo: --secundario opacity 0.8
- Borde: --acento opacity 0.6
- El ícono SVG hace scale: 1 → 1.15 con rotate leve
- Transform: translateY(-8px)
- box-shadow: 0 20px 60px rgba(1,138,190,0.15)
- Transición: todos 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94)

SERVICIOS A MOSTRAR:
  01 · Desarrollo de Software
      "Aplicaciones web, móviles y plataformas empresariales diseñadas a la medida de tus procesos y objetivos."

  02 · Automatización de Procesos
      "Eliminamos tareas repetitivas y rediseñamos flujos operativos para que tu equipo se enfoque en lo que realmente importa."

  03 · Inteligencia Artificial
      "Implementamos soluciones inteligentes para análisis predictivo, optimización de procesos y toma de decisiones basada en datos."

  04 · Business Intelligence
      "Dashboards ejecutivos, KPIs en tiempo real y análisis profundo de tu información con Power BI y tecnologías modernas."

  05 · Integración de Sistemas
      "Conectamos tus plataformas y herramientas existentes mediante APIs REST y SOAP para crear un ecosistema tecnológico unificado."

  06 · Capacitación Tecnológica
      "Power BI · Excel Avanzado · Bases de Datos · Transformación Digital · Buenas Prácticas Tecnológicas"

Animación entrada cards: stagger 0.1s desde y:60 + opacity:0, ScrollTrigger "top 80%"

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECCIÓN 04 — PROCESO DE TRABAJO (id="proceso")
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Fondo: --principal con textura grid CSS sutil
- Padding: 120px 8vw

HEADER:
  Eyebrow: "// CÓMO TRABAJAMOS"
  Título: "De la idea al resultado en 4 pasos"

TIMELINE HORIZONTAL (desktop) / VERTICAL (mobile):
  Línea conectora horizontal --acento, width animada 0→100% con ScrollTrigger scrub

  Paso 01 — ANALIZAMOS
  "Entendemos tu negocio, tus procesos y tus objetivos antes de escribir una sola línea de código."

  Paso 02 — DISEÑAMOS
  "Arquitectamos la solución ideal: escalable, segura y alineada con tu estrategia empresarial."

  Paso 03 — IMPLEMENTAMOS
  "Desarrollamos con metodologías ágiles, iteraciones cortas y entregas constantes para validar en tiempo real."

  Paso 04 — ACOMPAÑAMOS
  "No desaparecemos al entregar. Somos tu aliado tecnológico a largo plazo."

Cada paso:
- Círculo numerado con borde --acento, fondo --oscuro, número JetBrains Mono --acento
- Al activarse con scroll: círculo hace scale 0.8→1 + fondo cambia a --acento
- Título Space Grotesk 20px --texto-claro
- Descripción Inter 14px --apoyo
- Activación secuencial con ScrollTrigger scrub para que se "dibuje" el proceso

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECCIÓN 05 — TECNOLOGÍAS (id="tecnologias")
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Fondo: --oscuro
- Padding: 100px 8vw

HEADER:
  Eyebrow: "// NUESTRO STACK"
  Título: "Tecnología de alto nivel para tu empresa"

MARQUEE INFINITO — dos filas de logos/nombres de tecnologías:
  Fila 1 (izquierda→derecha): React · Node.js · Python · Power BI · PostgreSQL · FastAPI · Flutter · Docker
  Fila 2 (derecha→izquierda): Azure · AWS · TensorFlow · n8n · REST APIs · MySQL · Git · TypeScript

Implementar con CSS animation: marquee infinito suave
Cada ítem: pill con borde 1px --acento opacity 0.3, fondo --secundario opacity 0.2, texto Inter --apoyo
Hover en cada pill: borde --acento opacity 1, texto --acento, fondo --secundario opacity 0.5

DEBAJO DEL MARQUEE — frase de cierre:
  "La tecnología que elegimos no es por moda. Es porque resuelve problemas reales."
  Inter italic 16px --apoyo centrado

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECCIÓN 06 — POR QUÉ GLOBAL CODE (visual separator)
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Fondo: gradiente --principal → --secundario diagonal
- Padding: 100px 8vw
- Layout: dos columnas — frase grande izquierda | lista de beneficios derecha

IZQUIERDA — frase grande Space Grotesk 52px --texto-claro:
  "La tecnología no debe ser un gasto.
   Debe convertirse en una
   ventaja competitiva."

DERECHA — lista de 6 beneficios con check animado:
  Cada ítem: ícono check SVG --acento + texto Inter 16px --texto-claro
  Animación: cada ítem entra con x:40→0 + opacity:0, stagger 0.12s

  ✓ Entendemos primero el negocio, luego proponemos tecnología
  ✓ Soluciones diseñadas para crecer junto con tu empresa
  ✓ Metodologías ágiles y acompañamiento continuo
  ✓ Integración con sistemas existentes sin interrumpir operaciones
  ✓ Enfoque en automatización real y optimización medible
  ✓ Seguridad y escalabilidad desde el diseño

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECCIÓN 07 — PORTAFOLIO (id="portafolio")
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Fondo: --principal
- Padding: 120px 8vw

HEADER:
  Eyebrow: "// PROYECTOS"
  Título: "Soluciones que ya están generando resultados"

GRID DE PROYECTOS — 2 columnas desktop asimétrico (60/40 alternado), 1 columna mobile

Cada card de proyecto:
- Imagen de fondo: /assets/img/proyectos/proyecto-0X.jpg
- Aspect-ratio: 16/9
- Overlay: gradiente desde --oscuro opacity 0.7 a transparente
- Contenido sobre imagen: categoría (JetBrains Mono --acento) + título (Space Grotesk --texto-claro) + año

HOVER en card de proyecto:
- La imagen hace scale: 1 → 1.08, transition 0.6s ease
- Overlay se intensifica a opacity 0.85
- Aparece descripción breve del proyecto desde y:20→0 opacity:0→1
- Botón "Ver proyecto" aparece con borde --base, fondo transparente
- Transform: ninguno en el contenedor (solo la imagen escala dentro)

PROYECTOS PLACEHOLDER (completar con los reales del cliente):
  Proyecto 01 — "Dashboard Ejecutivo · Retail"
  Categoría: Business Intelligence
  "Sistema de indicadores en tiempo real para cadena de tiendas. Reducción del 60% en tiempo de generación de reportes."
  Año: 2024

  Proyecto 02 — "Automatización Facturación · Empresa de Servicios"
  Categoría: Automatización de Procesos
  "Eliminación completa del proceso manual de facturación. Ahorro de 40 horas mensuales de trabajo operativo."
  Año: 2024

  Proyecto 03 — "Plataforma Web · Sector Salud"
  Categoría: Desarrollo de Software
  "Sistema de gestión de citas y pacientes para clínica. Integración con historia clínica electrónica."
  Año: 2025

  Proyecto 04 — "Modelo Predictivo · Inventarios"
  Categoría: Inteligencia Artificial
  "Algoritmo de predicción de demanda para empresa distribuidora. Reducción del 35% en exceso de inventario."
  Año: 2025

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
SECCIÓN 08 — CONTACTO (id="contacto")
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Fondo: --oscuro con partículas muy sutiles (misma config hero pero density 30%)
- Padding: 120px 8vw
- Layout: dos columnas — texto izquierda | formulario + datos derecha

COLUMNA IZQUIERDA:
  Eyebrow: "// HABLEMOS"
  Título Space Grotesk 52px --texto-claro:
  "¿Listo para transformar tu empresa?"
  Subtítulo Inter 16px --apoyo:
  "Cuéntanos sobre tu proyecto. Sin compromisos, sin tecnicismos. Solo una conversación honesta sobre cómo podemos ayudarte a crecer."

  Datos de contacto (tarjetas pequeñas con hover --acento):
  · WhatsApp: [número del cliente — completar]
    Al hacer click: abre wa.me/[número] en nueva pestaña
  · Email: [correo corporativo — completar]
    Al hacer click: abre mailto

COLUMNA DERECHA — FORMULARIO:
  Fondo: --secundario opacity 0.2, borde 1px --acento opacity 0.2, border-radius 8px, padding 40px
  Campos (estilo dark, fondo --principal, borde 1px --acento opacity 0.3):
  - Nombre completo
  - Empresa
  - Email
  - Teléfono / WhatsApp
  - Servicio de interés (select con las 6 opciones)
  - Mensaje / descripción del proyecto (textarea)

  Botón submit: "Enviar mensaje →"
  Fondo --acento, texto --oscuro, ancho 100%
  Hover: brightness 1.15 + box-shadow 0 0 40px --acento opacity 0.3

  Al hacer focus en cada campo:
  - Borde cambia a --acento opacity 1
  - Label flota hacia arriba con animación (floating label pattern)
  - Glow sutil alrededor del campo

  Validación visual en tiempo real con JS puro (sin librerías):
  - Campo válido: borde --acento opacity 0.8
  - Campo inválido: borde rojo suave con mensaje de error inline

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
BOTÓN FLOTANTE WHATSAPP
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Position fixed, bottom: 28px, right: 28px, z-index: 500
- Círculo 58px, fondo #25D366 (verde WhatsApp oficial)
- Ícono SVG de WhatsApp blanco centrado
- Hover: scale 1.12 + box-shadow 0 8px 30px rgba(37,211,102,0.4)
- Animación de entrada: delay 2s desde scale:0 → 1, ease "back.out(1.7)"
- Pulso animado: ring exterior que se expande y desvanece cada 2.5s (CSS keyframes)
- Al hacer click: abre wa.me/[número] con mensaje predefinido:
  "Hola Global Code, me interesa conocer más sobre sus servicios."

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
FOOTER
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Fondo: --oscuro con borde superior 1px --acento opacity 0.2
- Padding: 60px 8vw 30px
- Layout grid: 3 columnas desktop, 1 mobile

  Columna 1: Logo + tagline
  Logo /assets/img/logo.png max-width 130px
  Tagline Inter 14px --apoyo:
  "Transformamos negocios mediante tecnología,
   automatización e inteligencia artificial."

  Columna 2: Links rápidos
  Título: "Navegación" Space Grotesk 14px --texto-claro uppercase
  Links: Inicio · Servicios · Proceso · Tecnologías · Portafolio · Contacto
  Inter 13px --apoyo, hover color --acento transition 0.2s

  Columna 3: Contacto
  Título: "Contacto" Space Grotesk 14px --texto-claro uppercase
  WhatsApp: [número — completar]
  Email: [correo — completar]
  Ubicación: Neiva, Huila · Colombia
  "Atendemos todo Colombia y Latinoamérica"

  Línea inferior centrada Inter 12px --apoyo opacity 0.6:
  "© 2025 Global Code · Todos los derechos reservados
   Diseñado y desarrollado por Global Code"

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
ANIMACIONES GLOBALES — REGLAS ESTRICTAS
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- gsap.registerPlugin(ScrollTrigger) al inicio de main.js
- Clase .reveal en todos los elementos animables:
  gsap.from(".reveal", { opacity:0, y:50, duration:0.9, ease:"power3.out", stagger:0.12, scrollTrigger:{ trigger: el, start:"top 85%", once:true } })
- Nunca animaciones de más de 1.4s (se sienten lentas)
- Respetar prefers-reduced-motion: desactivar GSAP si está activo
- Todas las transiciones CSS con cubic-bezier(0.25, 0.46, 0.45, 0.94)
- Efecto de glitch sutil en el headline del hero (CSS keyframes, muy sutil, cada 8s)
- Números/stats con counter-up animado al entrar en viewport (JS puro)
- Efecto typing en el eyebrow del hero con JS puro (sin librerías extra)

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
EFECTOS ESPECIALES ADICIONALES
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Efecto de líneas de cuadrícula CSS en secciones --principal:
  background-image: linear-gradient(--acento opacity 0.04 1px, transparent 1px),
  linear-gradient(90deg, --acento opacity 0.04 1px, transparent 1px)
  background-size: 60px 60px
- Cards con efecto glassmorphism sutil:
  backdrop-filter: blur(10px), fondo rgba(2,69,122,0.3)
- Hover en links del navbar con underline que se "dibuja" de izquierda a derecha
- Smooth scroll nativo del navegador + GSAP para casos especiales
- Loading screen de 1.5s al abrir la página:
  Fondo --oscuro, logo centrado con animación de entrada, barra de progreso --acento
  Al terminar: slide-up con clip-path y revela la página

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
RESPONSIVE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
- Mobile first en CSS
- Breakpoints: 480px (mobile small), 768px (tablet), 1024px (desktop), 1440px (large)
- Headline hero: 80px → 52px → 36px según breakpoint
- Grids: 3col → 2col → 1col
- Partículas: reducir cantidad 50% en mobile para rendimiento
- Cursor personalizado: desactivar en touch devices

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
INSTRUCCIONES DE EJECUCIÓN PARA CLAUDE CODE
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
1. Crear estructura de carpetas completa primero
2. Crear style.css con variables, reset y estilos base
3. Crear index.html completo con todo el HTML semántico y accesible
4. Crear main.js con todas las animaciones GSAP organizadas por sección
5. Crear particles-config.js con la configuración de Particles.js
6. Verificar que todos los CDN estén correctamente importados en el <head>
7. Todos los paths de imágenes deben ser relativos: /assets/img/
8. Dejar comentarios claros en el código separando cada sección
9. Al finalizar cada archivo confirmar antes de continuar con el siguiente
10. El formulario de contacto debe tener validación funcional en JS puro
11. Probar que el smooth scroll funcione correctamente en todos los links del navbar