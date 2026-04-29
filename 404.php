<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';

http_response_code(404);

$noindex      = true;
$pageTitle    = '404 — Page Not Found | SW Automotive';
$pageDescription = 'The page you were looking for doesn\'t exist. Find auto repair services, contact info, and more at SW Automotive in Manassas, VA.';
$canonicalUrl = $siteUrl . '/404';
$currentPage  = '';

include $_SERVER['DOCUMENT_ROOT'] . '/includes/head.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
?>

<style>
.notfound {
  padding: 120px 20px 80px;
  background: var(--color-bg);
  min-height: 60vh;
  display: flex;
  align-items: center;
}
.notfound__inner {
  text-align: center;
  max-width: 600px;
  margin-inline: auto;
}
.notfound__code {
  font-family: var(--font-heading);
  font-size: clamp(5rem, 18vw, 10rem);
  font-weight: 800;
  line-height: 1;
  background: linear-gradient(135deg, var(--color-primary) 40%, var(--color-accent));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  display: block;
  margin-bottom: var(--space-sm);
}
.notfound__icon {
  color: var(--color-accent);
  margin-bottom: var(--space-lg);
  opacity: 0.7;
}
.notfound h1 {
  font-family: var(--font-heading);
  font-size: clamp(1.5rem, 3.5vw, 2.2rem);
  font-weight: 800;
  color: var(--color-primary);
  margin-bottom: var(--space-md);
  text-wrap: balance;
}
.notfound p {
  color: var(--color-text-light);
  line-height: 1.7;
  margin-bottom: var(--space-xl);
  max-width: 50ch;
  margin-inline: auto;
}
.notfound__actions {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-md);
  justify-content: center;
  margin-bottom: var(--space-3xl);
}
.notfound__links h2 {
  font-family: var(--font-heading);
  font-size: 1rem;
  font-weight: 700;
  color: var(--color-primary);
  letter-spacing: 0.08em;
  text-transform: uppercase;
  margin-bottom: var(--space-md);
}
.notfound__link-grid {
  display: flex;
  flex-wrap: wrap;
  gap: var(--space-sm);
  justify-content: center;
}
.notfound__link {
  display: inline-flex;
  align-items: center;
  gap: var(--space-xs);
  padding: 8px 16px;
  border: 1px solid rgba(26,43,60,0.14);
  border-radius: var(--radius-md);
  font-size: 0.88rem;
  color: var(--color-text);
  font-weight: 500;
  transition: border-color var(--transition-base), color var(--transition-base), background var(--transition-base);
}
.notfound__link:hover {
  border-color: var(--color-accent);
  color: var(--color-accent);
  background: rgba(6,182,212,0.05);
}
.notfound__link svg { color: var(--color-accent); }

@media (max-width: 767px) {
  .notfound { padding-top: 100px; }
  .notfound__actions { flex-direction: column; align-items: center; }
}
</style>

<section class="notfound" aria-labelledby="notfound-heading">
  <div class="notfound__inner">
    <span class="notfound__code" aria-hidden="true">404</span>
    <div class="notfound__icon" aria-hidden="true">
      <i data-lucide="car" style="width:48px;height:48px;"></i>
    </div>
    <h1 id="notfound-heading">Looks Like This Page Took a Wrong Turn</h1>
    <p>The page you're looking for doesn't exist or may have been moved. Let's get you back on the road.</p>
    <div class="notfound__actions">
      <a href="/" class="btn-primary">Back to Home</a>
      <a href="/contact" class="btn-secondary">Contact Us</a>
    </div>
    <div class="notfound__links">
      <h2>Popular Pages</h2>
      <div class="notfound__link-grid">
        <a href="/services/" class="notfound__link">
          <i data-lucide="wrench" style="width:14px;height:14px;" aria-hidden="true"></i>
          All Services
        </a>
        <a href="/services/auto-repair/" class="notfound__link">
          <i data-lucide="car" style="width:14px;height:14px;" aria-hidden="true"></i>
          Auto Repair
        </a>
        <a href="/services/diesel-repair/" class="notfound__link">
          <i data-lucide="fuel" style="width:14px;height:14px;" aria-hidden="true"></i>
          Diesel Repair
        </a>
        <a href="/services/brake-replacement/" class="notfound__link">
          <i data-lucide="disc" style="width:14px;height:14px;" aria-hidden="true"></i>
          Brake Service
        </a>
        <a href="/services/oil-changes/" class="notfound__link">
          <i data-lucide="droplets" style="width:14px;height:14px;" aria-hidden="true"></i>
          Oil Changes
        </a>
        <a href="/about" class="notfound__link">
          <i data-lucide="users" style="width:14px;height:14px;" aria-hidden="true"></i>
          About Us
        </a>
        <a href="/service-area" class="notfound__link">
          <i data-lucide="map-pin" style="width:14px;height:14px;" aria-hidden="true"></i>
          Service Area
        </a>
      </div>
    </div>
  </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/includes/footer.php'; ?>
