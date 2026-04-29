<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$areaSchema = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'        => 'AutoRepair',
            '@id'          => $siteUrl . '/#business',
            'name'         => $siteName,
            'telephone'    => $phone,
            'address'      => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $address['street'],
                'addressLocality' => $address['city'],
                'addressRegion'   => $address['state'],
                'postalCode'      => $address['zip'],
                'addressCountry'  => 'US',
            ],
            'areaServed'   => array_map(fn($a) => [
                '@type' => 'City',
                'name'  => $a['city'] . ', ' . $a['state'],
            ], $serviceAreas),
        ],
        [
            '@type'           => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',         'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Service Area', 'item' => $siteUrl . '/service-area'],
            ],
        ],
    ],
];

$schemaMarkup   = json_encode($areaSchema);
$heroPreloadImage = $clientPhotos[5];

$pageTitle       = 'Auto Repair Service Area | SW Automotive — Manassas, VA & Northern Virginia';
$pageDescription = 'SW Automotive serves Manassas, Manassas Park, Haymarket, Gainesville, Woodbridge, Bristow, Nokesville, and Centreville, VA. Certified auto repair near you in Northern Virginia.';
$canonicalUrl    = $siteUrl . '/service-area';
$ogImage         = $clientPhotos[5];
$currentPage     = 'service-area';
$schemaType      = 'application/ld+json'; // Schema format; rendered by head.php
$canonicalTag    = '<link rel="canonical" href="' . $canonicalUrl . '">';

/* Area-specific content for local SEO */
$areaDetails = [
    'manassas-va'       => ['blurb' => 'Our home base. SW Automotive is located in Manassas and serves the full city — Old Town, Sudley, Signal Hill, and everywhere between. Drop off your vehicle with no appointment needed.'],
    'manassas-park-va'  => ['blurb' => 'Just minutes from our shop in neighboring Manassas Park. We regularly service vehicles from VA-28 corridor commuters who need fast turnaround.'],
    'haymarket-va'      => ['blurb' => 'Haymarket drivers get the same-day service they need without driving to a dealership. We handle all makes and models from Dominion Valley to Wellington.'],
    'gainesville-va'    => ['blurb' => 'Gainesville is a 15-minute drive from our Manassas shop. We frequently service vehicles from Gainesville residents who want honest, certified auto repair close to home.'],
    'woodbridge-va'     => ['blurb' => 'Woodbridge customers make the drive for diesel and transmission work that local shops can\'t handle. Our certified technicians are worth the trip.'],
    'bristow-va'        => ['blurb' => 'Bristow and Braemar drivers have found SW Automotive for diesel repair and preventive maintenance they can count on year after year.'],
    'nokesville-va'     => ['blurb' => 'Nokesville residents and rural Prince William County drivers bring us their work trucks and diesel pickups — we\'re one of the few shops in the area with certified diesel technicians.'],
    'centreville-va'    => ['blurb' => 'Centreville drivers come to SW Automotive for complex repairs — transmission rebuilds, diesel diagnosis, and electrical work their regular shop couldn\'t figure out.'],
];

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ─── Hero ─── */
.area-hero {
  position: relative;
  min-height: 60vh;
  display: flex;
  align-items: flex-end;
  padding-bottom: var(--space-3xl);
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos[5]; ?>');
  background-size: cover;
  background-position: center;
  animation: kenburns-area 22s ease-in-out infinite alternate;
}
@keyframes kenburns-area {
  from { background-size: 110%; background-position: center 40%; }
  to   { background-size: 122%; background-position: center 58%; }
}
.area-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(155deg, rgba(14,24,34,0.82) 0%, rgba(14,24,34,0.44) 100%);
  z-index: 1;
}
.area-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  background-size: 180px;
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.area-hero__inner {
  position: relative;
  z-index: 3;
  width: 100%;
}
.area-breadcrumb {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  margin-bottom: var(--space-lg);
  font-size: 0.8rem;
  color: rgba(255,255,255,0.6);
}
.area-breadcrumb a { color: rgba(255,255,255,0.6); transition: color var(--transition-base); }
.area-breadcrumb a:hover { color: var(--color-accent); }
.area-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.area-hero__eyebrow {
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
.area-hero h1 {
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
.area-hero__sub {
  font-size: 1.1rem;
  color: rgba(255,255,255,0.82);
  max-width: 54ch;
  line-height: 1.6;
  margin-bottom: var(--space-xl);
}
.area-hero__pills {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm);
}
.area-pill {
  background: rgba(255,255,255,0.12);
  border: 1px solid rgba(255,255,255,0.22);
  border-radius: 40px;
  padding: 5px 14px;
  font-size: 0.8rem;
  color: rgba(255,255,255,0.88);
  font-weight: 500;
  backdrop-filter: blur(4px);
}

/* ─── Dividers ─── */
.divider-wave { line-height: 0; }
.divider-wave svg { display: block; width: 100%; }
.divider-diag { overflow: hidden; line-height: 0; }
.divider-diag svg { display: block; width: 100%; }

/* ─── Intro Section ─── */
.area-intro {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.area-intro__grid {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: var(--space-3xl);
  align-items: center;
}
.area-intro__content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.7rem, 3.5vw, 2.4rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.2;
  text-wrap: balance;
  margin-bottom: var(--space-lg);
}
.area-intro__content p {
  color: var(--color-text);
  line-height: 1.75;
  margin-bottom: var(--space-md);
  max-width: 58ch;
}
.area-intro__photo {
  border-radius: var(--radius-lg);
  overflow: hidden;
  aspect-ratio: 4/3;
  box-shadow: var(--shadow-lg);
}
.area-intro__photo img {
  width: 100%; height: 100%; object-fit: cover; display: block;
}

/* ─── Areas Grid ─── */
.area-grid-section {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.area-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-lg);
  margin-top: var(--space-3xl);
}
.area-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  box-shadow: var(--shadow-sm);
  border-top: 3px solid transparent;
  transition: border-color var(--transition-base), transform var(--transition-base), box-shadow var(--transition-base);
  position: relative;
}
.area-card:hover {
  border-top-color: var(--color-accent);
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
}
.area-card__header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: var(--space-md);
}
.area-card__city {
  font-family: var(--font-heading);
  font-size: 1.2rem;
  font-weight: 800;
  color: var(--color-primary);
}
.area-card__badge {
  background: var(--color-accent);
  color: #fff;
  font-size: 0.7rem;
  font-weight: 700;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  padding: 3px 10px;
  border-radius: 40px;
}
.area-card__state {
  font-size: 0.82rem;
  color: var(--color-text-light);
  margin-bottom: var(--space-sm);
  font-weight: 500;
}
.area-card p {
  font-size: 0.88rem;
  color: var(--color-text-light);
  line-height: 1.6;
  margin: 0;
}

/* ─── Mid CTA ─── */
.area-cta-mid {
  padding: var(--section-pad);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-bg-dark) 100%);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.area-cta-mid::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.area-cta-mid h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.6rem, 3.5vw, 2.4rem);
  color: #fff;
  margin-bottom: var(--space-md);
  position: relative; z-index: 1;
  text-wrap: balance;
}
.area-cta-mid p {
  color: rgba(255,255,255,0.78);
  max-width: 50ch;
  margin: 0 auto var(--space-xl);
  position: relative; z-index: 1;
  line-height: 1.65;
}
.area-cta-mid__actions {
  display: flex; flex-wrap: wrap;
  gap: var(--space-md); justify-content: center;
  position: relative; z-index: 1;
}

/* ─── Services Strip ─── */
.area-services {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.area-services__header { text-align: center; margin-bottom: var(--space-3xl); }
.area-services__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-md);
}
.area-service-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: var(--space-sm);
  padding: var(--space-lg) var(--space-md);
  background: var(--color-bg-alt);
  border-radius: var(--radius-md);
  text-align: center;
  text-decoration: none;
  color: var(--color-text);
  transition: background var(--transition-base), transform var(--transition-base);
  border-bottom: 2px solid transparent;
}
.area-service-item:hover {
  background: rgba(6,182,212,0.08);
  transform: translateY(-3px);
  border-bottom-color: var(--color-accent);
  color: var(--color-primary);
}
.area-service-item__icon {
  color: var(--color-accent);
  transition: transform var(--transition-base);
}
.area-service-item:hover .area-service-item__icon { transform: scale(1.15) rotate(-5deg); }
.area-service-item span {
  font-weight: 600;
  font-size: 0.88rem;
  line-height: 1.35;
}

/* ─── Closing CTA ─── */
.area-cta-close {
  padding: var(--section-pad);
  background: var(--color-primary);
  text-align: center;
}
.area-cta-close h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: #fff;
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.area-cta-close p {
  color: rgba(255,255,255,0.78);
  max-width: 50ch;
  margin: 0 auto var(--space-xl);
  line-height: 1.65;
}
.area-cta-close__actions {
  display: flex; flex-wrap: wrap;
  gap: var(--space-md); justify-content: center;
}
.area-cta-close .btn-primary { background: var(--color-accent); border-color: var(--color-accent); }

/* ─── Responsive ─── */
@media (max-width: 1023px) {
  .area-intro__grid { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .area-services__grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
  .area-hero { min-height: 55vh; }
  .area-grid { grid-template-columns: 1fr; }
  .area-services__grid { grid-template-columns: repeat(2, 1fr); }
  .area-cta-mid__actions, .area-cta-close__actions { flex-direction: column; align-items: center; }
}
</style>

<!-- ═══ HERO ═══ -->
<section class="area-hero" aria-label="SW Automotive service area hero">
  <div class="container area-hero__inner">
    <nav class="area-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="sep" aria-hidden="true">›</span>
      <span aria-current="page">Service Area</span>
    </nav>
    <span class="area-hero__eyebrow">Northern Virginia</span>
    <h1>Auto Repair Near You<br>in Northern Virginia</h1>
    <p class="area-hero__sub">SW Automotive serves Manassas and surrounding communities across Prince William County and Northern Virginia — certified auto repair without the dealer price tag.</p>
    <div class="area-hero__pills" aria-label="Cities served">
      <?php foreach ($serviceAreas as $area): ?>
      <span class="area-pill"><?php echo htmlspecialchars($area['city'] . ', ' . $area['state']); ?></span>
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

<!-- ═══ INTRO ═══ -->
<section class="area-intro" aria-labelledby="area-intro-heading">
  <div class="container">
    <div class="area-intro__grid" data-animate="fade-up">
      <div class="area-intro__content">
        <span class="eyebrow-label" style="color:var(--color-accent);">Where We Work</span>
        <h2 id="area-intro-heading">Northern Virginia's Certified Auto Repair Shop — 8 Communities Served</h2>
        <p>SW Automotive is based in Manassas, VA and serves customers across Prince William County and surrounding areas. If you're searching for auto repair near me in Northern Virginia, you're within range of our shop — and within reach of ASE-certified, diesel-trained technicians who write estimates before touching your vehicle.</p>
        <p>We see customers from Manassas Park, Haymarket, Gainesville, Woodbridge, Bristow, Nokesville, and Centreville — many of them referrals from drivers who couldn't get honest answers from their local shop or dealer. If you're in Northern Virginia, we can help.</p>
        <div style="display:flex;flex-wrap:wrap;gap:var(--space-sm);margin-top:var(--space-lg);">
          <a href="/contact" class="btn-primary">Book Your Service</a>
          <a href="/services/" class="btn-secondary">See All Services</a>
        </div>
      </div>
      <div class="area-intro__photo">
        <img src="<?php echo $clientPhotos[4]; ?>"
             alt="SW Automotive serving Northern Virginia auto repair customers near Manassas"
             width="600" height="450" loading="lazy">
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

<!-- ═══ AREAS GRID ═══ -->
<section class="area-grid-section" aria-labelledby="area-grid-heading">
  <div class="container">
    <div data-animate="fade-up" style="text-align:center;">
      <span class="eyebrow-label">Communities We Serve</span>
      <h2 id="area-grid-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:var(--color-primary);text-wrap:balance;margin-bottom:var(--space-sm);">8 Northern Virginia Communities</h2>
      <p class="prose-centered" style="color:var(--color-text-light);text-align:center;">From our Manassas shop, we serve the following communities with the same certified technicians and written-estimate process every time.</p>
    </div>
    <div class="area-grid">
      <?php foreach ($serviceAreas as $idx => $area):
        $slug   = $area['slug'];
        $blurb  = $areaDetails[$slug]['blurb'] ?? '';
        $isPrimary = $area['primary'];
      ?>
      <article class="area-card" data-animate="fade-up" data-animate-delay="<?php echo (($idx % 4) + 1) * 100; ?>">
        <div class="area-card__header">
          <div class="area-card__city">
            <i data-lucide="map-pin" style="width:16px;height:16px;color:var(--color-accent);vertical-align:text-top;margin-right:4px;" aria-hidden="true"></i>
            <?php echo htmlspecialchars($area['city']); ?>
          </div>
          <?php if ($isPrimary): ?>
          <span class="area-card__badge">Our Home</span>
          <?php endif; ?>
        </div>
        <div class="area-card__state"><?php echo htmlspecialchars($area['state']); ?> <?php echo htmlspecialchars($area['zip']); ?></div>
        <?php if ($blurb): ?>
        <p><?php echo htmlspecialchars($blurb); ?></p>
        <?php endif; ?>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ MID CTA ═══ -->
<section class="area-cta-mid" aria-label="Book auto service near you in Northern Virginia">
  <div class="container">
    <h2>Auto Repair Near Manassas, VA —<br>No Appointment Needed</h2>
    <p>Drive in or submit a request online. We'll confirm your drop-off window and have a written estimate ready before any work begins.</p>
    <div class="area-cta-mid__actions">
      <a href="/contact" class="btn-primary">Book Your Service</a>
      <?php if ($phone): ?>
      <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="btn-secondary" style="border-color:rgba(255,255,255,0.4);color:var(--color-accent);font-family:var(--font-heading);font-size:1.2rem;font-weight:800;">
        <?php echo htmlspecialchars($phone ?: 'Call Now'); ?>
      </a>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-diag" aria-hidden="true">
  <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;">
    <path d="M0 60 L1440 0 L1440 60 Z" fill="var(--color-bg)"/>
  </svg>
</div>

<!-- ═══ SERVICES NEAR YOU ═══ -->
<section class="area-services" aria-labelledby="area-services-heading">
  <div class="container">
    <div class="area-services__header" data-animate="fade-up">
      <span class="eyebrow-label">What We Offer</span>
      <h2 id="area-services-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:var(--color-primary);text-wrap:balance;margin-bottom:var(--space-sm);">Services Available to Northern Virginia Drivers</h2>
      <p class="prose-centered" style="color:var(--color-text-light);text-align:center;">Every service below is available to customers within our service area — same certified technicians, same written-estimate process, same warranty.</p>
    </div>
    <div class="area-services__grid">
      <?php foreach ($services as $svc): ?>
      <a href="/services/<?php echo htmlspecialchars($svc['slug']); ?>/" class="area-service-item" data-animate="fade-up">
        <div class="area-service-item__icon">
          <i data-lucide="<?php echo htmlspecialchars($svc['icon']); ?>" style="width:28px;height:28px;" aria-hidden="true"></i>
        </div>
        <span><?php echo htmlspecialchars($svc['name']); ?></span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ═══ CLOSING CTA ═══ -->
<section class="area-cta-close" aria-label="Get auto repair in Northern Virginia">
  <div class="container">
    <h2>Serving <?php echo count($serviceAreas); ?> Northern Virginia<br>Communities from Manassas</h2>
    <p>SW Automotive is your local, certified alternative to the dealership — honest estimates, trained technicians, and a warranty on every repair. If you're near Manassas, we can help.</p>
    <div class="area-cta-close__actions">
      <a href="/contact" class="btn-primary">Get Your Free Estimate</a>
      <a href="/services/" class="btn-secondary" style="border-color:rgba(255,255,255,0.35);color:#fff;">Explore Services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
