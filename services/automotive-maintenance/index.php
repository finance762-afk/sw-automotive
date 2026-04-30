<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ================================================================
   SW Automotive — Automotive Maintenance Service Page
================================================================ */

$currentService = null;
$relatedServices = [];
foreach ($services as $s) {
    if ($s['slug'] === 'automotive-maintenance') { $currentService = $s; }
    elseif (count($relatedServices) < 3) { $relatedServices[] = $s; }
}

$pageTitle       = 'Automotive Maintenance Manassas VA | SW Automotive — Factory-Level Service';
$pageDescription = 'Comprehensive automotive maintenance in Manassas, VA. SW Automotive follows factory schedules to keep your vehicle running past 200,000 miles. ASE certified. All makes & models.';
$canonicalUrl    = $siteUrl . '/services/automotive-maintenance/';
$ogImage         = $currentService['photo'];
$currentPage     = 'automotive-maintenance';
$heroPreloadImage = $ogImage;

$serviceFaqs = [
  ['q' => 'How often should I get automotive maintenance in Manassas?',
   'a' => 'Most manufacturers recommend service every 5,000–7,500 miles for oil changes and a full inspection every 15,000–30,000 miles. SW Automotive pulls your factory maintenance schedule by VIN and tells you exactly what your vehicle needs — no guessing, no selling services you don\'t need yet.'],
  ['q' => 'What does a full maintenance service at SW Automotive include?',
   'a' => 'A full service covers oil and filter change, tire rotation, brake inspection, fluid level checks and top-offs, belt and hose inspection, battery test, and a 20-point vehicle health check. We give you a written report of everything we find.'],
  ['q' => 'How much does automotive maintenance cost in Manassas VA?',
   'a' => 'Basic maintenance (oil change + inspection) starts around $60–$95 depending on oil type. Full 30,000-mile service packages typically run $150–$350. We provide a written estimate before any work begins — you approve the cost first.'],
  ['q' => 'Can you service hybrid vehicles for maintenance in Manassas?',
   'a' => 'Yes. SW Automotive holds certified training in hybrid systems and services Toyota Prius, Honda Accord Hybrid, Hyundai Ioniq, Ford Fusion Hybrid, and more. Hybrid maintenance includes the same standard items plus high-voltage system inspection.'],
];

$schemaMarkup = generateServiceSchema($currentService, $serviceFaqs);
$schemaType   = 'application/ld+json'; // Schema format; rendered by head.php
$canonicalTag = '<link rel="canonical" href="' . $canonicalUrl . '">';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ================================================================
   Automotive Maintenance — SW Automotive
   Standard Tier ≥200 lines | Techniques: Layered Hero (C1),
   Ken Burns, Dividers (C3), Why-Cards, Process Steps,
   Image Composition (C11), FAQ Accordion
================================================================ */

/* Hero -------------------------------------------------------- */
.svc-hero {
  position: relative;
  min-height: 56vh;
  display: flex;
  align-items: center;
  background-size: cover;
  background-position: center 40%;
  animation: kb-maint 22s ease-in-out infinite alternate;
}
@keyframes kb-maint {
  from { background-size: 107%; background-position: center 38%; }
  to   { background-size: 118%; background-position: center 52%; }
}
.svc-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(108deg,
    rgba(var(--color-primary-rgb), 0.93) 0%,
    rgba(var(--color-primary-rgb), 0.75) 46%,
    rgba(var(--color-primary-dark-rgb), 0.50) 100%
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
  font-size: clamp(2.4rem, 5.5vw, 4rem);
  line-height: 1.05;
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
  font-size: 1.05rem;
  line-height: 1.70;
  color: rgba(255,255,255,0.82);
  max-width: 56ch;
  margin-bottom: var(--space-xl);
}
.svc-hero-actions { display: flex; gap: var(--space-md); flex-wrap: wrap; }
.svc-trust-row {
  display: flex;
  gap: var(--space-sm);
  flex-wrap: wrap;
  margin-top: var(--space-lg);
}
.svc-trust-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 12px;
  background: rgba(255,255,255,0.07);
  border: 1px solid rgba(255,255,255,0.16);
  border-radius: var(--radius-full);
  font-size: 0.72rem;
  font-weight: 600;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: rgba(255,255,255,0.78);
}
.svc-trust-pill i, .svc-trust-pill svg { width: 11px; height: 11px; color: var(--color-accent); }

/* Divider block */
.svc-divider { display: block; line-height: 0; overflow: hidden; }
.svc-divider svg { display: block; width: 100%; }

/* Detail Section ---------------------------------------------- */
.svc-detail {
  padding: var(--space-4xl) var(--space-lg);
}
.svc-detail-grid {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: var(--space-4xl);
  align-items: start;
}
.svc-detail-text h2 {
  font-size: clamp(1.8rem, 3.5vw, 2.5rem);
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
.svc-last-updated {
  font-size: 0.78rem;
  color: var(--color-gray);
  margin-top: var(--space-xl);
}
.svc-img-wrap {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
  margin-bottom: var(--space-xl);
}
.svc-img-wrap img {
  width: 100%;
  height: 320px;
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

/* Why Choose Us ----------------------------------------------- */
.why-section {
  background: var(--color-bg-alt);
  padding: var(--space-4xl) var(--space-lg);
}
.why-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-3xl);
}
.why-card {
  background: #fff;
  border-radius: var(--radius-md);
  padding: var(--space-xl) var(--space-lg);
  text-align: center;
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  border-top: 3px solid transparent;
}
.why-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
  border-top-color: var(--color-accent);
}
.why-icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: rgba(var(--color-primary-rgb), 0.06);
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-md);
  color: var(--color-accent);
  transition: background var(--transition-base), color var(--transition-base);
}
.why-card:hover .why-icon { background: var(--color-primary); }
.why-icon i, .why-icon svg { width: 21px; height: 21px; }
.why-card h3 {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.why-card p { font-size: 0.88rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

/* Process Steps ----------------------------------------------- */
.process-section {
  padding: var(--space-4xl) var(--space-lg);
}
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
  width: 54px;
  height: 54px;
  border-radius: 50%;
  background: var(--color-primary);
  color: var(--color-accent);
  font-family: var(--font-heading);
  font-size: 1.25rem;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-lg);
  box-shadow: var(--shadow-md);
  position: relative;
  z-index: 1;
  transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base);
}
.proc-card:hover .proc-num {
  transform: scale(1.12);
  background: var(--color-accent);
  color: var(--color-primary);
}
.proc-card h3 {
  font-family: var(--font-heading);
  font-size: 1.15rem;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
  text-wrap: balance;
}
.proc-card p { font-size: 0.86rem; color: var(--color-text-light); line-height: 1.60; margin: 0; max-width: 22ch; margin-inline: auto; }

/* FAQ --------------------------------------------------------- */
.faq-svc { background: var(--color-bg-alt); padding: var(--space-4xl) var(--space-lg); }
.faq-svc-wrap { max-width: 860px; margin-inline: auto; margin-top: var(--space-3xl); }

/* Related Services -------------------------------------------- */
.related-svc-section { padding: var(--space-4xl) var(--space-lg); }

/* Closing CTA ------------------------------------------------- */
.svc-closing-cta {
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%);
  padding: var(--space-4xl) var(--space-lg);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.svc-closing-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}
.svc-closing-cta .container { position: relative; z-index: 1; }
.svc-closing-cta h2 { color: #fff; font-size: clamp(2rem,4vw,3rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.svc-closing-cta p { color: rgba(255,255,255,0.78); max-width: 52ch; margin-inline: auto; margin-bottom: var(--space-xl); line-height: 1.70; }
.svc-cta-btns { display: flex; gap: var(--space-md); justify-content: center; flex-wrap: wrap; }

/* Responsive -------------------------------------------------- */
@media (max-width: 1023px) {
  .svc-detail-grid { grid-template-columns: 1fr; }
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
  .svc-img-wrap img { height: 220px; }
  .svc-cta-btns { flex-direction: column; align-items: center; }
  .svc-cta-btns .btn { width: 100%; max-width: 300px; justify-content: center; }
}
</style>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ================================================================
     HERO — CTA #1
================================================================ -->
<section
  class="svc-hero"
  style="background-image: url('<?= htmlspecialchars($ogImage) ?>');"
  aria-label="Automotive Maintenance in Manassas VA"
>
  <div class="svc-hero-inner">
    <nav class="svc-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span>›</span>
      <a href="/services/">Services</a><span>›</span>
      <span aria-current="page">Automotive Maintenance</span>
    </nav>
    <h1>Automotive Maintenance<br>in <span class="accent-word">Manassas, VA</span></h1>
    <p class="svc-hero-sub">
      Factory maintenance schedules followed precisely — the same standard your
      dealership uses, at a fraction of the cost. Keep your vehicle running reliably
      for 200,000+ miles with ASE certified technicians who know every make and model.
    </p>
    <div class="svc-hero-actions">
      <a href="/contact" class="btn btn-accent">
        <i data-lucide="clipboard-list"></i>
        Schedule Maintenance
      </a>
      <a href="/services/" class="btn btn-outline-white">
        <i data-lucide="arrow-left"></i>
        All Services
      </a>
    </div>
    <div class="svc-trust-row">
      <span class="svc-trust-pill"><i data-lucide="check-circle"></i> ASE Certified</span>
      <span class="svc-trust-pill"><i data-lucide="award"></i> Factory Procedures</span>
      <span class="svc-trust-pill"><i data-lucide="shield"></i> All Makes &amp; Models</span>
    </div>
  </div>
</section>

<!-- Divider: primary → white -->
<div class="svc-divider" style="background:var(--color-primary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#ffffff"/>
  </svg>
</div>


<!-- ================================================================
     SERVICE DETAIL
================================================================ -->
<section class="svc-detail" aria-label="About automotive maintenance at SW Automotive">
  <div class="container">
    <div class="svc-detail-grid">

      <div class="svc-detail-text" data-animate>
        <span class="eyebrow-label">Automotive Maintenance Manassas VA</span>
        <h2>Preventive Maintenance That Actually Prevents Problems</h2>

        <p class="svc-answer-first">
          SW Automotive follows your vehicle's factory maintenance schedule — not a generic
          interval. We pull your OEM service requirements by VIN and perform exactly what
          your manufacturer specifies at each mileage milestone.
        </p>

        <p>
          Most vehicles on the road today are past due on at least one maintenance item.
          Skipping or delaying scheduled service is the single biggest cause of premature
          engine wear, transmission failure, and cooling system breakdowns — all repairs
          that cost ten times more than the maintenance that would have prevented them.
        </p>

        <p>
          At SW Automotive, a maintenance appointment means a 20-point vehicle health
          inspection alongside your service items. We check brake wear, tire condition,
          belts, hoses, battery health, all fluid levels, and suspension components.
          You leave with a written report of your vehicle's current condition and a
          clear schedule of what's coming up next.
        </p>

        <p>
          Our owner spent 27 years at Nissan dealerships performing warranty and
          scheduled maintenance to factory spec. That depth of experience means your
          maintenance isn't performed by a lube tech following a checklist — it's
          performed by certified professionals who understand what they're checking
          and why it matters.
        </p>

        <p class="svc-last-updated">Last Updated: April 2026</p>
      </div>

      <div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img
            src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489127458-maycxw-483967544_666123539326197_472977410931771103_n.jpg"
            alt="SW Automotive technician performing vehicle maintenance inspection in Manassas VA"
            width="600" height="320"
            loading="lazy"
          >
        </div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img
            src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489128298-hbkbfb-483851008_666123465992871_8283192258420531462_n.jpg"
            alt="SW Automotive shop interior with vehicles receiving maintenance service"
            width="600" height="320"
            loading="lazy"
          >
        </div>
      </div>

    </div>
  </div>
</section>


<!-- Divider: white → bg-alt (why section) -->
<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <path d="M0,20 C480,50 960,0 1440,20 L1440,50 L0,50 Z" fill="#f4f7fa"/>
  </svg>
</div>


<!-- ================================================================
     WHY CHOOSE US
================================================================ -->
<section class="why-section" aria-label="Why choose SW Automotive for maintenance">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Why SW Automotive</span>
      <h2>Maintenance Done Right.<br><span class="text-accent">Not Just Done Fast.</span></h2>
    </header>
    <div class="why-grid">
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="file-text"></i></div>
        <h3>Factory Schedule by VIN</h3>
        <p>We pull your OEM maintenance intervals — not a one-size-fits-all recommendation. Your Tacoma and a Civic have different schedules.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-2" data-animate>
        <div class="why-icon"><i data-lucide="droplets"></i></div>
        <h3>Correct Fluids Every Time</h3>
        <p>Wrong transmission fluid or coolant chemistry causes more damage than no service at all. We use the spec your manufacturer requires.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-3" data-animate>
        <div class="why-icon"><i data-lucide="award"></i></div>
        <h3>27 Years of Expertise</h3>
        <p>Our lead technician's Nissan Master Technician background means every inspection is performed by someone who knows what to look for.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="ban"></i></div>
        <h3>Zero Pressure Upsells</h3>
        <p>You get a written report of everything we find. We'll tell you what's urgent and what can wait — and never pressure you on either.</p>
      </div>
    </div>
  </div>
</section>


<!-- Divider: bg-alt → white -->
<div class="svc-divider" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>


<!-- ================================================================
     MID-PAGE CTA — CTA #2
================================================================ -->
<section class="cta-banner" aria-label="Schedule your maintenance service">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;">
      <i data-lucide="clock"></i>&nbsp;Mon–Fri 8 AM – 5 PM
    </span>
    <h2 style="font-size:clamp(1.8rem,4vw,3rem); margin-bottom:var(--space-lg); text-wrap:balance;">
      Your Vehicle Is Probably Overdue.<br>
      <span class="text-gradient">Let's Find Out for Free.</span>
    </h2>
    <p class="prose-centered" style="color:rgba(255,255,255,0.80); margin-bottom:var(--space-xl);">
      Drop in or submit a request and we'll pull your factory maintenance schedule by VIN.
      No appointment needed for basic service — Mon–Fri, 8 AM–5 PM at 10404 Morias Ct, Manassas VA 20110.
    </p>
    <div style="display:flex; gap:var(--space-md); justify-content:center; flex-wrap:wrap;">
      <a href="/contact" class="btn btn-accent">Schedule Maintenance Now</a>
      <a href="/about" class="btn btn-outline-white">About Our Shop</a>
    </div>
  </div>
</section>


<!-- Divider: CTA → process (white) -->
<div class="svc-divider" style="background:var(--color-secondary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>


<!-- ================================================================
     PROCESS STEPS
================================================================ -->
<section class="process-section" aria-label="How automotive maintenance works at SW Automotive">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">How It Works</span>
      <h2>Your Maintenance Visit,<br><span class="text-accent">Step by Step</span></h2>
    </header>
    <div class="process-row" role="list">
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">01</div>
        <h3>Schedule &amp; Drop Off</h3>
        <p>Call, submit online, or drop in Mon–Fri. No long waits — we schedule efficiently.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-2" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">02</div>
        <h3>VIN Pull &amp; Inspect</h3>
        <p>We check your factory schedule by VIN and perform a full 20-point inspection.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-3" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">03</div>
        <h3>Written Estimate</h3>
        <p>You see exactly what your vehicle needs and the cost before we touch anything.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">04</div>
        <h3>Service &amp; Report</h3>
        <p>We complete the approved work and hand you a written condition report for your records.</p>
      </div>
    </div>
  </div>
</section>


<!-- Divider: white → faq (bg-alt) -->
<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <path d="M0,25 C360,50 720,0 1080,25 C1260,38 1380,18 1440,20 L1440,50 L0,50 Z" fill="#f4f7fa"/>
  </svg>
</div>


<!-- ================================================================
     FAQ
================================================================ -->
<section class="faq-svc" aria-label="Automotive maintenance FAQ">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Common Questions</span>
      <h2>Automotive Maintenance FAQs<br><span class="text-accent">for Manassas Drivers</span></h2>
    </header>
    <div class="faq-svc-wrap" role="list">
      <?php foreach ($serviceFaqs as $idx => $faq): ?>
      <div class="faq-item reveal-up reveal-delay-<?= ($idx % 3) + 1 ?>" data-animate role="listitem">
        <button class="faq-question" aria-expanded="false" aria-controls="faq-maint-<?= $idx ?>">
          <span><?= htmlspecialchars($faq['q']) ?></span>
          <span class="faq-icon" aria-hidden="true"><i data-lucide="plus"></i></span>
        </button>
        <div class="faq-answer" id="faq-maint-<?= $idx ?>" role="region">
          <p><?= htmlspecialchars($faq['a']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- Divider: bg-alt → white -->
<div class="svc-divider" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>


<!-- ================================================================
     RELATED SERVICES
================================================================ -->
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
          'auto-repair'              => ['All makes & models serviced','Electronic diagnostics','Drivetrain, electrical & more'],
          'diesel-repair'            => ['Fuel system diagnostics','EGR & DEF system service','Certified diesel technicians'],
          'oil-changes'              => ['Correct grade for your engine','Synthetic, blend & diesel','No upsells'],
          'brake-replacement'        => ['Pads, rotors & calipers','Same-day service available','Full system inspection'],
          'transmission-repair'      => ['Automatic & manual','Fluid flush & rebuild','All makes & models'],
          'small-engine-repair'      => ['Mowers & generators','Carb rebuild & tuning','Seasonal plans'],
          'light-duty-diesel-repair' => ['Ford, GM, Ram trucks','Injection & turbo service','Certified diesel tech'],
        ][$svc['slug']] ?? ['Expert certified service','All makes & models','Written estimates'];
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


<!-- ================================================================
     CLOSING CTA — CTA #3
================================================================ -->
<section class="svc-closing-cta" aria-label="Get your free maintenance estimate">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;">
      <i data-lucide="map-pin"></i>&nbsp;10404 Morias Ct, Manassas VA 20110
    </span>
    <h2>Keep Your Vehicle Running<br>Past 200,000 Miles.</h2>
    <p>
      The right maintenance at the right intervals is the single best investment you
      can make in your vehicle. SW Automotive makes it simple — drop in or schedule online,
      get a written estimate, approve the work, drive away confident.
    </p>
    <div class="svc-cta-btns">
      <a href="/contact" class="btn btn-accent">
        <i data-lucide="calendar"></i>
        Schedule My Maintenance
      </a>
      <a href="/services/" class="btn btn-outline-white">
        <i data-lucide="list"></i>
        All Services
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
