<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$currentService = null;
foreach ($services as $s) {
    if ($s['slug'] === 'light-duty-diesel-repair') { $currentService = $s; break; }
}

$serviceFaqs = [
    ['q' => 'What diesel pickup trucks do you service in Manassas?',
     'a' => 'We service all major light-duty diesel trucks: Ford F-250/F-350 with Power Stroke engines (6.7L, 6.4L, 7.3L), GM/Chevy Silverado and Sierra with Duramax (6.6L LML, L5P, LB7), and Ram 2500/3500 with Cummins (5.9L and 6.7L). We also work on diesel-powered midsize trucks and SUVs.'],
    ['q' => 'How much does diesel truck repair cost near Manassas?',
     'a' => 'Diesel fuel injector replacement runs $400–$1,200 per injector depending on brand. DPF cleaning is $150–$350. EGR cleaning is $200–$500. Glow plug replacement is $50–$120 each. All pricing includes a written estimate before work begins — no surprises at pickup.'],
    ['q' => 'What is a DPF and why does mine need service?',
     'a' => 'The Diesel Particulate Filter (DPF) traps soot from your exhaust. Under normal driving, it regenerates (burns off the soot) automatically. If your truck does frequent short trips, the DPF can become clogged, triggering reduced power mode. We perform forced regeneration or physical cleaning to restore full performance without replacing the unit.'],
    ['q' => 'Can you fix the check engine light on my diesel truck?',
     'a' => 'Yes. We run diesel-specific diagnostic scans (not just generic OBD-II) to pull fault codes from fuel, EGR, DPF, SCR/DEF, and turbo systems. Common diesel CEL causes: injector fault, EGR valve, boost pressure, glow plugs, or DEF quality. We diagnose and repair — not just clear the code.'],
];

$schemaMarkup = json_encode(generateServiceSchema($currentService, $serviceFaqs));
$heroPreloadImage = $currentService['photo'];

$pageTitle       = 'Light Duty Diesel Repair in Manassas, VA | SW Automotive';
$pageDescription = 'Expert light-duty diesel truck repair in Manassas, VA — Ford Power Stroke, GM Duramax, Ram Cummins. DPF, EGR, injectors, diagnostics. Written estimates.';
$canonicalUrl    = $siteUrl . '/services/light-duty-diesel-repair/';
$ogImage         = $currentService['photo'];
$currentPage     = 'light-duty-diesel-repair';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
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
  from { background-size: 110%; background-position: center 40%; }
  to   { background-size: 122%; background-position: center 60%; }
}
.svc-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(155deg, rgba(14,24,34,0.82) 0%, rgba(14,24,34,0.42) 100%);
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
.svc-breadcrumb .sep { color: rgba(255,255,255,0.3); }
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
  max-width: 54ch;
  margin-bottom: var(--space-xl);
  line-height: 1.6;
}
.svc-hero__ctas {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  align-items: center;
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

/* ─── Signature: Truck Brand Grid ─── */
.svc-brands {
  padding: var(--section-pad);
  background: var(--color-bg-dark);
  position: relative;
  overflow: hidden;
}
.svc-brands::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 70% 50%, rgba(6,182,212,0.08) 0%, transparent 60%);
  pointer-events: none;
}
.svc-brands__header {
  text-align: center;
  margin-bottom: var(--space-3xl);
  position: relative;
  z-index: 1;
}
.svc-brands__header h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: #fff;
  text-wrap: balance;
  margin-bottom: var(--space-sm);
}
.svc-brands__header p {
  color: rgba(255,255,255,0.65);
  max-width: 50ch;
  margin-inline: auto;
  line-height: 1.65;
}
.svc-brands__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
  position: relative;
  z-index: 1;
}
.brand-card {
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.08);
  border-top: 3px solid var(--color-accent);
  border-radius: var(--radius-lg);
  padding: var(--space-xl) var(--space-lg);
  transition: background var(--transition-base), transform var(--transition-base), box-shadow var(--transition-base);
}
.brand-card:hover {
  background: rgba(6,182,212,0.08);
  transform: translateY(-4px);
  box-shadow: 0 12px 32px rgba(6,182,212,0.12);
}
.brand-card__name {
  font-family: var(--font-heading);
  font-size: 1.25rem;
  font-weight: 800;
  color: var(--color-accent);
  margin-bottom: var(--space-xs);
  letter-spacing: 0.03em;
}
.brand-card__engine {
  font-size: 0.82rem;
  color: rgba(255,255,255,0.45);
  margin-bottom: var(--space-md);
  font-weight: 500;
  letter-spacing: 0.05em;
  text-transform: uppercase;
}
.brand-card ul {
  list-style: none;
  padding: 0;
  margin: 0;
  display: flex;
  flex-direction: column;
  gap: var(--space-xs);
}
.brand-card ul li {
  font-size: 0.88rem;
  color: rgba(255,255,255,0.72);
  padding-left: 1.25rem;
  position: relative;
  line-height: 1.5;
}
.brand-card ul li::before {
  content: '›';
  position: absolute;
  left: 0;
  color: var(--color-accent);
  font-weight: 700;
}

/* ─── Why Cards ─── */
.svc-why {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
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
  background: var(--color-bg);
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
  background: var(--color-bg);
  position: relative;
}
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
  background: var(--color-primary);
  border: 2px solid var(--color-accent);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  font-family: var(--font-heading);
  font-size: 1.3rem;
  font-weight: 800;
  color: var(--color-accent);
  margin: 0 auto var(--space-md);
}
.process-step h3 {
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-xs);
}
.process-step p {
  font-size: 0.85rem;
  color: var(--color-text-light);
  line-height: 1.55;
  margin: 0;
}

/* ─── Mid CTA ─── */
.svc-cta-mid {
  padding: var(--section-pad);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-bg-dark) 100%);
  text-align: center;
  position: relative;
  overflow: hidden;
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
  position: relative; z-index: 1;
  text-wrap: balance;
}
.svc-cta-mid p {
  color: rgba(255,255,255,0.78);
  max-width: 50ch;
  margin: 0 auto var(--space-xl);
  position: relative; z-index: 1;
  line-height: 1.65;
}
.svc-cta-mid__actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  justify-content: center;
  position: relative; z-index: 1;
}
.svc-cta-mid__phone {
  font-family: var(--font-heading);
  font-size: 1.6rem;
  font-weight: 800;
  color: var(--color-accent);
}
.svc-cta-mid__phone a { color: inherit; }

/* ─── FAQ ─── */
.svc-faq {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.faq-list { margin-top: var(--space-3xl); max-width: 760px; margin-inline: auto; }
.faq-item { border-bottom: 1px solid rgba(26,43,60,0.1); }
.faq-question {
  width: 100%; background: none; border: none; cursor: pointer;
  text-align: left;
  padding: var(--space-lg) 0;
  display: flex; justify-content: space-between; align-items: center;
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
  border: 2px solid var(--color-accent);
  border-radius: 50%;
  display: flex; align-items: center; justify-content: center;
  transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base);
  color: var(--color-accent);
}
.faq-item.open .faq-chevron {
  transform: rotate(180deg);
  background: var(--color-accent);
  color: #fff;
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
  display: flex; flex-wrap: wrap;
  gap: var(--space-md); justify-content: center;
}
.svc-cta-close .btn-primary {
  background: var(--color-accent);
  border-color: var(--color-accent);
}

/* ─── Responsive ─── */
@media (max-width: 1023px) {
  .svc-detail__grid { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .svc-brands__grid { grid-template-columns: 1fr 1fr; }
  .process-steps { grid-template-columns: repeat(2, 1fr); }
  .process-steps::before { display: none; }
}
@media (max-width: 767px) {
  .svc-hero { min-height: 60vh; padding-bottom: var(--space-2xl); }
  .svc-detail__photo-pair { grid-template-columns: 1fr; }
  .svc-why__grid { grid-template-columns: 1fr; }
  .svc-brands__grid { grid-template-columns: 1fr; }
  .process-steps { grid-template-columns: 1fr; gap: var(--space-xl); }
  .svc-cta-mid__actions { flex-direction: column; align-items: center; }
  .svc-cta-close__actions { flex-direction: column; align-items: center; }
}
</style>

<!-- ═══ HERO ═══ -->
<section class="svc-hero" aria-label="Light duty diesel repair hero">
  <div class="container svc-hero__inner">
    <nav class="svc-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="sep" aria-hidden="true">›</span>
      <a href="/services/">Services</a>
      <span class="sep" aria-hidden="true">›</span>
      <span aria-current="page">Light Duty Diesel Repair</span>
    </nav>
    <span class="svc-hero__eyebrow">Diesel Truck Specialists</span>
    <h1>Light Duty Diesel Repair<br>in Manassas, VA</h1>
    <p class="svc-hero__sub">Ford Power Stroke. GM Duramax. Ram Cummins. We know what your diesel truck needs and we fix it right — from DPF cleaning to injector replacement.</p>
    <div class="svc-hero__ctas">
      <a href="/contact" class="btn-primary">Book a Diesel Service</a>
      <a href="/services/" class="btn-secondary" style="border-color:rgba(255,255,255,0.4);color:#fff;">View All Services</a>
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
        <span class="svc-detail__eyebrow">Diesel Truck Service</span>
        <h2 id="svc-detail-heading">Your Diesel Truck Deserves a Shop That Knows Diesel</h2>
        <p>Light-duty diesel pickups require diagnosis tools, parts knowledge, and hands-on experience that goes well beyond standard gas engine work. A misdiagnosed DPF issue leads to an unnecessary $2,000+ replacement. A missed injector leak turns into catastrophic engine damage. SW Automotive has the diesel-specific training to get it right the first time.</p>
        <p>We handle everything from routine maintenance (fuel filter, DEF fluid, oil service) to complex repairs: fuel injector replacement, EGR cleaning, turbo rebuild, DPF forced regen, and emissions system service. All work comes with a written estimate and a warranty.</p>
        <div class="svc-detail__meta">
          <span class="svc-detail__meta-item">
            <i data-lucide="truck" style="width:16px;height:16px;" aria-hidden="true"></i>
            All Diesel Pickup Brands
          </span>
          <span class="svc-detail__meta-item">
            <i data-lucide="file-text" style="width:16px;height:16px;" aria-hidden="true"></i>
            Written Estimate First
          </span>
          <span class="svc-detail__meta-item">
            <i data-lucide="shield-check" style="width:16px;height:16px;" aria-hidden="true"></i>
            Light Duty Diesel Certified
          </span>
        </div>
      </div>
      <div class="svc-detail__photos">
        <div class="svc-detail__photo-main">
          <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489121516-zgsofk-35A7AB29-CD6D-42C1-9F8B-4DBC0EED858A.jpeg"
               alt="Light duty diesel truck repair at SW Automotive Manassas VA"
               width="600" height="450" loading="lazy">
        </div>
        <div class="svc-detail__photo-pair">
          <div class="svc-detail__photo-thumb">
            <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489119856-1ybgxb-310074191_175091698429386_8965809722095922256_n.jpg"
                 alt="Diesel engine service in Manassas Virginia SW Automotive"
                 width="300" height="225" loading="lazy">
          </div>
          <div class="svc-detail__photo-thumb">
            <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489125528-v0msw7-574610223_855128843758998_4100558135674674243_n.jpg"
                 alt="Diesel truck maintenance and repair Manassas VA shop"
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
    <path d="M0 0 L1440 60 L1440 0 Z" fill="var(--color-bg-dark)"/>
  </svg>
</div>

<!-- ═══ SIGNATURE: TRUCK BRAND GRID ═══ -->
<section class="svc-brands" aria-labelledby="svc-brands-heading">
  <div class="container">
    <div class="svc-brands__header" data-animate="fade-up">
      <span class="eyebrow-label" style="color:rgba(255,255,255,0.55);">Trucks We Service</span>
      <h2 id="svc-brands-heading">Three Platforms. All Systems.</h2>
      <p>We service the three major light-duty diesel truck platforms — and we know the failure patterns specific to each one.</p>
    </div>
    <div class="svc-brands__grid">
      <article class="brand-card" data-animate="fade-up" data-animate-delay="100">
        <div class="brand-card__name">Ford Power Stroke</div>
        <div class="brand-card__engine">6.7L · 6.4L · 6.0L · 7.3L</div>
        <ul>
          <li>EGR cooler &amp; valve service</li>
          <li>DPF cleaning and forced regen</li>
          <li>Fuel injector diagnosis &amp; replacement</li>
          <li>Turbocharger service</li>
          <li>Glow plug and FICM replacement</li>
          <li>Coolant system degas bottle</li>
        </ul>
      </article>
      <article class="brand-card" data-animate="fade-up" data-animate-delay="200">
        <div class="brand-card__name">GM Duramax</div>
        <div class="brand-card__engine">6.6L LML · L5P · LB7 · LLY</div>
        <ul>
          <li>Injector return line repair (LB7)</li>
          <li>DPF / DEF system diagnostics</li>
          <li>Fuel injection control module</li>
          <li>EGR system cleaning</li>
          <li>Turbo vane actuator repair</li>
          <li>Head gasket diagnosis</li>
        </ul>
      </article>
      <article class="brand-card" data-animate="fade-up" data-animate-delay="300">
        <div class="brand-card__name">Ram Cummins</div>
        <div class="brand-card__engine">6.7L · 5.9L (12v &amp; 24v)</div>
        <ul>
          <li>VP44 injection pump (5.9L)</li>
          <li>CP3 pump and lift pump</li>
          <li>DPF / SCR / DEF system service</li>
          <li>EGR valve and cooler</li>
          <li>Fuel injector cups and o-rings</li>
          <li>Grid heater diagnostics</li>
        </ul>
      </article>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-diag" aria-hidden="true">
  <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;">
    <path d="M0 60 L1440 0 L1440 60 Z" fill="var(--color-bg-alt)"/>
  </svg>
</div>

<!-- ═══ WHY ═══ -->
<section class="svc-why" aria-labelledby="svc-why-heading">
  <div class="container">
    <div data-animate="fade-up" style="text-align:center;">
      <span class="eyebrow-label">Why SW Automotive</span>
      <h2 id="svc-why-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:var(--color-primary);text-wrap:balance;">Diesel Diagnosis Done Right</h2>
    </div>
    <div class="svc-why__grid">
      <div class="why-card" data-animate="fade-up" data-animate-delay="100">
        <div class="why-card__icon"><i data-lucide="cpu" aria-hidden="true"></i></div>
        <div class="why-card__body">
          <h3>Diesel-Specific Scan Tools</h3>
          <p>We run manufacturer-level diagnostics — not just generic OBD-II. That means reading injection timing, boost pressure, DPF soot load, and DEF quality codes that consumer scanners miss.</p>
        </div>
      </div>
      <div class="why-card" data-animate="fade-up" data-animate-delay="200">
        <div class="why-card__icon"><i data-lucide="award" aria-hidden="true"></i></div>
        <div class="why-card__body">
          <h3>Light Duty Diesel Certified</h3>
          <p>Our technicians hold Light Duty Diesel Certification and have hands-on experience with the specific failure patterns of each diesel platform — not just general automotive theory.</p>
        </div>
      </div>
      <div class="why-card" data-animate="fade-up" data-animate-delay="300">
        <div class="why-card__icon"><i data-lucide="file-text" aria-hidden="true"></i></div>
        <div class="why-card__body">
          <h3>Written Estimate Every Time</h3>
          <p>Diesel repairs carry higher price tags. You'll have a complete written breakdown of parts and labor before we begin — and the price won't change when you pick up.</p>
        </div>
      </div>
      <div class="why-card" data-animate="fade-up" data-animate-delay="400">
        <div class="why-card__icon"><i data-lucide="shield" aria-hidden="true"></i></div>
        <div class="why-card__body">
          <h3>Repair Warranty Included</h3>
          <p>All diesel repairs come with a labor warranty. If the same issue returns after our work, we make it right — no argument, no charge.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ═══ PROCESS ═══ -->
<section class="svc-process" aria-labelledby="svc-process-heading" style="padding:var(--section-pad);background:var(--color-bg);">
  <div class="container">
    <div data-animate="fade-up" style="text-align:center;">
      <span class="eyebrow-label">How We Work</span>
      <h2 id="svc-process-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.5rem);font-weight:800;color:var(--color-primary);text-wrap:balance;margin:var(--space-sm) 0 var(--space-xs);">Your Diesel Service, Step by Step</h2>
    </div>
    <div class="process-steps">
      <div class="process-step" data-animate="fade-up" data-animate-delay="100">
        <div class="process-step__num">1</div>
        <h3>Book a Drop-Off</h3>
        <p>Call or submit online. We'll schedule your drop-off and confirm what symptoms you're experiencing.</p>
      </div>
      <div class="process-step" data-animate="fade-up" data-animate-delay="200">
        <div class="process-step__num">2</div>
        <h3>Diesel Diagnostics</h3>
        <p>We run brand-specific scan tools and perform a hands-on inspection. Root cause identified — not just the dashboard warning.</p>
      </div>
      <div class="process-step" data-animate="fade-up" data-animate-delay="300">
        <div class="process-step__num">3</div>
        <h3>Written Estimate</h3>
        <p>You receive a complete cost breakdown. No work begins until you approve it. Changes to scope require your sign-off.</p>
      </div>
      <div class="process-step" data-animate="fade-up" data-animate-delay="400">
        <div class="process-step__num">4</div>
        <h3>Repair &amp; Road Test</h3>
        <p>We complete the repair, clear fault codes, and road test. You get a service summary and the truck back running clean.</p>
      </div>
    </div>
  </div>
</section>

<!-- ═══ MID CTA ═══ -->
<section class="svc-cta-mid" aria-label="Schedule diesel truck repair">
  <div class="container">
    <h2>Diesel Trouble? Don't Let It Sit.</h2>
    <p>Diesel issues compound fast — a missed DPF regeneration leads to a clogged filter; a small injector leak becomes a major engine repair. Call now or drop it off today.</p>
    <div class="svc-cta-mid__actions">
      <a href="/contact" class="btn-primary">Book a Diesel Service</a>
      <div class="svc-cta-mid__phone">
        <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>">Call for Same-Week Service</a>
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
      <h2 id="svc-faq-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:var(--color-primary);text-wrap:balance;">Diesel Truck Repair FAQs</h2>
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
        <div class="faq-answer" id="faq-answer-<?php echo $i; ?>" role="region">
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
      $related = array_filter($services, fn($s) => $s['slug'] !== 'light-duty-diesel-repair');
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
<section class="svc-cta-close" aria-label="Schedule light duty diesel repair in Manassas">
  <div class="container">
    <h2>Power Stroke, Duramax, or Cummins —<br>We've Got You Covered.</h2>
    <p>SW Automotive handles light-duty diesel repair in Manassas, VA with diesel-specific tools, certified technicians, and written estimates on every job. No guesswork. No surprises.</p>
    <div class="svc-cta-close__actions">
      <a href="/contact" class="btn-primary">Book a Diesel Service</a>
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
