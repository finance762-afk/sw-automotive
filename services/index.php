<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ================================================================
   SW Automotive — Services Index
   ================================================================ */

$pageTitle       = 'Auto Repair Services Manassas VA | SW Automotive — All Makes & Models';
$pageDescription = 'SW Automotive offers 8 expert auto repair services in Manassas, VA — maintenance, diesel, brakes, oil changes, transmission, and more. ASE certified. All makes & models.';
$canonicalUrl    = $siteUrl . '/services/';
$ogImage         = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489125528-v0msw7-574610223_855128843758998_4100558135674674243_n.jpg';
$currentPage     = 'services';

$tints  = ['card-tint-1', 'card-tint-2', 'card-tint-3'];
$delays = ['reveal-delay-1', 'reveal-delay-2', 'reveal-delay-3'];

$serviceBullets = [
  'automotive-maintenance'   => ['Factory maintenance schedules followed', 'Fluid inspection & replacement', 'Keeps vehicles running 200K+ miles'],
  'auto-repair'              => ['All makes & models serviced', 'Electronic diagnostics included', 'Drivetrain, electrical & more'],
  'diesel-repair'            => ['Fuel system diagnostics', 'EGR & DEF system service', 'Light & medium-duty trucks'],
  'small-engine-repair'      => ['Lawn mowers & generators', 'Carburetor rebuild & tuning', 'Seasonal maintenance plans'],
  'light-duty-diesel-repair' => ['Ford, GM, Ram diesel trucks', 'Injection & turbo service', 'Certified diesel technicians'],
  'brake-replacement'        => ['Pads, rotors & calipers', 'Full brake system inspection', 'Same-day service available'],
  'oil-changes'              => ['Correct grade for your engine', 'Conventional, synthetic & blend', 'No upsells, no pressure'],
  'transmission-repair'      => ['Automatic & manual service', 'Fluid flush & replacement', 'Full rebuild capability'],
];

$schemaMarkup = [
  '@context'        => 'https://schema.org',
  '@type'           => 'BreadcrumbList',
  'itemListElement' => [
    ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $siteUrl . '/'],
    ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $siteUrl . '/services/'],
  ],
];
$schemaType   = 'application/ld+json'; // Schema format; rendered by head.php
$canonicalTag = '<link rel="canonical" href="' . $canonicalUrl . '">';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ================================================================
   Services Index — SW Automotive
   Standard Tier: ≥200 inline CSS lines
   Techniques: Layered Hero (C1), Ken Burns, Dividers (C3),
   Service Cards Grid, Signature Intro Split, Scroll Reveals
================================================================ */

/* --- Hero -------------------------------------------------- */
.services-index-hero {
  position: relative;
  min-height: 52vh;
  display: flex;
  align-items: center;
  background-size: cover;
  background-position: center 40%;
  animation: kenburns-svi 22s ease-in-out infinite alternate;
}
@keyframes kenburns-svi {
  from { background-size: 108%; background-position: center 38%; }
  to   { background-size: 120%; background-position: center 52%; }
}
.services-index-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    112deg,
    rgba(var(--color-primary-rgb), 0.95) 0%,
    rgba(var(--color-primary-rgb), 0.78) 48%,
    rgba(var(--color-primary-dark-rgb), 0.52) 100%
  );
  z-index: 1;
}
.services-index-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 1;
  pointer-events: none;
}
.services-index-hero-inner {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: var(--max-width);
  margin-inline: auto;
  padding: var(--space-3xl) var(--space-lg);
}
.svc-hero-breadcrumb {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  font-size: 0.78rem;
  color: rgba(255,255,255,0.58);
  margin-bottom: var(--space-md);
  flex-wrap: wrap;
}
.svc-hero-breadcrumb a { color: rgba(255,255,255,0.72); transition: color var(--transition-base); }
.svc-hero-breadcrumb a:hover { color: var(--color-accent); }
.svc-hero-breadcrumb span { color: rgba(255,255,255,0.35); margin-inline: 2px; }
.services-index-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2.6rem, 6vw, 4.2rem);
  line-height: 1.05;
  color: #fff;
  text-wrap: balance;
  letter-spacing: -0.01em;
  margin-bottom: var(--space-lg);
}
.services-index-hero h1 em {
  font-style: normal;
  background: linear-gradient(135deg, var(--color-accent), #6ee7f7);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.services-index-hero p {
  font-size: 1.05rem;
  color: rgba(255,255,255,0.82);
  max-width: 55ch;
  line-height: 1.70;
  margin-bottom: var(--space-xl);
}
.hero-cta-row {
  display: flex;
  gap: var(--space-md);
  flex-wrap: wrap;
}

/* --- Divider ----------------------------------------------- */
.divider-blk {
  display: block;
  line-height: 0;
  overflow: hidden;
}
.divider-blk svg { display: block; width: 100%; }

/* --- Intro Signature Split --------------------------------- */
.services-intro-section {
  padding: var(--space-4xl) var(--space-lg);
}
.services-intro-split {
  display: grid;
  grid-template-columns: 5fr 4fr;
  gap: var(--space-4xl);
  align-items: center;
}
.services-intro-text h2 {
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
  text-wrap: balance;
}
.services-intro-text p {
  color: var(--color-text-light);
  line-height: 1.75;
  max-width: 60ch;
  margin-bottom: var(--space-lg);
}
.services-intro-text p:last-of-type { margin-bottom: 0; }
.intro-cert-strip {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm);
  margin-top: var(--space-xl);
}
.intro-cert-pill {
  display: inline-flex;
  align-items: center;
  gap: var(--space-xs);
  padding: 5px 14px;
  background: rgba(var(--color-primary-rgb), 0.06);
  border: 1px solid rgba(var(--color-primary-rgb), 0.14);
  border-radius: var(--radius-full);
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.07em;
  text-transform: uppercase;
  color: var(--color-primary);
}
.intro-cert-pill i, .intro-cert-pill svg { width: 12px; height: 12px; color: var(--color-accent); }
.services-intro-img {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
}
.services-intro-img img {
  width: 100%;
  height: 400px;
  object-fit: cover;
  display: block;
  filter: saturate(0.90);
  transition: transform var(--transition-slow);
}
.services-intro-img:hover img { transform: scale(1.04); }
.services-intro-img::after {
  content: '';
  position: absolute;
  inset: 0;
  border: 2px solid rgba(var(--color-accent-rgb), 0.22);
  border-radius: var(--radius-lg);
  pointer-events: none;
}
.intro-stat-float {
  position: absolute;
  bottom: var(--space-lg);
  left: calc(-1 * var(--space-xl));
  background: var(--color-primary);
  color: #fff;
  padding: var(--space-md) var(--space-lg);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-xl);
  border-left: 4px solid var(--color-accent);
  min-width: 170px;
  z-index: 2;
}
.intro-stat-float strong {
  display: block;
  font-family: var(--font-heading);
  font-size: 2.4rem;
  color: var(--color-accent);
  line-height: 1;
}
.intro-stat-float span {
  display: block;
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.10em;
  color: rgba(255,255,255,0.68);
  margin-top: 4px;
}

/* --- Services Grid Section --------------------------------- */
.services-listing-section {
  background: var(--color-bg-alt);
  padding: var(--space-4xl) var(--space-lg);
}
.services-listing-header {
  max-width: 660px;
  margin-bottom: var(--space-3xl);
}
.services-listing-header h2 { text-wrap: balance; }

/* --- CTA Banner ------------------------------------------- */
.services-cta-mid {
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 55%, var(--color-secondary) 100%);
  padding: var(--space-3xl) var(--space-lg);
  position: relative;
  overflow: hidden;
  text-align: center;
}
.services-cta-mid::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}
.services-cta-mid .container { position: relative; z-index: 1; }
.services-cta-mid h2 {
  font-size: clamp(1.8rem, 4vw, 3rem);
  color: #fff;
  text-wrap: balance;
  margin-bottom: var(--space-md);
}
.services-cta-mid p {
  color: rgba(255,255,255,0.78);
  max-width: 52ch;
  margin-inline: auto;
  margin-bottom: var(--space-xl);
  line-height: 1.70;
}
.cta-btn-row {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* --- Responsive -------------------------------------------- */
@media (max-width: 1023px) {
  .services-intro-split { grid-template-columns: 1fr; }
  .intro-stat-float { position: relative; left: 0; bottom: 0; display: inline-block; margin-top: var(--space-lg); }
}
@media (max-width: 767px) {
  .services-index-hero { min-height: 46vh; }
  .hero-cta-row { flex-direction: column; }
  .hero-cta-row .btn { width: 100%; justify-content: center; }
  .services-intro-img img { height: 260px; }
  .cta-btn-row { flex-direction: column; align-items: center; }
  .cta-btn-row .btn { width: 100%; max-width: 300px; justify-content: center; }
}
</style>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ================================================================
     HERO
================================================================ -->
<section
  class="services-index-hero"
  style="background-image: url('<?= htmlspecialchars($ogImage) ?>');"
  aria-label="SW Automotive services"
>
  <div class="services-index-hero-inner">
    <nav class="svc-hero-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span aria-hidden="true">›</span>
      <span aria-current="page">Services</span>
    </nav>
    <h1>8 Auto Repair Services.<br><em>One Standard of Excellence.</em></h1>
    <p>
      From routine oil changes to diesel diagnostics and transmission rebuilds,
      SW Automotive handles every service with ASE certified technicians and
      27 years of Nissan dealership expertise — all makes, all models, Manassas VA.
    </p>
    <div class="hero-cta-row">
      <a href="/contact" class="btn btn-accent">
        <i data-lucide="clipboard-list"></i>
        Get a Free Estimate
      </a>
      <a href="#services-listing" class="btn btn-outline-white">
        <i data-lucide="list"></i>
        Browse All Services
      </a>
    </div>
  </div>
</section>

<!-- Divider: hero (primary) → intro (white) — diagonal -->
<div class="divider-blk" style="background:var(--color-primary);" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#ffffff"/>
  </svg>
</div>


<!-- ================================================================
     INTRO SPLIT — Signature section with overlapping stat card
================================================================ -->
<section class="services-intro-section" aria-label="About SW Automotive services">
  <div class="container">
    <div class="services-intro-split">

      <div class="services-intro-text" data-animate>
        <span class="eyebrow-label">Why Choose SW Automotive</span>
        <h2>Factory-Level Expertise<br>for Every Job We Touch</h2>
        <p>
          Most independent shops can handle basic maintenance. SW Automotive was built
          for the jobs others turn away — diesels with DPF problems, hybrids with high-voltage
          faults, European makes that need dealer-spec procedures. Our owner spent 27 years
          earning Nissan Master Technician status before opening this shop.
        </p>
        <p>
          That background means your vehicle gets diagnosed correctly the first time.
          We run factory-level scan tools, follow OEM procedures, and explain every finding
          in plain language before asking for your approval. No guesswork. No mystery charges.
        </p>
        <div class="intro-cert-strip" aria-label="Certifications">
          <?php foreach ($certifications as $cert): ?>
          <span class="intro-cert-pill">
            <i data-lucide="check-circle"></i>
            <?= htmlspecialchars($cert) ?>
          </span>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="services-intro-img" data-animate="wipe-right">
        <img
          src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489126638-f4l6be-483962234_666123242659560_7431100441034816467_n.jpg"
          alt="SW Automotive technician working on a vehicle in Manassas VA"
          width="700" height="400"
          loading="lazy"
        >
        <div class="intro-stat-float" aria-label="27 plus years of experience">
          <strong>27+</strong>
          <span>Years Dealership<br>Experience</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- Divider: white → services listing (bg-alt) — wave -->
<div class="divider-blk" style="background:#ffffff;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <path d="M0,25 C360,50 720,0 1080,25 C1260,38 1380,18 1440,20 L1440,50 L0,50 Z" fill="#f4f7fa"/>
  </svg>
</div>


<!-- ================================================================
     SERVICES LISTING GRID
================================================================ -->
<section class="services-listing-section" id="services-listing" aria-label="All SW Automotive services">
  <div class="container">

    <header class="services-listing-header reveal-up" data-animate>
      <span class="eyebrow-label">What We Do</span>
      <h2><?= count($services) ?> Services. <span class="text-accent">One Standard.</span></h2>
      <span class="section-subtitle">Expert auto service for every make, every model, in Manassas VA</span>
      <p class="prose" style="margin-top:var(--space-md);">
        Every service listed below is performed by ASE certified technicians following
        OEM specifications. We quote in writing before starting any job — no surprises,
        no pressure, no upsells.
      </p>
    </header>

    <div class="services-grid">
      <?php foreach ($services as $i => $svc):
        $tintClass  = $tints[$i % 3];
        $delayClass = $delays[$i % 3];
        $bullets    = $serviceBullets[$svc['slug']] ?? ['Expert certified service', 'All makes & models', 'Upfront written estimates'];
      ?>
      <article class="service-card-with-image <?= $tintClass ?> reveal-up <?= $delayClass ?>" data-animate>
        <div class="service-card__image">
          <img
            src="<?= htmlspecialchars($svc['photo']) ?>"
            alt="<?= htmlspecialchars($svc['name']) ?> in Manassas VA — SW Automotive"
            width="600" height="360"
            loading="lazy"
          >
        </div>
        <div class="service-card__body">
          <div class="service-card__icon" aria-hidden="true">
            <i data-lucide="<?= htmlspecialchars($svc['icon']) ?>"></i>
          </div>
          <h3><?= htmlspecialchars($svc['name']) ?></h3>
          <p class="service-card__desc"><?= htmlspecialchars($svc['description']) ?></p>
          <ul aria-label="Key benefits">
            <?php foreach ($bullets as $bullet): ?>
            <li><?= htmlspecialchars($bullet) ?></li>
            <?php endforeach; ?>
          </ul>
          <a href="/services/<?= htmlspecialchars($svc['slug']) ?>/" class="service-card__cta">
            Learn more
          </a>
        </div>
      </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- Divider: bg-alt → CTA dark -->
<div class="divider-blk" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,0 1440,50 1440,50 0,50" fill="#111e2b"/>
  </svg>
</div>


<!-- ================================================================
     MID-PAGE CTA — CTA #2
================================================================ -->
<section class="services-cta-mid" aria-label="Schedule service today">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;">
      <i data-lucide="shield-check"></i>&nbsp;Licensed &amp; Insured
    </span>
    <h2>Every Repair Starts With<br>a Written Estimate.</h2>
    <p>
      No work begins until you see and approve the cost. That's not a policy —
      it's how we've built customer relationships in Manassas for <?= $yearsInBusiness ?>+ years.
    </p>
    <div class="cta-btn-row">
      <a href="/contact" class="btn btn-accent">Get Your Free Estimate</a>
      <a href="/about" class="btn btn-outline-white">Meet Our Technicians</a>
    </div>
  </div>
</section>


<!-- Divider: dark → white -->
<div class="divider-blk" style="background:#111e2b;" aria-hidden="true">
  <svg viewBox="0 0 1440 50" preserveAspectRatio="none" style="height:50px;width:100%;">
    <polygon points="0,50 1440,0 1440,50" fill="#ffffff"/>
  </svg>
</div>


<!-- ================================================================
     CLOSING CTA — CTA #3
================================================================ -->
<section class="section" aria-label="Visit SW Automotive" style="background:#fff; padding:var(--space-4xl) var(--space-lg); text-align:center;">
  <div class="container">
    <span class="eyebrow-label" style="justify-content:center; display:flex;">
      <i data-lucide="map-pin"></i>&nbsp;Manassas, VA 20110
    </span>
    <h2 style="font-size:clamp(1.8rem,4vw,3rem); color:var(--color-primary); margin-bottom:var(--space-lg); text-wrap:balance;">
      Not Sure Which Service You Need?<br>
      <span class="text-accent">Start With a Diagnostic.</span>
    </h2>
    <p class="prose-centered" style="color:var(--color-text-light); margin-bottom:var(--space-2xl);">
      Drop in or submit a free estimate request and describe what your vehicle is doing.
      Our technicians will run a full diagnostic scan and give you a straight answer —
      Mon–Fri, 8 AM–5 PM at 10404 Morias Ct, Manassas VA 20110.
    </p>
    <div class="cta-btn-row">
      <a href="/contact" class="btn btn-primary">
        <i data-lucide="calendar"></i>
        Schedule a Diagnostic
      </a>
      <a href="/service-area" class="btn btn-secondary">
        <i data-lucide="map"></i>
        See Our Service Area
      </a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
