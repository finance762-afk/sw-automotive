<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$currentService = null;
$relatedServices = [];
foreach ($services as $s) {
    if ($s['slug'] === 'auto-repair') { $currentService = $s; }
    elseif (count($relatedServices) < 3) { $relatedServices[] = $s; }
}

$pageTitle       = 'Auto Repair Manassas VA | SW Automotive — All Makes & Models, ASE Certified';
$pageDescription = 'Full-service auto repair in Manassas, VA. SW Automotive diagnoses and fixes every make and model with 27 years of dealership experience. Free written estimates. ASE certified technicians.';
$canonicalUrl    = $siteUrl . '/services/auto-repair/';
$ogImage         = $currentService['photo'];
$currentPage     = 'auto-repair';
$heroPreloadImage = $ogImage;

$serviceFaqs = [
  ['q' => 'What types of auto repair do you handle in Manassas VA?',
   'a' => 'SW Automotive handles the full scope of automotive repair — engine diagnostics, electrical and wiring faults, drivetrain and axle service, suspension and steering, cooling system repair, exhaust, emissions, fuel system, A/C service, and more. We service Asian, Domestic, and European makes.'],
  ['q' => 'How long does auto repair typically take in Manassas?',
   'a' => 'Simple repairs (brake pads, belts, sensors) are often completed same-day. Complex jobs like head gaskets or transmission rebuilds typically take 2–4 business days. We give you a realistic timeline with your written estimate so there are no surprises.'],
  ['q' => 'Do you guarantee your auto repair work?',
   'a' => 'Yes. All repairs performed at SW Automotive are backed by a parts and labor warranty. Warranty terms vary by repair type — ask our technicians for specifics when you receive your written estimate.'],
  ['q' => 'How much does a diagnostic scan cost at SW Automotive?',
   'a' => 'Diagnostic scans start at $95 for standard OBD-II codes. Complex multi-system diagnostics (ADAS, hybrid, multi-module faults) may require additional time and are quoted before we begin. The diagnostic fee is typically credited toward repair costs when you proceed with the work.'],
];

$schemaMarkup = generateServiceSchema($currentService, $serviceFaqs);
$schemaType   = 'application/ld+json'; // Schema format; rendered by head.php
$canonicalTag = '<link rel="canonical" href="' . $canonicalUrl . '">';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ================================================================
   Auto Repair Page — SW Automotive
   Standard Tier ≥200 lines | Techniques: Layered Hero (C1),
   Ken Burns, Dividers (C3), 3-col Why Grid, Connected Process,
   Signature Editorial Section (C7), FAQ Accordion
================================================================ */

/* Hero -------------------------------------------------------- */
.svc-hero {
  position: relative;
  min-height: 58vh;
  display: flex;
  align-items: center;
  background-size: cover;
  background-position: center 35%;
  animation: kb-ar 24s ease-in-out infinite alternate;
}
@keyframes kb-ar {
  from { background-size: 108%; background-position: center 32%; }
  to   { background-size: 120%; background-position: center 50%; }
}
.svc-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(100deg,
    rgba(var(--color-primary-rgb), 0.96) 0%,
    rgba(var(--color-primary-rgb), 0.76) 42%,
    rgba(var(--color-primary-dark-rgb), 0.48) 100%
  );
  z-index: 1;
}
.svc-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 1;
  pointer-events: none;
}
.svc-hero-inner {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: var(--max-width);
  margin-inline: auto;
  padding: var(--space-3xl) var(--space-lg);
  display: grid;
  grid-template-columns: 1fr;
  max-width: 900px;
}
.svc-breadcrumb {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 0.78rem;
  color: rgba(255,255,255,0.58);
  margin-bottom: var(--space-md);
  flex-wrap: wrap;
}
.svc-breadcrumb a { color: rgba(255,255,255,0.72); transition: color var(--transition-base); }
.svc-breadcrumb a:hover { color: var(--color-accent); }
.svc-breadcrumb span { color: rgba(255,255,255,0.35); }
.svc-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.6rem, 6vw, 4.4rem);
  line-height: 1.03;
  color: #fff;
  text-wrap: balance;
  margin-bottom: var(--space-lg);
  letter-spacing: -0.01em;
}
.svc-hero h1 .accent-word {
  background: linear-gradient(135deg, var(--color-accent), #6ee7f7);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.svc-hero-sub {
  font-size: 1.1rem;
  line-height: 1.70;
  color: rgba(255,255,255,0.84);
  max-width: 60ch;
  margin-bottom: var(--space-xl);
}
.svc-hero-actions { display: flex; gap: var(--space-md); flex-wrap: wrap; }
.svc-trust-row { display: flex; gap: var(--space-sm); flex-wrap: wrap; margin-top: var(--space-lg); }
.svc-trust-pill {
  display: inline-flex; align-items: center; gap: 5px;
  padding: 4px 12px;
  background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.16);
  border-radius: var(--radius-full);
  font-size: 0.72rem; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase;
  color: rgba(255,255,255,0.78);
}
.svc-trust-pill i, .svc-trust-pill svg { width: 11px; height: 11px; color: var(--color-accent); }

/* Divider */
.svc-divider { display: block; line-height: 0; overflow: hidden; }
.svc-divider svg { display: block; width: 100%; }

/* Detail Section (full-width editorial) ----------------------- */
.svc-detail { padding: var(--space-4xl) var(--space-lg); }
.svc-detail-split {
  display: grid;
  grid-template-columns: 2fr 1fr;
  gap: var(--space-4xl);
  align-items: start;
}
.svc-detail-text h2 {
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.svc-answer-first {
  font-size: 1.05rem;
  line-height: 1.75;
  color: var(--color-text);
  border-left: 4px solid var(--color-accent);
  padding-left: var(--space-lg);
  margin-bottom: var(--space-xl);
}
.svc-detail-text p {
  color: var(--color-text-light);
  line-height: 1.75;
  max-width: 65ch;
  margin-bottom: var(--space-lg);
}
.svc-capabilities {
  background: rgba(var(--color-primary-rgb), 0.03);
  border: 1px solid rgba(var(--color-primary-rgb), 0.10);
  border-radius: var(--radius-md);
  padding: var(--space-xl);
  margin-top: var(--space-xl);
}
.svc-capabilities h3 {
  font-family: var(--font-heading);
  font-size: 1.15rem;
  color: var(--color-primary);
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.svc-cap-list {
  list-style: none;
  padding: 0;
  margin: 0;
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-xs) var(--space-lg);
}
.svc-cap-list li {
  font-size: 0.88rem;
  color: var(--color-text-light);
  padding-left: 1.2rem;
  position: relative;
}
.svc-cap-list li::before { content: '•'; color: var(--color-accent); position: absolute; left: 0.25rem; font-weight: 700; }
.svc-img-wrap {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  margin-bottom: var(--space-xl);
}
.svc-img-wrap img {
  width: 100%;
  height: 280px;
  object-fit: cover;
  display: block;
  transition: transform var(--transition-slow);
}
.svc-img-wrap:hover img { transform: scale(1.04); }
.svc-img-wrap::after {
  content: '';
  position: absolute;
  inset: 0;
  border: 2px solid rgba(var(--color-accent-rgb), 0.20);
  border-radius: var(--radius-lg);
  pointer-events: none;
}
.svc-last-updated { font-size: 0.78rem; color: var(--color-gray); margin-top: var(--space-xl); }

/* Why Choose Us (3-col) --------------------------------------- */
.why-section { background: var(--color-bg-alt); padding: var(--space-4xl) var(--space-lg); }
.why-grid-3 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-xl);
  margin-top: var(--space-3xl);
}
.why-card-h {
  background: #fff;
  border-radius: var(--radius-md);
  padding: var(--space-xl);
  display: flex;
  gap: var(--space-lg);
  align-items: flex-start;
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.why-card-h:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
.why-icon-circle {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  background: rgba(var(--color-primary-rgb), 0.07);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  color: var(--color-accent);
}
.why-icon-circle i, .why-icon-circle svg { width: 20px; height: 20px; }
.why-card-h h3 { font-family: var(--font-heading); font-size: 1.15rem; color: var(--color-primary); margin-bottom: var(--space-xs); text-wrap: balance; }
.why-card-h p { font-size: 0.87rem; color: var(--color-text-light); line-height: 1.60; margin: 0; }

/* Process Steps ----------------------------------------------- */
.process-section { padding: var(--space-4xl) var(--space-lg); }
.process-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0;
  margin-top: var(--space-3xl);
  position: relative;
}
.process-row::before {
  content: '';
  position: absolute;
  top: 27px;
  left: calc(12.5% + 28px);
  right: calc(12.5% + 28px);
  height: 2px;
  background: linear-gradient(to right, var(--color-accent) 0%, rgba(var(--color-accent-rgb),0.12) 100%);
}
.proc-card { text-align: center; padding: var(--space-lg) var(--space-md); }
.proc-num {
  width: 54px; height: 54px; border-radius: 50%;
  background: var(--color-primary);
  color: var(--color-accent);
  font-family: var(--font-heading); font-size: 1.25rem;
  display: flex; align-items: center; justify-content: center;
  margin: 0 auto var(--space-lg);
  box-shadow: var(--shadow-md); position: relative; z-index: 1;
  transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base);
}
.proc-card:hover .proc-num { transform: scale(1.12); background: var(--color-accent); color: var(--color-primary); }
.proc-card h3 { font-family: var(--font-heading); font-size: 1.15rem; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.proc-card p { font-size: 0.86rem; color: var(--color-text-light); line-height: 1.60; margin: 0; max-width: 22ch; margin-inline: auto; }

/* FAQ --------------------------------------------------------- */
.faq-svc { background: var(--color-bg-alt); padding: var(--space-4xl) var(--space-lg); }
.faq-svc-wrap { max-width: 860px; margin-inline: auto; margin-top: var(--space-3xl); }

/* Related & CTA shared */
.related-svc-section { padding: var(--space-4xl) var(--space-lg); }
.svc-closing-cta {
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%);
  padding: var(--space-4xl) var(--space-lg); text-align: center; position: relative; overflow: hidden;
}
.svc-closing-cta::before {
  content: '';
  position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.05; pointer-events: none;
}
.svc-closing-cta .container { position: relative; z-index: 1; }
.svc-closing-cta h2 { color: #fff; font-size: clamp(2rem,4vw,3rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.svc-closing-cta p { color: rgba(255,255,255,0.78); max-width: 52ch; margin-inline: auto; margin-bottom: var(--space-xl); line-height: 1.70; }
.svc-cta-btns { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* Responsive -------------------------------------------------- */
@media (max-width: 1023px) {
  .svc-detail-split { grid-template-columns: 1fr; }
  .why-grid-3 { grid-template-columns: 1fr 1fr; }
  .process-row { grid-template-columns: repeat(2,1fr); }
  .process-row::before { display: none; }
}
@media (max-width: 767px) {
  .svc-hero { min-height: 52vh; }
  .svc-hero-actions { flex-direction: column; }
  .svc-hero-actions .btn { width: 100%; justify-content: center; }
  .why-grid-3 { grid-template-columns: 1fr; }
  .process-row { grid-template-columns: 1fr; }
  .svc-cap-list { grid-template-columns: 1fr; }
  .svc-cta-btns { flex-direction: column; align-items: center; }
  .svc-cta-btns .btn { width: 100%; max-width: 300px; justify-content: center; }
}
</style>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<section
  class="svc-hero"
  style="background-image: url('<?= htmlspecialchars($ogImage) ?>');"
  aria-label="Auto repair in Manassas VA"
>
  <div class="svc-hero-inner">
    <nav class="svc-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span>›</span>
      <a href="/services/">Services</a><span>›</span>
      <span aria-current="page">Auto Repair</span>
    </nav>
    <h1>Auto Repair in<br><span class="accent-word">Manassas, VA</span></h1>
    <p class="svc-hero-sub">
      Full-service automotive repair for every make and model — from a check-engine light
      to a drivetrain rebuild. Our ASE certified technicians use factory-level scan tools
      and 27 years of dealership diagnostic experience to find the actual problem, not
      just clear the code.
    </p>
    <div class="svc-hero-actions">
      <a href="/contact" class="btn btn-accent">
        <i data-lucide="clipboard-list"></i>
        Get a Free Estimate
      </a>
      <a href="/services/" class="btn btn-outline-white">
        <i data-lucide="arrow-left"></i>
        All Services
      </a>
    </div>
    <div class="svc-trust-row">
      <span class="svc-trust-pill"><i data-lucide="check-circle"></i> ASE Certified</span>
      <span class="svc-trust-pill"><i data-lucide="car"></i> All Makes &amp; Models</span>
      <span class="svc-trust-pill"><i data-lucide="file-text"></i> Written Estimates</span>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-primary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#ffffff"/>
  </svg>
</div>

<section class="svc-detail" aria-label="About auto repair at SW Automotive">
  <div class="container">
    <div class="svc-detail-split">
      <div class="svc-detail-text" data-animate>
        <span class="eyebrow-label">Auto Repair Manassas VA</span>
        <h2>When Something's Wrong With Your Car, You Need a Straight Answer</h2>
        <p class="svc-answer-first">
          SW Automotive provides complete auto repair for every vehicle type — from routine fixes
          to complex multi-system failures. We diagnose correctly the first time using factory-spec
          scan tools and 27 years of dealership training, then give you a written estimate before
          any work begins.
        </p>
        <p>
          Too many Manassas drivers have experienced the frustration of paying for a repair that
          didn't fix the problem. That happens when a shop guesses instead of diagnoses. Our lead
          technician spent nearly three decades at Nissan dealerships — the kind of experience that
          means he's seen the same symptom present as 40 different root causes and learned to
          distinguish them.
        </p>
        <p>
          Whether your car runs a European CANBUS system, a Japanese VVT engine, or an American
          pushrod V8, SW Automotive has the training and equipment to handle it right. We service
          Toyota, Honda, Nissan, Hyundai, Ford, Chevrolet, GMC, Dodge, BMW, Mercedes-Benz,
          Volkswagen, Audi, Subaru, and more.
        </p>
        <div class="svc-capabilities" aria-label="Repair capabilities">
          <h3>What We Fix in Manassas</h3>
          <ul class="svc-cap-list">
            <li>Check engine light diagnosis</li>
            <li>Engine repair &amp; replacement</li>
            <li>Electrical &amp; wiring faults</li>
            <li>Cooling system &amp; overheating</li>
            <li>Fuel system &amp; injectors</li>
            <li>Suspension &amp; steering</li>
            <li>Drivetrain &amp; axle service</li>
            <li>A/C &amp; heat service</li>
            <li>Exhaust &amp; emissions</li>
            <li>Timing belts &amp; chains</li>
            <li>Head gasket repair</li>
            <li>Hybrid system repair</li>
          </ul>
        </div>
        <p class="svc-last-updated">Last Updated: April 2026</p>
      </div>
      <div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img
            src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489129128-tvaas5-480214652_661491616439862_5774994120961816785_n.jpg"
            alt="SW Automotive technician diagnosing a vehicle in the Manassas VA shop"
            width="600" height="280"
            loading="lazy"
          >
        </div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img
            src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489124708-tbcbgr-2020-08-21.jpg"
            alt="Vehicle engine bay being serviced at SW Automotive in Manassas"
            width="600" height="280"
            loading="lazy"
          >
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

<section class="why-section" aria-label="Why choose SW Automotive for auto repair">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Why SW Automotive</span>
      <h2>Repair That Fixes the <span class="text-accent">Actual Problem</span></h2>
    </header>
    <div class="why-grid-3">
      <div class="why-card-h reveal-up reveal-delay-1" data-animate>
        <div class="why-icon-circle"><i data-lucide="cpu"></i></div>
        <div>
          <h3>Factory-Level Diagnostics</h3>
          <p>We use OEM-compatible scan tools that read the same data as a dealership — not a $50 code reader from a parts store.</p>
        </div>
      </div>
      <div class="why-card-h reveal-up reveal-delay-2" data-animate>
        <div class="why-icon-circle"><i data-lucide="globe"></i></div>
        <div>
          <h3>Every Make &amp; Model</h3>
          <p>Asian, Domestic, and European vehicles. If it has four wheels and an engine, our technicians have the training to fix it.</p>
        </div>
      </div>
      <div class="why-card-h reveal-up reveal-delay-3" data-animate>
        <div class="why-icon-circle"><i data-lucide="file-text"></i></div>
        <div>
          <h3>Written Estimates First</h3>
          <p>You get a line-by-line breakdown of parts and labor before we do anything. No work begins without your explicit approval.</p>
        </div>
      </div>
      <div class="why-card-h reveal-up reveal-delay-1" data-animate>
        <div class="why-icon-circle"><i data-lucide="award"></i></div>
        <div>
          <h3>ASE Certified Team</h3>
          <p>Every technician holds ASE certification. Our lead tech brings 27 years of Nissan dealership experience to every repair.</p>
        </div>
      </div>
      <div class="why-card-h reveal-up reveal-delay-2" data-animate>
        <div class="why-icon-circle"><i data-lucide="shield"></i></div>
        <div>
          <h3>Repair Warranty</h3>
          <p>All repairs are backed by a parts and labor warranty. We stand behind the work we perform — no questions asked.</p>
        </div>
      </div>
      <div class="why-card-h reveal-up reveal-delay-3" data-animate>
        <div class="why-icon-circle"><i data-lucide="message-circle"></i></div>
        <div>
          <h3>Plain-Language Communication</h3>
          <p>We explain what's wrong, why it matters, and what it costs in language anyone can understand — never in jargon designed to confuse.</p>
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

<section class="cta-banner" aria-label="Get your free repair estimate">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;">
      <i data-lucide="clock"></i>&nbsp;Mon–Fri 8 AM – 5 PM
    </span>
    <h2 style="font-size:clamp(1.8rem,4vw,3rem); margin-bottom:var(--space-lg); text-wrap:balance;">
      Bring It In. We'll Tell You<br>
      <span class="text-gradient">Exactly What's Wrong.</span>
    </h2>
    <p class="prose-centered" style="color:rgba(255,255,255,0.80); margin-bottom:var(--space-xl);">
      Same-day diagnostics for most vehicles. Drop in or schedule online — we give you a written
      estimate within hours, not days. 10404 Morias Ct, Manassas VA 20110.
    </p>
    <div style="display:flex; gap:var(--space-md); justify-content:center; flex-wrap:wrap;">
      <a href="/contact" class="btn btn-accent">Schedule My Repair</a>
      <a href="/about" class="btn btn-outline-white">Meet Our Technicians</a>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-secondary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>

<section class="process-section" aria-label="How auto repair works at SW Automotive">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Our Process</span>
      <h2>From Drop-Off to Drive Away,<br><span class="text-accent">Here's What Happens</span></h2>
    </header>
    <div class="process-row" role="list">
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">01</div>
        <h3>Drop Off</h3>
        <p>Bring your vehicle in Mon–Fri, 8 AM–5 PM. Describe the symptoms — we listen carefully.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-2" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">02</div>
        <h3>Full Diagnostic</h3>
        <p>Factory scan tools and a physical inspection identify the root cause, not just the symptom.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-3" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">03</div>
        <h3>Written Estimate</h3>
        <p>You get a detailed parts-and-labor quote. You approve it — or you drive home with no charge for refusing.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">04</div>
        <h3>Repair &amp; Verify</h3>
        <p>We complete the approved work, road-test the vehicle, and verify the repair before you pick it up.</p>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <path d="M0,25 C360,50 720,0 1080,25 C1260,38 1380,18 1440,20 L1440,50 L0,50 Z" fill="#f4f7fa"/>
  </svg>
</div>

<section class="faq-svc" aria-label="Auto repair FAQ">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Common Questions</span>
      <h2>Auto Repair FAQs for<br><span class="text-accent">Manassas Drivers</span></h2>
    </header>
    <div class="faq-svc-wrap" role="list">
      <?php foreach ($serviceFaqs as $idx => $faq): ?>
      <div class="faq-item reveal-up reveal-delay-<?= ($idx % 3) + 1 ?>" data-animate role="listitem">
        <button class="faq-question" aria-expanded="false" aria-controls="faq-ar-<?= $idx ?>">
          <span><?= htmlspecialchars($faq['q']) ?></span>
          <span class="faq-icon" aria-hidden="true"><i data-lucide="plus"></i></span>
        </button>
        <div class="faq-answer" id="faq-ar-<?= $idx ?>" role="region">
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
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Also Available</span>
      <h2>Other Services You May Need</h2>
    </header>
    <div class="services-grid" style="margin-top:var(--space-2xl);">
      <?php
      $tints = ['card-tint-1','card-tint-2','card-tint-3'];
      foreach (array_slice($relatedServices, 0, 3) as $i => $svc):
        $bullets = [
          'automotive-maintenance'   => ['Factory schedules followed','Fluid inspection & replacement','200K+ mile longevity'],
          'brake-replacement'        => ['Pads, rotors & calipers','Same-day service','Full system inspection'],
          'oil-changes'              => ['Correct grade for engine','Synthetic, blend & diesel','No upsells'],
          'transmission-repair'      => ['Auto & manual service','Fluid flush & rebuild','All makes & models'],
          'diesel-repair'            => ['Fuel system diagnostics','EGR & DEF service','Certified diesel tech'],
          'small-engine-repair'      => ['Mowers & generators','Carb rebuild & tuning','Seasonal plans'],
          'light-duty-diesel-repair' => ['Ford, GM, Ram trucks','Injection & turbo service','Certified diesel tech'],
        ][$svc['slug']] ?? ['Expert service','All makes & models','Written estimates'];
      ?>
      <article class="service-card-with-image <?= $tints[$i % 3] ?> reveal-up reveal-delay-<?= $i+1 ?>" data-animate>
        <div class="service-card__image">
          <img alt="<?= htmlspecialchars($svc['name']) ?> Manassas VA" src="<?= htmlspecialchars($svc['photo']) ?>" width="600" height="360" loading="lazy">
        </div>
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

<section class="svc-closing-cta" aria-label="Get your free auto repair estimate">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;">
      <i data-lucide="map-pin"></i>&nbsp;10404 Morias Ct, Manassas VA 20110
    </span>
    <h2>Stop Guessing. Start Knowing<br>What's Wrong With Your Car.</h2>
    <p>
      SW Automotive delivers same-day diagnostics for most vehicles and written estimates
      before any work begins. Drop in Mon–Fri, 8 AM–5 PM — or submit a free estimate
      request online and we'll call you within the hour.
    </p>
    <div class="svc-cta-btns">
      <a href="/contact" class="btn btn-accent">
        <i data-lucide="calendar"></i>
        Get My Free Estimate
      </a>
      <a href="/services/" class="btn btn-outline-white">
        <i data-lucide="list"></i>
        All Services
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
