<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$currentService = null;
$relatedServices = [];
foreach ($services as $s) {
    if ($s['slug'] === 'diesel-repair') { $currentService = $s; }
    elseif (count($relatedServices) < 3) { $relatedServices[] = $s; }
}

$pageTitle       = 'Diesel Repair Manassas VA | SW Automotive — Certified Diesel Mechanics';
$pageDescription = 'Expert diesel repair in Manassas, VA. SW Automotive holds Light Duty Diesel certification for fuel systems, EGR, DEF, and turbo service on all diesel trucks. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/diesel-repair/';
$ogImage         = $currentService['photo'];
$currentPage     = 'diesel-repair';
$heroPreloadImage = $ogImage;

$serviceFaqs = [
  ['q' => 'What diesel vehicles do you repair near Manassas VA?',
   'a' => 'We service light and medium-duty diesel vehicles including Ford F-250/F-350 Power Stroke, GM/Chevy Silverado/Sierra Duramax, Ram 2500/3500 Cummins, Volkswagen TDI, Mercedes Sprinter, and other diesel makes. Our certified diesel mechanics serve all of Prince William County.'],
  ['q' => 'Do you service diesel particulate filters (DPF) in Manassas?',
   'a' => 'Yes. SW Automotive performs forced DPF regenerations, DPF cleaning, and DPF replacement. We can also diagnose regen failure causes — including clogged EGR valves, faulty DEF injectors, and NOx sensor failures that prevent proper regeneration.'],
  ['q' => 'How much does diesel repair cost near Manassas?',
   'a' => 'Diesel repair costs vary significantly by job. Injector cleaning runs $150–$300, glow plug replacement $200–$450, EGR valve service $300–$600, and DPF cleaning $250–$500. Complex fuel system work or turbo replacement can run $800–$2,500+. We provide a written estimate before any work begins.'],
  ['q' => 'Can you diagnose diesel check engine lights in Manassas VA?',
   'a' => 'Yes. We use diesel-capable factory scan tools that read manufacturer-specific fault codes beyond generic OBD-II — critical for diesel systems where generic readers miss injector balance rate data, injection timing offsets, and DEF quality readings.'],
];

$schemaMarkup = generateServiceSchema($currentService, $serviceFaqs);
$schemaType   = 'application/ld+json'; // Schema format; rendered by head.php
$canonicalTag = '<link rel="canonical" href="' . $canonicalUrl . '">';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ================================================================
   Diesel Repair — SW Automotive
   Standard Tier ≥200 lines | Techniques: Layered Hero (C1),
   Ken Burns, Dividers (C3), Horizontal Why Cards, Process Steps,
   Signature Brand Grid (C7), FAQ Accordion
================================================================ */
.svc-hero {
  position: relative; min-height: 58vh; display: flex; align-items: center;
  background-size: cover; background-position: center 45%;
  animation: kb-diesel 24s ease-in-out infinite alternate;
}
@keyframes kb-diesel {
  from { background-size: 108%; background-position: center 42%; }
  to   { background-size: 120%; background-position: center 56%; }
}
.svc-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(115deg,
    rgba(var(--color-primary-rgb), 0.95) 0%,
    rgba(var(--color-primary-rgb), 0.78) 44%,
    rgba(var(--color-primary-dark-rgb), 0.50) 100%);
  z-index: 1;
}
.svc-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 1; pointer-events: none;
}
.svc-hero-inner {
  position: relative; z-index: 2; width: 100%;
  max-width: var(--max-width); margin-inline: auto;
  padding: var(--space-3xl) var(--space-lg);
}
.svc-breadcrumb {
  display: flex; align-items: center; gap: 6px;
  font-size: 0.78rem; color: rgba(255,255,255,0.58);
  margin-bottom: var(--space-md); flex-wrap: wrap;
}
.svc-breadcrumb a { color: rgba(255,255,255,0.72); transition: color var(--transition-base); }
.svc-breadcrumb a:hover { color: var(--color-accent); }
.svc-breadcrumb span { color: rgba(255,255,255,0.35); }
.svc-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.4rem, 5.5vw, 4rem); line-height: 1.05;
  color: #fff; text-wrap: balance;
  margin-bottom: var(--space-lg); letter-spacing: -0.01em;
}
.svc-hero h1 .accent-word {
  background: linear-gradient(135deg, var(--color-accent), #6ee7f7);
  -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;
}
.svc-hero-sub {
  font-size: 1.05rem; line-height: 1.70;
  color: rgba(255,255,255,0.82); max-width: 56ch; margin-bottom: var(--space-xl);
}
.svc-hero-actions { display: flex; gap: var(--space-md); flex-wrap: wrap; }
.svc-trust-row { display: flex; gap: var(--space-sm); flex-wrap: wrap; margin-top: var(--space-lg); }
.svc-trust-pill {
  display: inline-flex; align-items: center; gap: 5px;
  padding: 4px 12px; background: rgba(255,255,255,0.07);
  border: 1px solid rgba(255,255,255,0.16); border-radius: var(--radius-full);
  font-size: 0.72rem; font-weight: 600; letter-spacing: 0.06em;
  text-transform: uppercase; color: rgba(255,255,255,0.78);
}
.svc-trust-pill i, .svc-trust-pill svg { width: 11px; height: 11px; color: var(--color-accent); }

.svc-divider { display: block; line-height: 0; overflow: hidden; }
.svc-divider svg { display: block; width: 100%; }

/* Detail */
.svc-detail { padding: var(--space-4xl) var(--space-lg); }
.svc-detail-grid { display: grid; grid-template-columns: 3fr 2fr; gap: var(--space-4xl); align-items: start; }
.svc-detail-text h2 { font-size: clamp(1.8rem, 3.5vw, 2.5rem); color: var(--color-primary); margin-bottom: var(--space-lg); text-wrap: balance; }
.svc-answer-first { font-size: 1.05rem; line-height: 1.75; color: var(--color-text); border-left: 4px solid var(--color-accent); padding-left: var(--space-lg); margin-bottom: var(--space-xl); }
.svc-detail-text p { color: var(--color-text-light); line-height: 1.75; max-width: 65ch; margin-bottom: var(--space-lg); }
.svc-last-updated { font-size: 0.78rem; color: var(--color-gray); margin-top: var(--space-xl); }
.svc-img-wrap { position: relative; border-radius: var(--radius-lg); overflow: hidden; box-shadow: var(--shadow-xl); margin-bottom: var(--space-xl); }
.svc-img-wrap img { width: 100%; height: 300px; object-fit: cover; display: block; transition: transform var(--transition-slow); }
.svc-img-wrap:hover img { transform: scale(1.04); }
.svc-img-wrap::after { content: ''; position: absolute; inset: 0; border: 2px solid rgba(var(--color-accent-rgb),0.20); border-radius: var(--radius-lg); pointer-events: none; }

/* Signature: Diesel Brand Grid */
.diesel-brands-section {
  background: var(--color-bg-dark);
  padding: var(--space-3xl) var(--space-lg);
  position: relative;
  overflow: hidden;
}
.diesel-brands-section::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse at 50% 100%, rgba(var(--color-accent-rgb),0.08) 0%, transparent 65%);
  pointer-events: none;
}
.diesel-brands-section .container { position: relative; z-index: 1; }
.diesel-brands-section h3 { color: #fff; text-align: center; font-size: clamp(1.4rem,3vw,2rem); margin-bottom: var(--space-2xl); text-wrap: balance; }
.diesel-brand-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-md); }
.diesel-brand-card {
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: var(--radius-md);
  padding: var(--space-lg) var(--space-md);
  text-align: center;
  transition: background var(--transition-base), border-color var(--transition-base);
}
.diesel-brand-card:hover { background: rgba(255,255,255,0.09); border-color: rgba(var(--color-accent-rgb),0.30); }
.diesel-brand-card strong { display: block; color: #fff; font-family: var(--font-heading); font-size: 1.1rem; letter-spacing: 0.04em; margin-bottom: 4px; }
.diesel-brand-card span { font-size: 0.78rem; color: rgba(255,255,255,0.48); }

/* Why Cards */
.why-section { background: var(--color-bg-alt); padding: var(--space-4xl) var(--space-lg); }
.why-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: var(--space-lg); margin-top: var(--space-3xl); }
.why-card { background: #fff; border-radius: var(--radius-md); padding: var(--space-xl) var(--space-lg); text-align: center; box-shadow: var(--shadow-sm); transition: transform var(--transition-base), box-shadow var(--transition-base); border-top: 3px solid transparent; }
.why-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-top-color: var(--color-accent); }
.why-icon { width: 50px; height: 50px; border-radius: 50%; background: rgba(var(--color-primary-rgb),0.06); display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); color: var(--color-accent); transition: background var(--transition-base); }
.why-card:hover .why-icon { background: var(--color-primary); }
.why-icon i, .why-icon svg { width: 21px; height: 21px; }
.why-card h3 { font-family: var(--font-heading); font-size: 1.2rem; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.why-card p { font-size: 0.88rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

/* Process */
.process-section { padding: var(--space-4xl) var(--space-lg); }
.process-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 0; margin-top: var(--space-3xl); position: relative; }
.process-row::before { content: ''; position: absolute; top: 27px; left: calc(12.5% + 28px); right: calc(12.5% + 28px); height: 2px; background: linear-gradient(to right, var(--color-accent) 0%, rgba(var(--color-accent-rgb),0.12) 100%); }
.proc-card { text-align: center; padding: var(--space-lg) var(--space-md); }
.proc-num { width: 54px; height: 54px; border-radius: 50%; background: var(--color-primary); color: var(--color-accent); font-family: var(--font-heading); font-size: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-lg); box-shadow: var(--shadow-md); position: relative; z-index: 1; transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base); }
.proc-card:hover .proc-num { transform: scale(1.12); background: var(--color-accent); color: var(--color-primary); }
.proc-card h3 { font-family: var(--font-heading); font-size: 1.15rem; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.proc-card p { font-size: 0.86rem; color: var(--color-text-light); line-height: 1.60; margin: 0; max-width: 22ch; margin-inline: auto; }

.faq-svc { background: var(--color-bg-alt); padding: var(--space-4xl) var(--space-lg); }
.faq-svc-wrap { max-width: 860px; margin-inline: auto; margin-top: var(--space-3xl); }
.related-svc-section { padding: var(--space-4xl) var(--space-lg); }
.svc-closing-cta { background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%); padding: var(--space-4xl) var(--space-lg); text-align: center; position: relative; overflow: hidden; }
.svc-closing-cta::before { content: ''; position: absolute; inset: 0; background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E"); opacity: 0.05; pointer-events: none; }
.svc-closing-cta .container { position: relative; z-index: 1; }
.svc-closing-cta h2 { color: #fff; font-size: clamp(2rem,4vw,3rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.svc-closing-cta p { color: rgba(255,255,255,0.78); max-width: 52ch; margin-inline: auto; margin-bottom: var(--space-xl); line-height: 1.70; }
.svc-cta-btns { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

@media (max-width: 1023px) {
  .svc-detail-grid { grid-template-columns: 1fr; }
  .why-grid { grid-template-columns: repeat(2,1fr); }
  .process-row { grid-template-columns: repeat(2,1fr); }
  .process-row::before { display: none; }
  .diesel-brand-grid { grid-template-columns: repeat(2,1fr); }
}
@media (max-width: 767px) {
  .svc-hero { min-height: 50vh; }
  .svc-hero-actions { flex-direction: column; }
  .svc-hero-actions .btn { width: 100%; justify-content: center; }
  .why-grid { grid-template-columns: 1fr; }
  .process-row { grid-template-columns: 1fr; }
  .diesel-brand-grid { grid-template-columns: repeat(2,1fr); }
  .svc-cta-btns { flex-direction: column; align-items: center; }
  .svc-cta-btns .btn { width: 100%; max-width: 300px; justify-content: center; }
}

/* ================================================================
   ENHANCED COMPONENT STYLES — DIESEL REPAIR
================================================================ */

/* Why card icon hover */
.why-card:hover .why-icon {
  background: var(--color-primary);
  color: #fff;
}
.why-card:hover .why-icon i,
.why-card:hover .why-icon svg {
  color: var(--color-accent);
}

/* Diesel brand card detail */
.diesel-brand-card strong {
  margin-bottom: var(--space-xs);
  letter-spacing: 0.03em;
}
.diesel-brand-card span {
  line-height: 1.4;
}

/* Answer-first block tint */
.svc-answer-first {
  background: rgba(var(--color-accent-rgb), 0.04);
  border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
}

/* FAQ wrapper header centering */
.faq-svc .section-title {
  max-width: 700px;
  margin-inline: auto;
  text-align: center;
}
.faq-svc .section-title .eyebrow-label {
  justify-content: center;
  display: flex;
}

/* Process card text */
.proc-card p {
  text-align: center;
  max-width: 24ch;
  margin-inline: auto;
}

/* Closing CTA eyebrow */
.svc-closing-cta .eyebrow-label {
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}
.svc-cta-btns {
  margin-top: var(--space-xl);
}

/* Focus-visible */
.svc-hero-actions .btn:focus-visible {
  outline: 2px solid var(--color-accent);
  outline-offset: 3px;
}

/* Mobile refinements */
@media (max-width: 767px) {
  .diesel-brand-card {
    padding: var(--space-md) var(--space-sm);
  }
  .diesel-brand-card strong {
    font-size: 1rem;
  }
  .why-card {
    padding: var(--space-lg) var(--space-md);
  }
  .faq-svc .section-title {
    text-align: left;
  }
  .faq-svc .section-title .eyebrow-label {
    justify-content: flex-start;
  }
  .svc-closing-cta {
    padding: var(--space-3xl) var(--space-md);
  }
}
</style>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<section class="svc-hero" style="background-image: url('<?= htmlspecialchars($ogImage) ?>');" aria-label="Diesel repair in Manassas VA">
  <div class="svc-hero-inner">
    <nav class="svc-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span>›</span><a href="/services/">Services</a><span>›</span>
      <span aria-current="page">Diesel Repair</span>
    </nav>
    <h1>Diesel Repair in<br><span class="accent-word">Manassas, VA</span></h1>
    <p class="svc-hero-sub">
      Certified diesel mechanics for every truck in Prince William County.
      Fuel systems, EGR, DEF, DPF, injectors, turbos — diagnosed correctly with
      dealer-grade scan tools, repaired right the first time.
    </p>
    <div class="svc-hero-actions">
      <a href="/contact" class="btn btn-accent"><i data-lucide="clipboard-list"></i> Get a Free Diesel Estimate</a>
      <a href="/services/" class="btn btn-outline-white"><i data-lucide="arrow-left"></i> All Services</a>
    </div>
    <div class="svc-trust-row">
      <span class="svc-trust-pill"><i data-lucide="check-circle"></i> Diesel Certified</span>
      <span class="svc-trust-pill"><i data-lucide="truck"></i> All Diesel Makes</span>
      <span class="svc-trust-pill"><i data-lucide="shield"></i> Written Estimates</span>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-primary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#ffffff"/>
  </svg>
</div>

<section class="svc-detail" aria-label="About diesel repair at SW Automotive">
  <div class="container">
    <div class="svc-detail-grid">
      <div class="svc-detail-text" data-animate>
        <span class="eyebrow-label">Diesel Repair Manassas VA</span>
        <h2>Diesel Engines Demand Technicians Who Specialize — Not Generalize</h2>
        <p class="svc-answer-first">
          SW Automotive holds a Light Duty Diesel certification and services diesel pickup trucks
          and commercial vehicles throughout Manassas and Prince William County. We diagnose
          diesel-specific fault systems that generic shops simply can't read.
        </p>
        <p>
          Diesel engines operate on fundamentally different principles than gasoline engines —
          higher compression ratios, precision injection timing measured in microseconds, complex
          emissions aftertreatment systems, and high-pressure fuel rails that require specialized
          handling. A misdiagnosis doesn't just mean a return visit; it can mean catastrophic
          injector damage or blocked DPF systems.
        </p>
        <p>
          Our diesel scan capability goes beyond basic OBD-II codes. We read injection balance
          rates, pilot injection data, DEF quality sensor inputs, NOx sensor readings, and
          real-time fuel pressure data that tell the actual story of what your diesel is doing.
          We have diagnosed diesel issues that two previous shops missed entirely — including
          a Ram 2500 that was misdiagnosed as a fuel pump when the root cause was a failing
          injector return line causing back-pressure collapse.
        </p>
        <p class="svc-last-updated">Last Updated: April 2026</p>
      </div>
      <div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489126638-f4l6be-483962234_666123242659560_7431100441034816467_n.jpg"
            alt="Diesel truck being serviced at SW Automotive in Manassas VA" width="600" height="300" loading="lazy">
        </div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489125528-v0msw7-574610223_855128843758998_4100558135674674243_n.jpg"
            alt="Heavy duty diesel vehicle in the SW Automotive service bay Manassas" width="600" height="300" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#0e1822"/>
  </svg>
</div>

<!-- Signature Section: Diesel Brand Grid -->
<section class="diesel-brands-section" aria-label="Diesel brands we service">
  <div class="container">
    <h3>Diesel Trucks We Service in Manassas &amp; Prince William County</h3>
    <div class="diesel-brand-grid">
      <div class="diesel-brand-card"><strong>Ford Power Stroke</strong><span>F-250, F-350, F-450 — 6.0, 6.4, 6.7L</span></div>
      <div class="diesel-brand-card"><strong>GM Duramax</strong><span>Silverado/Sierra 2500HD/3500HD — all generations</span></div>
      <div class="diesel-brand-card"><strong>Ram Cummins</strong><span>2500/3500 — 5.9L, 6.7L inline-six</span></div>
      <div class="diesel-brand-card"><strong>VW TDI</strong><span>Jetta, Passat, Golf, Tiguan diesel</span></div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#0e1822;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#f4f7fa"/>
  </svg>
</div>

<section class="why-section" aria-label="Why choose SW Automotive for diesel repair">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Our Diesel Expertise</span>
      <h2>Hard to Find a Shop That<br><span class="text-accent">Actually Knows Diesel</span></h2>
    </header>
    <div class="why-grid">
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="cpu"></i></div>
        <h3>Diesel Scan Capability</h3>
        <p>Dealer-grade tools reading injection balance rates, DEF quality, and NOx sensor data that generic readers miss.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-2" data-animate>
        <div class="why-icon"><i data-lucide="shield-check"></i></div>
        <h3>Light Duty Certified</h3>
        <p>Certified in light duty diesel systems — not just ASE general. The right credentials for pickup truck diesel work.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-3" data-animate>
        <div class="why-icon"><i data-lucide="fuel"></i></div>
        <h3>Fuel System Specialists</h3>
        <p>High-pressure common rail injection, injector testing, return line diagnosis, lift pump issues — we handle it all.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="file-text"></i></div>
        <h3>Straight Estimates</h3>
        <p>Diesel jobs can get expensive. We give you a written breakdown before any work begins — no surprises.</p>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>

<section class="cta-banner" aria-label="Schedule diesel repair">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;"><i data-lucide="truck"></i>&nbsp;Serving Manassas &amp; Prince William County</span>
    <h2 style="font-size:clamp(1.8rem,4vw,3rem); margin-bottom:var(--space-lg); text-wrap:balance;">
      Diesel Problem That Two Shops Couldn't Figure Out?<br>
      <span class="text-gradient">Bring It to Us.</span>
    </h2>
    <p class="prose-centered" style="color:rgba(255,255,255,0.80); margin-bottom:var(--space-xl);">
      We diagnose diesel faults that generic scan tools can't read. Drop in Mon–Fri 8 AM–5 PM or
      submit a request online and describe what your truck is doing.
    </p>
    <div style="display:flex; gap:var(--space-md); justify-content:center; flex-wrap:wrap;">
      <a href="/contact" class="btn btn-accent">Get My Free Diesel Estimate</a>
      <a href="/about" class="btn btn-outline-white">Meet Our Diesel Team</a>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-secondary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>

<section class="process-section" aria-label="How diesel repair works at SW Automotive">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Our Process</span>
      <h2>Diesel Diagnosis &amp; Repair,<br><span class="text-accent">Done Right</span></h2>
    </header>
    <div class="process-row" role="list">
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">01</div>
        <h3>Bring In Your Truck</h3>
        <p>Drop off Mon–Fri, 8 AM–5 PM. Describe the symptoms in detail.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-2" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">02</div>
        <h3>Diesel Diagnostic</h3>
        <p>Factory-capable scan tools read diesel-specific data beyond standard OBD-II codes.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-3" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">03</div>
        <h3>Written Estimate</h3>
        <p>You see the exact cost for parts and labor before we perform any work.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">04</div>
        <h3>Repair &amp; Retest</h3>
        <p>Diesel-specific repair performed, verified with a post-repair scan and road test.</p>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <path d="M0,25 C360,50 720,0 1080,25 C1260,38 1380,18 1440,20 L1440,50 L0,50 Z" fill="#f4f7fa"/>
  </svg>
</div>

<section class="faq-svc" aria-label="Diesel repair FAQ">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Common Questions</span>
      <h2>Diesel Repair FAQs for<br><span class="text-accent">Manassas Truck Owners</span></h2>
    </header>
    <div class="faq-svc-wrap" role="list">
      <?php foreach ($serviceFaqs as $idx => $faq): ?>
      <div class="faq-item reveal-up reveal-delay-<?= ($idx % 3) + 1 ?>" data-animate role="listitem">
        <button class="faq-question" aria-expanded="false" aria-controls="faq-ds-<?= $idx ?>">
          <span><?= htmlspecialchars($faq['q']) ?></span>
          <span class="faq-icon" aria-hidden="true"><i data-lucide="plus"></i></span>
        </button>
        <div class="faq-answer" id="faq-ds-<?= $idx ?>" role="region">
          <p><?= htmlspecialchars($faq['a']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
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
          'light-duty-diesel-repair' => ['Ford, GM, Ram trucks','Injection & turbo','Certified diesel tech'],
          'brake-replacement'        => ['Pads, rotors & calipers','Same-day service','Full inspection'],
          'oil-changes'              => ['Correct grade for diesel','Synthetic & blend','No upsells'],
          'transmission-repair'      => ['Auto & manual service','Fluid flush & rebuild','All makes'],
          'small-engine-repair'      => ['Mowers & generators','Carb rebuild','Seasonal plans'],
        ][$svc['slug']] ?? ['Expert service','All makes','Written estimates'];
      ?>
      <article class="service-card-with-image <?= $tints[$i % 3] ?> reveal-up reveal-delay-<?= $i+1 ?>" data-animate>
        <div class="service-card__image"><img alt="<?= htmlspecialchars($svc['name']) ?> Manassas VA" src="<?= htmlspecialchars($svc['photo']) ?>" width="600" height="360" loading="lazy"></div>
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

<section class="svc-closing-cta" aria-label="Get your free diesel repair estimate">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;"><i data-lucide="map-pin"></i>&nbsp;10404 Morias Ct, Manassas VA 20110</span>
    <h2>Worth the Drive From<br>Woodbridge, Gainesville, or Haymarket.</h2>
    <p>Hard to find a certified diesel shop in Prince William County. SW Automotive is that shop. Drop in Mon–Fri, 8 AM–5 PM — or submit a free estimate request and we'll follow up same day.</p>
    <div class="svc-cta-btns">
      <a href="/contact" class="btn btn-accent"><i data-lucide="calendar"></i> Schedule My Diesel Repair</a>
      <a href="/services/light-duty-diesel-repair/" class="btn btn-outline-white">Light Duty Diesel &rarr;</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
