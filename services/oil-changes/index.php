<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
$currentService = null;
$relatedServices = [];
foreach ($services as $s) {
    if ($s['slug'] === 'oil-changes') { $currentService = $s; }
    elseif (count($relatedServices) < 3) { $relatedServices[] = $s; }
}

$pageTitle       = 'Oil Change Manassas VA | SW Automotive — Correct Grade, No Upsells';
$pageDescription = 'Oil change service in Manassas, VA. SW Automotive uses the correct oil grade for your specific engine — conventional, synthetic, and diesel. ASE certified. No upsells. Free written estimates.';
$canonicalUrl    = $siteUrl . '/services/oil-changes/';
$ogImage         = $currentService['photo'];
$currentPage     = 'oil-changes';
$heroPreloadImage = $ogImage;

$serviceFaqs = [
  ['q' => 'How often should I change my oil near Manassas VA?',
   'a' => 'Modern synthetic oil vehicles typically run 7,500–10,000 miles between changes. Conventional oil vehicles follow a 3,000–5,000 mile schedule. Turbocharged engines and diesel vehicles often have shorter intervals. SW Automotive checks your factory specification — not a one-size-fits-all number.'],
  ['q' => 'What type of oil does my car need in Manassas?',
   'a' => 'Oil viscosity and specification vary by engine. A 2022 Honda Civic requires 0W-20 full synthetic meeting Honda\'s specific additive spec. A diesel truck may require CK-4 rated diesel oil. Getting this wrong accelerates engine wear. We look up your factory requirement — we never guess.'],
  ['q' => 'How much does an oil change cost at SW Automotive in Manassas?',
   'a' => 'Conventional oil changes start around $45–$65. Full synthetic runs $75–$95 depending on capacity. Diesel engine oil changes typically run $90–$130. We provide the exact price upfront — no surprises.'],
  ['q' => 'Do you do oil changes on diesel or hybrid vehicles near Manassas?',
   'a' => 'Yes. SW Automotive services diesel engines with the correct CK-4 or CI-4 rated diesel oil, and hybrid vehicles that require specific low-viscosity synthetic grades. Hybrid engines run lower oil temperatures and require different additive packages than standard gasoline engines.'],
];

$schemaMarkup = generateServiceSchema($currentService, $serviceFaqs);
include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ================================================================
   Oil Changes — SW Automotive
   Standard Tier ≥200 lines | Techniques: Layered Hero (C1),
   Ken Burns, Dividers (C3), Oil Type Comparison (Signature),
   Process Steps, FAQ Accordion, Why Cards
================================================================ */
.svc-hero {
  position: relative; min-height: 56vh; display: flex; align-items: center;
  background-size: cover; background-position: center 55%;
  animation: kb-oil 22s ease-in-out infinite alternate;
}
@keyframes kb-oil {
  from { background-size: 106%; background-position: center 50%; }
  to   { background-size: 117%; background-position: center 62%; }
}
.svc-hero::before {
  content: ''; position: absolute; inset: 0;
  background: linear-gradient(110deg,
    rgba(var(--color-primary-rgb), 0.94) 0%,
    rgba(var(--color-primary-rgb), 0.76) 45%,
    rgba(var(--color-primary-dark-rgb), 0.48) 100%);
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
.svc-hero h1 { font-family: var(--font-heading); font-size: clamp(2.4rem,5.5vw,4rem); line-height: 1.05; color: #fff; text-wrap: balance; margin-bottom: var(--space-lg); }
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

/* Oil Type Comparison — Signature Section */
.oil-type-section {
  background: var(--color-bg-alt);
  padding: var(--space-3xl) var(--space-lg);
}
.oil-type-grid {
  display: grid;
  grid-template-columns: repeat(3,1fr);
  gap: var(--space-lg);
  margin-top: var(--space-2xl);
}
.oil-type-card {
  background: #fff;
  border-radius: var(--radius-md);
  overflow: hidden;
  box-shadow: var(--shadow-sm);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.oil-type-card:hover { transform: translateY(-3px); box-shadow: var(--shadow-md); }
.oil-type-header {
  background: var(--color-primary);
  padding: var(--space-lg);
  text-align: center;
}
.oil-type-header h3 { color: #fff; font-family: var(--font-heading); font-size: 1.3rem; letter-spacing: 0.04em; margin: 0; }
.oil-type-header span { color: var(--color-accent); font-size: 0.78rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.10em; }
.oil-type-body { padding: var(--space-lg); }
.oil-type-body ul { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: var(--space-sm); }
.oil-type-body ul li { font-size: 0.88rem; color: var(--color-text-light); padding-left: 1.2rem; position: relative; line-height: 1.50; }
.oil-type-body ul li::before { content: '✓'; color: var(--color-accent); position: absolute; left: 0; font-weight: 700; font-size: 0.85rem; }
.oil-type-price { font-family: var(--font-heading); font-size: 1.1rem; color: var(--color-primary); margin-top: var(--space-md); padding-top: var(--space-md); border-top: 1px solid rgba(0,0,0,0.07); text-align: center; letter-spacing: 0.04em; }

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
.process-section { background: var(--color-bg-dark); padding: var(--space-4xl) var(--space-lg); position: relative; overflow: hidden; }
.process-section::before { content: ''; position: absolute; inset: 0; background: radial-gradient(ellipse at 50% 0%, rgba(var(--color-accent-rgb),0.07) 0%, transparent 60%); pointer-events: none; }
.process-section .container { position: relative; z-index: 1; }
.process-section h2 { color: #fff; }
.process-section .section-subtitle { color: rgba(255,255,255,0.60); }
.process-section .eyebrow-label { color: var(--color-accent); }
.process-row { display: grid; grid-template-columns: repeat(4,1fr); gap: 0; margin-top: var(--space-3xl); position: relative; }
.process-row::before { content: ''; position: absolute; top: 27px; left: calc(12.5% + 28px); right: calc(12.5% + 28px); height: 2px; background: linear-gradient(to right, var(--color-accent) 0%, rgba(var(--color-accent-rgb),0.12) 100%); }
.proc-card { text-align: center; padding: var(--space-lg) var(--space-md); }
.proc-num { width: 54px; height: 54px; border-radius: 50%; background: rgba(255,255,255,0.08); border: 2px solid var(--color-accent); color: var(--color-accent); font-family: var(--font-heading); font-size: 1.25rem; display: flex; align-items: center; justify-content: center; margin: 0 auto var(--space-lg); position: relative; z-index: 1; transition: transform var(--transition-base), background var(--transition-base); }
.proc-card:hover .proc-num { transform: scale(1.12); background: var(--color-accent); color: var(--color-primary); }
.proc-card h3 { font-family: var(--font-heading); font-size: 1.15rem; color: #fff; margin-bottom: var(--space-sm); text-wrap: balance; }
.proc-card p { font-size: 0.86rem; color: rgba(255,255,255,0.60); line-height: 1.60; margin: 0; max-width: 22ch; margin-inline: auto; }

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
  .oil-type-grid { grid-template-columns: 1fr; max-width: 520px; margin-inline: auto; }
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
</style>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<section class="svc-hero" style="background-image: url('<?= htmlspecialchars($ogImage) ?>');" aria-label="Oil change service in Manassas VA">
  <div class="svc-hero-inner">
    <nav class="svc-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a><span>›</span><a href="/services/">Services</a><span>›</span>
      <span aria-current="page">Oil Changes</span>
    </nav>
    <h1>Oil Changes in<br><span class="accent-word">Manassas, VA</span></h1>
    <p class="svc-hero-sub">
      The correct oil grade for your specific engine — not whatever's on sale.
      SW Automotive looks up your factory specification by make, model, and year
      before we open a single quart. No guessing. No upsells. Just the right oil.
    </p>
    <div class="svc-hero-actions">
      <a href="/contact" class="btn btn-accent"><i data-lucide="clipboard-list"></i> Schedule an Oil Change</a>
      <a href="/services/" class="btn btn-outline-white"><i data-lucide="arrow-left"></i> All Services</a>
    </div>
    <div class="svc-trust-row">
      <span class="svc-trust-pill"><i data-lucide="check-circle"></i> Correct Grade Guaranteed</span>
      <span class="svc-trust-pill"><i data-lucide="ban"></i> Zero Upsells</span>
      <span class="svc-trust-pill"><i data-lucide="zap"></i> Hybrid &amp; EV Capable</span>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-primary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#ffffff"/>
  </svg>
</div>

<section class="svc-detail" aria-label="About oil change service at SW Automotive">
  <div class="container">
    <div class="svc-detail-grid">
      <div class="svc-detail-text" data-animate>
        <span class="eyebrow-label">Oil Changes Manassas VA</span>
        <h2>Oil Changes Sound Simple. Getting Them Right Isn't.</h2>
        <p class="svc-answer-first">
          SW Automotive performs oil changes using the factory-specified viscosity and
          additive package for your vehicle. We look up the specification by VIN —
          because a 2019 Mazda 3 doesn't take the same oil as a 2019 F-150, and
          using the wrong grade costs you engine life.
        </p>
        <p>
          Quick-lube chains move fast because they install one or two oil types
          regardless of what your vehicle actually requires. An incorrect viscosity can
          increase wear in cold starts, reduce oil film strength at operating temperature,
          and in some cases void manufacturer warranty coverage on newer vehicles.
        </p>
        <p>
          At SW Automotive, an oil change includes the correct oil grade and quantity,
          a new OEM-quality filter, and a quick inspection of your belts, hoses, air filter,
          brake fluid level, tire pressure, and wiper condition. You leave knowing
          what else your vehicle needs — no pressure to fix it today.
        </p>
        <p>
          We service conventional, full synthetic, synthetic blend, high-mileage,
          diesel (CK-4/CI-4), and hybrid-specific oil grades. We do not stock a
          single "universal" oil type — we order or stock what your specific vehicle requires.
        </p>
        <p class="svc-last-updated">Last Updated: April 2026</p>
      </div>
      <div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489129128-tvaas5-480214652_661491616439862_5774994120961816785_n.jpg"
            alt="SW Automotive performing oil change service in Manassas VA" width="600" height="290" loading="lazy">
        </div>
        <div class="svc-img-wrap img-reveal" data-animate="wipe-right">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489124708-tbcbgr-2020-08-21.jpg"
            alt="Quality motor oil service at SW Automotive Manassas" width="600" height="290" loading="lazy">
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

<!-- Signature: Oil Type Comparison -->
<section class="oil-type-section" aria-label="Types of oil service we offer">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">We Stock What You Need</span>
      <h2>Every Oil Grade. <span class="text-accent">Correct Every Time.</span></h2>
    </header>
    <div class="oil-type-grid">
      <div class="oil-type-card reveal-up reveal-delay-1" data-animate>
        <div class="oil-type-header"><span>Standard</span><h3>Conventional &amp; Blend</h3></div>
        <div class="oil-type-body">
          <ul>
            <li>Older vehicles with high tolerances</li>
            <li>Vehicles not requiring synthetic</li>
            <li>Conventional 5W-30, 10W-30, etc.</li>
            <li>Synthetic blend for added protection</li>
          </ul>
          <div class="oil-type-price">From $45</div>
        </div>
      </div>
      <div class="oil-type-card reveal-up reveal-delay-2" data-animate>
        <div class="oil-type-header" style="background:var(--color-accent);"><span style="color:var(--color-primary);">Most Vehicles</span><h3 style="color:var(--color-primary);">Full Synthetic</h3></div>
        <div class="oil-type-body">
          <ul>
            <li>Modern engines requiring full synthetic</li>
            <li>Turbocharged engines — required</li>
            <li>European spec oils (VW 502, BMW LL-01)</li>
            <li>Extended intervals up to 10,000 miles</li>
          </ul>
          <div class="oil-type-price">From $75</div>
        </div>
      </div>
      <div class="oil-type-card reveal-up reveal-delay-3" data-animate>
        <div class="oil-type-header"><span>Specialty</span><h3>Diesel &amp; Hybrid</h3></div>
        <div class="oil-type-body">
          <ul>
            <li>Diesel-rated CK-4 / CI-4 formula</li>
            <li>Hybrid-specific low-SAPS grades</li>
            <li>High-mileage formula with seal conditioners</li>
            <li>Diesel 5W-40, 15W-40, and more</li>
          </ul>
          <div class="oil-type-price">From $90</div>
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

<section class="why-section" aria-label="Why choose SW Automotive for oil changes">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Why SW Automotive</span>
      <h2>More Than a Quick Lube. <span class="text-accent">An Actual Inspection.</span></h2>
    </header>
    <div class="why-grid">
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="file-search"></i></div>
        <h3>Factory Spec by VIN</h3>
        <p>We look up your exact oil requirement before opening the drain plug. Not a sign on the wall — your car's actual spec.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-2" data-animate>
        <div class="why-icon"><i data-lucide="clipboard-check"></i></div>
        <h3>Free Visual Inspection</h3>
        <p>Every oil change includes a quick check of belts, hoses, fluid levels, brake fluid, tires, and wiper condition.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-3" data-animate>
        <div class="why-icon"><i data-lucide="ban"></i></div>
        <h3>No Upsells, Ever</h3>
        <p>We tell you what we find. We won't create urgency that isn't there or push services you don't need today.</p>
      </div>
      <div class="why-card reveal-up reveal-delay-1" data-animate>
        <div class="why-icon"><i data-lucide="award"></i></div>
        <h3>ASE Certified Techs</h3>
        <p>Your oil change is performed by an ASE certified technician — not a trainee following a 6-step laminated card.</p>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#ffffff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#0e1822"/>
  </svg>
</div>

<section class="process-section" aria-label="Oil change process at SW Automotive">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label" style="color:var(--color-accent);">How It Works</span>
      <h2>Quick, Accurate, Done Right</h2>
    </header>
    <div class="process-row" role="list">
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">01</div>
        <h3>Check In</h3>
        <p>Drop off Mon–Fri 8 AM–5 PM. Tell us your mileage and any concerns.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-2" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">02</div>
        <h3>Spec Lookup</h3>
        <p>We pull your factory oil specification by VIN — viscosity, additive grade, and volume.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-3" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">03</div>
        <h3>Oil Change + Inspect</h3>
        <p>Drain, filter swap, correct oil fill, plus a quick inspection of belts, hoses, and fluid levels.</p>
      </div>
      <div class="proc-card reveal-up reveal-delay-1" data-animate role="listitem">
        <div class="proc-num" aria-hidden="true">04</div>
        <h3>Report &amp; Sticker</h3>
        <p>Written inspection notes, oil life reset, and a sticker reminder. You're done.</p>
      </div>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:#0e1822;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>

<section class="cta-banner" aria-label="Schedule oil change">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;"><i data-lucide="clock"></i>&nbsp;Mon–Fri 8 AM – 5 PM</span>
    <h2 style="font-size:clamp(1.8rem,4vw,3rem); margin-bottom:var(--space-lg); text-wrap:balance;">
      Drop In or Schedule Online.<br>
      <span class="text-gradient">The Correct Oil. Every Time.</span>
    </h2>
    <p class="prose-centered" style="color:rgba(255,255,255,0.80); margin-bottom:var(--space-xl);">
      Quick service, no upsells, and a free inspection every visit. 10404 Morias Ct, Manassas VA 20110.
    </p>
    <div style="display:flex; gap:var(--space-md); justify-content:center; flex-wrap:wrap;">
      <a href="/contact" class="btn btn-accent">Schedule My Oil Change</a>
      <a href="/about" class="btn btn-outline-white">About Our Shop</a>
    </div>
  </div>
</section>

<div class="svc-divider" style="background:var(--color-secondary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>

<section class="faq-svc" aria-label="Oil change FAQ">
  <div class="container">
    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Common Questions</span>
      <h2>Oil Change FAQs<br><span class="text-accent">for Manassas Drivers</span></h2>
    </header>
    <div class="faq-svc-wrap" role="list">
      <?php foreach ($serviceFaqs as $idx => $faq): ?>
      <div class="faq-item reveal-up reveal-delay-<?= ($idx % 3) + 1 ?>" data-animate role="listitem">
        <button class="faq-question" aria-expanded="false" aria-controls="faq-oc-<?= $idx ?>">
          <span><?= htmlspecialchars($faq['q']) ?></span>
          <span class="faq-icon" aria-hidden="true"><i data-lucide="plus"></i></span>
        </button>
        <div class="faq-answer" id="faq-oc-<?= $idx ?>" role="region">
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

<section class="svc-closing-cta" aria-label="Get your oil change done right">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;"><i data-lucide="map-pin"></i>&nbsp;10404 Morias Ct, Manassas VA 20110</span>
    <h2>The Right Oil. Fast Service.<br>Zero Pressure.</h2>
    <p>SW Automotive treats your oil change like every other job — done to specification, with a full inspection and written report. Drop in Mon–Fri, 8 AM–5 PM in Manassas.</p>
    <div class="svc-cta-btns">
      <a href="/contact" class="btn btn-accent"><i data-lucide="calendar"></i> Schedule My Oil Change</a>
      <a href="/services/" class="btn btn-outline-white"><i data-lucide="list"></i> All Services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
