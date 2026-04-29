<?php
/**
 * SW Automotive — Header / Navbar Component
 */

$_inServices = isActivePage('services') || (isset($currentPage) && in_array($currentPage, array_column($services, 'slug')));
$_inAreas    = isActivePage('service-area') || (isset($currentPage) && in_array($currentPage, array_column($serviceAreas, 'slug')));

$_phoneHref    = !empty($phone) ? 'tel:' . preg_replace('/\D/', '', $phone) : '/contact';
$_phoneDisplay = !empty($phoneDisplay) ? $phoneDisplay : (!empty($phone) ? formatPhone($phone) : 'Free Estimate');
?>

<a href="#main-content" class="skip-link">Skip to main content</a>

<header class="site-header" data-header>
  <nav class="navbar" aria-label="Main navigation">
    <div class="navbar-inner container">

      <a href="/" class="site-logo" aria-label="SW Automotive — Home">
        <img src="<?php echo htmlspecialchars($logoUrl); ?>" alt="SW Automotive" class="logo-img" width="160" height="52" loading="eager">
      </a>

      <ul class="nav-links" id="nav-links" role="list" aria-label="Site navigation">

        <li>
          <a href="/" <?php if (isActivePage('home')) echo 'aria-current="page"'; ?>>Home</a>
        </li>

        <li class="nav-dropdown<?php echo $_inServices ? ' open' : ''; ?>">
          <a href="/services" <?php if ($_inServices) echo 'aria-current="page"'; ?> aria-haspopup="true">
            Services <span class="nav-chevron" aria-hidden="true">&#9660;</span>
          </a>
          <ul class="nav-dropdown-menu" role="list">
            <?php foreach ($services as $s): ?>
            <li>
              <a href="/services/<?php echo htmlspecialchars($s['slug']); ?>/"
                 <?php if (isActivePage($s['slug'])) echo 'aria-current="page"'; ?>>
                <?php echo htmlspecialchars($s['name']); ?>
              </a>
            </li>
            <?php endforeach; ?>
            <li style="border-top:1px solid rgba(255,255,255,0.12); margin-top:var(--space-xs); padding-top:var(--space-xs);">
              <a href="/services"><strong>View All Services</strong></a>
            </li>
          </ul>
        </li>

        <li class="nav-dropdown<?php echo $_inAreas ? ' open' : ''; ?>">
          <a href="/service-area" <?php if ($_inAreas) echo 'aria-current="page"'; ?> aria-haspopup="true">
            Service Areas <span class="nav-chevron" aria-hidden="true">&#9660;</span>
          </a>
          <ul class="nav-dropdown-menu" role="list">
            <?php foreach ($serviceAreas as $area): ?>
            <li>
              <a href="/service-area#<?php echo htmlspecialchars($area['slug']); ?>">
                <?php echo htmlspecialchars($area['city']); ?>, <?php echo htmlspecialchars($area['state']); ?>
              </a>
            </li>
            <?php endforeach; ?>
          </ul>
        </li>

        <li>
          <a href="/about" <?php if (isActivePage('about')) echo 'aria-current="page"'; ?>>About</a>
        </li>

        <li>
          <a href="/contact" <?php if (isActivePage('contact')) echo 'aria-current="page"'; ?>>Contact</a>
        </li>

        <li class="mobile-nav-cta" aria-hidden="true">
          <?php if (!empty($phone)): ?>
          <a href="<?php echo $_phoneHref; ?>" class="btn btn-accent">Call <?php echo htmlspecialchars($_phoneDisplay); ?></a>
          <?php endif; ?>
          <a href="/contact" class="btn btn-outline-white">Free Estimate</a>
        </li>

      </ul>

      <div class="header-cta">
        <?php if (!empty($phone)): ?>
        <a href="<?php echo $_phoneHref; ?>" class="btn btn-accent btn-sm"><?php echo htmlspecialchars($_phoneDisplay); ?></a>
        <?php else: ?>
        <a href="/contact" class="btn btn-accent btn-sm">Free Estimate</a>
        <?php endif; ?>
      </div>

      <button class="hamburger" aria-label="Open navigation menu" aria-expanded="false" aria-controls="nav-links">
        <span></span><span></span><span></span>
      </button>

    </div>
  </nav>
</header>

<main id="main-content">
