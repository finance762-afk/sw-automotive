<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$currentService = null;
$relatedServices = [];
foreach ($services as $s) {
    if ($s['slug'] === 'brake-replacement') { $currentService = $s; }
    elseif (count($relatedServices) < 3) { $relatedServices[] = $s; }
}

$pageTitle       = 'Brake Replacement Manassas VA | SW Automotive — Pads, Rotors & Calipers';
$pageDescription = 'Brake replacement in Manassas, VA. SW Automotive replaces pads, rotors, and calipers with full brake system inspection. Same-day service available. ASE certified. Free estimates.';
$canonicalUrl    = $siteUrl . '/services/brake-replacement/';
$ogImage         = $currentService['photo'];
$currentPage     = 'brake-replacement';
$heroPreloadImage = $ogImage;

$serviceFaqs = [
  ['q' => 'How do I know when I need brake replacement near Manassas VA?',
   'a' => 'The most common signs are squealing or grinding noises when braking, vibration through the pedal or steering wheel, longer stopping distances, or a brake warning light. A squealing noise is a wear indicator built into the pads. Grinding means metal-on-metal contact — get in immediately.'],
  ['q' => 'How much does brake replacement cost in Manassas VA?',
   'a' => 'Brake pad replacement typically runs $150–$280 per axle. If rotors are worn or warped, rotor replacement adds $120–$240 per axle. Full front brake service (pads + rotors) is typically $260–$480. We provide a written estimate after inspecting your specific vehicle.'],
  ['q' => 'How long does brake replacement take at SW Automotive?',
   'a' => 'Standard brake pad and rotor replacement on most vehicles takes 1–2 hours per axle. Most brake jobs are completed same-day when you drop off in the morning. We\'ll confirm the timeline when you schedule.'],
  ['q' => 'Do you service ABS brakes and electronic parking brakes in Manassas?',
   'a' => 'Yes. SW Automotive services ABS systems, electronic parking brakes (EPB), and brake-by-wire systems. Electronic parking brake rear caliper replacement requires specialized software to retract the caliper — we have the tools to do it correctly without damaging the actuator.'],
];

$schemaMarkup = generateServiceSchema($currentService, $serviceFaqs);
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ================================================================
   Brake Replacement — SW Automotive
   Standard Tier ≥200 lines | Techniques: Layered Hero (C1),
   Ken Burns, Dividers (C3), Safety Callout (Signature), Cards,
   Process Steps, FAQ Accordion
================================================================ */
.svc-hero {
  position: relative; min-height: 58vh; display: flex; align-items: center;
  background-size: cover; background-position: center 50%;
  animation: kb-brake 22s ease-in-out infinite alternate;
}
@keyframes kb-brake {
  from { background-size: 106%; background-position: center 46%; }
  to   { background-size: 118%; background-position: center 58%; }
}
.svc-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(105deg,
    rgba(var(--color-primary-rgb), 0.95) 0%,
    rgba(var(--color-primary-rgb), 0.80) 40%,
    rgba(10,20,30,0.55) 100%);
  z-index: 1;
}
.svc-hero::after {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.04; z-index: 1; pointer-events: none;
}
.svc-hero-inner { position: relative; z-index: 2; width: 100%; max-width: var(--max-width); margin-inline: auto; padding: var(--space-3xl) var(--space-lg); }
.svc-breadcrumb { display: flex; align-items: center; gap: 6px; font-size: 0.78rem; color: rgba(255,255,255,0.58); margin-bottom: var(--space-md); flex-wrap: wrap; }
.svc-breadcrumb a { color: rgba(255,255,255,0.72); transition: color var(--transition-base); }
.svc-breadcrumb a:hover { color: var(--color-accent); }
.svc-breadcrumb span { color: rgba(255,255,255,0.35); }
.svc-hero h1 { font-family: var(--font-heading); font-size: clamp(2.4rem,5.5vw,4rem); line-height: 1.05; color: #fff; text-wrap: balance; margin-bottom: var(--space-lg); letter-spacing: -0.01em; }
.svc-hero h1 .accent-word { background: linear-gradient(135deg, var(--color-accent), #6ee7f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
.svc-hero-sub { font-size: 1.05rem; line-height: 1.70; color: rgba(255,255,255,0.82); max-width: 56ch; margin-bottom: var(--space-xl); }
.svc-hero-actions { display: flex; gap: var(--space-md); flex-wrap: wrap; }
.svc-trust-row { display: flex; gap: var(--space-sm); flex-wrap: wrap; margin-top: var(--space-lg); }
.svc-trust-pill { display: inline-flex; align-items: center; gap: 5px; padding: 4px 12px; background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.16); border-radius: var(--radius-full); font-size: 0.72rem; font-weight: 600; letter-spacing: 0.06em; text-transform: uppercase; color: rgba(255,255,255,0.78); }
.svc-trust-pill i, .svc-trust-pill svg { width: 11px; height: 11px; color: var(--color-accent); }

.svc-divider { display: block; line-height: 0; overflow: hidden; }
.svc-divider svg { display: block; width: 100%; }

/* Detail */
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

/* Safety Callout — Signature Section */
.brake-safety-section {
  background: linear-gradient(135deg, #1a0a0a 0%, var(--color-primary-dark) 100%);
  padding: var(--space-3xl) var(--space-lg);
  position: relative; overflow: hidden;
}
.brake-safety-section::before {
  content: '';
  position: absolute; inset: 0;
  background: radial-gradient(ellipse at 50% 50%, rgba(239,68,68,0.12) 0%, transparent 65%);
  pointer-events: none;
}
.brake-safety-section .container { position: relative; z-index: 1; }
.brake-safety-inner { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-4xl); align-items: center; }
.brake-safety-text h2 { color: #fff; font-size: clamp(1.6rem,3.5vw,2.4rem); margin-bottom: var(--space-lg); text-wrap: balance; }
.brake-safety-text p { color: rgba(255,255,255,0.75); line-height: 1.70; margin-bottom: var(--space-lg); font-size: 0.95rem; }
.brake-warning-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-sm); }
.brake-warning-list li { display: flex; align-items: flex-start; gap: var(--space-sm); font-size: 0.92rem; color: rgba(255,255,255,0.80); }
.brake-warning-list li::before { content: '⚠'; font-size: 1rem; flex-shrink: 0; margin-top: 1px; }
.brake-stat-side { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md); }
.brake-stat-box { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.10); border-radius: var(--radius-md); padding: var(--space-xl); text-align: center; }
.brake-stat-num { font-family: var(--font-heading); font-size: 2.6rem; color: var(--color-accent); line-height: 1; }
.brake-stat-label { font-size: 0.78rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.10em; color: rgba(255,255,255,0.55); margin-top: 6px; display: block; }

/* Why Cards */
.why-section { background: var(--color-bg-alt); padding: var(--space-4xl) var(--space-lg); }
.why-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: var(--space-lg); margin-top: var(--space-3xl); }
.why-card { background: #fff; border-radius: var(--radius-md); padding: var(--space-xl) var(--space-lg); text-align: center; box-shadow: var(--shadow-sm); transition: transform var(--transition-base), box-shadow var(--transition-base); border-top: 3px solid transparent; }
.why-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-md); border-top-color: var(--color-accent); }
.why-icon { width: 50px; height: 50px; border-radius: 50%; background: rgba(var(--color-primary-rgb),0.06); display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-md); color: var(--color-accent); transition: background var(--transition-base); }
.why-card:hover .why-icon { background: var(--color-primary); }
.why-icon i, .why-icon svg { width: 21px; height: 21px; }
.why-card h3 { font-family: var(--font-heading); font-size: 1.2rem; color: var(--color-primary); margin-bottom: var(--space-sm); text-wrap: balance; }
.why-card p { font-size: 0.88rem; color: var(--color-text-light); line-height: 1.6; margin: 0; }

/* Process */
.process-section { padding: var(--space-4xl) var(--space-lg); }
.process-row { display: grid; grid-template-columns: repeat(4,1fr); gap: 0; margin-top: var(--space-3xl); position: relative; }
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
  .brake-safety-inner { grid-template-columns: 1fr; }
  .brake-stat-side { grid-template-columns: repeat(2,1fr); }
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
</style>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<section class="svc-hero" style="background-image: url('<?= htmlspecialchars($ogImage) ?>');" aria-label="Brake replacement in Manassas VA">
  <div class="svc-hero-inner">
    <nav class="svc-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span>›</span><a href="/services/">Services</a><span>›</span>
      <span aria-current="page">Brake Replacement</span>
    </nav>
    <h1>Brake Replacement in<br><span class="accent-word">Manassas, VA</span></h1>
    <p class="svc-hero-sub">
      Pads, rotors, calipers, and full brake system inspection — completed correctly
      by ASE certified technicians. Same-day service available on most vehicles.
      Stop confidently every time.
    </p>
    <div class="svc-hero-actions">
      <a href="/contact" class="btn btn-accent"><i data-lucide="clipboard-list"></i> Schedule Brake Service</a>
      <a href="/services/" class="btn btn-outline-white"><i data-lucide="arrow-left"></i> All Services</a>
    </div>
    <div class="svc-trust-row">
      <span class="svc-trust-pill"><i data-lucide="check-circle"></i> ASE Certified</span>
      <span class="svc-trust-pill"><i data-lucide="clock"></i> Same-Day Available</span>
      <span class="svc-trust-pill"><i data-lucide="shield"></i> All Makes &amp; Models</span>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-primary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#ffffff"/>
  </svg>
</div>

<section class="svc-detail" aria-label="About brake replacement at SW Automotive">
  <div class="container">
    <div class="svc-detail-grid">
      <div class="svc-detail-text" data-animate>
        <span class="eyebrow-label">Brake Replacement Manassas VA</span>
        <h2>Brakes Aren't a Decision You Should Delay</h2>
        <p class="svc-answer-first">
          SW Automotive provides complete brake service for all makes and models in Manassas —
          from basic pad replacement to full caliper rebuilds. We perform a full brake system
          inspection before quoting any repair so you know exactly what's needed and what can wait.
        </p>
        <p>
          Brake service is one area where cutting corners is directly dangerous. Using the wrong
          pad friction compound, improperly torquing caliper bolts, or skipping a rotor
          measurement on a thick rotor can cause brake fade, vibration, or uneven braking.
          SW Automotive follows OEM specifications for brake hardware, torque values, and
          rotor thickness minimums on every vehicle we service.
        </p>
        <p>
          Not every brake job requires replacing everything at once. We inspect brake pad
          thickness (we measure — we don't eyeball it), rotor thickness and runout, caliper
          slide pin condition, brake hose condition, and brake fluid moisture content.
          You get a written condition report so you know what's urgent and what's coming up.
        </p>
        <p>
          We service conventional hydraulic brakes, ABS systems, electronic parking brakes,
          and brake-by-wire systems. Our technicians have the specialized software required
          to retract electronic parking brake calipers without damaging the actuator motor —
          a common source of expensive mistakes at shops that aren't properly equipped.
        </p>
        <p class="svc-last-updated">Last Updated: April 2026</p>
      </div>
      <div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489127458-maycxw-483967544_666123539326197_472977410931771103_n.jpg"
            alt="Brake rotor and caliper service at SW Automotive in Manassas VA" width="600" height="290" loading="lazy">
        </div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489128298-hbkbfb-483851008_666123465992871_8283192258420531462_n.jpg"
            alt="SW Automotive technician inspecting brake system" width="600" height="290" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#1a0a0a"/>
  </svg>
</div>

<!-- Signature: Safety Callout with Stats -->
<section class="brake-safety-section" aria-label="Why brake service matters">
  <div class="container">
    <div class="brake-safety-inner">
      <div class="brake-safety-text" data-animate>
        <h2>Grinding Brakes Aren't a "Schedule for Later" Problem</h2>
        <p>When you hear grinding — metal-on-metal contact — the rotor is already being damaged. A brake job that was $280 is now $520. And your stopping distance has increased significantly.</p>
        <ul class="brake-warning-list">
          <li>Squealing = wear indicators touching the rotor. Book this week.</li>
          <li>Grinding = metal on metal. Book today.</li>
          <li>Vibration when braking = warped rotors or seized caliper. Don't ignore it.</li>
          <li>Brake warning light = low fluid or sensor fault. Get it diagnosed.</li>
        </ul>
      </div>
      <div class="brake-stat-side" data-animate>
        <div class="brake-stat-box"><div class="brake-stat-num">1–2</div><span class="brake-stat-label">Hours Most Brake Jobs</span></div>
        <div class="brake-stat-box"><div class="brake-stat-num">$0</div><span class="brake-stat-label">Charge for Inspection</span></div>
        <div class="brake-stat-box"><div class="brake-stat-num">Same<br>Day</div><span class="brake-stat-label">Service Available</span></div>
        <div class="brake-stat-box"><div class="brake-stat-num">All</div><span class="brake-stat-label">Makes &amp; Models</span></div>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#1a0a0a;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#f4f7fa"/>
  </svg>
</div>

<section class="why-section" aria-label="Why choose SW Automotive for brake replacement">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Why SW Automotive</span>
      <h2>Brake Service That Goes <span class="text-accent">Beyond the Pads</span></h2>
    </header>
    <div class="why-grid">
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="disc"></i></div>
        <h3>Full System Inspection</h3>
        <p>We measure rotor thickness, check caliper slides, inspect brake hoses, and test fluid moisture before quoting anything.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-2" data-animate>
        <div class="why-icon"><i data-lucide="clock"></i></div>
        <h3>Same-Day Service</h3>
        <p>Most brake jobs completed same-day when dropped off in the morning. Call ahead to confirm availability.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-3" data-animate>
        <div class="why-icon"><i data-lucide="cpu"></i></div>
        <h3>Electronic Brake Capable</h3>
        <p>We have the software to service electronic parking brakes — avoiding the actuator damage common at unprepared shops.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="file-text"></i></div>
        <h3>Written Estimate First</h3>
        <p>Know the exact cost before we start. We clearly separate what's urgent from what can wait.</p>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>

<section class="cta-banner" aria-label="Schedule brake service now">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;"><i data-lucide="clock"></i>&nbsp;Mon–Fri 8 AM – 5 PM</span>
    <h2 style="font-size:clamp(1.8rem,4vw,3rem); margin-bottom:var(--space-lg); text-wrap:balance;">
      Hearing Squealing or Grinding?<br>
      <span class="text-gradient">Come In Today — Same-Day Available.</span>
    </h2>
    <p class="prose-centered" style="color:rgba(255,255,255,0.80); margin-bottom:var(--space-xl);">
      Don't wait on brake issues. Drop in or call ahead — we'll get your vehicle in, inspect your brakes
      at no charge, and give you a written estimate before starting any work.
    </p>
    <div style="display:flex; gap:var(--space-md); justify-content:center; flex-wrap:wrap;">
      <a href="/contact" class="btn btn-accent">Schedule Brake Service</a>
      <a href="/about" class="btn btn-outline-white">About Our Shop</a>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-secondary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>

<section class="process-section" aria-label="Brake replacement process at SW Automotive">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">How It Works</span>
      <h2>Brake Service, Start to Finish</h2>
    </header>
    <div class="process-row" role="list">
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">01</div>
        <h3>Drop Off</h3>
        <p>Bring your vehicle in Mon–Fri. Morning drop-offs typically get same-day service.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-2" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">02</div>
        <h3>Full Inspection</h3>
        <p>We measure pad thickness, rotor thickness, check calipers and lines — the whole system.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-3" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">03</div>
        <h3>Written Estimate</h3>
        <p>You see every part and labor cost before we touch anything. Approve or decline — no pressure.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">04</div>
        <h3>Service &amp; Bed In</h3>
        <p>Brakes replaced to OEM spec, torqued correctly, and bedded in before you pick up the vehicle.</p>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#fff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <path d="M0,25 C360,50 720,0 1080,25 C1260,38 1380,18 1440,20 L1440,50 L0,50 Z" fill="#f4f7fa"/>
  </svg>
</div>

<section class="faq-svc" aria-label="Brake replacement FAQ">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Common Questions</span>
      <h2>Brake Replacement FAQs<br><span class="text-accent">for Manassas Drivers</span></h2>
    </header>
    <div class="faq-svc-wrap" role="list">
      <?php foreach ($serviceFaqs as $idx => $faq): ?>
      <div class="faq-item reveal-up reveal-delay-<?= ($idx % 3) + 1 ?>" data-animate role="listitem">
        <button class="faq-question" aria-expanded="false" aria-controls="faq-bk-<?= $idx ?>">
          <span><?= htmlspecialchars($faq['q']) ?></span>
          <span class="faq-icon" aria-hidden="true"><i data-lucide="plus"></i></span>
        </button>
        <div class="faq-answer" id="faq-bk-<?= $idx ?>" role="region">
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
          'oil-changes'              => ['Correct grade for engine','Synthetic & blend','No upsells'],
          'transmission-repair'      => ['Auto & manual service','Fluid flush & rebuild','All makes'],
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

<section class="svc-closing-cta" aria-label="Schedule brake service">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;"><i data-lucide="map-pin"></i>&nbsp;10404 Morias Ct, Manassas VA 20110</span>
    <h2>Brakes Done Right.<br>Back on the Road Same Day.</h2>
    <p>Drop off in the morning and most brake jobs are completed by end of day. No shortcuts on safety — we do it right or we tell you why we can't. Submit a request online or call to check availability.</p>
    <div class="svc-cta-btns">
      <a href="/contact" class="btn btn-accent"><i data-lucide="calendar"></i> Schedule My Brake Service</a>
      <a href="/services/" class="btn btn-outline-white"><i data-lucide="list"></i> All Services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
