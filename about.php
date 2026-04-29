<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$aboutSchema = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'            => 'AutoRepair',
            '@id'              => $siteUrl . '/#business',
            'name'             => $siteName,
            'url'              => $siteUrl,
            'telephone'        => $phone,
            'email'            => $email,
            'address'          => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $address['street'],
                'addressLocality' => $address['city'],
                'addressRegion'   => $address['state'],
                'postalCode'      => $address['zip'],
                'addressCountry'  => 'US',
            ],
            'foundingDate'     => (string)$yearEstablished,
            'description'      => 'SW Automotive is an ASE-certified auto repair shop in Manassas, VA specializing in diesel repair, transmission service, brake replacement, and preventive maintenance for all makes and models.',
            'areaServed'       => ['Manassas', 'Manassas Park', 'Haymarket', 'Gainesville', 'Woodbridge', 'Bristow'],
            'hasCredential'    => array_map(fn($c) => ['@type' => 'EducationalOccupationalCredential', 'name' => $c], $certifications),
        ],
        [
            '@type' => 'Person',
            '@id'   => $siteUrl . '/#owner',
            'name'  => $ownerName ?: 'SW Automotive Owner',
            'jobTitle' => 'Owner & Master Technician',
            'worksFor' => ['@id' => $siteUrl . '/#business'],
        ],
        [
            '@type'          => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',  'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => $siteUrl . '/about'],
            ],
        ],
    ],
];

$schemaMarkup   = json_encode($aboutSchema);
$heroPreloadImage = $clientPhotos[1];

$pageTitle       = 'About SW Automotive | Auto Repair Shop in Manassas, VA';
$pageDescription = 'Learn about SW Automotive — an ASE-certified auto repair shop in Manassas, VA. Diesel-certified technicians, 4+ years serving Northern Virginia, honest estimates every time.';
$canonicalUrl    = $siteUrl . '/about';
$ogImage         = $clientPhotos[1];
$currentPage     = 'about';
$schemaType      = 'application/ld+json'; // Schema format; rendered by head.php
$canonicalTag    = '<link rel="canonical" href="' . $canonicalUrl . '">';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ─── Hero ─── */
.about-hero {
  position: relative;
  min-height: 68vh;
  display: flex;
  align-items: flex-end;
  padding-bottom: var(--space-3xl);
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos[1]; ?>');
  background-size: cover;
  background-position: center 40%;
  animation: kenburns-about 20s ease-in-out infinite alternate;
}
@keyframes kenburns-about {
  from { background-size: 108%; background-position: center 35%; }
  to   { background-size: 120%; background-position: center 55%; }
}
.about-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(150deg, rgba(14,24,34,0.80) 0%, rgba(26,43,60,0.50) 100%);
  z-index: 1;
}
.about-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  background-size: 180px;
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.about-hero__inner {
  position: relative;
  z-index: 3;
  width: 100%;
}
.about-breadcrumb {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  margin-bottom: var(--space-lg);
  font-size: 0.8rem;
  color: rgba(255,255,255,0.6);
}
.about-breadcrumb a { color: rgba(255,255,255,0.6); transition: color var(--transition-base); }
.about-breadcrumb a:hover { color: var(--color-accent); }
.about-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.about-hero__eyebrow {
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
.about-hero h1 {
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
.about-hero__sub {
  font-size: 1.1rem;
  color: rgba(255,255,255,0.82);
  max-width: 52ch;
  line-height: 1.6;
}

/* ─── Dividers ─── */
.divider-wave { line-height: 0; }
.divider-wave svg { display: block; width: 100%; }
.divider-diag { overflow: hidden; line-height: 0; }
.divider-diag svg { display: block; width: 100%; }

/* ─── Story Section ─── */
.about-story {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.about-story__grid {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: var(--space-3xl);
  align-items: center;
}
.about-story__eyebrow {
  display: inline-block;
  color: var(--color-accent);
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  margin-bottom: var(--space-md);
}
.about-story__content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 3.5vw, 2.6rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.2;
  text-wrap: balance;
  margin-bottom: var(--space-lg);
}
.about-story__content p {
  color: var(--color-text);
  line-height: 1.78;
  margin-bottom: var(--space-md);
  max-width: 60ch;
}
.about-story__visual {
  position: relative;
}
.about-story__photo-stack {
  position: relative;
  padding: var(--space-lg) 0 var(--space-lg) var(--space-lg);
}
.about-story__photo-main {
  border-radius: var(--radius-lg);
  overflow: hidden;
  aspect-ratio: 4/5;
  box-shadow: var(--shadow-lg);
}
.about-story__photo-main img {
  width: 100%; height: 100%; object-fit: cover; display: block;
}
.about-story__stat-card {
  position: absolute;
  bottom: 0;
  left: 0;
  background: var(--color-accent);
  color: #fff;
  border-radius: var(--radius-lg);
  padding: var(--space-lg);
  box-shadow: var(--shadow-lg);
  text-align: center;
  min-width: 110px;
}
.about-story__stat-card .stat-num {
  font-family: var(--font-heading);
  font-size: 2.2rem;
  font-weight: 800;
  line-height: 1;
  display: block;
}
.about-story__stat-card .stat-label {
  font-size: 0.78rem;
  font-weight: 600;
  opacity: 0.9;
  line-height: 1.3;
  margin-top: 4px;
  display: block;
}

/* ─── Stats Band ─── */
.about-stats {
  padding: 60px 20px;
  background: var(--color-primary);
}
.about-stats__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: var(--space-lg);
  text-align: center;
}
.about-stat {
  padding: var(--space-lg);
}
.about-stat__num {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 4vw, 3rem);
  font-weight: 800;
  color: var(--color-accent);
  line-height: 1;
  display: block;
  margin-bottom: var(--space-xs);
}
.about-stat__label {
  font-size: 0.88rem;
  color: rgba(255,255,255,0.7);
  font-weight: 500;
  line-height: 1.4;
}

/* ─── Values Section ─── */
.about-values {
  padding: var(--section-pad);
  background: var(--color-bg-alt);
}
.about-values__header {
  text-align: center;
  margin-bottom: var(--space-3xl);
}
.about-values__grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: var(--space-lg);
}
.value-card {
  background: var(--color-bg);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  box-shadow: var(--shadow-sm);
  border-top: 3px solid var(--color-accent);
  transition: transform var(--transition-base), box-shadow var(--transition-base);
}
.value-card:hover {
  transform: translateY(-4px);
  box-shadow: var(--shadow-md);
}
.value-card__icon {
  width: 52px; height: 52px;
  background: rgba(6,182,212,0.1);
  border-radius: var(--radius-md);
  display: flex; align-items: center; justify-content: center;
  color: var(--color-accent);
  margin-bottom: var(--space-md);
}
.value-card h3 {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-sm);
}
.value-card p {
  font-size: 0.9rem;
  color: var(--color-text-light);
  line-height: 1.65;
  margin: 0;
}

/* ─── Certifications ─── */
.about-certs {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.about-certs__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: var(--space-3xl);
  align-items: center;
}
.about-certs__content h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.7rem, 3.5vw, 2.4rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.2;
  text-wrap: balance;
  margin-bottom: var(--space-md);
}
.about-certs__content p {
  color: var(--color-text);
  line-height: 1.75;
  margin-bottom: var(--space-lg);
  max-width: 55ch;
}
.cert-badge-list {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}
.cert-badge {
  display: flex;
  align-items: center;
  gap: var(--space-md);
  padding: var(--space-md) var(--space-lg);
  background: var(--color-bg-alt);
  border-radius: var(--radius-md);
  border-left: 3px solid var(--color-accent);
  font-weight: 600;
  color: var(--color-primary);
  font-size: 0.95rem;
}
.cert-badge svg { color: var(--color-accent); flex-shrink: 0; }
.about-certs__photo {
  border-radius: var(--radius-lg);
  overflow: hidden;
  aspect-ratio: 4/3;
  box-shadow: var(--shadow-lg);
}
.about-certs__photo img {
  width: 100%; height: 100%; object-fit: cover; display: block;
}

/* ─── CTA ─── */
.about-cta {
  padding: var(--section-pad);
  background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-bg-dark) 100%);
  text-align: center;
  position: relative;
  overflow: hidden;
}
.about-cta::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.06'/%3E%3C/svg%3E");
  opacity: 0.06;
  pointer-events: none;
}
.about-cta h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: #fff;
  margin-bottom: var(--space-md);
  position: relative; z-index: 1;
  text-wrap: balance;
}
.about-cta p {
  color: rgba(255,255,255,0.75);
  max-width: 50ch;
  margin: 0 auto var(--space-xl);
  position: relative; z-index: 1;
  line-height: 1.65;
}
.about-cta__actions {
  display: flex; flex-wrap: wrap;
  gap: var(--space-md); justify-content: center;
  position: relative; z-index: 1;
}

/* ─── Responsive ─── */
@media (max-width: 1023px) {
  .about-story__grid { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .about-story__visual { order: -1; }
  .about-certs__grid { grid-template-columns: 1fr; gap: var(--space-2xl); }
  .about-stats__grid { grid-template-columns: repeat(2, 1fr); }
  .about-values__grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 767px) {
  .about-hero { min-height: 58vh; }
  .about-stats__grid { grid-template-columns: repeat(2, 1fr); }
  .about-values__grid { grid-template-columns: 1fr; }
  .about-cta__actions { flex-direction: column; align-items: center; }
}
</style>

<!-- ═══ HERO ═══ -->
<section class="about-hero" aria-label="About SW Automotive hero">
  <div class="container about-hero__inner">
    <nav class="about-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="sep" aria-hidden="true">›</span>
      <span aria-current="page">About</span>
    </nav>
    <span class="about-hero__eyebrow">Our Story</span>
    <h1>Honest Auto Repair.<br>Manassas, VA.</h1>
    <p class="about-hero__sub">SW Automotive was built on a simple premise: tell customers what's actually wrong, fix only what needs fixing, and stand behind the work. No upsells. No guessing.</p>
  </div>
</section>

<!-- Divider -->
<div class="divider-wave" aria-hidden="true">
  <svg viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:48px;">
    <path d="M0 48 L0 24 C240 0 480 48 720 24 C960 0 1200 48 1440 24 L1440 48 Z" fill="var(--color-bg)"/>
  </svg>
</div>

<!-- ═══ STORY ═══ -->
<section class="about-story" aria-labelledby="about-story-heading">
  <div class="container">
    <div class="about-story__grid" data-animate="fade-up">
      <div class="about-story__content">
        <span class="about-story__eyebrow">Who We Are</span>
        <h2 id="about-story-heading">Started in <?php echo $yearEstablished; ?>. Built for the Long Haul.</h2>
        <p>SW Automotive opened in <?php echo $yearEstablished; ?> in Manassas, Virginia with one goal: give Northern Virginia drivers a shop they could actually trust. Not a chain. Not a lube-and-go. A real mechanic who tells you what's wrong, shows you the evidence, and quotes a fair price before starting work.</p>
        <p>Our technicians hold ASE certifications, Nissan Master Technician credentials, and Light Duty Diesel Certification — qualifications that matter when your check engine light reads a diesel emissions fault or your transmission starts slipping and you need someone who actually knows the system.</p>
        <p>We work on all makes and models — domestic, import, diesel, hybrid, and EV. Every job starts with a thorough inspection, a written estimate, and your approval before any work begins. That's not a policy — it's how we've operated since day one.</p>
      </div>
      <div class="about-story__visual">
        <div class="about-story__photo-stack">
          <div class="about-story__photo-main">
            <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489119856-1ybgxb-310074191_175091698429386_8965809722095922256_n.jpg"
                 alt="SW Automotive shop in Manassas VA — certified auto repair technicians"
                 width="480" height="600" loading="lazy">
          </div>
          <div class="about-story__stat-card">
            <span class="stat-num"><?php echo $yearsInBusiness; ?>+</span>
            <span class="stat-label">Years<br>Serving<br>Manassas</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-diag" aria-hidden="true">
  <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;">
    <path d="M0 0 L1440 60 L1440 0 Z" fill="var(--color-primary)"/>
  </svg>
</div>

<!-- ═══ STATS ═══ -->
<section class="about-stats" aria-label="SW Automotive by the numbers">
  <div class="container">
    <div class="about-stats__grid">
      <div class="about-stat" data-animate="fade-up" data-animate-delay="100">
        <span class="about-stat__num" data-counter="4" data-suffix="+">4+</span>
        <span class="about-stat__label">Years Serving Manassas &amp; Northern VA</span>
      </div>
      <div class="about-stat" data-animate="fade-up" data-animate-delay="200">
        <span class="about-stat__num" data-counter="4" data-suffix="">4</span>
        <span class="about-stat__label">Active Certifications — ASE, Nissan Master, Diesel, Hybrid</span>
      </div>
      <div class="about-stat" data-animate="fade-up" data-animate-delay="300">
        <span class="about-stat__num" data-counter="8">8</span>
        <span class="about-stat__label">Service Areas Covered Across Prince William County</span>
      </div>
      <div class="about-stat" data-animate="fade-up" data-animate-delay="400">
        <span class="about-stat__num" data-counter="100" data-suffix="%">100%</span>
        <span class="about-stat__label">Written Estimates Before Any Work Begins — Every Time</span>
      </div>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-diag" aria-hidden="true">
  <svg viewBox="0 0 1440 60" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;">
    <path d="M0 60 L1440 0 L1440 60 Z" fill="var(--color-bg-alt)"/>
  </svg>
</div>

<!-- ═══ VALUES ═══ -->
<section class="about-values" aria-labelledby="about-values-heading">
  <div class="container">
    <div class="about-values__header" data-animate="fade-up">
      <span class="eyebrow-label">How We Operate</span>
      <h2 id="about-values-heading" style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.8rem);font-weight:800;color:var(--color-primary);text-wrap:balance;margin-bottom:var(--space-sm);">Three Things We Never Compromise On</h2>
    </div>
    <div class="about-values__grid">
      <div class="value-card" data-animate="fade-up" data-animate-delay="100">
        <div class="value-card__icon"><i data-lucide="file-text" aria-hidden="true"></i></div>
        <h3>Transparency First</h3>
        <p>Every job starts with a written estimate. You see the parts cost, the labor rate, and the total before we pick up a wrench. If scope changes, we call you before proceeding — not after.</p>
      </div>
      <div class="value-card" data-animate="fade-up" data-animate-delay="200">
        <div class="value-card__icon"><i data-lucide="award" aria-hidden="true"></i></div>
        <h3>Certified Expertise</h3>
        <p>ASE certification, Nissan Master Technician, Light Duty Diesel, and Hybrid/EV credentials — not because a sign on the wall says so, but because this is where the technical work actually requires it.</p>
      </div>
      <div class="value-card" data-animate="fade-up" data-animate-delay="300">
        <div class="value-card__icon"><i data-lucide="shield-check" aria-hidden="true"></i></div>
        <h3>We Stand Behind the Work</h3>
        <p>Every repair comes with a labor warranty. If the same issue returns after our work, we fix it at no charge — no debate, no runaround. That's what accountability looks like.</p>
      </div>
    </div>
  </div>
</section>

<!-- Divider -->
<div class="divider-wave" aria-hidden="true">
  <svg viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:48px;">
    <path d="M0 0 C360 48 1080 0 1440 48 L1440 0 Z" fill="var(--color-bg)"/>
  </svg>
</div>

<!-- ═══ CERTIFICATIONS ═══ -->
<section class="about-certs" aria-labelledby="about-certs-heading">
  <div class="container">
    <div class="about-certs__grid" data-animate="fade-up">
      <div class="about-certs__content">
        <span class="about-story__eyebrow">Credentials</span>
        <h2 id="about-certs-heading">Certifications That Matter When Your Car Needs More Than a Tune-Up</h2>
        <p>Not every shop can diagnose a diesel emissions fault or properly service a hybrid drive system. Our certifications are current, tested, and relevant to the work we do every day — not framed on a wall for appearance.</p>
        <div class="cert-badge-list">
          <?php foreach ($certifications as $cert): ?>
          <div class="cert-badge">
            <i data-lucide="check-circle" style="width:18px;height:18px;" aria-hidden="true"></i>
            <?php echo htmlspecialchars($cert); ?>
          </div>
          <?php endforeach; ?>
          <?php foreach ($trustSignals as $signal): ?>
          <div class="cert-badge">
            <i data-lucide="shield" style="width:18px;height:18px;" aria-hidden="true"></i>
            <?php echo htmlspecialchars($signal); ?>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <div class="about-certs__photo">
        <img src="https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489117834-7nskhk-481084972_666864315902592_7682232985457324721_n.jpg"
             alt="SW Automotive certified technician working in Manassas VA auto repair shop"
             width="600" height="450" loading="lazy">
      </div>
    </div>
  </div>
</section>

<!-- ═══ MID CTA ═══ -->
<section style="padding:var(--section-pad);background:var(--color-bg-alt);text-align:center;" aria-label="Book auto service at SW Automotive">
  <div class="container">
    <span class="eyebrow-label" data-animate="fade-up">Ready to See the Difference?</span>
    <h2 style="font-family:var(--font-heading);font-size:clamp(1.8rem,4vw,2.6rem);font-weight:800;color:var(--color-primary);text-wrap:balance;margin:var(--space-sm) 0 var(--space-md);" data-animate="fade-up">Schedule Your Service Today</h2>
    <p class="prose-centered" style="color:var(--color-text-light);text-align:center;margin-bottom:var(--space-xl);" data-animate="fade-up">No appointment necessary for most services. Call or submit online and we'll confirm your drop-off time same day.</p>
    <div style="display:flex;flex-wrap:wrap;gap:var(--space-md);justify-content:center;" data-animate="fade-up">
      <a href="/contact" class="btn-primary">Book Your Service</a>
      <a href="/services/" class="btn-secondary">Explore Services</a>
    </div>
  </div>
</section>

<!-- ═══ CLOSING CTA ═══ -->
<section class="about-cta" aria-label="Contact SW Automotive Manassas">
  <div class="container">
    <h2>Your Car Deserves a Mechanic<br>Who Tells You the Truth.</h2>
    <p>Serving Manassas, Manassas Park, Haymarket, Gainesville, Woodbridge, and surrounding Northern Virginia since <?php echo $yearEstablished; ?>.</p>
    <div class="about-cta__actions">
      <a href="/contact" class="btn-primary">Get a Free Estimate</a>
      <a href="/service-area" class="btn-secondary" style="border-color:rgba(255,255,255,0.35);color:#fff;">Service Area</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
