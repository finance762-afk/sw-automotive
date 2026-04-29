<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$companyName       = $siteName;
$companyEntityType = 'Limited Liability Company';
$companyState      = 'Virginia';
$companyEmail      = $email ?: 'info@sw-automotive.com';
$companyPhone      = $phone ?: '(703) 555-0100';
$companyAddress    = $addressFull;
$lastUpdated       = 'April 29, 2026';

$pageTitle       = 'Cookie Policy | ' . $siteName;
$pageDescription = 'Cookie Policy for ' . $siteName . ' — what cookies we use and how to control them.';
$canonicalUrl    = $siteUrl . '/cookie-policy/';
$currentPage     = 'legal';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
.legal-updated {
  font-size: 0.85rem;
  color: var(--color-text-light);
  border-left: 3px solid var(--color-accent);
  padding: var(--space-sm) var(--space-md);
  background: var(--color-bg-alt);
  border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
  margin-bottom: var(--space-2xl);
}
.legal-section a { color: var(--color-accent); text-decoration: underline; }
.cookie-table {
  width: 100%;
  border-collapse: collapse;
  margin: var(--space-md) 0 var(--space-xl);
  font-size: 0.88rem;
}
.cookie-table th {
  background: var(--color-primary);
  color: #fff;
  text-align: left;
  padding: var(--space-sm) var(--space-md);
  font-weight: 600;
}
.cookie-table td {
  padding: var(--space-sm) var(--space-md);
  border-bottom: 1px solid rgba(26,43,60,0.08);
  color: var(--color-text);
  vertical-align: top;
  line-height: 1.55;
}
.cookie-table tr:nth-child(even) td { background: var(--color-bg-alt); }
</style>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Cookie Policy",
  "url": "<?php echo $siteUrl; ?>/cookie-policy/",
  "description": "<?php echo htmlspecialchars($pageDescription); ?>",
  "publisher": { "@type": "Organization", "name": "<?php echo htmlspecialchars($companyName); ?>" },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
      { "@type": "ListItem", "position": 2, "name": "Cookie Policy", "item": "<?php echo $siteUrl; ?>/cookie-policy/" }
    ]
  }
}
</script>

<section class="legal-hero">
  <div class="container">
    <nav aria-label="Breadcrumb" style="font-size:0.8rem;color:rgba(255,255,255,0.6);margin-bottom:var(--space-md);">
      <a href="/" style="color:rgba(255,255,255,0.6);">Home</a>
      <span aria-hidden="true" style="margin:0 6px;">›</span>
      <span aria-current="page">Cookie Policy</span>
    </nav>
    <h1>Cookie Policy</h1>
  </div>
</section>

<section class="legal-content">
  <div class="container">
    <div class="legal-section">
      <p class="legal-updated"><strong>Last Updated:</strong> <?php echo $lastUpdated; ?></p>

      <p><?php echo htmlspecialchars($companyName); ?> ("we," "us," or "our") uses cookies and similar technologies on our website. This Cookie Policy explains what cookies are, what cookies we use, and how you can control them.</p>

      <h2>What Are Cookies</h2>
      <p>Cookies are small text files stored on your device when you visit a website. They help websites remember your preferences and understand how you interact with the site.</p>

      <h2>Strictly Necessary Cookies</h2>
      <p>These cookies are essential for the website to function and cannot be disabled.</p>
      <table class="cookie-table">
        <thead><tr><th>Cookie</th><th>Provider</th><th>Purpose</th><th>Duration</th></tr></thead>
        <tbody>
          <tr><td>PHPSESSID</td><td>This website</td><td>PHP session management</td><td>Session</td></tr>
        </tbody>
      </table>

      <h2>Analytics Cookies</h2>
      <p>These cookies help us understand how visitors interact with our website by collecting anonymous usage data.</p>
      <table class="cookie-table">
        <thead><tr><th>Cookie</th><th>Provider</th><th>Purpose</th><th>Duration</th></tr></thead>
        <tbody>
          <tr><td>_ga</td><td>Google Analytics 4</td><td>Distinguishes unique users</td><td>2 years</td></tr>
          <tr><td>_ga_&lt;container-id&gt;</td><td>Google Analytics 4</td><td>Maintains session state</td><td>2 years</td></tr>
        </tbody>
      </table>
      <p>You can opt out of Google Analytics by installing the <a href="https://tools.google.com/dlpage/gaoptout" target="_blank" rel="noopener noreferrer">Google Analytics Opt-out Browser Add-on</a>.</p>

      <h2>Functional Cookies &amp; Third-Party Resources</h2>
      <p>The following third-party resources may set cookies or collect data to provide functionality on our website:</p>
      <table class="cookie-table">
        <thead><tr><th>Resource</th><th>Provider</th><th>Purpose</th></tr></thead>
        <tbody>
          <tr><td>Google Fonts (fonts.googleapis.com, fonts.gstatic.com)</td><td>Google LLC</td><td>Typography — loads web fonts for consistent display</td></tr>
          <tr><td>Google Maps (maps.googleapis.com)</td><td>Google LLC</td><td>Embedded map for location display</td></tr>
          <tr><td>Lucide Icons CDN (cdn.jsdelivr.net/npm/lucide)</td><td>jsDelivr / Lucide</td><td>Iconography — loads SVG icons</td></tr>
          <tr><td>Swiper CDN (cdn.jsdelivr.net/npm/swiper)</td><td>jsDelivr / Swiper</td><td>UI functionality — carousel/slider component</td></tr>
        </tbody>
      </table>

      <h2>How to Control Cookies</h2>
      <p>You can control and delete cookies through your browser settings. Most browsers allow you to:</p>
      <ul>
        <li>View what cookies are stored and delete them individually</li>
        <li>Block third-party cookies</li>
        <li>Block cookies from specific sites</li>
        <li>Block all cookies</li>
        <li>Delete all cookies when you close your browser</li>
      </ul>
      <p>Please note that blocking certain cookies may affect the functionality of our website.</p>

      <h2>Do Not Track / Global Privacy Control</h2>
      <p>We honor the Global Privacy Control (GPC) signal. When we detect a GPC signal from your browser, we treat it as a valid opt-out request for the sale or sharing of your personal information.</p>

      <h3 id="ccpa-cookie-rights">California Residents</h3>
      <p>For more information about your privacy rights under the CCPA/CPRA, including your right to opt out of the sale or sharing of personal information, please see our <a href="/privacy-policy/#ccpa-rights">Privacy Policy — California Residents section</a>.</p>

      <h2>Changes to This Cookie Policy</h2>
      <p>We may update this Cookie Policy from time to time. Changes will be posted on this page with an updated "Last Updated" date.</p>

      <h2>Contact Us</h2>
      <p>If you have questions about our use of cookies, contact us:</p>
      <ul>
        <li><strong><?php echo htmlspecialchars($companyName); ?></strong></li>
        <li>Email: <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a></li>
        <li>Phone: <a href="tel:<?php echo preg_replace('/\D/','',$companyPhone); ?>"><?php echo htmlspecialchars($companyPhone); ?></a></li>
        <li>Address: <?php echo htmlspecialchars($companyAddress); ?></li>
      </ul>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
