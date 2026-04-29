<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

// Legal page variable mapping (config.php uses $email/$phone/$addressFull)
$companyName       = $siteName;
$companyEntityType = 'Limited Liability Company';
$companyState      = 'Virginia';
$companyEmail      = $email ?: 'info@sw-automotive.com';
$companyPhone      = $phone;
$companyAddress    = $addressFull;
$lastUpdated       = 'April 29, 2026';

$pageTitle       = 'Privacy Policy | ' . $siteName;
$pageDescription = 'Privacy Policy for ' . $siteName . ' — how we collect, use, and protect your personal information.';
$canonicalUrl    = $siteUrl . '/privacy-policy/';
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
  "name": "Privacy Policy",
  "url": "<?php echo $siteUrl; ?>/privacy-policy/",
  "description": "<?php echo htmlspecialchars($pageDescription); ?>",
  "publisher": { "@type": "Organization", "name": "<?php echo htmlspecialchars($companyName); ?>" },
  "breadcrumb": {
    "@type": "BreadcrumbList",
    "itemListElement": [
      { "@type": "ListItem", "position": 1, "name": "Home", "item": "<?php echo $siteUrl; ?>/" },
      { "@type": "ListItem", "position": 2, "name": "Privacy Policy", "item": "<?php echo $siteUrl; ?>/privacy-policy/" }
    ]
  }
}
</script>

<section class="legal-hero">
  <div class="container">
    <nav aria-label="Breadcrumb" style="font-size:0.8rem;color:rgba(255,255,255,0.6);margin-bottom:var(--space-md);">
      <a href="/" style="color:rgba(255,255,255,0.6);">Home</a>
      <span aria-hidden="true" style="margin:0 6px;">›</span>
      <span aria-current="page">Privacy Policy</span>
    </nav>
    <h1>Privacy Policy</h1>
  </div>
</section>

<section class="legal-content">
  <div class="container">
    <div class="legal-section">
      <p class="legal-updated"><strong>Last Updated:</strong> <?php echo $lastUpdated; ?></p>

      <h2>Introduction</h2>
      <p><?php echo htmlspecialchars($companyName); ?> ("Company," "we," "us," or "our"), a <?php echo htmlspecialchars($companyEntityType); ?> formed in the State of <?php echo htmlspecialchars($companyState); ?>, operates this website. This Privacy Policy describes how we collect, use, disclose, and protect your personal information when you visit our website or submit information through our contact forms.</p>
      <p>By using our website, you agree to the collection and use of information in accordance with this policy. If you do not agree, please do not use our website.</p>

      <h2>Information We Collect</h2>
      <h3>Information You Provide</h3>
      <p>When you submit a contact form or request a quote, we collect:</p>
      <ul>
        <li>Full name</li>
        <li>Email address</li>
        <li>Phone number</li>
        <li>Service requested</li>
        <li>Message or service details</li>
      </ul>
      <p>We also automatically capture the following when you submit a form:</p>
      <ul>
        <li>IP address</li>
        <li>Browser user agent</li>
        <li>Consent timestamp</li>
        <li>Page URL where the form was submitted</li>
        <li>Consent version identifier</li>
      </ul>

      <h3>Information Collected Automatically</h3>
      <p>We use Google Analytics 4 to collect anonymized usage data, including:</p>
      <ul>
        <li>Pages visited and time on site</li>
        <li>Device type, browser, and operating system</li>
        <li>Referring website</li>
        <li>General geographic location (city/region level)</li>
      </ul>

      <h2>How We Use Your Information</h2>
      <ul>
        <li>Respond to your inquiries and requests for service</li>
        <li>Schedule appointments and provide estimates</li>
        <li>Send transactional communications related to your inquiry</li>
        <li>With your explicit consent, send marketing communications via email</li>
        <li>With your explicit consent, send SMS/text messages about services, appointments, and promotions</li>
        <li>Improve our website and services</li>
        <li>Comply with legal obligations</li>
      </ul>

      <h2>How We Share Your Information</h2>
      <p>We do not sell your personal information. We may share your information with the following categories of service providers who assist in operating our business:</p>

      <h3>Google LLC</h3>
      <p>We use Google Analytics (website analytics), Google Fonts (typography), and Google Maps (embedded maps) on this website. Google may collect cookies and usage data as described in their <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Privacy Policy</a>.</p>

      <h3>Page One Insights LLC</h3>
      <p>Our website and lead management services are provided by Page One Insights LLC, a web design and digital marketing company. Page One Insights handles form submissions, CRM (customer relationship management), and communications infrastructure on our behalf. Their sub-processors include:</p>
      <ul>
        <li><strong>Supabase Inc.</strong> — data hosting and database services</li>
        <li><strong>Twilio SendGrid</strong> — email delivery for lead notifications</li>
        <li><strong>Twilio Inc.</strong> — SMS/text message delivery (only if you opt in to SMS communications)</li>
      </ul>

      <h3>Hosting Provider</h3>
      <p>Our website is hosted by Hostinger International Ltd., which provides web hosting infrastructure.</p>

      <h3>Legal Requirements</h3>
      <p>We may disclose your information if required by law, court order, or governmental regulation, or if disclosure is necessary to protect our rights, property, or safety.</p>

      <h2>Your Privacy Rights</h2>

      <h3 id="ccpa-rights">California Residents (CCPA/CPRA)</h3>
      <p>If you are a California resident, you have the following rights under the California Consumer Privacy Act (CCPA) as amended by the California Privacy Rights Act (CPRA):</p>
      <ul>
        <li><strong>Right to Know:</strong> You may request that we disclose the categories and specific pieces of personal information we have collected about you.</li>
        <li><strong>Right to Delete:</strong> You may request that we delete personal information we have collected from you, subject to certain exceptions.</li>
        <li><strong>Right to Correct:</strong> You may request that we correct inaccurate personal information we maintain about you.</li>
        <li><strong>Right to Limit Use of Sensitive Personal Information:</strong> You may limit the use and disclosure of your sensitive personal information.</li>
        <li><strong>Right to Opt-Out of Sale/Sharing:</strong> We do not sell or share your personal information for cross-context behavioral advertising. However, you may still exercise this right by contacting us.</li>
        <li><strong>Right to Non-Discrimination:</strong> We will not discriminate against you for exercising your privacy rights.</li>
        <li><strong>Authorized Agent:</strong> You may designate an authorized agent to make a request on your behalf.</li>
      </ul>
      <p>We honor Global Privacy Control (GPC) signals as a valid opt-out request.</p>
      <p>To exercise these rights, contact us at <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a> or call <a href="tel:<?php echo preg_replace('/\D/','',$companyPhone); ?>"><?php echo htmlspecialchars($companyPhone); ?></a>. We will respond within 45 days.</p>

      <h3>Virginia Residents (VCDPA)</h3>
      <p>Virginia residents have rights under the Virginia Consumer Data Protection Act (VCDPA), including the right to access, correct, delete, obtain a copy of, and opt out of certain processing of personal data. To exercise your rights, contact us using the information in the Contact section below.</p>

      <h3>Other State Privacy Rights</h3>
      <p>Residents of the following states have similar privacy rights under their respective state laws. While specific rights vary by state, they generally include the right to access, correct, delete, and opt out of certain data processing activities:</p>
      <ul>
        <li><strong>Colorado</strong> — Colorado Privacy Act (CPA)</li>
        <li><strong>Connecticut</strong> — Connecticut Data Privacy Act (CTDPA)</li>
        <li><strong>Utah</strong> — Utah Consumer Privacy Act (UCPA)</li>
        <li><strong>Texas</strong> — Texas Data Privacy and Security Act (TDPSA)</li>
        <li><strong>Florida</strong> — Florida Digital Bill of Rights (FDBR)</li>
        <li><strong>Oregon</strong> — Oregon Consumer Privacy Act (OCPA)</li>
        <li><strong>Montana</strong> — Montana Consumer Data Privacy Act (MCDPA)</li>
        <li><strong>Delaware</strong> — Delaware Personal Data Privacy Act (DPDPA)</li>
        <li><strong>Iowa</strong> — Iowa Consumer Data Protection Act (ICDPA)</li>
        <li><strong>Tennessee</strong> — Tennessee Information Protection Act (TIPA)</li>
        <li><strong>Indiana</strong> — Indiana Consumer Data Protection Act (ICDPA)</li>
        <li><strong>New Jersey</strong> — New Jersey Data Privacy Act (NJDPA)</li>
        <li><strong>Maryland</strong> — Maryland Online Data Privacy Act (MODPA)</li>
        <li><strong>Minnesota</strong> — Minnesota Consumer Data Privacy Act (MCDPA)</li>
        <li><strong>Nevada</strong> — Nevada Privacy of Information Collected on the Internet from Consumers Act (NPICICA)</li>
        <li><strong>Nebraska</strong> — Nebraska Data Privacy Act (NDPA)</li>
        <li><strong>New Hampshire</strong> — New Hampshire Privacy Act (NHPA)</li>
        <li><strong>Rhode Island</strong> — Rhode Island Data Transparency and Privacy Protection Act (RIDTPPA)</li>
        <li><strong>Kentucky</strong> — Kentucky Consumer Data Protection Act (KCDPA)</li>
      </ul>
      <p>To exercise your rights under any state privacy law, contact us using the information in the "Contact Us" section below. We will respond within the timeframe required by your state's law.</p>

      <h2>Data Retention</h2>
      <p>We retain lead data and consent records for four (4) years from the date of collection, consistent with the statute of limitations for TCPA claims. After this period, data is purged unless an active client relationship exists. Active client data is retained for the duration of the relationship plus four years.</p>

      <h2>Security</h2>
      <p>We implement reasonable technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. These include encrypted data transmission (SSL/TLS), secure database hosting, and access controls. However, no method of electronic transmission or storage is 100% secure, and we cannot guarantee absolute security.</p>

      <h2>Children's Privacy</h2>
      <p>Our website and services are not directed to children under the age of 13. We do not knowingly collect personal information from children under 13. If you believe we have inadvertently collected such information, please contact us immediately and we will take steps to delete it.</p>

      <h2>Third-Party Links</h2>
      <p>Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of those sites. We encourage you to review the privacy policies of any third-party sites you visit.</p>

      <h2>SMS Program Terms</h2>
      <p>If you opt in to receive SMS/text messages from <?php echo htmlspecialchars($companyName); ?>:</p>
      <ul>
        <li><strong>Message frequency:</strong> Varies. You may receive appointment reminders, service updates, and promotional offers.</li>
        <li><strong>Message and data rates may apply.</strong> Check with your carrier for details.</li>
        <li><strong>Opt-out:</strong> Text <strong>STOP</strong> to cancel at any time. You may also opt out by emailing <a href="mailto:<?php echo htmlspecialchars($companyEmail); ?>"><?php echo htmlspecialchars($companyEmail); ?></a>, calling <a href="tel:<?php echo preg_replace('/\D/','',$companyPhone); ?>"><?php echo htmlspecialchars($companyPhone); ?></a>, or any other reasonable method. We will honor all reasonable opt-out requests.</li>
        <li><strong>Help:</strong> Text <strong>HELP</strong> for help, or contact us at the email or phone number above.</li>
        <li><strong>Carriers:</strong> Carriers are not liable for delayed or undelivered messages.</li>
        <li><strong>Consent is not a condition of purchase.</strong> You are not required to opt in to SMS to use our services or receive a quote.</li>
      </ul>

      <h2>Changes to This Privacy Policy</h2>
      <p>We may update this Privacy Policy from time to time. Changes will be posted on this page with an updated "Last Updated" date. Your continued use of our website after changes constitutes acceptance of the revised policy.</p>

      <h2>Contact Us</h2>
      <p>If you have questions about this Privacy Policy or wish to exercise your privacy rights, contact us:</p>
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
