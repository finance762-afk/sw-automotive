<?php
/**
 * SW Automotive — Footer Component
 */

$_phoneHref    = !empty($phone) ? 'tel:' . preg_replace('/\D/', '', $phone) : '/contact';
$_phoneDisplay = !empty($phoneDisplay) ? $phoneDisplay : (!empty($phone) ? formatPhone($phone) : 'Call Us');

$_servicesCol1 = array_slice($services, 0, 4);
$_servicesCol2 = array_slice($services, 4);

$_entityDesc = 'SW Automotive is an auto repair company based in Manassas, VA, serving Prince William County and surrounding communities including Manassas Park, Haymarket, Gainesville, Woodbridge, and Bristow. Founded in ' . $yearEstablished . ' with ' . $yearsInBusiness . '+ years of experience, SW Automotive specializes in auto repair, diesel service, and preventive maintenance for all makes and models. ASE certified technicians with Nissan Master Technician credentials. Hybrid and EV capable.'
    . (!empty($phone) ? ' Contact: ' . $_phoneDisplay . '.' : '')
    . (!empty($email) ? ' Email: ' . $email . '.' : '')
    . ' ' . $domain . '. Licensed and insured.';
?>

</main>

<footer class="site-footer" role="contentinfo">

  <div class="footer-top">
    <div class="container">
      <div class="footer-grid">

        <div class="footer-col">
          <a href="/" class="site-logo footer-logo" aria-label="SW Automotive">
            <img src="<?php echo htmlspecialchars($logoUrl); ?>" alt="SW Automotive" class="logo-img" width="160" height="52" loading="lazy">
          </a>
          <p>Honest auto repair, diesel service, and preventive maintenance for every make and model in Manassas and Prince William County. Factory-level expertise at a fair price.</p>
          <div class="footer-trust">
            <?php foreach ($trustSignals as $badge): ?>
            <span class="trust-badge"><?php echo htmlspecialchars($badge); ?></span>
            <?php endforeach; ?>
          </div>
          <?php if (!empty(array_filter($socialLinks, fn($v) => !empty($v)))): ?>
          <div class="social-links">
            <?php if (!empty($socialLinks['facebook'])): ?>
            <a href="<?php echo htmlspecialchars($socialLinks['facebook']); ?>" class="social-link" target="_blank" rel="noopener" aria-label="Facebook">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
            </a>
            <?php endif; ?>
            <?php if (!empty($socialLinks['instagram'])): ?>
            <a href="<?php echo htmlspecialchars($socialLinks['instagram']); ?>" class="social-link" target="_blank" rel="noopener" aria-label="Instagram">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
            </a>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>

        <div class="footer-col">
          <h4>Our Services</h4>
          <ul>
            <?php foreach ($_servicesCol1 as $s): ?>
            <li><a href="/services/<?php echo htmlspecialchars($s['slug']); ?>/"><?php echo htmlspecialchars($s['name']); ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="footer-col">
          <?php if (!empty($_servicesCol2)): ?>
          <h4>More Services</h4>
          <ul>
            <?php foreach ($_servicesCol2 as $s): ?>
            <li><a href="/services/<?php echo htmlspecialchars($s['slug']); ?>/"><?php echo htmlspecialchars($s['name']); ?></a></li>
            <?php endforeach; ?>
            <li><a href="/services"><strong>All Services &rarr;</strong></a></li>
          </ul>
          <?php endif; ?>
          <h4 style="margin-top: var(--space-6);">Service Areas</h4>
          <ul>
            <?php foreach (array_slice($serviceAreas, 0, 5) as $area): ?>
            <li><a href="/service-area#<?php echo htmlspecialchars($area['slug']); ?>"><?php echo htmlspecialchars($area['city']); ?>, <?php echo htmlspecialchars($area['state']); ?></a></li>
            <?php endforeach; ?>
            <li><a href="/service-area"><strong>View All Areas &rarr;</strong></a></li>
          </ul>
        </div>

        <div class="footer-col">
          <h4>Contact Us</h4>
          <ul>
            <?php if (!empty($phone)): ?>
            <li class="contact-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.41 2 2 0 0 1 3.58 1h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 8.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              <a href="<?php echo $_phoneHref; ?>"><?php echo htmlspecialchars($_phoneDisplay); ?></a>
            </li>
            <?php endif; ?>
            <?php if (!empty($email)): ?>
            <li class="contact-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <a href="mailto:<?php echo htmlspecialchars($email); ?>"><?php echo htmlspecialchars($email); ?></a>
            </li>
            <?php endif; ?>
            <li class="contact-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <span><?php echo htmlspecialchars($addressFull); ?></span>
            </li>
            <li class="contact-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span><?php echo htmlspecialchars($hoursDisplay); ?></span>
            </li>
          </ul>
          <a href="/contact" class="btn btn-accent btn-sm" style="margin-top: var(--space-4); width:100%; justify-content:center; display:inline-flex;">
            Get a Free Estimate
          </a>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="footer-entity" itemscope itemtype="https://schema.org/AutoRepair">
      <meta itemprop="name"      content="<?php echo htmlspecialchars($siteName); ?>">
      <meta itemprop="url"       content="<?php echo htmlspecialchars($domain); ?>">
      <meta itemprop="telephone" content="<?php echo htmlspecialchars($phone); ?>">
      <meta itemprop="address"   content="<?php echo htmlspecialchars($addressFull); ?>">
      <p class="entity-text"><?php echo htmlspecialchars($_entityDesc); ?></p>
    </div>
  </div>

  <div class="container">
    <div class="footer-legal-row">
      <a href="/privacy-policy/">Privacy Policy</a>
      <span aria-hidden="true">|</span>
      <a href="/terms/">Terms of Service</a>
      <span aria-hidden="true">|</span>
      <a href="/cookie-policy/">Cookie Policy</a>
      <span aria-hidden="true">|</span>
      <a href="/accessibility/">Accessibility</a>
      <span aria-hidden="true">|</span>
      <a href="/privacy-policy/#ccpa-rights">Do Not Sell or Share My Personal Information</a>
      <span aria-hidden="true">|</span>
      <a href="/sitemap.xml">Sitemap</a>
    </div>
    <div class="footer-bottom">
      <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($siteName); ?>. All rights reserved.</p>
      <p class="footer-credit">
        <a href="https://pageoneinsights.com" rel="dofollow" target="_blank">Web Design &amp; Hosting by Page One Insights, LLC</a>
      </p>
    </div>
  </div>

</footer>

<button class="back-to-top" aria-label="Back to top" title="Back to top">
  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><polyline points="18 15 12 9 6 15"/></svg>
</button>

<div class="mobile-cta-bar" role="region" aria-label="Quick contact">
  <div class="mobile-cta-grid">
    <?php if (!empty($phone)): ?>
    <a href="<?php echo $_phoneHref; ?>" class="btn btn-accent">&#128222; Call Now</a>
    <?php endif; ?>
    <a href="#estimate-form" class="btn btn-primary">Free Estimate</a>
  </div>
</div>

<script src="/assets/js/main.js" defer></script>
<script src="/assets/js/animations.js" defer></script>
<script src="/assets/js/effects.js" defer></script>

<?php if (!empty($useSwiper)): ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>
<?php endif; ?>

<?php if (!empty($useVanillaTilt)): ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.8.1/vanilla-tilt.min.js" defer></script>
<?php endif; ?>

<script src="https://unpkg.com/lucide@latest" defer></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  if (typeof lucide !== 'undefined') lucide.createIcons();

  document.addEventListener('click', function(e) {
    var navLinks = document.querySelector('.nav-links');
    var hamburger = document.querySelector('.hamburger');
    if (navLinks && navLinks.classList.contains('active')) {
      if (!navLinks.contains(e.target) && !hamburger.contains(e.target)) {
        navLinks.classList.remove('active');
        hamburger.classList.remove('active');
        hamburger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    }
  });
});
</script>

</body>
</html>
