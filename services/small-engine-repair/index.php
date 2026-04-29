<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentService = null;
foreach ($services as $s) {
    if ($s['slug'] === 'small-engine-repair') { $currentService = $s; break; }
}

$serviceFaqs = [
    ['q' => 'What small engine equipment do you repair?',
     'a' => 'We repair lawn mowers (push and riding), generators, pressure washers, chainsaws, tillers, snow blowers, and most small engine equipment under 25 HP. If it runs on a small gas engine, we can diagnose and fix it.'],
    ['q' => 'How much does small engine repair cost in Manassas?',
     'a' => 'Carburetor cleaning typically runs $45–$85. A tune-up (air filter, spark plug, oil change, blade sharpening) is $55–$95. Engine overhauls range from $150–$300 depending on the unit. We provide a written estimate before any work begins.'],
    ['q' => 'How long does a small engine repair take?',
     'a' => 'Most minor repairs — carburetor clean, tune-up, spark plug, belt replacement — are completed same day or next day. Complex overhauls or parts-on-order jobs typically take 3–5 business days. We call you before starting work and when it\'s ready.'],
    ['q' => 'Is it worth repairing an old lawn mower or generator?',
     'a' => 'If the engine is in good shape and the repair cost is under 50% of replacement value, repair almost always makes sense. We\'ll tell you honestly if it\'s not worth fixing — and we\'ll give you that assessment free of charge before any work begins.'],
];

$schemaMarkup = json_encode(generateServiceSchema($currentService, $serviceFaqs));
$heroPreloadImage = $currentService['photo'];

$pageTitle       = 'Small Engine Repair in Manassas, VA | SW Automotive';
$pageDescription = 'Expert small engine repair in Manassas, VA — lawn mowers, generators, pressure washers, and more. Same-day and next-day service. Written estimates, no surprises.';
$canonicalUrl    = $siteUrl . '/services/small-engine-repair/';
$ogImage         = $currentService['photo'];
$currentPage     = 'small-engine-repair';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ─── Page Tokens ─── */
:root {
  --hero-overlay-start: rgba(14, 24, 34, 0.78);
  --hero-overlay-end:   rgba(14, 24, 34, 0.45);
}

/* ─── Hero ─── */
.svc-hero {
  position: relative;
  min-height: 72vh;
  display: flex;
  align-items: flex-end;
  padding-bottom: var(--space-3xl);
  overflow: hidden;
  background-image: url('<?php echo $currentService['photo']; ?>');
  background-size: cover;
  background-position: center;
  animation: kenburns 22s ease-in-out infinite alternate;
}
@keyframes kenburns {
  from { background-size: 110%; background-position: center 30%; }
  to   { background-size: 122%; background-position: center 60%; }
}
.svc-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(160deg, var(--hero-overlay-start) 0%, var(--hero-overlay-end) 100%);
  z-index: 1;
}
.svc-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  background-size: 180px;
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.svc-hero__inner {
  position: relative;
  z-index: 3;
  width: 100%;
}
.svc-breadcrumb {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  margin-bottom: var(--space-lg);
  font-size: 0.8rem;
  color: rgba(255,255,255,0.65);
}
.svc-breadcrumb a { color: rgba(255,255,255,0.65); transition: color var(--transition-base); }
.svc-breadcrumb a:hover { color: var(--color-accent); }
.svc-breadcrumb .sep { color: rgba(255,255,255,0.35); }
.svc-hero__eyebrow {
  display: inline-block;
  background: var(--color-accent);
  color: #fff;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  padding: 4px 14px;
  border-radius: 40px;
  margin-bottom: var(--space-md);
}
.svc-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.2rem, 5vw, 3.8rem);
  font-weight: 800;
  color: #fff;
  line-height: 1.1;
  text-wrap: balance;
  margin-bottom: var(--space-md);
  background: linear-gradient(135deg, #fff 60%, var(--color-accent));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.svc-hero__sub {
  font-size: 1.1rem;
  color: rgba(255,255,255,0.82);
  max-width: 52ch;
  margin-bottom: var(--space-xl);
  line-height: 1.6;
}
.svc-hero__ctas {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  align-items: center;
}
.svc-hero__ctas .btn-secondary {
  border-color: rgba(255,255,255,0.4);
  color: #fff;
}
.svc-hero__ctas .btn-secondary:hover {
  border-color: var(--color-accent);
  color: var(--color-accent);
}

/* ─── Dividers ─── */
.divider-wave { line-height: 0; }
.divider-wave svg { display: block; width: 100%; }
.divider-diag { overflow: hidden; line-height: 0; }
.divider-diag svg { display: block; width: 100%; }

/* ─── Detail Section ─── */
.svc-detail {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.svc-detail__grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-3xl);
  align-items: start;
}
.svc-detail__content { }
.svc-detail__eyebrow {
  display: inline-block;
  color: var(--color-accent);
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  margin-bottom: var(--space-md);
}
.svc-detail__content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.7rem, 3.5vw, 2.4rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.2;
  text-wrap: balance;
  margin-bottom: var(--space-lg);
}
.svc-detail__content p {
  color: var(--color-text);
  line-height: 1.75;
  margin-bottom: var(--space-md);
  max-width: 58ch;
}
.svc-detail__meta {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm) var(--space-lg);
  margin-top: var(--space-lg);
}
.svc-detail__meta-item {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  font-size: 0.9rem;
  color: var(--color-text);
  font-weight: 600;
}
.svc-detail__meta-item svg { color: var(--color-accent); flex-shrink: 0; }
.svc-detail__photos { display: flex; flex-direction: column; gap: var(--space-md); }
.svc-detail__photo-main {
  border-radius: var(--radius-lg);
  overflow: hidden;
  aspect-ratio: 4/3;
  box-shadow: var(--shadow-lg);
}
.svc-detail__photo-main img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform 0.5s ease;
}
.svc-detail__photo-main:hover img { transform: scale(1.04); }
.svc-detail__photo-pair { display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md); }
.svc-detail__photo-thumb {
  border-radius: var(--radius-md);
  overflow: hidden;
  aspect-ratio: 4/3;
  box-shadow: var(--shadow-md);
}
.svc-detail__photo-thumb img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  transition: transform 0.5s ease;
}
.svc-detail__photo-thumb:hover img { transform: scale(1.06); }

/* ─── Signature: Equipment Grid ─── */
.svc-equipment {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.svc-equipment__header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.svc-equipment__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.equipment-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  box-shadow: var(--shadow-sm);
  text-align: center;
  transition: transform var(--transition-base), box-shadow var(--transition-base);
  border-top: 3px solid transparent;
}
.equipment-card:hover {
  transform: translateY(-5px);
  box-shadow: var(--shadow-md);
  border-top-color: var(--color-accent);
}
.equipment-card__icon {
  width: 60px;
  height: 60px;
  background: rgba(6, 182, 212, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto var(--space-md);
  color: var(--color-accent);
  transition: background var(--transition-base), transform var(--transition-base);
}
.equipment-card:hover .equipment-card__icon {
  background: var(--color-accent);
  color: #fff;
  transform: rotate(-6deg) scale(1.1);
}
.equipment-card h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.equipment-card p {
  font-size: 0.88rem;
  color: var(--color-text-light);
  line-height: 1.55;
  margin: 0;
}

/* ─── Why Cards ─── */
.svc-why {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.svc-why__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-3xl);
}
.why-card {
  display: flex;
  gap: var(--space-lg);
  align-items: flex-start;
  padding: var(--space-xl);
  background: var(--color-bg-alt);
  border-radius: var(--radius-lg);
  border-left: 3px solid var(--color-accent);
  transition: box-shadow var(--transition-base);
}
.why-card:hover { box-shadow: var(--shadow-md); }
.why-card__icon {
  width: 48px; height: 48px; flex-shrink: 0;
  background: rgba(6, 182, 212, 0.12);
  border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
}
.why-card__body h3 {
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-xs);
}
.why-card__body p {
  font-size: 0.9rem;
  color: var(--color-text-light);
  line-height: 1.6;
  margin: 0;
}

/* ─── Process ─── */
.svc-process {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
}
.svc-process h2, .svc-process .eyebrow-label, .svc-process .section-subtitle { color: #fff; }
.svc-process .eyebrow-label { opacity: 0.7; }
.svc-process .section-subtitle { opacity: 0.75; }
.process-steps {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-3xl);
  position: relative;
}
.process-steps::before {
  content: '';
  position: absolute;
  top: 32px;
  left: calc(12.5% + 16px);
  right: calc(12.5% + 16px);
  height: 2px;
  background: linear-gradient(90deg, var(--color-accent), rgba(6,182,212,0.2));
  z-index: 0;
}
.process-step {
  text-align: center;
  position: relative;
  z-index: 1;
}
.process-step__num {
  width: 64px; height: 64px;
  background: var(--color-accent);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-heading);
  font-size: 1.3rem;
  font-weight: 800;
  color: #fff;
  margin: 0 auto var(--space-md);
  box-shadow: 0 0 0 6px rgba(6,182,212,0.18);
}
.process-step h3 {
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  color: #fff;
  margin-bottom: var(--space-xs);
}
.process-step p {
  font-size: 0.85rem;
  color: rgba(255,255,255,0.65);
  line-height: 1.55;
  margin: 0;
}

/* ─── Mid CTA ─── */
.svc-cta-mid {
  padding: var(--section-pad);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-bg-dark) 100%);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.svc-cta-mid::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.svc-cta-mid h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3.5vw, 2.4rem);
  color: #fff;
  margin-bottom: var(--space-md);
  position: relative;
  z-index: 1;
  text-wrap: balance;
}
.svc-cta-mid p {
  color: rgba(255,255,255,0.78);
  max-width: 48ch;
  margin: 0 auto var(--space-xl);
  position: relative;
  z-index: 1;
  line-height: 1.65;
}
.svc-cta-mid__actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  justify-content: center;
  position: relative;
  z-index: 1;
}
.svc-cta-mid__phone {
  font-family: var(--font-heading);
  font-size: 1.6rem;
  font-weight: 800;
  color: var(--color-accent);
  letter-spacing: 0.02em;
}
.svc-cta-mid__phone a { color: inherit; }

/* ─── FAQ ─── */
.svc-faq {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.faq-list { margin-top: var(--space-3xl); max-width: 760px; margin-inline: auto; }
.faq-item {
  border-bottom: 1px solid rgba(26,43,60,0.1);
}
.faq-question {
  width: 100%;
  background: none;
  border: none;
  cursor: pointer;
  text-align: left;
  padding: var(--space-lg) 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  gap: var(--space-md);
  font-family: var(--font-heading);
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--color-primary);
  transition: color var(--transition-base);
}
.faq-question:hover { color: var(--color-accent); }
.faq-chevron {
  flex-shrink: 0;
  width: 22px; height: 22px;
  border: 2px solid currentColor;
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base);
  color: var(--color-accent);
}
.faq-item.open .faq-chevron {
  transform: rotate(180deg);
  background: var(--color-accent);
  color: #fff;
  border-color: var(--color-accent);
}
.faq-answer {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.35s ease, padding 0.35s ease;
}
.faq-item.open .faq-answer { max-height: 300px; padding-bottom: var(--space-lg); }
.faq-answer p {
  color: var(--color-text);
  line-height: 1.7;
  font-size: 0.95rem;
  margin: 0;
  max-width: 66ch;
}

/* ─── Related Services ─── */
.svc-related {
  padding: var(--section-pad);
  background: var(--color-bg);
}

/* ─── Closing CTA ─── */
.svc-cta-close {
  padding: var(--section-pad);
  background: var(--color-primary);
  text-align: center;
}
.svc-cta-close h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: #fff;
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.svc-cta-close p {
  color: rgba(255,255,255,0.78);
  max-width: 50ch;
  margin: 0 auto var(--space-xl);
  line-height: 1.65;
}
.svc-cta-close__actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  justify-content: center;
}
.svc-cta-close .btn-primary {
  background: var(--color-accent);
  border-color: var(--color-accent);
}

/* ─── Responsive ─── */
@media (max-width: 1023px) {
  .svc-detail__grid { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .svc-equipment__grid { grid-template-columns: repeat(2, 1fr); }
  .process-steps { grid-template-columns: repeat(2, 1fr); }
  .process-steps::before { display: none; }
}
@media (max-width: 767px) {
  .svc-hero { min-height: 60vh; padding-bottom: var(--space-2xl); }
  .svc-detail__photo-pair { grid-template-columns: 1fr; }
  .svc-why__grid { grid-template-columns: 1fr; }
  .svc-equipment__grid { grid-template-columns: 1fr; }
  .process-steps { grid-template-columns: 1fr; gap: var(--space-xl); }
  .svc-cta-mid__actions { flex-direction: column; align-items: center; }
  .svc-cta-close__actions { flex-direction: column; align-items: center; }
}
</style>

<!-- ═══ HERO ═══ -->
<section class="svc-hero" aria-label="Small engine repair hero">
  <div class="container svc-hero__inner">
    <nav class="svc-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="sep" aria-hidden="true">›</span>
      <a href="/services/">Services</a>
      <span class="sep" aria-hidden="true">›</span>
      <span aria-current="page">Small Engine Repair</span>
    </nav>
    <span class="svc-hero__eyebrow">Small Engine Specialists</span>
    <h1>Small Engine Repair<br>in Manassas, VA</h1>
    <p class="svc-hero__sub">Lawn mowers, generators, pressure washers, and more. When your equipment won't start — or runs rough — we diagnose the root cause and fix it right.</p>
    <div class="svc-hero__ctas">
      <a href="/contact" class="btn-primary">Book a Drop-Off</a>
      <a href="/services/" class="btn-secondary">All Services</a>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-wave" aria-hidden="true">
  <svg viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:48px;">
    <path d="M0 48 L0 24 C240 0 480 48 720 24 C960 0 1200 48 1440 24 L1440 48 Z" fill="var(--color-bg)"/>
  </svg>
</div>

<!-- ═══ DETAIL ═══ -->
<section class="svc-detail" aria-labelledby="svc-detail-heading">
  <div class="container">
    <div class="svc-detail__grid" data-animate="fade-up">
      <div class="svc-detail__content">
        <span class="svc-detail__eyebrow">What to Expect</span>
        <h2 id="svc-detail-heading">A Small Engine Fix Shouldn't Cost More Than the Machine Is Worth</h2>
        <p>When your lawn mower won't start or your generator surges under load, the problem usually isn't catastrophic — it's a dirty carburetor, a fouled spark plug, stale fuel, or a worn belt. SW Automotive diagnoses the actual issue and fixes only what's needed. We don't pad work orders.</p>
        <p>We service all major brands: Honda, Briggs &amp; Stratton, Kohler, Kawasaki, Tecumseh, and more. Whether it's a quick carburetor clean, a full seasonal tune-up, or an engine overhaul, you get a written estimate before we touch anything.</p>
        <div class="svc-detail__meta">
          <span class="svc-detail__meta-item">
            <i data-lucide="clock" style="width:16px;height:16px;" aria-hidden="true"></i>
            Same/Next-Day on Most
          </span>
          <span class="svc-detail__meta-item">
            <i data-lucide="file-text" style="width:16px;height:16px;" aria-hidden="true"></i>
            Written Estimate First
          </span>
          <span class="svc-detail__meta-item">
            <i data-lucide="shield-check" style="width:16px;height:16px;" aria-hidden="true"></i>
            All Major Brands
          </span>
        </div>
      </div>
      <div class="svc-detail__photos">
        <div class="svc-detail__photo-main">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489120732-6flc8u-1A89AD25-537B-4A03-8A23-71BDAB7B326F.jpeg"
               alt="Small engine repair work at SW Automotive in Manassas VA"
               width="600" height="450" loading="lazy">
        </div>
        <div class="svc-detail__photo-pair">
          <div class="svc-detail__photo-thumb">
            <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489129128-tvaas5-480214652_661491616439862_5774994120961816785_n.jpg"
                 alt="Mechanic servicing small engine equipment in Manassas Virginia"
                 width="300" height="225" loading="lazy">
          </div>
          <div class="svc-detail__photo-thumb">
            <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489124708-tbcbgr-2020-08-21.jpg"
                 alt="SW Automotive shop tools and equipment Manassas VA"
                 width="300" height="225" loading="lazy">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-diag" aria-hidden="true">
  <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;">
    <path d="M0 0 L1440 60 L1440 0 Z" fill="var(--color-bg-alt)"/>
  </svg>
</div>

<!-- ═══ SIGNATURE: EQUIPMENT GRID ═══ -->
<section class="svc-equipment" aria-labelledby="svc-equip-heading">
  <div class="container">
    <div class="svc-equipment__header" data-animate="fade-up">
      <span class="eyebrow-label">What We Fix</span>
      <h2 id="svc-equip-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:var(--color-primary);text-wrap:balance;margin-bottom:var(--space-sm);">Equipment We Service</h2>
      <p class="prose-centered" style="color:var(--color-text-light);text-align:center;">If it runs on a small gas engine, we can fix it — from push mowers to 10kW standby generators.</p>
    </div>
    <div class="svc-equipment__grid">
      <article class="equipment-card" data-animate="fade-up" data-animate-delay="100">
        <div class="equipment-card__icon"><i data-lucide="scissors" aria-hidden="true"></i></div>
        <h3>Lawn Mowers</h3>
        <p>Push mowers, self-propelled, and riding mowers. Carburetor cleaning, blade sharpening, belt replacement, and full tune-ups.</p>
      </article>
      <article class="equipment-card" data-animate="fade-up" data-animate-delay="200">
        <div class="equipment-card__icon"><i data-lucide="zap" aria-hidden="true"></i></div>
        <h3>Generators</h3>
        <p>Portable and standby generators — carb rebuild, AVR replacement, fuel system cleaning, governor adjustment, and load testing.</p>
      </article>
      <article class="equipment-card" data-animate="fade-up" data-animate-delay="300">
        <div class="equipment-card__icon"><i data-lucide="droplets" aria-hidden="true"></i></div>
        <h3>Pressure Washers</h3>
        <p>Gas-powered pressure washers — pump repair, unloader valve, carburetor, and full engine service.</p>
      </article>
      <article class="equipment-card" data-animate="fade-up" data-animate-delay="100">
        <div class="equipment-card__icon"><i data-lucide="axe" aria-hidden="true"></i></div>
        <h3>Chainsaws &amp; Trimmers</h3>
        <p>Two-stroke and four-stroke chainsaws, string trimmers, and blowers — carburetor, air filter, recoil starter, and bar/chain.</p>
      </article>
      <article class="equipment-card" data-animate="fade-up" data-animate-delay="200">
        <div class="equipment-card__icon"><i data-lucide="shovel" aria-hidden="true"></i></div>
        <h3>Tillers &amp; Cultivators</h3>
        <p>Front-tine and rear-tine tillers — engine service, transmission oil, tine replacement, and belt adjustment.</p>
      </article>
      <article class="equipment-card" data-animate="fade-up" data-animate-delay="300">
        <div class="equipment-card__icon"><i data-lucide="snowflake" aria-hidden="true"></i></div>
        <h3>Snow Blowers</h3>
        <p>Single and two-stage snow blowers — pre-season prep, auger shear bolts, carburetor, and impeller service.</p>
      </article>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-wave" aria-hidden="true">
  <svg viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:48px;">
    <path d="M0 0 C360 48 1080 0 1440 48 L1440 0 Z" fill="var(--color-bg)"/>
  </svg>
</div>

<!-- ═══ WHY SW AUTOMOTIVE ═══ -->
<section class="svc-why" aria-labelledby="svc-why-heading">
  <div class="container">
    <div data-animate="fade-up" style="text-align:center;margin-bottom:0;">
      <span class="eyebrow-label">Why Choose Us</span>
      <h2 id="svc-why-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:var(--color-primary);text-wrap:balance;">We Tell You the Truth About Your Equipment</h2>
    </div>
    <div class="svc-why__grid">
      <div class="why-card" data-animate="fade-up" data-animate-delay="100">
        <div class="why-card__icon"><i data-lucide="file-text" aria-hidden="true"></i></div>
        <div class="why-card__body">
          <h3>Written Estimate Before Any Work</h3>
          <p>You approve the cost before we start. No surprise charges on pickup. The price we quote is the price you pay.</p>
        </div>
      </div>
      <div class="why-card" data-animate="fade-up" data-animate-delay="200">
        <div class="why-card__icon"><i data-lucide="thumbs-up" aria-hidden="true"></i></div>
        <div class="why-card__body">
          <h3>Honest "Fix or Replace" Assessment</h3>
          <p>If a repair costs more than the equipment is worth, we'll tell you — including what a comparable replacement would run you.</p>
        </div>
      </div>
      <div class="why-card" data-animate="fade-up" data-animate-delay="300">
        <div class="why-card__icon"><i data-lucide="clock" aria-hidden="true"></i></div>
        <div class="why-card__body">
          <h3>Same-Day and Next-Day Turnaround</h3>
          <p>Most carb cleans, tune-ups, and basic repairs go out the door the same day you drop off — or by the next morning.</p>
        </div>
      </div>
      <div class="why-card" data-animate="fade-up" data-animate-delay="400">
        <div class="why-card__icon"><i data-lucide="settings-2" aria-hidden="true"></i></div>
        <div class="why-card__body">
          <h3>All Major Engine Brands</h3>
          <p>Honda, Briggs &amp; Stratton, Kohler, Kawasaki, Tecumseh, Subaru Robin — we stock common parts and carry specialty order capability for most brands.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="svc-process" aria-labelledby="svc-process-heading">
  <div class="container">
    <div data-animate="fade-up" style="text-align:center;">
      <span class="eyebrow-label" style="color:rgba(255,255,255,0.6);text-transform:uppercase;letter-spacing:.1em;font-size:.72rem;font-weight:700;">How It Works</span>
      <h2 id="svc-process-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.5rem);font-weight:800;color:#fff;text-wrap:balance;margin:var(--space-sm) 0 var(--space-xs);">From Drop-Off to Done</h2>
      <p style="color:rgba(255,255,255,0.65);max-width:48ch;margin:0 auto;">Four steps from the time you bring it in to the time you drive away with working equipment.</p>
    </div>
    <div class="process-steps">
      <div class="process-step" data-animate="fade-up" data-animate-delay="100">
        <div class="process-step__num">1</div>
        <h3>Drop It Off</h3>
        <p>Bring your equipment to our Manassas shop. No appointment necessary for small engine drop-off.</p>
      </div>
      <div class="process-step" data-animate="fade-up" data-animate-delay="200">
        <div class="process-step__num">2</div>
        <h3>Diagnosis</h3>
        <p>We test, inspect, and identify the root cause — not just the symptom. Usually complete within a few hours.</p>
      </div>
      <div class="process-step" data-animate="fade-up" data-animate-delay="300">
        <div class="process-step__num">3</div>
        <h3>Written Estimate</h3>
        <p>You receive a written breakdown of parts and labor. We don't start work until you say go.</p>
      </div>
      <div class="process-step" data-animate="fade-up" data-animate-delay="400">
        <div class="process-step__num">4</div>
        <h3>Repair &amp; Test</h3>
        <p>We fix the issue, test under load, and call you when it's ready — typically same day or next day.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ MID CTA ═══ -->
<section class="svc-cta-mid" aria-label="Contact SW Automotive for small engine repair">
  <div class="container">
    <h2>Ready to Drop Off Your Equipment?</h2>
    <p>We serve Manassas, Manassas Park, Haymarket, Gainesville, and surrounding Prince William County. No appointment needed for drop-off.</p>
    <div class="svc-cta-mid__actions">
      <a href="/contact" class="btn-primary">Schedule a Drop-Off</a>
      <div class="svc-cta-mid__phone">
        <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>">Call for Faster Service</a>
      </div>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-diag" aria-hidden="true">
  <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;">
    <path d="M0 60 L1440 0 L0 0 Z" fill="var(--color-bg-alt)"/>
  </svg>
</div>

<!-- ═══ FAQ ═══ -->
<section class="svc-faq" aria-labelledby="svc-faq-heading">
  <div class="container">
    <div data-animate="fade-up" style="text-align:center;">
      <span class="eyebrow-label">Common Questions</span>
      <h2 id="svc-faq-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:var(--color-primary);text-wrap:balance;">Small Engine Repair FAQs</h2>
    </div>
    <div class="faq-list" data-animate="fade-up">
      <?php foreach ($serviceFaqs as $i => $faq): ?>
      <div class="faq-item" id="faq-<?php echo $i; ?>">
        <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-<?php echo $i; ?>">
          <span><?php echo htmlspecialchars($faq['q']); ?></span>
          <span class="faq-chevron" aria-hidden="true">
            <svg width="10" height="6" viewBox="0 0 10 6" fill="none"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
          </span>
        </button>
        <div class="faq-answer" id="faq-answer-<?php echo $i; ?>" role="region" aria-labelledby="faq-<?php echo $i; ?>">
          <p><?php echo htmlspecialchars($faq['a']); ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-wave" aria-hidden="true">
  <svg viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:48px;">
    <path d="M0 48 L0 24 C240 0 480 48 720 24 C960 0 1200 48 1440 24 L1440 48 Z" fill="var(--color-bg)"/>
  </svg>
</div>

<!-- ═══ RELATED SERVICES ═══ -->
<section class="svc-related" aria-labelledby="svc-related-heading">
  <div class="container">
    <div data-animate="fade-up" style="text-align:center;margin-bottom:var(--space-3xl);">
      <span class="eyebrow-label">Keep Exploring</span>
      <h2 id="svc-related-heading" style="font-family:var(--font-heading);font-size:clamp(1.6rem,3.5vw,2.4rem);font-weight:800;color:var(--color-primary);text-wrap:balance;">Other Services You May Need</h2>
    </div>
    <div class="services-grid">
      <?php
      $related = array_filter($services, fn($s) => $s['slug'] !== 'small-engine-repair');
      $related = array_values($related);
      $picks   = array_slice($related, 0, 3);
      $tints   = ['card-tint-1','card-tint-2','card-tint-3'];
      foreach ($picks as $idx => $svc):
        $tint = $tints[$idx % 3];
      ?>
      <article class="service-card-with-image <?php echo $tint; ?> reveal-up" data-animate="fade-up" data-animate-delay="<?php echo ($idx+1)*100; ?>">
        <div class="service-card__image">
          <img src="<?php echo htmlspecialchars($svc['photo']); ?>"
               alt="<?php echo htmlspecialchars($svc['name']); ?> in Manassas VA"
               width="600" height="360" loading="lazy">
        </div>
        <div class="service-card__body">
          <div class="service-card__icon"><i data-lucide="<?php echo htmlspecialchars($svc['icon']); ?>" aria-hidden="true"></i></div>
          <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
          <p class="service-card__desc"><?php echo htmlspecialchars($svc['description']); ?></p>
          <a href="/services/<?php echo htmlspecialchars($svc['slug']); ?>/" class="service-card__cta">Learn more</a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ CLOSING CTA ═══ -->
<section class="svc-cta-close" aria-label="Get small engine repair in Manassas VA">
  <div class="container">
    <h2>Equipment Not Running Right?<br>Bring It In Today.</h2>
    <p>SW Automotive fixes small engines in Manassas, VA — same-day turnaround on most jobs, written estimate before we start, and honest advice when replacement makes more sense than repair.</p>
    <div class="svc-cta-close__actions">
      <a href="/contact" class="btn-primary">Book a Drop-Off</a>
      <a href="/services/" class="btn-secondary" style="border-color:rgba(255,255,255,0.35);color:#fff;">View All Services</a>
    </div>
  </div>
</section>

<script>
document.querySelectorAll('.faq-question').forEach(btn => {
  btn.addEventListener('click', () => {
    const item = btn.closest('.faq-item');
    const isOpen = item.classList.contains('open');
    document.querySelectorAll('.faq-item.open').forEach(i => {
      i.classList.remove('open');
      i.querySelector('.faq-question').setAttribute('aria-expanded','false');
    });
    if (!isOpen) {
      item.classList.add('open');
      btn.setAttribute('aria-expanded','true');
    }
  });
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
