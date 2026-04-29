<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

$noindex      = true;
$pageTitle    = 'Thank You — SW Automotive';
$pageDescription = 'Your message has been received. SW Automotive will be in touch within 1 business hour.';
$canonicalUrl = $siteUrl . '/thank-you';
$currentPage  = '';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
.thankyou {
  padding: 120px 20px 100px;
  background: var(--color-bg);
  min-height: 65vh;
  display: flex;
  align-items: center;
}
.thankyou__inner {
  text-align: center;
  max-width: 580px;
  margin-inline: auto;
}
.thankyou__icon {
  width: 80px;
  height: 80px;
  background: rgba(6,182,212,0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: var(--color-accent);
  margin: 0 auto var(--space-xl);
  border: 2px solid rgba(6,182,212,0.25);
}
.thankyou h1 {
  font-family: var(--font-heading);
  font-size: clamp(1.8rem, 4vw, 2.8rem);
  font-weight: 800;
  color: var(--color-primary);
  line-height: 1.15;
  text-wrap: balance;
  margin-bottom: var(--space-md);
}
.thankyou p {
  color: var(--color-text-light);
  line-height: 1.7;
  margin-bottom: var(--space-md);
  max-width: 52ch;
  margin-inline: auto;
}
.thankyou__steps {
  display: flex;
  flex-direction: column;
  gap: var(--space-sm);
  margin: var(--space-xl) 0;
  text-align: left;
}
.thankyou__step {
  display: flex;
  gap: var(--space-md);
  align-items: flex-start;
  padding: var(--space-md) var(--space-lg);
  background: var(--color-bg-alt);
  border-radius: var(--radius-md);
  border-left: 3px solid var(--color-accent);
}
.thankyou__step-num {
  font-family: var(--font-heading);
  font-size: 1.3rem;
  font-weight: 800;
  color: var(--color-accent);
  line-height: 1;
  flex-shrink: 0;
  min-width: 28px;
}
.thankyou__step-text {
  font-size: 0.92rem;
  color: var(--color-text);
  line-height: 1.55;
}
.thankyou__step-text strong { color: var(--color-primary); }
.thankyou__actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  justify-content: center;
  margin-top: var(--space-xl);
}
.thankyou__phone {
  display: block;
  font-family: var(--font-heading);
  font-size: 1.4rem;
  font-weight: 800;
  color: var(--color-accent);
  margin-bottom: var(--space-xl);
}
.thankyou__phone a { color: inherit; }

@media (max-width: 767px) {
  .thankyou { padding-top: 100px; }
  .thankyou__actions { flex-direction: column; align-items: center; }
}
</style>

<section class="thankyou" aria-labelledby="thankyou-heading">
  <div class="thankyou__inner">
    <div class="thankyou__icon" aria-hidden="true">
      <i data-lucide="check-circle" style="width:40px;height:40px;"></i>
    </div>
    <h1 id="thankyou-heading">Message Received — We'll Be in Touch Shortly</h1>
    <p>Thanks for reaching out to SW Automotive. We typically respond within 1 business hour during shop hours (Mon–Fri, 8 AM – 5 PM).</p>

    <?php if ($phone): ?>
    <p style="font-weight:600;color:var(--color-primary);margin-bottom:var(--space-sm);">Need a faster response? Call us directly:</p>
    <span class="thankyou__phone"><a href="tel:<?php echo preg_replace('/\D/','',$phone); ?>"><?php echo htmlspecialchars($phone); ?></a></span>
    <?php endif; ?>

    <div class="thankyou__steps">
      <div class="thankyou__step">
        <span class="thankyou__step-num">1</span>
        <span class="thankyou__step-text"><strong>We review your request</strong> — usually within 1 business hour during shop hours.</span>
      </div>
      <div class="thankyou__step">
        <span class="thankyou__step-num">2</span>
        <span class="thankyou__step-text"><strong>We'll confirm your drop-off window</strong> — typically same-day or next morning for most services.</span>
      </div>
      <div class="thankyou__step">
        <span class="thankyou__step-num">3</span>
        <span class="thankyou__step-text"><strong>Written estimate before we start</strong> — you'll know the cost before any work begins, no exceptions.</span>
      </div>
    </div>

    <div class="thankyou__actions">
      <a href="/" class="btn-primary">Back to Home</a>
      <a href="/services/" class="btn-secondary">Browse Services</a>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
