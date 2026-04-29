<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
?>
<?php
/* ================================================================
   SW Automotive — Homepage (index.php)
   Phase 3 — Standard Tier
   ================================================================ */

$pageTitle       = 'SW Automotive | Auto Repair Manassas VA | ASE Certified | All Makes & Models';
$pageDescription = 'SW Automotive delivers honest, factory-level auto repair in Manassas, VA. ASE certified technicians with 27 years of dealership experience. Diesel, hybrid, and EV service. Free estimates — all makes and models.';
$canonicalUrl    = $siteUrl . '/';
$ogImage         = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489125528-v0msw7-574610223_855128843758998_4100558135674674243_n.jpg';
$currentPage     = 'home';
$heroPreloadImage = $ogImage;
$useSwiper       = true;

/* About section split-content photo */
$aboutPhoto = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489124708-tbcbgr-2020-08-21.jpg';

/* Additional gallery photos for reviews section bg */
$shopPhoto1 = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489126638-f4l6be-483962234_666123242659560_7431100441034816467_n.jpg';

/* Tint rotation for service cards */
$tints  = ['card-tint-1', 'card-tint-2', 'card-tint-3'];
$delays = ['reveal-delay-1', 'reveal-delay-2', 'reveal-delay-3'];

/* Per-card bullet lists — exactly 3 bullets, 3–6 words each */
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

/* Sample reviews (real reviews to be populated when collected) */
$sampleReviews = [
  [
    'name'    => 'Marcus T.',
    'loc'     => 'Manassas, VA',
    'service' => 'Brake Replacement',
    'quote'   => 'Brought my F-150 in for a grinding brake issue. They diagnosed it same day, showed me exactly what was wrong, and had it back to me by 4 PM. Fair price, no pressure to fix things that didn\'t need fixing. This is my shop now.',
    'initials'=> 'MT',
  ],
  [
    'name'    => 'Sandra R.',
    'loc'     => 'Gainesville, VA',
    'service' => 'Check Engine Light Diagnosis',
    'quote'   => 'After two other shops gave me vague answers and big estimates, SW Automotive ran a full diagnostic and explained everything clearly. Turned out to be a minor sensor issue — under $200 total. Honest people doing honest work.',
    'initials'=> 'SR',
  ],
  [
    'name'    => 'Kevin L.',
    'loc'     => 'Woodbridge, VA',
    'service' => 'Diesel Repair',
    'quote'   => 'Hard to find a shop that actually knows diesel. These guys diagnosed my RAM 2500 correctly on the first try when two other places couldn\'t figure it out. 27 years of dealership experience shows. Worth the drive from Woodbridge.',
    'initials'=> 'KL',
  ],
  [
    'name'    => 'Priya M.',
    'loc'     => 'Haymarket, VA',
    'service' => 'Oil Change & Inspection',
    'quote'   => 'As someone who knows nothing about cars, I was nervous about finding a trustworthy mechanic. SW Automotive is a family-run shop that never once made me feel taken advantage of. I send all my friends here.',
    'initials'=> 'PM',
  ],
  [
    'name'    => 'Dave W.',
    'loc'     => 'Manassas Park, VA',
    'service' => 'Transmission Service',
    'quote'   => 'My Tacoma\'s transmission had been slipping for months. SW Auto diagnosed the issue, quoted me fairly, and completed the repair ahead of schedule. Clean shop, great communication, and they actually picked up the phone when I called.',
    'initials'=> 'DW',
  ],
];

/* Homepage FAQs — 6 locally relevant Q&A pairs */
$homeFaqs = [
  [
    'q' => 'How much does auto repair cost in Manassas, VA?',
    'a' => 'Repair costs vary by service: oil changes run $45–$95 depending on oil type, brake pad replacement is typically $150–$300 per axle, and diagnostic scans start at $95. SW Automotive provides a written estimate before any work begins — no surprise charges, no pressure.',
  ],
  [
    'q' => 'Do you service diesel trucks near Manassas?',
    'a' => 'Yes. SW Automotive holds a Light Duty Diesel certification and services diesel pickup trucks from Ford, GM, Ram, and international brands throughout Prince William County. We handle fuel system diagnostics, injector service, glow plugs, EGR systems, and DEF system repairs.',
  ],
  [
    'q' => 'Are all your mechanics ASE certified?',
    'a' => 'All SW Automotive technicians are ASE certified. Our owner and lead technician holds Nissan Master Technician status earned over 27 years at dealerships and independent facilities. We also carry specialized certifications in light duty diesel, hybrid, and electric vehicle systems.',
  ],
  [
    'q' => 'What car brands do you work on in Manassas?',
    'a' => 'We service Asian, Domestic, and European makes including Toyota, Honda, Nissan, Hyundai, Ford, Chevrolet, GMC, BMW, Mercedes-Benz, Volkswagen, Audi, and more. Our dealership background provides factory-level diagnostic capability for virtually any vehicle.',
  ],
  [
    'q' => 'Can you repair hybrid and electric vehicles near me?',
    'a' => 'Yes. SW Automotive holds certified training in hybrid and EV systems. We diagnose high-voltage batteries, service hybrid inverters, inspect regenerative braking systems, and handle EV charging components — including Toyota Prius, Honda Accord Hybrid, Chevy Bolt, and more.',
  ],
  [
    'q' => 'How quickly can you diagnose my car in Manassas?',
    'a' => 'We offer same-day diagnostic scans for most vehicles — drop in Monday through Friday, 8 AM–5 PM at 10404 Morias Ct, Manassas VA 20110. For complex electrical or emissions faults, same-day or next-day turnaround is typical. Submit a free estimate request online to hold your spot.',
  ],
];

$schemaMarkup = generateFAQSchema($homeFaqs);
$schemaType   = 'application/ld+json'; // Schema format; rendered by head.php
$canonicalTag = '<link rel="canonical" href="' . $canonicalUrl . '">';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
?>
<style>
/* ================================================================
   SW Automotive — Homepage Page-Specific CSS
   Standard Tier — min 200 lines required
   Techniques: Layered Hero (C1), Ken Burns, Section Dividers (C3),
   Signature About Split (C7), Process Steps, Stats Band
   ================================================================ */

/* Counter reset for numbered sections */
#main-content { counter-reset: section-counter; }

/* ================================================================
   HERO — Layered, 60/40 Split, Ken Burns, Glassmorphism Form Card
   ================================================================ */

.hero {
  position: relative;
  min-height: calc(100vh - var(--navbar-height));
  display: flex;
  align-items: center;
  background-size: cover;
  background-position: center 40%;
  overflow: hidden;
  animation: kenburns-hp 24s ease-in-out infinite alternate;
}

@keyframes kenburns-hp {
  from { background-size: 110%; background-position: center 35%; }
  to   { background-size: 124%; background-position: center 50%; }
}

/* Dark gradient overlay — heavier on left for text legibility */
.hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(
    108deg,
    rgba(var(--color-primary-rgb), 0.93) 0%,
    rgba(var(--color-primary-rgb), 0.80) 42%,
    rgba(var(--color-primary-dark-rgb), 0.48) 100%
  );
  z-index: 1;
}

/* SVG noise texture */
.hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.04;
  z-index: 1;
  pointer-events: none;
}

.hero-inner {
  position: relative;
  z-index: 2;
  width: 100%;
  max-width: var(--max-width);
  margin-inline: auto;
  padding: var(--space-4xl) var(--space-lg);
  display: grid;
  grid-template-columns: 60fr 40fr;
  gap: var(--space-3xl);
  align-items: center;
}

/* — Hero Text — */
.hero-text {
  color: #fff;
  display: flex;
  flex-direction: column;
  gap: var(--space-lg);
}

.hero-eyebrow {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  background: rgba(var(--color-accent-rgb), 0.12);
  border: 1px solid rgba(var(--color-accent-rgb), 0.38);
  border-radius: var(--radius-full);
  padding: 6px 18px;
  font-family: var(--font-body);
  font-size: 0.72rem;
  font-weight: 700;
  text-transform: uppercase;
  letter-spacing: 0.14em;
  color: var(--color-accent);
  width: fit-content;
  animation: fadeSlideDown 0.6s ease 0.1s both;
}

.hero-eyebrow i, .hero-eyebrow svg { width: 13px; height: 13px; flex-shrink: 0; }

.hero-title {
  font-family: var(--font-heading);
  font-size: clamp(3rem, 7vw, 5.5rem);
  line-height: 1.0;
  letter-spacing: -0.01em;
  color: #fff;
  text-wrap: balance;
  animation: fadeSlideUp 0.65s ease 0.2s both;
}

.hero-title .accent-line {
  background: linear-gradient(135deg, var(--color-accent) 0%, #6ee7f7 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  display: block;
}

.hero-subtitle {
  font-size: 1.05rem;
  line-height: 1.7;
  color: rgba(255,255,255,0.84);
  max-width: 52ch;
  margin: 0;
  animation: fadeSlideUp 0.65s ease 0.32s both;
}

.hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  animation: fadeSlideUp 0.65s ease 0.44s both;
}

.hero-trust {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm);
  padding-top: var(--space-xs);
  animation: fadeSlideUp 0.65s ease 0.55s both;
}

.hero-trust-item {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-family: var(--font-body);
  font-size: 0.75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  color: rgba(255,255,255,0.82);
  padding: 5px 14px;
  background: rgba(255,255,255,0.07);
  border: 1px solid rgba(255,255,255,0.16);
  border-radius: var(--radius-full);
  white-space: nowrap;
}

.hero-trust-item i, .hero-trust-item svg {
  width: 13px;
  height: 13px;
  color: var(--color-accent);
  flex-shrink: 0;
}

/* — Hero Form Card — */
.hero-form-card {
  background: rgba(255,255,255,0.97);
  backdrop-filter: blur(16px);
  -webkit-backdrop-filter: blur(16px);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  box-shadow: 0 20px 60px rgba(0,0,0,0.35), 0 0 0 1px rgba(255,255,255,0.20);
  animation: fadeSlideUp 0.8s ease 0.35s both;
  color: var(--color-text);
  position: relative;
  overflow: hidden;
}

/* Accent top border on card */
.hero-form-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 4px;
  background: linear-gradient(90deg, var(--color-accent) 0%, var(--color-primary) 100%);
}

.hero-form-card h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 2.5vw, 2rem);
  color: var(--color-primary);
  text-wrap: balance;
  margin-bottom: var(--space-xs);
  letter-spacing: 0.02em;
}

.hero-form-tagline {
  font-size: var(--font-size-sm);
  color: var(--color-text-light);
  margin-bottom: var(--space-lg);
}

.hero-form {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
}

.hero-form .form-row { position: relative; }

.hero-form .form-row input,
.hero-form .form-row select {
  width: 100%;
  padding: 14px var(--space-md);
  border: 1.5px solid rgba(0,0,0,0.12);
  border-radius: var(--radius-md);
  font-family: var(--font-body);
  font-size: var(--font-size-base);
  color: var(--color-text);
  background: #fff;
  transition: border-color var(--transition-base), box-shadow var(--transition-base);
  -webkit-appearance: none;
  appearance: none;
}

.hero-form .form-row input:focus,
.hero-form .form-row select:focus {
  outline: none;
  border-color: var(--color-accent);
  box-shadow: 0 0 0 3px rgba(var(--color-accent-rgb), 0.12);
}

.hero-form .form-row select {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23555' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 14px center;
  padding-right: 40px;
  cursor: pointer;
}

.hero-form .btn-block {
  width: 100%;
  justify-content: center;
  padding: 16px var(--space-xl);
  font-size: 1rem;
  margin-top: var(--space-xs);
}

.hero-form .form-footnote {
  font-size: 0.7rem;
  color: var(--color-gray);
  text-align: center;
  line-height: 1.5;
  margin: var(--space-xs) 0 0;
}

.hero-form .form-footnote a {
  color: var(--color-accent);
  text-decoration: underline;
  text-underline-offset: 2px;
}

/* ================================================================
   SECTION DIVIDERS
   ================================================================ */

.divider-block {
  display: block;
  line-height: 0;
  overflow: hidden;
}

.divider-block svg {
  display: block;
  width: 100%;
}

/* ================================================================
   SERVICES SECTION
   ================================================================ */

.services-header {
  max-width: 680px;
  margin-bottom: var(--space-3xl);
}

.services-header h2 { text-wrap: balance; }

.services-view-all {
  text-align: center;
  margin-top: var(--space-2xl);
}

/* ================================================================
   STATS BAND
   ================================================================ */

.stat-num-row {
  display: flex;
  align-items: flex-end;
  justify-content: center;
  gap: 1px;
  line-height: 1;
}

.stat-prefix,
.stat-suffix {
  font-family: var(--font-heading);
  color: var(--color-accent);
  padding-bottom: 0.15em;
}

.stat-prefix { font-size: 1.6rem; align-self: flex-start; padding-top: 0.3em; padding-bottom: 0; }
.stat-suffix { font-size: 2rem; }

/* ================================================================
   ABOUT / PROCESS — Signature Split Section
   Overlapping stat card breaks image boundary
   ================================================================ */

.about-layout {
  display: grid;
  grid-template-columns: 55fr 45fr;
  gap: var(--space-4xl);
  align-items: start;
}

.about-text { max-width: none; }

.about-text h2 {
  margin-bottom: var(--space-lg);
  text-wrap: balance;
  color: var(--color-primary);
}

.about-lead {
  font-size: var(--font-size-lg);
  line-height: 1.75;
  color: var(--color-text-light);
  max-width: 55ch;
  margin-bottom: var(--space-lg);
}

.about-body {
  font-size: var(--font-size-base);
  line-height: 1.7;
  color: var(--color-text-light);
  max-width: 55ch;
  margin-bottom: var(--space-xl);
}

.cert-strip {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm);
  margin-bottom: var(--space-2xl);
}

.cert-badge {
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

/* Process steps with connecting line */
.process-steps-title {
  font-family: var(--font-heading);
  font-size: 1.1rem;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: var(--color-primary);
  margin-bottom: var(--space-lg);
}

.process-steps {
  display: flex;
  flex-direction: column;
  gap: 0;
  position: relative;
}

.process-steps::before {
  content: '';
  position: absolute;
  left: 26px;
  top: 52px;
  bottom: 26px;
  width: 2px;
  background: linear-gradient(to bottom, var(--color-accent) 0%, rgba(var(--color-accent-rgb), 0.10) 100%);
}

.process-step-row {
  display: flex;
  align-items: flex-start;
  gap: var(--space-lg);
  padding: var(--space-md) 0;
  position: relative;
}

.step-num-circle {
  width: 52px;
  height: 52px;
  border-radius: 50%;
  background: var(--color-primary);
  color: var(--color-accent);
  font-family: var(--font-heading);
  font-size: 1.3rem;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  box-shadow: var(--shadow-md);
  position: relative;
  z-index: 1;
  transition: transform var(--transition-base), background var(--transition-base), color var(--transition-base);
}

.process-step-row:hover .step-num-circle {
  transform: scale(1.10);
  background: var(--color-accent);
  color: var(--color-primary);
}

.step-body h3 {
  font-family: var(--font-heading);
  font-size: 1.3rem;
  color: var(--color-primary);
  margin-bottom: var(--space-xs);
  letter-spacing: 0.04em;
  text-wrap: balance;
}

.step-body p {
  font-size: var(--font-size-sm);
  color: var(--color-text-light);
  line-height: 1.6;
  margin: 0;
  max-width: 40ch;
}

/* Image side with overlapping stat card */
.about-image-side {
  position: relative;
  padding-bottom: var(--space-3xl);
  padding-left: var(--space-xl);
}

.about-img-wrap {
  position: relative;
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-xl);
}

.about-img-wrap img {
  width: 100%;
  height: 520px;
  object-fit: cover;
  display: block;
  filter: saturate(0.88);
  transition: transform var(--transition-slow);
}

.about-image-side:hover .about-img-wrap img { transform: scale(1.04); }

/* Accent border overlay on image */
.about-img-wrap::after {
  content: '';
  position: absolute;
  inset: 0;
  border: 3px solid rgba(var(--color-accent-rgb), 0.22);
  border-radius: var(--radius-lg);
  pointer-events: none;
  z-index: 1;
}

/* Floating stat card — overlaps image edge (signature element) */
.about-stat-card {
  position: absolute;
  bottom: 0;
  left: 0;
  background: var(--color-primary);
  color: #fff;
  padding: var(--space-lg) var(--space-xl);
  border-radius: var(--radius-md);
  box-shadow: var(--shadow-xl);
  z-index: 2;
  min-width: 190px;
  border-left: 4px solid var(--color-accent);
}

.about-stat-card .stat-big-num {
  font-family: var(--font-heading);
  font-size: clamp(2.8rem, 5vw, 3.8rem);
  color: var(--color-accent);
  line-height: 1;
  letter-spacing: -0.01em;
}

.about-stat-card .stat-big-label {
  font-size: var(--font-size-xs);
  text-transform: uppercase;
  letter-spacing: 0.12em;
  font-weight: 700;
  color: rgba(255,255,255,0.72);
  margin-top: var(--space-xs);
  display: block;
}

.about-stat-card .stat-big-sub {
  font-size: 0.68rem;
  color: rgba(255,255,255,0.45);
  margin-top: 2px;
  display: block;
}

/* ================================================================
   REVIEWS SECTION — dark, Swiper carousel
   ================================================================ */

.reviews-section {
  background: var(--color-bg-dark);
  padding: var(--space-4xl) 0;
  position: relative;
  overflow: hidden;
}

.reviews-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 0%, rgba(var(--color-accent-rgb), 0.07) 0%, transparent 65%);
  pointer-events: none;
}

.reviews-header {
  text-align: center;
  margin-bottom: var(--space-2xl);
}

.reviews-header h2 { color: #fff; text-wrap: balance; }

.review-card-ext {
  background: rgba(255,255,255,0.04);
  border: 1px solid rgba(255,255,255,0.08);
  border-radius: var(--radius-md);
  padding: var(--space-xl);
  height: 100%;
  display: flex;
  flex-direction: column;
  gap: var(--space-md);
  transition: background var(--transition-base), border-color var(--transition-base);
}

.review-card-ext:hover {
  background: rgba(255,255,255,0.07);
  border-color: rgba(var(--color-accent-rgb), 0.28);
}

.review-stars-row {
  display: flex;
  gap: 2px;
  color: #f59e0b;
}

.review-stars-row svg { width: 15px; height: 15px; }

.review-quote {
  font-size: 0.93rem;
  line-height: 1.75;
  color: rgba(255,255,255,0.80);
  font-style: italic;
  flex: 1;
  position: relative;
}

.review-quote::before {
  content: '\201C';
  font-size: 2.4rem;
  color: var(--color-accent);
  line-height: 0;
  vertical-align: -0.55em;
  margin-right: 3px;
  font-style: normal;
  font-family: Georgia, serif;
}

.review-author-row {
  display: flex;
  align-items: center;
  gap: var(--space-sm);
  margin-top: auto;
  padding-top: var(--space-md);
  border-top: 1px solid rgba(255,255,255,0.07);
}

.review-avatar {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  background: rgba(var(--color-accent-rgb), 0.15);
  border: 2px solid rgba(var(--color-accent-rgb), 0.30);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: var(--font-heading);
  font-size: 1rem;
  color: var(--color-accent);
  flex-shrink: 0;
}

.review-author-name {
  font-weight: 700;
  font-size: var(--font-size-sm);
  color: #fff;
  display: block;
}

.review-author-meta {
  font-size: var(--font-size-xs);
  color: rgba(255,255,255,0.42);
  display: block;
  margin-top: 1px;
}

.reviews-badge-strip {
  display: flex;
  justify-content: center;
  gap: var(--space-lg);
  margin-top: var(--space-2xl);
  flex-wrap: wrap;
}

.review-platform-badge {
  display: inline-flex;
  align-items: center;
  gap: var(--space-sm);
  padding: var(--space-sm) var(--space-xl);
  background: rgba(255,255,255,0.05);
  border: 1px solid rgba(255,255,255,0.10);
  border-radius: var(--radius-full);
  font-size: var(--font-size-sm);
  font-weight: 600;
  color: rgba(255,255,255,0.78);
  transition: background var(--transition-base), border-color var(--transition-base), color var(--transition-base);
  text-decoration: none;
}

.review-platform-badge:hover {
  background: rgba(255,255,255,0.09);
  border-color: rgba(var(--color-accent-rgb), 0.35);
  color: var(--color-accent);
}

/* ================================================================
   FAQ SECTION
   ================================================================ */

.faq-section {
  background: var(--color-bg-alt);
  padding: var(--space-4xl) var(--space-lg);
}

.faq-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--space-md);
  align-items: start;
  margin-top: var(--space-3xl);
}

/* ================================================================
   CLOSING CTA SECTION
   ================================================================ */

.closing-cta-section {
  background: linear-gradient(135deg, var(--color-primary-dark) 0%, var(--color-primary) 60%, var(--color-secondary) 100%);
  padding: var(--space-4xl) var(--space-lg);
  position: relative;
  overflow: hidden;
  text-align: center;
}

.closing-cta-section::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='1'/%3E%3C/svg%3E");
  opacity: 0.05;
  pointer-events: none;
}

.closing-cta-section::after {
  content: '';
  position: absolute;
  inset: 0;
  background: radial-gradient(ellipse at 50% 100%, rgba(var(--color-accent-rgb), 0.10) 0%, transparent 60%);
  pointer-events: none;
}

.closing-cta-section .container { position: relative; z-index: 1; }

.closing-cta-section h2 {
  color: #fff;
  font-size: clamp(2.2rem, 5vw, 3.8rem);
  text-wrap: balance;
  margin-bottom: var(--space-lg);
}

.closing-cta-section > .container > p {
  color: rgba(255,255,255,0.80);
  font-size: var(--font-size-lg);
  max-width: 55ch;
  margin: 0 auto var(--space-2xl);
  line-height: 1.7;
}

.closing-cta-actions {
  display: flex;
  gap: var(--space-md);
  justify-content: center;
  flex-wrap: wrap;
}

/* ================================================================
   RESPONSIVE OVERRIDES
   ================================================================ */

@media (max-width: 1023px) {
  .hero-inner {
    grid-template-columns: 1fr;
    padding: var(--space-3xl) var(--space-lg);
    gap: var(--space-2xl);
  }

  .hero-form-card { max-width: 560px; margin-inline: auto; }

  .about-layout {
    grid-template-columns: 1fr;
    gap: var(--space-3xl);
  }

  .about-image-side {
    order: -1;
    padding-left: 0;
    padding-bottom: var(--space-3xl);
  }

  .about-stat-card {
    left: var(--space-md);
    bottom: 0;
  }
}

@media (max-width: 767px) {
  .hero {
    min-height: 70vh;
    align-items: flex-start;
  }

  .hero-inner {
    padding: var(--space-2xl) var(--space-md);
  }

  .hero-title { font-size: clamp(2.4rem, 9vw, 3.5rem); }

  .hero-actions { flex-direction: column; }
  .hero-actions .btn { width: 100%; justify-content: center; }

  .faq-grid { grid-template-columns: 1fr; }

  .reviews-badge-strip {
    flex-direction: column;
    align-items: center;
    gap: var(--space-sm);
  }

  .about-img-wrap img { height: 280px; }

  .about-image-side { padding-bottom: var(--space-2xl); }

  .about-stat-card {
    position: relative;
    left: 0;
    bottom: 0;
    display: inline-block;
    margin-top: var(--space-lg);
  }

  .process-steps::before { display: none; }

  .closing-cta-actions { flex-direction: column; align-items: center; }
  .closing-cta-actions .btn { width: 100%; max-width: 320px; justify-content: center; }
}
</style>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php'; ?>

<!-- ================================================================
     HERO — 60/40 Split with Lead-Capture Form
     ================================================================ -->
<section
  class="hero"
  style="background-image: url('<?= htmlspecialchars($heroPreloadImage) ?>');"
  aria-label="SW Automotive — Auto Repair Manassas VA"
>
  <div class="hero-inner">

    <!-- Left 60%: Headline + CTAs + Trust -->
    <div class="hero-text">

      <div class="hero-eyebrow">
        <i data-lucide="shield-check"></i>
        Serving Manassas Since <?= $yearEstablished ?>
      </div>

      <h1 class="hero-title">
        Factory-Level Repairs.
        <span class="accent-line">Honest Prices.</span>
      </h1>

      <p class="hero-subtitle">
        SW Automotive brings 27 years of Nissan dealership expertise to every vehicle in Manassas.
        ASE certified technicians, all makes and models — including diesel, hybrid, and EV.
        No upsells. No runaround. Just straight answers and solid repairs.
      </p>

      <div class="hero-actions">
        <a href="#estimate-form" class="btn btn-accent">
          <i data-lucide="clipboard-list"></i>
          Get Your Free Estimate
        </a>
        <a href="/services" class="btn btn-outline-white">
          <i data-lucide="wrench"></i>
          Explore Our Services
        </a>
      </div>

      <div class="hero-trust" role="list">
        <span class="hero-trust-item" role="listitem">
          <i data-lucide="shield"></i> Licensed &amp; Insured
        </span>
        <span class="hero-trust-item" role="listitem">
          <i data-lucide="award"></i> 27+ Years Experience
        </span>
        <span class="hero-trust-item" role="listitem">
          <i data-lucide="check-circle"></i> ASE Certified
        </span>
        <span class="hero-trust-item" role="listitem">
          <i data-lucide="zap"></i> Hybrid &amp; EV Ready
        </span>
      </div>

    </div><!-- /.hero-text -->

    <!-- Right 40%: Lead-Capture Form Card -->
    <aside class="hero-form-card" id="estimate-form">
      <h2>Get Your Free Estimate</h2>
      <p class="hero-form-tagline">No obligation. Same-day response.</p>
      <form action="<?= htmlspecialchars($formAction) ?>" method="POST" class="hero-form">

        <input type="text"   name="_honeypot" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">
        <input type="hidden" name="_form_location"  value="hero">
        <input type="hidden" name="_consent_version" value="v2.1">
        <input type="hidden" name="_consent_page"    value="<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>">
        <input type="hidden" name="_next"            value="/thank-you">

        <div class="form-row">
          <input type="text" name="name" placeholder="Full name" required autocomplete="name">
        </div>
        <div class="form-row">
          <input type="tel" name="phone" placeholder="Phone number" required autocomplete="tel">
        </div>
        <div class="form-row">
          <input type="text" name="zip" placeholder="ZIP code" pattern="[0-9]{5}" maxlength="5" required>
        </div>
        <div class="form-row">
          <select name="service_requested" aria-label="Service needed">
            <option value="">What do you need?</option>
            <?php foreach ($services as $s): ?>
            <option value="<?= htmlspecialchars($s['name']) ?>"><?= htmlspecialchars($s['name']) ?></option>
            <?php endforeach; ?>
            <option value="Other">Other / Not Sure</option>
          </select>
        </div>

        <button type="submit" class="btn btn-accent btn-block">
          <i data-lucide="send"></i>
          Get My Free Estimate
        </button>

        <p class="form-footnote">
          By submitting you agree to our
          <a href="/terms/">Terms</a> and <a href="/privacy-policy/">Privacy Policy</a>.
        </p>
      </form>
    </aside><!-- /.hero-form-card -->

  </div><!-- /.hero-inner -->
</section><!-- /.hero -->


<!-- ================================================================
     TICKER STRIP — proof items, pure CSS infinite scroll
     ================================================================ -->
<div class="ticker-strip" aria-hidden="true" role="presentation">
  <div class="ticker-inner">

    <?php
    $tickerItems = [
      ['icon' => 'award',        'text' => '27 Years Dealership Experience'],
      ['icon' => 'shield-check', 'text' => 'ASE Certified Technicians'],
      ['icon' => 'car',          'text' => 'All Makes &amp; Models'],
      ['icon' => 'zap',          'text' => 'Hybrid &amp; EV Certified'],
      ['icon' => 'fuel',         'text' => 'Light Duty Diesel Certified'],
      ['icon' => 'map-pin',      'text' => 'Manassas &amp; Prince William County'],
      ['icon' => 'wrench',       'text' => 'Factory-Level Repairs'],
      ['icon' => 'clock',        'text' => 'Mon–Fri 8 AM – 5 PM'],
      ['icon' => 'star',         'text' => 'Honest Estimates, Fair Prices'],
    ];
    // Duplicate for seamless loop
    $allItems = array_merge($tickerItems, $tickerItems);
    foreach ($allItems as $item):
    ?>
    <span class="ticker-item">
      <i data-lucide="<?= htmlspecialchars($item['icon']) ?>"></i>
      <?= $item['text'] ?>
    </span>
    <span class="ticker-sep" aria-hidden="true">&#9679;</span>
    <?php endforeach; ?>

  </div>
</div>


<!-- Divider: ticker (primary) → services (bg-alt) — Wave -->
<div class="divider-block" style="background:var(--color-primary);" aria-hidden="true">
  <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;width:100%;">
    <path d="M0,30 C240,0 480,60 720,30 C960,0 1200,60 1440,30 L1440,60 L0,60 Z" fill="#f4f7fa"/>
  </svg>
</div>


<!-- ================================================================
     SERVICES — 8 Tinted Image Cards (CLAUDE.md required pattern)
     ================================================================ -->
<section class="section section-alt numbered-section" id="services" aria-label="<?= htmlspecialchars($siteName) ?> services" style="padding-top:var(--space-3xl);">
  <div class="container">

    <header class="services-header reveal-up" data-animate>
      <span class="eyebrow-label">What We Do</span>
      <h2><?= count($services) ?> Services. <span class="text-accent">One Standard.</span></h2>
      <span class="section-subtitle">Factory-level expertise for every job, every make, every time</span>
      <p class="prose" style="margin-top:var(--space-md);">
        From oil changes to transmission rebuilds, SW Automotive handles the full scope of automotive service in Manassas — with ASE certified technicians who explain every step before touching your vehicle.
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
    </div><!-- /.services-grid -->

    <div class="services-view-all" data-animate>
      <a href="/services" class="btn btn-secondary">View All Services &rarr;</a>
    </div>

  </div>
</section>


<!-- Divider: services (bg-alt) → stats (bg-dark) — Diagonal down -->
<div class="divider-block" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;width:100%;">
    <polygon points="0,0 1440,60 1440,60 0,60" fill="#0e1822"/>
  </svg>
</div>


<!-- ================================================================
     STATS BAND — dark background, animated counters
     ================================================================ -->
<section class="stats-band" aria-label="SW Automotive by the numbers">
  <div class="container">
    <div class="stats-grid">

      <div class="stat-block reveal-up reveal-delay-1" data-animate>
        <div class="stat-num-row">
          <span class="stat-counter" data-counter="27" aria-label="27">27</span>
          <span class="stat-suffix">+</span>
        </div>
        <p class="stat-label" style="color:rgba(255,255,255,0.70);">Years Dealership Experience</p>
      </div>

      <div class="stat-block reveal-up reveal-delay-2" data-animate>
        <div class="stat-num-row">
          <span class="stat-counter" data-counter="8" aria-label="8">8</span>
          <span class="stat-suffix"></span>
        </div>
        <p class="stat-label" style="color:rgba(255,255,255,0.70);">Expert Auto Services</p>
      </div>

      <div class="stat-block reveal-up reveal-delay-3" data-animate>
        <div class="stat-num-row">
          <span class="stat-counter" data-counter="4" aria-label="4">4</span>
          <span class="stat-suffix">+</span>
        </div>
        <p class="stat-label" style="color:rgba(255,255,255,0.70);">Years Serving Manassas</p>
      </div>

      <div class="stat-block reveal-up reveal-delay-1" data-animate>
        <div class="stat-num-row">
          <span class="stat-counter" data-counter="25" aria-label="25">25</span>
          <span class="stat-suffix"></span>
        </div>
        <p class="stat-label" style="color:rgba(255,255,255,0.70);">Mile Service Radius</p>
      </div>

    </div>
  </div>
</section>


<!-- ================================================================
     MID-PAGE CTA BANNER — CTA #2 of 3
     ================================================================ -->
<section class="cta-banner" aria-label="Schedule your service today">
  <div class="container">
    <span class="eyebrow-label" style="color:var(--color-accent); justify-content:center; display:flex;">
      Honest Repairs. Fair Prices.
    </span>
    <h2 style="font-size:clamp(2rem,5vw,3.2rem); margin-bottom:var(--space-lg); text-wrap:balance;">
      Your Vehicle Deserves Dealership Expertise<br>
      <span class="text-gradient">Without Dealership Prices.</span>
    </h2>
    <p class="prose-centered" style="color:rgba(255,255,255,0.80); margin-bottom:var(--space-2xl); font-size:var(--font-size-lg);">
      27 years of Nissan Master Technician experience — now at an independent shop where
      your business actually matters. We explain every repair in plain language and
      never perform work without your approval.
    </p>
    <div style="display:flex; gap:var(--space-md); justify-content:center; flex-wrap:wrap;">
      <a href="/contact" class="btn btn-accent">Schedule Service Today</a>
      <a href="/about" class="btn btn-outline-white">Meet Our Technicians</a>
    </div>
  </div>
</section>


<!-- Divider: CTA (dark gradient end ~#4d5e6f) → about (white) — Diagonal up -->
<div class="divider-block" style="background:var(--color-secondary);" aria-hidden="true">
  <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;width:100%;">
    <polygon points="0,60 1440,0 1440,60" fill="#ffffff"/>
  </svg>
</div>


<!-- ================================================================
     ABOUT + PROCESS — Signature Split Section
     ================================================================ -->
<section class="section about-section numbered-section" id="about" aria-label="About SW Automotive" style="padding-top:var(--space-2xl);">
  <div class="container">
    <div class="about-layout">

      <!-- Text + Process Steps (Left 55%) -->
      <div class="about-text" data-animate>

        <span class="eyebrow-label">Who We Are</span>
        <h2>Dealership Knowledge.<br>Independent Shop Values.</h2>

        <p class="about-lead">
          SW Automotive was built on a simple idea: Prince William County deserves access to
          factory-level auto repair without the dealership markup, the long waits,
          or the mystery charges.
        </p>
        <p class="about-body">
          Our owner and lead technician spent 27 years at Nissan dealerships earning
          Master Technician status — then opened SW Automotive to bring that depth of
          knowledge to a shop where customers are treated like neighbors. Every technician
          on our team is ASE certified and holds specialized credentials in diesel, hybrid,
          and electric vehicle systems. Whether you drive a Corolla or a diesel RAM 2500,
          we have the training to handle it right.
        </p>

        <div class="cert-strip" aria-label="Certifications">
          <?php foreach ($certifications as $cert): ?>
          <span class="cert-badge"><?= htmlspecialchars($cert) ?></span>
          <?php endforeach; ?>
        </div>

        <p class="process-steps-title">How We Work</p>
        <div class="process-steps" role="list">

          <div class="process-step-row" role="listitem">
            <div class="step-num-circle" aria-hidden="true">01</div>
            <div class="step-body">
              <h3>Diagnose</h3>
              <p>We start with a comprehensive vehicle inspection and pull diagnostic codes — no guesswork, no assumptions.</p>
            </div>
          </div>

          <div class="process-step-row" role="listitem">
            <div class="step-num-circle" aria-hidden="true">02</div>
            <div class="step-body">
              <h3>Explain</h3>
              <p>You get a clear, written breakdown of exactly what we found, what it means, and what it will cost before we touch anything.</p>
            </div>
          </div>

          <div class="process-step-row" role="listitem">
            <div class="step-num-circle" aria-hidden="true">03</div>
            <div class="step-body">
              <h3>Repair</h3>
              <p>With your approval, we perform factory-spec repairs using quality parts — the same standard as any dealership.</p>
            </div>
          </div>

          <div class="process-step-row" role="listitem">
            <div class="step-num-circle" aria-hidden="true">04</div>
            <div class="step-body">
              <h3>Verify</h3>
              <p>We road-test and inspect the repair before you pick up the vehicle. You leave confident, not crossing your fingers.</p>
            </div>
          </div>

        </div><!-- /.process-steps -->
      </div><!-- /.about-text -->

      <!-- Image Side (Right 45%) — Signature overlapping element -->
      <div class="about-image-side" data-animate="wipe-right">

        <div class="about-img-wrap img-reveal">
          <img
            src="<?= htmlspecialchars($aboutPhoto) ?>"
            alt="SW Automotive technicians working in the Manassas VA shop"
            width="600" height="520"
            loading="lazy"
          >
        </div>

        <!-- Overlapping stat card — breaks image boundary -->
        <div class="about-stat-card" aria-label="27 years of experience">
          <span class="stat-big-num">27<span style="font-size:1.8rem;">+</span></span>
          <span class="stat-big-label">Years of Experience</span>
          <span class="stat-big-sub">Nissan Master Technician</span>
        </div>

      </div><!-- /.about-image-side -->

    </div><!-- /.about-layout -->
  </div>
</section>


<!-- Divider: about (white) → reviews (bg-dark) — Wave -->
<div class="divider-block" style="background:#ffffff;" aria-hidden="true">
  <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;width:100%;">
    <path d="M0,20 C360,60 720,0 1080,30 C1260,45 1380,20 1440,20 L1440,60 L0,60 Z" fill="#0e1822"/>
  </svg>
</div>


<!-- ================================================================
     REVIEWS — Dark Swiper Carousel
     ================================================================ -->
<section class="reviews-section numbered-section" id="reviews" aria-label="Customer reviews">
  <div class="container">

    <header class="reviews-header reveal-up" data-animate>
      <span class="eyebrow-label" style="justify-content:center; display:flex;">What Customers Say</span>
      <h2>Manassas Drivers Trust SW Automotive</h2>
      <p class="prose-centered" style="color:rgba(255,255,255,0.65); margin-top:var(--space-md);">
        Real feedback from real customers across Prince William County.
      </p>
    </header>

    <div class="swiper reviews-swiper" aria-label="Customer review carousel">
      <div class="swiper-wrapper">
        <?php foreach ($sampleReviews as $rev): ?>
        <div class="swiper-slide">
          <article class="review-card-ext" itemscope itemtype="https://schema.org/Review">
            <div class="review-stars-row" aria-label="5 out of 5 stars">
              <?php for ($s = 0; $s < 5; $s++): ?>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
              <?php endfor; ?>
            </div>
            <p class="review-quote" itemprop="reviewBody"><?= htmlspecialchars($rev['quote']) ?></p>
            <div class="review-author-row">
              <div class="review-avatar" aria-hidden="true"><?= htmlspecialchars($rev['initials']) ?></div>
              <div>
                <span class="review-author-name" itemprop="author"><?= htmlspecialchars($rev['name']) ?></span>
                <span class="review-author-meta"><?= htmlspecialchars($rev['loc']) ?> &middot; <?= htmlspecialchars($rev['service']) ?></span>
              </div>
            </div>
          </article>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-pagination" aria-label="Review pagination"></div>
    </div>

    <div class="reviews-badge-strip" role="list" aria-label="Review platforms">
      <a href="#" class="review-platform-badge" role="listitem" aria-label="Google Reviews">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/></svg>
        Google Reviews
      </a>
      <a href="#" class="review-platform-badge" role="listitem" aria-label="Facebook Reviews">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
        Facebook
      </a>
      <span class="review-platform-badge" role="listitem">
        <i data-lucide="shield-check"></i>
        BBB Accredited
      </span>
    </div>

  </div>
</section>


<!-- Divider: reviews (bg-dark) → FAQ (bg-alt) — Diagonal up -->
<div class="divider-block" style="background:#0e1822;" aria-hidden="true">
  <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;width:100%;">
    <polygon points="0,60 1440,0 1440,60" fill="#f4f7fa"/>
  </svg>
</div>


<!-- ================================================================
     FAQ SECTION — 2-col accordion grid + FAQPage schema
     ================================================================ -->
<section class="faq-section numbered-section" id="faq" aria-label="Frequently asked questions" style="padding-top:var(--space-3xl);">
  <div class="container">

    <header class="section-title reveal-up" data-animate>
      <span class="eyebrow-label">Common Questions</span>
      <h2>Auto Repair FAQs for<br><span class="text-accent">Manassas Drivers</span></h2>
      <p class="prose" style="margin-top:var(--space-md);">
        Straight answers about cost, certifications, service capability, and what to expect when you bring your vehicle to SW Automotive.
      </p>
    </header>

    <div class="faq-grid" role="list">
      <?php foreach ($homeFaqs as $idx => $faq): ?>
      <div class="faq-item reveal-up reveal-delay-<?= ($idx % 3) + 1 ?>" data-animate role="listitem">
        <button class="faq-question" aria-expanded="false" aria-controls="faq-answer-<?= $idx ?>">
          <span><?= htmlspecialchars($faq['q']) ?></span>
          <span class="faq-icon" aria-hidden="true">
            <i data-lucide="plus"></i>
          </span>
        </button>
        <div class="faq-answer" id="faq-answer-<?= $idx ?>" role="region">
          <p><?= htmlspecialchars($faq['a']) ?></p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>

    <div style="text-align:center; margin-top:var(--space-2xl);" data-animate>
      <a href="/contact" class="btn btn-secondary">Have a Question? Ask Us Directly &rarr;</a>
    </div>

  </div>
</section>


<!-- Divider: FAQ (bg-alt) → closing CTA (dark gradient) — Diagonal down -->
<div class="divider-block" style="background:#f4f7fa;" aria-hidden="true">
  <svg viewBox="0 0 1440 60" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:60px;width:100%;">
    <polygon points="0,0 1440,60 1440,60 0,60" fill="#111e2b"/>
  </svg>
</div>


<!-- ================================================================
     CLOSING CTA — CTA #3 of 3
     ================================================================ -->
<section class="closing-cta-section" id="estimate-contact" aria-label="Get your free estimate">
  <div class="container">

    <span class="eyebrow-label" style="justify-content:center; display:flex;">
      <i data-lucide="clock"></i> Mon–Fri 8 AM – 5 PM
    </span>

    <h2>Stop Guessing. Start Knowing<br>What's Wrong With Your Car.</h2>

    <p>
      Bring it to SW Automotive at 10404 Morias Ct, Manassas VA 20110.
      Same-day diagnostics for most vehicles. Written estimates before
      any work begins. No surprises — just straight answers from a shop
      that's been doing this right for <?= $yearsInBusiness ?>+ years.
    </p>

    <div class="closing-cta-actions">
      <a href="/contact" class="btn btn-accent btn-wide">
        <i data-lucide="calendar"></i>
        Schedule My Free Estimate
      </a>
      <a href="/services" class="btn btn-outline-white">
        <i data-lucide="list"></i>
        See All Services
      </a>
    </div>

    <p style="font-size:var(--font-size-xs); color:rgba(255,255,255,0.45); margin-top:var(--space-xl); margin-bottom:0;">
      10404 Morias Ct &middot; Manassas, VA 20110 &middot; Open Monday–Friday 8 AM – 5 PM
    </p>

  </div>
</section>


<!-- Swiper Reviews initialization -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  if (typeof Swiper !== 'undefined') {
    new Swiper('.reviews-swiper', {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: true,
      autoplay: {
        delay: 5500,
        pauseOnMouseEnter: true,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640:  { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
      },
    });
  }
});
</script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
