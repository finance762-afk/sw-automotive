<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$companyName       = $siteName;
$companyEntityType = 'Limited Liability Company';
$companyState      = 'Virginia';
$companyEmail      = $email ?: 'info@sw-automotive.com';
$companyPhone      = $phone;
$companyAddress    = $addressFull;
$lastUpdated       = 'April 29, 2026';

$pageTitle       = 'Accessibility | ' . $siteName;
$pageDescription = 'Accessibility statement for ' . $siteName . ' — our commitment to WCAG 2.1 AA compliance and digital accessibility.';
$canonicalUrl    = $siteUrl . '/accessibility/';
$currentPage     = 'legal';
$canonicalTag    = '<link rel="canonical" href="' . $canonicalUrl . '">';

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
</style>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
  "name": "Accessibility Statement",
  "url": "<?php echo $siteUrl; ?>/accessibility/",
  "description": "<?php echo htmlspecialchars($pageDescription); ?>",
  "publisher": { "@type": "Organization", "name": "<?php echo htmlspecialchars($companyName); ?>" },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
      { "@type": "ListItem", "position": 2, "name": "Accessibility", "item": "<?php echo $siteUrl; ?>/accessibility/" }
    ]
  }
}
</script>

<section class="legal-hero">
  <div class="container">
    <nav aria-label="Breadcrumb" style="font-size:0.8rem;color:rgba(255,255,255,0.6);margin-bottom:var(--space-md);">
      <a href="/" style="color:rgba(255,255,255,0.6);">Home</a>
      <span aria-hidden="true" style="margin:0 6px;">›</span>
      <span aria-current="page">Accessibility</span>
    </nav>
    <h1>Accessibility Statement</h1>
  </div>
</section>

<section class="legal-content">
  <div class="container">
    <div class="legal-section">
      <p class="legal-updated"><strong>Last Updated:</strong> <?php echo $lastUpdated; ?></p>

      <h2>Our Commitment</h2>
      <p><?php echo htmlspecialchars($companyName); ?> is committed to ensuring digital accessibility for people with disabilities. We continually work to improve the user experience of our website and aim to conform to the Web Content Accessibility Guidelines (WCAG) 2.1 Level AA standards.</p>

      <h2>Accessibility Features</h2>
      <p>We have implemented the following accessibility features on our website:</p>
      <ul>
        <li><strong>Semantic HTML5 structure</strong> — proper use of headings, landmarks, lists, and structural elements for screen reader compatibility</li>
        <li><strong>Skip-to-content link</strong> — allows keyboard users to bypass navigation and jump directly to main content</li>
        <li><strong>ARIA labels and landmarks</strong> — descriptive labels on interactive elements and ARIA landmarks for navigation regions (<code>nav</code>, <code>main</code>, <code>footer</code>)</li>
        <li><strong>Full keyboard navigation</strong> — all interactive elements are operable via keyboard</li>
        <li><strong>Visible focus indicators</strong> — clear visual focus outlines on all interactive elements when navigating with a keyboard</li>
        <li><strong>WCAG AA color contrast</strong> — minimum 4.5:1 contrast ratio for body text and 3:1 for large text</li>
        <li><strong>Descriptive alt text</strong> — all informational images include descriptive alternative text</li>
        <li><strong>Responsive zoom up to 200%</strong> — content remains usable and readable when zoomed to 200%</li>
        <li><strong><code>prefers-reduced-motion</code> media query</strong> — animations are disabled or reduced for users who prefer reduced motion</li>
        <li><strong>Form labels associated with inputs</strong> — all form fields have programmatically associated labels</li>
        <li><strong>aria-expanded on toggle controls</strong> — mobile navigation and FAQ accordions announce state to assistive technology</li>
        <li><strong>aria-current="page"</strong> — active navigation links are identified for screen readers</li>
      </ul>

      <h2>Conformance Status</h2>
      <p>We aim to achieve WCAG 2.1 Level AA conformance. We test our website using automated tools and manual keyboard and screen reader testing.</p>

      <h2>Known Limitations</h2>
      <p>Despite our best efforts, some areas of the website may not be fully accessible:</p>
      <ul>
        <li><strong>Third-party content:</strong> Embedded content such as Google Maps may not fully conform to WCAG 2.1 AA standards. We are working with third-party providers to address these limitations.</li>
        <li><strong>Legacy content:</strong> Some older photos may have limited alt text descriptions. We are reviewing and updating these on an ongoing basis.</li>
      </ul>

      <h2>Feedback</h2>
      <p>We welcome your feedback on the accessibility of our website. If you encounter accessibility barriers or have suggestions for improvement, please contact us:</p>
      <ul>
        <li>Email: <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a></li>
        <li>Phone: <a href="tel:<?php echo preg_replace('/\D/','',$companyPhone); ?>"><?php echo htmlspecialchars($companyPhone); ?></a></li>
      </ul>
      <p>We aim to respond to accessibility feedback within 5 business days.</p>

      <h2>Enforcement</h2>
      <p>We recognize your rights under the Americans with Disabilities Act (ADA), Section 508 of the Rehabilitation Act, and applicable state accessibility laws. If you believe that your rights have been violated, you may file a complaint with the appropriate enforcement agency or contact us directly so we can address your concerns.</p>

      <h2>Technical Specifications</h2>
      <p>This website relies on the following technologies for conformance:</p>
      <ul>
        <li>HTML5</li>
        <li>CSS3</li>
        <li>JavaScript (ES6+)</li>
        <li>WAI-ARIA 1.2</li>
      </ul>

      <h2>Assessment Approach</h2>
      <p><?php echo htmlspecialchars($companyName); ?> assessed the accessibility of this website using the following approaches:</p>
      <ul>
        <li>Self-evaluation</li>
        <li>Automated accessibility testing tools</li>
        <li>Manual keyboard navigation testing</li>
        <li>Screen reader testing (NVDA + Chrome, VoiceOver + Safari)</li>
      </ul>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
