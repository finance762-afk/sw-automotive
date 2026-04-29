<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$currentService = null;
$relatedServices = [];
foreach ($services as $s) {
    if ($s['slug'] === 'transmission-repair') { $currentService = $s; }
    elseif (count($relatedServices) < 3) { $relatedServices[] = $s; }
}

$pageTitle       = 'Transmission Repair Manassas VA | SW Automotive — Auto & Manual, All Makes';
$pageDescription = 'Transmission repair in Manassas, VA. SW Automotive diagnoses, services, and rebuilds automatic and manual transmissions for all makes and models. Written estimates. ASE certified.';
$canonicalUrl    = $siteUrl . '/services/transmission-repair/';
$ogImage         = $currentService['photo'];
$currentPage     = 'transmission-repair';
$heroPreloadImage = $ogImage;

$serviceFaqs = [
  ['q' => 'What are the signs my transmission needs repair near Manassas VA?',
   'a' => 'Common signs include slipping between gears, delayed engagement when shifting from park to drive, rough or harsh shifting, grinding or clunking during gear changes, transmission warning light, or burning smell from under the hood. Any of these warrant a diagnostic — catching a fluid issue early is far cheaper than a rebuild.'],
  ['q' => 'How much does transmission repair cost in Manassas VA?',
   'a' => 'Transmission fluid service runs $120–$180. A complete fluid flush with filter replacement is $200–$300. Major internal repair runs $800–$2,500+ depending on vehicle and extent of damage. Complete rebuild or replacement can run $2,500–$5,500 on most vehicles. SW Automotive provides a written estimate after a diagnostic inspection — rebuilds are only recommended when justified by inspection findings.'],
  ['q' => 'Should I repair or replace my transmission near Manassas?',
   'a' => 'That depends on the specific damage and your vehicle\'s overall value. SW Automotive performs a thorough diagnostic before recommending any transmission work. We\'ll tell you honestly whether a fluid service might resolve the issue, whether internal repair is viable, or whether replacement is the most cost-effective path forward.'],
  ['q' => 'Do you repair manual transmissions in Manassas VA?',
   'a' => 'Yes. SW Automotive services both automatic and manual transmissions — including clutch inspection and replacement, synchro repair, and complete manual transmission rebuilds. Manual transmission work is increasingly rare at general shops; our technicians have the experience to handle it correctly.'],
];

$schemaMarkup = generateServiceSchema($currentService, $serviceFaqs);
$schemaType   = 'application/ld+json'; // Schema format; rendered by head.php
$canonicalTag = '<link rel="canonical" href="' . $canonicalUrl . '">';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ================================================================
   Transmission Repair — SW Automotive
   Standard Tier ≥200 lines | Techniques: Layered Hero (C1),
   Ken Burns, Dividers (C3), Service Type Split (Signature),
   Why Cards, Process Steps, FAQ Accordion
================================================================ */
.svc-hero { position: relative; min-height: 58vh; display: flex; align-items: center; background-size: cover; background-position: center 40%; animation: kb-trans 24s ease-in-out infinite alternate; }
@keyframes kb-trans { from { background-size: 107%; background-position: center 36%; } to { background-size: 119%; background-position: center 52%; } }
.svc-hero::before { content: ''; position: absolute; inset: 0; background: linear-gradient(108deg, rgba(var(--color-primary-rgb),0.95) 0%, rgba(var(--color-primary-rgb),0.78) 44%, rgba(var(--color-primary-dark-rgb),0.50) 100%); z-index: 1; }
.svc-hero::after { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E"); opacity: 0.04; z-index: 1; pointer-events: none; }
.svc-hero-inner { position: relative; z-index: 2; width: 100%; max-width: var(--max-width); margin-inline: auto; padding: var(--space-3xl) var(--space-lg); }
.svc-breadcrumb { display: flex; align-items: center; gap: 6px; font-size: 0.78rem; color: rgba(255,255,255,0.58); margin-bottom: var(--space-md); flex-wrap: wrap; }
.svc-breadcrumb a { color: rgba(255,255,255,0.72); transition: color var(--transition-base); }
.svc-breadcrumb a:hover { color: var(--color-accent); }
.svc-breadcrumb span { color: rgba(255,255,255,0.35); }
.svc-hero h1 { font-family: var(--font-heading); font-size: clamp(2.4rem,5.5vw,4rem); line-height: 1.05; color: #fff; text-wrap: balance; margin-bottom: var(--space-lg); }
.svc-hero h1 .accent-word { background: linear-gradient(135deg, var(--color-accent), #6ee7f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.svc-hero-sub { font-size: 1.05rem; line-height: 1.70; color: rgba(255,255,255,0.82); max-width: 56ch; margin-bottom: var(--space-xl); }
.svc-hero-actions { display: flex; gap: var(--space-md); flex-wrap: wrap; }
.svc-trust-row { display: flex; gap: var(--space-sm); flex-wrap: wrap; margin-top: var(--space-lg); }
.svc-trust-pill { display: inline-flex; align-items: center; gap: 5px; padding: 4px 12px; background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.16); border-radius: var(--radius-full); font-size: 0.72rem; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; color: rgba(255,255,255,0.78); }
.svc-trust-pill i, .svc-trust-pill svg { width: 11px; height: 11px; color: var(--color-accent); }
.svc-divider { display: block; line-height: 0; overflow: hidden; }
.svc-divider svg { display: block; width: 100%; }
.svc-detail { padding: var(--space-4xl) var(--space-lg); }
.svc-detail-grid { display: grid; grid-template-columns: 3fr 2fr; gap: var(--space-4xl); align-items: start; }
.svc-detail-text h2 { font-size: clamp(1.8rem,3.5vw,2.5rem); color: var(--color-primary); margin-bottom: var(--space-lg); text-wrap: balance; }
.svc-answer-first { font-size: 1.05rem; line-height: 1.75; color: var(--color-text); border-left: 4px solid var(--color-accent); padding-left: var(--space-lg); margin-bottom: var(--space-xl); }
.svc-detail-text p { color: var(--color-text-light); line-height: 1.75; max-width: 65ch; margin-bottom: var(--space-lg); }
.svc-last-updated { font-size: 0.78rem; color: var(--color-gray); margin-top: var(--space-xl); }
.svc-img-wrap { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); margin-bottom: var(--space-xl); }
.svc-img-wrap img { width: 100%; height: 290px; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.svc-img-wrap:hover img { transform: scale(1.04); }
.svc-img-wrap::after { content: ''; position: absolute; inset: 0; border: 2px solid rgba(var(--color-accent-rgb),0.20); border-radius: var(--radius-lg); pointer-events: none; }

/* Signature: Auto vs Manual Split */
.trans-type-section { background: var(--color-bg-alt); padding: var(--space-3xl) var(--space-lg); }
.trans-type-grid { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-2xl); margin-top: var(--space-2xl); }
.trans-type-card { border-radius: var(--radius-md); overflow: hidden; box-shadow: var(--shadow-sm); }
.trans-type-header { background: var(--color-primary); padding: var(--space-lg) var(--space-xl); display: flex; align-items: center; gap: var(--space-md); }
.trans-type-header .icon-wrap { width: 44px; height: 44px; background: rgba(var(--color-accent-rgb),0.15); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--color-accent); flex-shrink: 0; }
.trans-type-header .icon-wrap i, .trans-type-header .icon-wrap svg { width: 20px; height: 20px; }
.trans-type-header h3 { color: #fff; font-family: var(--font-heading); font-size: 1.3rem; margin: 0; }
.trans-type-body { background: #fff; padding: var(--space-xl); }
.trans-type-body ul { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-sm); }
.trans-type-body ul li { font-size: 0.90rem; color: var(--color-text-light); padding-left: 1.2rem; position: relative; line-height: 1.50; }
.trans-type-body ul li::before { content: '→'; color: var(--color-accent); position: absolute; left: 0; font-weight: 700; font-size: 0.80rem; top: 2px; }

/* Why Cards */
.why-section { padding: var(--space-4xl) var(--space-lg); }
.why-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: var(--space-lg); margin-top: var(--space-3xl); }
.why-card { background: var(--color-bg-alt); border-radius: var(--radius-md); padding: var(--space-xl) var(--space-lg); text-align: center; box-shadow: var(--shadow-sm); transition: transform var(--transition-base), box-shadow var(--transition-base); border-top: 3px solid transparent; }
.why-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-top-color: var(--color-accent); }
.why-icon { width: 50px; height: 50px; border-radius: 50%; background: rgba(var(--color-primary-rgb),0.06); display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); color: var(--color-accent); }
.why-icon i, .why-icon svg { width: 21px; height: 21px; }
.why-card h3 { font-family: var(--font-heading); font-size: 1.2rem; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.why-card p { font-size: 0.88rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

/* Process */
.process-section { background: var(--color-bg-alt); padding: var(--space-4xl) var(--space-lg); }
.process-row { display: grid; grid-template-columns: repeat(4,1fr); gap: 0; margin-top: var(--space-3xl); position: relative; }
.process-row::before { content: ''; position: absolute; top: 27px; left: calc(12.5% + 28px); right: calc(12.5% + 28px); height: 2px; background: linear-gradient(to right, var(--color-accent) 0%, rgba(var(--color-accent-rgb),0.12) 100%); }
.proc-card { text-align: center; padding: var(--space-lg) var(--space-md); }
.proc-num { width: 54px; height: 54px; border-radius: 50%; background: var(--color-primary); color: var(--color-accent); font-family: var(--font-heading); font-size: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-lg); box-shadow: var(--shadow-md); position: relative; z-index: 1; transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base); }
.proc-card:hover .proc-num { transform: scale(1.12); background: var(--color-accent); color: var(--color-primary); }
.proc-card h3 { font-family: var(--font-heading); font-size: 1.15rem; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.proc-card p { font-size: 0.86rem; color: var(--color-text-light); line-height: 1.60; margin: 0; max-width: 22ch; margin-inline: auto; }

.faq-svc { padding: var(--space-4xl) var(--space-lg); }
.faq-svc-wrap { max-width: 860px; margin-inline: auto; margin-top: var(--space-3xl); }
.related-svc-section { background: var(--color-bg-alt); padding: var(--space-4xl) var(--space-lg); }
.svc-closing-cta { background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); padding: var(--space-4xl) var(--space-lg); text-align: center; position: relative; overflow: hidden; }
.svc-closing-cta::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E"); opacity: 0.05; pointer-events: none; }
.svc-closing-cta .container { position: relative; z-index: 1; }
.svc-closing-cta h2 { color: #fff; font-size: clamp(2rem,4vw,3rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.svc-closing-cta p { color: rgba(255,255,255,0.78); max-width: 52ch; margin-inline: auto; margin-bottom: var(--space-xl); line-height: 1.70; }
.svc-cta-btns { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

@media (max-width: 1023px) {
  .svc-detail-grid { grid-template-columns: 1fr; }
  .trans-type-grid { grid-template-columns: 1fr; max-width: 520px; margin-inline: auto; }
  .why-grid { grid-template-columns: repeat(2,1fr); }
  .process-row { grid-template-columns: repeat(2,1fr); }
  .process-row::before { display: none; }
}
@media (max-width: 767px) {
  .svc-hero { min-height: 50vh; }
  .svc-hero-actions { flex-direction: column; }
  .svc-hero-actions .btn { width: 100%; justify-content: center; }
  .why-grid { grid-template-columns: 1fr; }
  .process-row { grid-template-columns: 1fr; }
  .svc-cta-btns { flex-direction: column; align-items: center; }
  .svc-cta-btns .btn { width: 100%; max-width: 300px; justify-content: center; }
}

/* ================================================================
   ENHANCED COMPONENT STYLES — TRANSMISSION REPAIR
================================================================ */

/* Trans type cards — interaction enhancement */
.trans-type-card {
  border: 1px solid rgba(var(--color-primary-rgb), 0.10);
  transition: transform var(--transition-base),
              box-shadow var(--transition-base),
              border-color var(--transition-base);
}
.trans-type-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-lg);
  border-color: rgba(var(--color-accent-rgb), 0.28);
}
.trans-type-header {
  background: linear-gradient(
    135deg,
    var(--color-primary) 0%,
    var(--color-primary-dark) 100%
  );
  border-bottom: 2px solid rgba(var(--color-accent-rgb), 0.28);
}
.trans-type-body ul li {
  padding-block: var(--space-xs);
  border-bottom: 1px solid rgba(var(--color-primary-rgb), 0.05);
  line-height: 1.55;
}
.trans-type-body ul li:last-child {
  border-bottom: none;
  padding-bottom: 0;
}

/* Why card — icon hover state */
.why-card:hover .why-icon {
  background: var(--color-primary);
  color: #fff;
}
.why-card:hover .why-icon i,
.why-card:hover .why-icon svg {
  color: var(--color-accent);
}

/* Answer-first block — subtle bg tint */
.svc-answer-first {
  background: rgba(var(--color-accent-rgb), 0.04);
  border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
}

/* FAQ section header alignment */
.faq-svc .section-title {
  max-width: 700px;
  margin-inline: auto;
  text-align: center;
}
.faq-svc .section-title .eyebrow-label {
  justify-content: center;
  display: flex;
}

/* Related services intro spacing */
.related-svc-section .section-title {
  margin-bottom: var(--space-xl);
}

/* Process card paragraph alignment */
.proc-card p {
  text-align: center;
  max-width: 24ch;
  margin-inline: auto;
}

/* Closing CTA eyebrow + action spacing */
.svc-closing-cta .eyebrow-label {
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}
.svc-cta-btns {
  margin-top: var(--space-xl);
}

/* Focus-visible: keyboard navigation */
.svc-hero-actions .btn:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 3px;
}
.svc-breadcrumb a:focus-visible {
  outline: 1px solid rgba(var(--color-accent-rgb), 0.70);
  outline-offset: 2px;
  border-radius: var(--radius-xs);
}

/* Responsive — tablet portrait */
@media (max-width: 1023px) {
  .trans-type-grid {
    max-width: 660px;
    margin-inline: auto;
  }
  .faq-svc .section-title {
    text-align: left;
  }
  .faq-svc .section-title .eyebrow-label {
    justify-content: flex-start;
  }
  .svc-closing-cta h2 {
    font-size: clamp(1.8rem, 4vw, 2.6rem);
  }
}

/* Responsive — mobile refinements */
@media (max-width: 767px) {
  .trans-type-header h3 {
    font-size: 1.15rem;
  }
  .trans-type-body {
    padding: var(--space-md);
  }
  .trans-type-body ul li {
    font-size: 0.86rem;
  }
  .why-card {
    padding: var(--space-lg) var(--space-md);
  }
  .why-icon {
    width: 44px;
    height: 44px;
  }
  .faq-svc .section-title {
    text-align: left;
  }
  .svc-closing-cta {
    padding: var(--space-3xl) var(--space-md);
  }
}
</style>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<section class="svc-hero" style="background-image: url('<?= htmlspecialchars($ogImage) ?>');" aria-label="Transmission repair in Manassas VA">
  <div class="svc-hero-inner">
    <nav class="svc-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span>›</span><a href="/services/">Services</a><span>›</span>
      <span aria-current="page">Transmission Repair</span>
    </nav>
    <h1>Transmission Repair in<br><span class="accent-word">Manassas, VA</span></h1>
    <p class="svc-hero-sub">
      Automatic and manual transmission diagnostics, fluid service, and full rebuild capability
      for every make and model in Prince William County. Catching transmission issues early
      saves thousands — we tell you exactly what's happening and what it costs to fix it.
    </p>
    <div class="svc-hero-actions">
      <a href="/contact" class="btn btn-accent"><i data-lucide="clipboard-list"></i> Get a Free Estimate</a>
      <a href="/services/" class="btn btn-outline-white"><i data-lucide="arrow-left"></i> All Services</a>
    </div>
    <div class="svc-trust-row">
      <span class="svc-trust-pill"><i data-lucide="check-circle"></i> Auto &amp; Manual</span>
      <span class="svc-trust-pill"><i data-lucide="cpu"></i> Full Diagnostic</span>
      <span class="svc-trust-pill"><i data-lucide="file-text"></i> Written Estimates</span>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-primary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#ffffff"/>
  </svg>
</div>

<section class="svc-detail" aria-label="About transmission repair at SW Automotive">
  <div class="container">
    <div class="svc-detail-grid">
      <div class="svc-detail-text" data-animate>
        <span class="eyebrow-label">Transmission Repair Manassas VA</span>
        <h2>Transmission Problems Caught Early Cost a Fraction of What They Cost Later</h2>
        <p class="svc-answer-first">
          SW Automotive performs complete transmission diagnostics for automatic and manual
          transmissions across all makes and models in Manassas. We diagnose accurately —
          not every transmission complaint requires a rebuild, and we won't recommend one
          if a fluid service or solenoid replacement resolves the issue.
        </p>
        <p>
          Transmission fluid degradation is the most common and most preventable cause of
          transmission failure. Dirty fluid loses its friction modifier properties, causes
          clutch pack wear, and can damage valve body components that are expensive to replace.
          A $200 fluid flush that saves a $3,500 rebuild is exactly the kind of straight advice
          you get at SW Automotive.
        </p>
        <p>
          When internal repair or rebuild is required, our technicians have the factory
          service data, special tools, and rebuild experience to perform the work correctly.
          We service CVT transmissions (Nissan, Subaru, Honda), dual-clutch automatics
          (Ford PowerShift, VW DSG), traditional torque-converter automatics, and
          conventional manual transmissions with clutch assemblies.
        </p>
        <p class="svc-last-updated">Last Updated: April 2026</p>
      </div>
      <div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489126638-f4l6be-483962234_666123242659560_7431100441034816467_n.jpg"
            alt="Transmission service being performed at SW Automotive in Manassas VA" width="600" height="290" loading="lazy">
        </div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489129128-tvaas5-480214652_661491616439862_5774994120961816785_n.jpg"
            alt="Vehicle drivetrain inspection at SW Automotive Manassas" width="600" height="290" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <path d="M0,20 C480,50 960,0 1440,20 L1440,50 L0,50 Z" fill="#f4f7fa"/>
  </svg>
</div>

<!-- Signature: Auto vs Manual Split -->
<section class="trans-type-section" aria-label="Automatic and manual transmission services">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">What We Service</span>
      <h2>Automatic or Manual — <span class="text-accent">We Handle Both</span></h2>
    </header>
    <div class="trans-type-grid">
      <div class="trans-type-card reveal-up reveal-delay-1" data-animate>
        <div class="trans-type-header">
          <div class="icon-wrap"><i data-lucide="cog"></i></div>
          <h3>Automatic Transmission</h3>
        </div>
        <div class="trans-type-body">
          <ul>
            <li>Fluid flush and filter replacement</li>
            <li>Torque converter service</li>
            <li>Solenoid and valve body diagnosis</li>
            <li>CVT fluid service and diagnosis</li>
            <li>Dual-clutch (DCT/DSG) service</li>
            <li>Complete automatic rebuild</li>
          </ul>
        </div>
      </div>
      <div class="trans-type-card reveal-up reveal-delay-2" data-animate>
        <div class="trans-type-header">
          <div class="icon-wrap"><i data-lucide="settings-2"></i></div>
          <h3>Manual Transmission</h3>
        </div>
        <div class="trans-type-body">
          <ul>
            <li>Clutch inspection and replacement</li>
            <li>Flywheel resurfacing or replacement</li>
            <li>Synchro wear diagnosis</li>
            <li>Shift linkage adjustment and repair</li>
            <li>Hydraulic clutch system service</li>
            <li>Complete manual transmission rebuild</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>

<section class="why-section" aria-label="Why choose SW Automotive for transmission repair">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Why SW Automotive</span>
      <h2>Honest Transmission Service.<br><span class="text-accent">No Rebuild Unless It's Needed.</span></h2>
    </header>
    <div class="why-grid">
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="search"></i></div>
        <h3>Diagnose Before Recommending</h3>
        <p>We run a complete transmission diagnostic before recommending any repair. Many slipping symptoms are resolved with a fluid service.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-2" data-animate>
        <div class="why-icon"><i data-lucide="wrench"></i></div>
        <h3>Full Rebuild Capability</h3>
        <p>When internal repair is needed, we have the tooling and factory service data to rebuild transmissions correctly — not just swap units.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-3" data-animate>
        <div class="why-icon"><i data-lucide="globe"></i></div>
        <h3>All Makes &amp; Models</h3>
        <p>Asian, Domestic, and European automatics and manuals. CVTs, DCTs, traditional torque converter autos, and conventional manuals.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="file-text"></i></div>
        <h3>Full Transparency</h3>
        <p>Written breakdown of parts and labor before any work begins. If a fluid service might fix it, that's what we'll recommend first.</p>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <path d="M0,20 C480,50 960,0 1440,20 L1440,50 L0,50 Z" fill="#f4f7fa"/>
  </svg>
</div>

<section class="cta-banner" aria-label="Schedule transmission diagnostic">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;"><i data-lucide="clock"></i>&nbsp;Mon–Fri 8 AM – 5 PM</span>
    <h2 style="font-size:clamp(1.8rem,4vw,3rem); margin-bottom:var(--space-lg); text-wrap:balance;">
      Transmission Slipping or Shifting Hard?<br>
      <span class="text-gradient">Get a Diagnostic Before It Gets Worse.</span>
    </h2>
    <p class="prose-centered" style="color:rgba(255,255,255,0.80); margin-bottom:var(--space-xl);">
      What starts as a minor symptom often becomes a major repair if ignored. SW Automotive diagnoses
      transmission issues same-day for most vehicles — and gives you a straight answer on the cost.
    </p>
    <div style="display:flex; gap:var(--space-md); justify-content:center; flex-wrap:wrap;">
      <a href="/contact" class="btn btn-accent">Schedule My Transmission Diagnostic</a>
      <a href="/about" class="btn btn-outline-white">Meet Our Technicians</a>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-secondary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#f4f7fa"/>
  </svg>
</div>

<section class="process-section" aria-label="Transmission repair process at SW Automotive">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">How It Works</span>
      <h2>Transmission Service, <span class="text-accent">Step by Step</span></h2>
    </header>
    <div class="process-row" role="list">
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">01</div>
        <h3>Describe the Problem</h3>
        <p>Tell us when symptoms occur — cold starts, hot driving, specific gears. Detail matters in transmission diagnosis.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-2" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">02</div>
        <h3>Full Transmission Scan</h3>
        <p>We scan transmission-specific codes, check adaptive learning data, and inspect fluid condition and level.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-3" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">03</div>
        <h3>Written Recommendation</h3>
        <p>Fluid service, solenoid replacement, or rebuild — you get an honest recommendation with costs for each option.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">04</div>
        <h3>Repair &amp; Verify</h3>
        <p>Approved work performed, followed by a road test and post-repair scan to verify correct operation.</p>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>

<section class="faq-svc" aria-label="Transmission repair FAQ">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Common Questions</span>
      <h2>Transmission Repair FAQs<br><span class="text-accent">for Manassas Drivers</span></h2>
    </header>
    <div class="faq-svc-wrap" role="list">
      <?php foreach ($serviceFaqs as $idx => $faq): ?>
      <div class="faq-item reveal-up reveal-delay-<?= ($idx % 3) + 1 ?>" data-animate role="listitem">
        <button class="faq-question" aria-expanded="false" aria-controls="faq-tr-<?= $idx ?>">
          <span><?= htmlspecialchars($faq['q']) ?></span>
          <span class="faq-icon" aria-hidden="true"><i data-lucide="plus"></i></span>
        </button>
        <div class="faq-answer" id="faq-tr-<?= $idx ?>" role="region">
          <p><?= htmlspecialchars($faq['a']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <path d="M0,20 C480,50 960,0 1440,20 L1440,50 L0,50 Z" fill="#f4f7fa"/>
  </svg>
</div>

<section class="related-svc-section" aria-label="Other services you may need">
  <div class="container">
    <header class="section-title reveal-up" data-animate><span class="eyebrow-label">Also Available</span><h2>Other Services You May Need</h2></header>
    <div class="services-grid" style="margin-top:var(--space-2xl);">
      <?php
      $tints = ['card-tint-1','card-tint-2','card-tint-3'];
      foreach (array_slice($relatedServices, 0, 3) as $i => $svc):
        $bullets = [
          'automotive-maintenance'   => ['Factory schedules followed','Fluid inspection','200K+ mile longevity'],
          'auto-repair'              => ['All makes & models','Electronic diagnostics','Written estimates'],
          'brake-replacement'        => ['Pads, rotors & calipers','Same-day service','Full inspection'],
          'oil-changes'              => ['Correct grade for engine','Synthetic & blend','No upsells'],
          'diesel-repair'            => ['Fuel system diagnostics','EGR & DEF service','Certified diesel tech'],
          'small-engine-repair'      => ['Mowers & generators','Carb rebuild','Seasonal plans'],
          'light-duty-diesel-repair' => ['Ford, GM, Ram trucks','Injection & turbo','Certified diesel tech'],
        ][$svc['slug']] ?? ['Expert service','All makes','Written estimates'];
      ?>
      <article class="service-card-with-image <?= $tints[$i % 3] ?> reveal-up reveal-delay-<?= $i+1 ?>" data-animate>
        <div class="service-card__image"><img src="<?= htmlspecialchars($svc['photo']) ?>" alt="<?= htmlspecialchars($svc['name']) ?> Manassas VA" width="600" height="360" loading="lazy"></div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true"><i data-lucide="<?= htmlspecialchars($svc['icon']) ?>"></i></div>
          <h3><?= htmlspecialchars($svc['name']) ?></h3>
          <p class="service-card__desc"><?= htmlspecialchars($svc['description']) ?></p>
          <ul><?php foreach ($bullets as $b): ?><li><?= htmlspecialchars($b) ?></li><?php endforeach; ?></ul>
          <a href="/services/<?= htmlspecialchars($svc['slug']) ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="svc-closing-cta" aria-label="Schedule transmission repair in Manassas">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;"><i data-lucide="map-pin"></i>&nbsp;10404 Morias Ct, Manassas VA 20110</span>
    <h2>Don't Let a Fluid Service<br>Turn Into a $4,000 Rebuild.</h2>
    <p>Transmission issues don't improve on their own. SW Automotive diagnoses accurately and recommends the least-invasive repair that solves the problem. Drop in Mon–Fri, 8 AM–5 PM — or submit a free estimate request online.</p>
    <div class="svc-cta-btns">
      <a href="/contact" class="btn btn-accent"><i data-lucide="calendar"></i> Schedule My Diagnostic</a>
      <a href="/services/" class="btn btn-outline-white"><i data-lucide="list"></i> All Services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
