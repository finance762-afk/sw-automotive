<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$siteName     = $siteName;
$contactEmail = $email;
$contactPhone = $phone;

$contactSchema = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'     => 'AutoRepair',
            '@id'       => $siteUrl . '/#business',
            'name'      => $siteName,
            'telephone' => $phone,
            'email'     => $email,
            'address'   => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => $address['street'],
                'addressLocality' => $address['city'],
                'addressRegion'   => $address['state'],
                'postalCode'      => $address['zip'],
                'addressCountry'  => 'US',
            ],
            'openingHoursSpecification' => [
                ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'], 'opens' => '08:00', 'closes' => '17:00'],
            ],
        ],
        [
            '@type'          => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',    'item' => $siteUrl . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => $siteUrl . '/contact'],
            ],
        ],
    ],
];

$schemaMarkup   = json_encode($contactSchema);
$heroPreloadImage = $clientPhotos[3];

$pageTitle       = 'Contact SW Automotive | Auto Repair in Manassas, VA';
$pageDescription = 'Contact SW Automotive in Manassas, VA. Schedule auto repair, diesel service, oil changes, brakes, or transmission work. Written estimates on every job. Mon–Fri 8 AM–5 PM.';
$canonicalUrl    = $siteUrl . '/contact';
$ogImage         = $clientPhotos[3];
$currentPage     = 'contact';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
/* ─── Hero ─── */
.contact-hero {
  position: relative;
  min-height: 52vh;
  display: flex;
  align-items: flex-end;
  padding-bottom: var(--space-3xl);
  overflow: hidden;
  background-image: url('<?php echo $clientPhotos[3]; ?>');
  background-size: cover;
  background-position: center 45%;
  animation: kenburns-contact 20s ease-in-out infinite alternate;
}
@keyframes kenburns-contact {
  from { background-size: 108%; background-position: center 40%; }
  to   { background-size: 118%; background-position: center 55%; }
}
.contact-hero::before {
  content: '';
  position: absolute;
  inset: 0;
  background: linear-gradient(155deg, rgba(14,24,34,0.82) 0%, rgba(14,24,34,0.48) 100%);
  z-index: 1;
}
.contact-hero::after {
  content: '';
  position: absolute;
  inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.75' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  background-size: 180px;
  opacity: 0.04;
  z-index: 2;
  pointer-events: none;
}
.contact-hero__inner {
  position: relative;
  z-index: 3;
  width: 100%;
}
.contact-breadcrumb {
  display: flex;
  align-items: center;
  gap: var(--space-xs);
  margin-bottom: var(--space-lg);
  font-size: 0.8rem;
  color: rgba(255,255,255,0.6);
}
.contact-breadcrumb a { color: rgba(255,255,255,0.6); transition: color var(--transition-base); }
.contact-breadcrumb a:hover { color: var(--color-accent); }
.contact-breadcrumb .sep { color: rgba(255,255,255,0.3); }
.contact-hero__eyebrow {
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
.contact-hero h1 {
  font-family: var(--font-heading);
  font-size: clamp(2rem, 4.5vw, 3.4rem);
  font-weight: 800;
  color: #fff;
  line-height: 1.1;
  text-wrap: balance;
  margin-bottom: var(--space-sm);
  background: linear-gradient(135deg, #fff 65%, var(--color-accent));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}
.contact-hero__sub {
  font-size: 1rem;
  color: rgba(255,255,255,0.8);
  max-width: 50ch;
  line-height: 1.6;
}

/* ─── Divider ─── */
.divider-wave { line-height: 0; }
.divider-wave svg { display: block; width: 100%; }
.divider-diag { overflow: hidden; line-height: 0; }
.divider-diag svg { display: block; width: 100%; }

/* ─── Contact Body ─── */
.contact-body {
  padding: var(--section-pad);
  background: var(--color-bg);
}
.contact-body__grid {
  display: grid;
  grid-template-columns: 3fr 2fr;
  gap: var(--space-3xl);
  align-items: start;
}

/* ─── Form ─── */
.contact-form-wrap {
  background: var(--color-bg-alt);
  border-radius: var(--radius-lg);
  padding: var(--space-2xl);
  box-shadow: var(--shadow-md);
}
.contact-form-wrap h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 3vw, 1.9rem);
  font-weight: 800;
  color: var(--color-primary);
  text-wrap: balance;
  margin-bottom: var(--space-sm);
}
.contact-form-wrap .form-note {
  font-size: 0.88rem;
  color: var(--color-text-light);
  margin-bottom: var(--space-xl);
  line-height: 1.55;
}

/* Floating label fields */
.form-field {
  position: relative;
  margin-bottom: var(--space-lg);
}
.form-field label {
  position: absolute;
  top: 50%;
  left: var(--space-md);
  transform: translateY(-50%);
  font-size: 0.95rem;
  color: var(--color-text-light);
  pointer-events: none;
  transition: all 0.2s ease;
  background: transparent;
  padding: 0 4px;
  z-index: 1;
}
.form-field--textarea label {
  top: var(--space-md);
  transform: none;
}
.form-field input,
.form-field select,
.form-field textarea {
  width: 100%;
  padding: var(--space-md) var(--space-md);
  border: 2px solid rgba(26,43,60,0.15);
  border-radius: var(--radius-md);
  font-size: 0.95rem;
  color: var(--color-text);
  background: var(--color-bg);
  transition: border-color 0.2s ease, box-shadow 0.2s ease;
  font-family: var(--font-body);
  -webkit-appearance: none;
  appearance: none;
}
.form-field input:focus,
.form-field select:focus,
.form-field textarea:focus {
  outline: none;
  border-color: var(--color-accent);
  box-shadow: 0 0 0 3px rgba(6,182,212,0.12);
}
.form-field input:focus ~ label,
.form-field input:not(:placeholder-shown) ~ label,
.form-field select:focus ~ label,
.form-field select:not([value=""]) ~ label,
.form-field textarea:focus ~ label,
.form-field textarea:not(:placeholder-shown) ~ label {
  top: 0;
  transform: translateY(-50%);
  font-size: 0.78rem;
  color: var(--color-accent);
  font-weight: 600;
  background: var(--color-bg);
}
.form-field textarea { resize: vertical; min-height: 120px; padding-top: var(--space-md); }
.form-field input::placeholder,
.form-field textarea::placeholder { color: transparent; }

/* Consent fieldset */
.form-consent-fieldset {
  border: 1px solid rgba(26,43,60,0.12);
  border-radius: var(--radius-md);
  padding: var(--space-lg);
  margin-bottom: var(--space-lg);
  background: rgba(6,182,212,0.02);
}
.form-consent-legend {
  font-family: var(--font-heading);
  font-size: 0.88rem;
  font-weight: 700;
  color: var(--color-primary);
  letter-spacing: 0.05em;
  text-transform: uppercase;
  padding: 0 var(--space-sm);
}
.form-consent-item {
  display: flex;
  align-items: flex-start;
  gap: var(--space-sm);
  margin-bottom: var(--space-md);
  cursor: pointer;
}
.form-consent-item:last-child { margin-bottom: 0; }
.consent-checkbox {
  flex-shrink: 0;
  width: 18px;
  height: 18px;
  margin-top: 2px;
  accent-color: var(--color-accent);
  cursor: pointer;
}
.consent-label {
  font-size: 0.82rem;
  color: var(--color-text-light);
  line-height: 1.55;
}
.consent-label a {
  color: var(--color-accent);
  text-decoration: underline;
}
.consent-label strong { color: var(--color-text); }
.form-consent-required .consent-label { color: var(--color-text); }
.required-star { color: #e53e3e; font-weight: 700; }

.form-submit-btn {
  width: 100%;
  padding: var(--space-md) var(--space-xl);
  background: var(--color-primary);
  color: #fff;
  border: none;
  border-radius: var(--radius-md);
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  cursor: pointer;
  box-shadow: 0 4px 0 var(--color-bg-dark);
  transition: transform 0.15s ease, box-shadow 0.15s ease, background 0.2s ease;
  overflow: hidden;
  position: relative;
}
.form-submit-btn:hover {
  background: var(--color-accent);
  transform: translateY(-2px);
  box-shadow: 0 6px 0 rgba(6,182,212,0.4);
}
.form-submit-btn:active {
  transform: translateY(2px);
  box-shadow: 0 2px 0 var(--color-bg-dark);
}

/* ─── Info Panel ─── */
.contact-info { display: flex; flex-direction: column; gap: var(--space-lg); }
.contact-info-card {
  background: var(--color-bg-alt);
  border-radius: var(--radius-lg);
  padding: var(--space-xl);
  box-shadow: var(--shadow-sm);
  border-left: 3px solid var(--color-accent);
}
.contact-info-card h3 {
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-primary);
  margin-bottom: var(--space-md);
  display: flex;
  align-items: center;
  gap: var(--space-sm);
}
.contact-info-card h3 svg { color: var(--color-accent); }
.contact-info-card p,
.contact-info-card a {
  font-size: 0.92rem;
  color: var(--color-text);
  line-height: 1.65;
  margin: 0;
}
.contact-info-card a:hover { color: var(--color-accent); }
.hours-list {
  display: flex;
  flex-direction: column;
  gap: var(--space-xs);
}
.hours-row {
  display: flex;
  justify-content: space-between;
  font-size: 0.88rem;
  padding: 4px 0;
  border-bottom: 1px solid rgba(26,43,60,0.06);
}
.hours-row:last-child { border-bottom: none; }
.hours-row .day { color: var(--color-text-light); }
.hours-row .time { font-weight: 600; color: var(--color-primary); }
.hours-row .closed { color: var(--color-text-light); font-style: italic; }

/* ─── Map ─── */
.contact-map {
  padding: 0 0 var(--space-4xl);
  background: var(--color-bg);
}
.contact-map__inner {
  border-radius: var(--radius-lg);
  overflow: hidden;
  box-shadow: var(--shadow-md);
  aspect-ratio: 16/5;
}
.contact-map__inner iframe {
  width: 100%; height: 100%;
  border: none;
  display: block;
}

/* ─── Closing CTA ─── */
.contact-cta {
  padding: var(--section-pad);
  background: var(--color-primary);
  text-align: center;
}
.contact-cta h2 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: #fff;
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.contact-cta p {
  color: rgba(255,255,255,0.75);
  max-width: 50ch;
  margin: 0 auto var(--space-xl);
  line-height: 1.65;
}
.contact-cta__actions {
  display: flex; flex-wrap: wrap;
  gap: var(--space-md); justify-content: center;
}
.contact-cta .btn-primary { background: var(--color-accent); border-color: var(--color-accent); }

/* ─── Responsive ─── */
@media (max-width: 1023px) {
  .contact-body__grid { grid-template-columns: 1fr; }
  .contact-map__inner { aspect-ratio: 16/7; }
}
@media (max-width: 767px) {
  .contact-hero { min-height: 48vh; }
  .contact-map__inner { aspect-ratio: 4/3; }
  .contact-cta__actions { flex-direction: column; align-items: center; }
}
</style>

<!-- ═══ HERO ═══ -->
<section class="contact-hero" aria-label="Contact SW Automotive hero">
  <div class="container contact-hero__inner">
    <nav class="contact-breadcrumb" aria-label="Breadcrumb">
      <a href="/">Home</a>
      <span class="sep" aria-hidden="true">›</span>
      <span aria-current="page">Contact</span>
    </nav>
    <span class="contact-hero__eyebrow">Get in Touch</span>
    <h1>Schedule Your Service<br>in Manassas, VA</h1>
    <p class="contact-hero__sub">Drop off your vehicle or reach out online. Written estimates on every job, no appointment needed for most services.</p>
  </div>
</section>

<!-- Divider -->
<div class="divider-wave" aria-hidden="true">
  <svg viewBox="0 0 1440 48" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" style="height:48px;">
    <path d="M0 48 L0 24 C240 0 480 48 720 24 C960 0 1200 48 1440 24 L1440 48 Z" fill="var(--color-bg)"/>
  </svg>
</div>

<!-- ═══ CONTACT BODY ═══ -->
<section class="contact-body" aria-labelledby="contact-form-heading">
  <div class="container">
    <div class="contact-body__grid">

      <!-- ── FORM ── -->
      <div class="contact-form-wrap" data-animate="fade-up">
        <h2 id="contact-form-heading">Send Us a Message</h2>
        <p class="form-note">We typically respond within 1 business hour during shop hours (Mon–Fri, 8 AM–5 PM). For faster service, call us directly.</p>

        <form action="<?php echo htmlspecialchars($formAction); ?>" method="POST" novalidate>

          <!-- Honeypot -->
          <input type="text" name="_honey" style="display:none !important" tabindex="-1" autocomplete="off" aria-hidden="true">

          <!-- Redirect -->
          <input type="hidden" name="_next" value="/thank-you">

          <!-- Consent tracking -->
          <input type="hidden" name="_consent_version" value="v2.1">
          <input type="hidden" name="_consent_page" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

          <div class="form-field">
            <input type="text" name="name" id="name" placeholder="Your Name" required autocomplete="name">
            <label for="name">Your Name <span aria-hidden="true">*</span></label>
          </div>

          <div class="form-field">
            <input type="email" name="email" id="email" placeholder="Email Address" required autocomplete="email">
            <label for="email">Email Address <span aria-hidden="true">*</span></label>
          </div>

          <div class="form-field">
            <input type="tel" name="phone" id="phone" placeholder="Phone Number" required autocomplete="tel">
            <label for="phone">Phone Number <span aria-hidden="true">*</span></label>
          </div>

          <div class="form-field">
            <select name="service" id="service">
              <option value="">Select a Service (optional)</option>
              <?php foreach ($services as $svc): ?>
              <option value="<?php echo htmlspecialchars($svc['slug']); ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
              <?php endforeach; ?>
              <option value="other">Other / Not Sure</option>
            </select>
            <label for="service">Service Needed</label>
          </div>

          <div class="form-field form-field--textarea">
            <textarea name="message" id="message" placeholder="Describe your vehicle issue or service needed" rows="4"></textarea>
            <label for="message">Message (optional)</label>
          </div>

          <!-- ── TCPA Consent Checkboxes ── -->
          <fieldset class="form-consent-fieldset">
            <legend class="form-consent-legend">Communication Consent</legend>

            <label class="form-consent-item">
              <input type="checkbox" name="email_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>Email updates (optional):</strong> I agree to receive emails from
                <?php echo htmlspecialchars($siteName); ?> about my inquiry, services, and updates. I understand I can unsubscribe anytime. Message frequency varies.
              </span>
            </label>

            <label class="form-consent-item">
              <input type="checkbox" name="sms_opt_in" value="yes" class="consent-checkbox">
              <span class="consent-label">
                <strong>SMS/Text messages (optional):</strong> I agree to receive text messages from
                <?php echo htmlspecialchars($siteName); ?> at the phone number provided. Message types include appointment reminders and service updates. Message and data rates may apply. Reply STOP to unsubscribe, HELP for help.
                <strong>Consent is not a condition of purchase.</strong>
              </span>
            </label>

            <label class="form-consent-item form-consent-required">
              <input type="checkbox" name="terms_accepted" value="yes" class="consent-checkbox" required>
              <span class="consent-label">
                I have read and agree to the
                <a href="/privacy-policy/">Privacy Policy</a> and
                <a href="/terms/">Terms of Service</a>. <span class="required-star">*</span>
              </span>
            </label>

          </fieldset>

          <button type="submit" class="form-submit-btn">Send My Message &rarr;</button>
        </form>
      </div>

      <!-- ── INFO PANEL ── -->
      <aside class="contact-info" data-animate="fade-up">

        <div class="contact-info-card">
          <h3><i data-lucide="map-pin" style="width:18px;height:18px;" aria-hidden="true"></i> Location</h3>
          <address style="font-style:normal;">
            <p><?php echo htmlspecialchars($address['street']); ?><br>
            <?php echo htmlspecialchars($address['city'] . ', ' . $address['state'] . ' ' . $address['zip']); ?></p>
          </address>
        </div>

        <?php if ($phone): ?>
        <div class="contact-info-card">
          <h3><i data-lucide="phone" style="width:18px;height:18px;" aria-hidden="true"></i> Phone</h3>
          <p><a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>"><?php echo htmlspecialchars($phone); ?></a></p>
        </div>
        <?php endif; ?>

        <?php if ($email): ?>
        <div class="contact-info-card">
          <h3><i data-lucide="mail" style="width:18px;height:18px;" aria-hidden="true"></i> Email</h3>
          <p><a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a></p>
        </div>
        <?php endif; ?>

        <div class="contact-info-card">
          <h3><i data-lucide="clock" style="width:18px;height:18px;" aria-hidden="true"></i> Hours</h3>
          <div class="hours-list">
            <div class="hours-row">
              <span class="day">Monday</span>
              <span class="time"><?php echo $businessHours['monday']; ?></span>
            </div>
            <div class="hours-row">
              <span class="day">Tuesday</span>
              <span class="time"><?php echo $businessHours['tuesday']; ?></span>
            </div>
            <div class="hours-row">
              <span class="day">Wednesday</span>
              <span class="time"><?php echo $businessHours['wednesday']; ?></span>
            </div>
            <div class="hours-row">
              <span class="day">Thursday</span>
              <span class="time"><?php echo $businessHours['thursday']; ?></span>
            </div>
            <div class="hours-row">
              <span class="day">Friday</span>
              <span class="time"><?php echo $businessHours['friday']; ?></span>
            </div>
            <div class="hours-row">
              <span class="day">Saturday</span>
              <span class="closed"><?php echo $businessHours['saturday']; ?></span>
            </div>
            <div class="hours-row">
              <span class="day">Sunday</span>
              <span class="closed"><?php echo $businessHours['sunday']; ?></span>
            </div>
          </div>
        </div>

        <div class="contact-info-card">
          <h3><i data-lucide="shield-check" style="width:18px;height:18px;" aria-hidden="true"></i> Trust</h3>
          <?php foreach ($trustSignals as $sig): ?>
          <p style="margin-bottom:4px;font-size:0.88rem;">✓ <?php echo htmlspecialchars($sig); ?></p>
          <?php endforeach; ?>
        </div>

      </aside>
    </div>
  </div>
</section>

<!-- ═══ MAP ═══ -->
<div class="contact-map">
  <div class="container">
    <div class="contact-map__inner">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3112.1!2d-77.47!3d38.75!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2s<?php echo urlencode($addressFull); ?>!5e0!3m2!1sen!2sus!4v1"
        loading="lazy"
        allowfullscreen=""
        aria-label="SW Automotive location on Google Maps, <?php echo htmlspecialchars($addressFull); ?>"
        title="SW Automotive map — <?php echo htmlspecialchars($addressFull); ?>">
      </iframe>
    </div>
  </div>
</div>

<!-- ═══ CLOSING CTA ═══ -->
<section class="contact-cta" aria-label="Call SW Automotive">
  <div class="container">
    <h2>Prefer to Call?<br>We're Here Mon–Fri.</h2>
    <p>Drop your vehicle off or call ahead. No appointment needed for most services. <?php echo htmlspecialchars($hoursDisplay); ?>.</p>
    <div class="contact-cta__actions">
      <?php if ($phone): ?>
      <a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>" class="btn-primary">Call Us Now</a>
      <?php endif; ?>
      <a href="/services/" class="btn-secondary" style="border-color:rgba(255,255,255,0.35);color:#fff;">View Services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
