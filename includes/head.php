<?php
/**
 * SW Automotive — Head Component
 *
 * Required page variables before including:
 *   $pageTitle, $pageDescription, $canonicalUrl, $currentPage
 * Optional:
 *   $ogImage, $schemaMarkup, $useSwiper, $heroPreloadImage, $noindex
 */

if (!isset($siteName)) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
if (!function_exists('isActivePage')) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
}

$_title = isset($pageTitle) && $pageTitle !== ''
    ? $pageTitle
    : 'Auto Repair Manassas VA | SW Automotive | ASE Certified';

$_desc = isset($pageDescription) && $pageDescription !== ''
    ? $pageDescription
    : 'SW Automotive provides honest, factory-level auto repair in Manassas, VA. ASE certified technicians, all makes & models, diesel, hybrid, and EV service. Call for a free estimate.';

$_canonical = isset($canonicalUrl) && $canonicalUrl !== ''
    ? $canonicalUrl
    : $domain;

$_ogImage = isset($ogImage) && $ogImage !== ''
    ? $ogImage
    : 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489125528-v0msw7-574610223_855128843758998_4100558135674674243_n.jpg';

$_robots = isset($noindex) && $noindex ? 'noindex, nofollow' : 'index, follow';

$_sameAs = array_values(array_filter($socialLinks, fn($v) => !empty(trim($v ?? ''))));

$_localBusinessSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'AutoRepair',
    '@id'         => $domain . '/#business',
    'name'        => $siteName,
    'url'         => $domain,
    'telephone'   => $phone,
    'email'       => $email,
    'description' => 'SW Automotive provides honest, factory-level auto repair in Manassas, VA. ASE certified technicians with 27 years of experience servicing all makes and models, including diesel, hybrid, and EV vehicles.',
    'foundingYear' => (string)$yearEstablished,
    'image'       => $logoUrl,
    'logo'        => ['@type' => 'ImageObject', 'url' => $logoUrl],
    'address'     => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => $address['street'],
        'addressLocality' => $address['city'],
        'addressRegion'   => $address['state'],
        'postalCode'      => $address['zip'],
        'addressCountry'  => 'US',
    ],
    'geo' => [
        '@type'     => 'GeoCoordinates',
        'latitude'  => '38.7534',
        'longitude' => '-77.4758',
    ],
    'openingHours' => 'Mo,Tu,We,Th,Fr 08:00-17:00',
    'openingHoursSpecification' => [[
        '@type'     => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday','Tuesday','Wednesday','Thursday','Friday'],
        'opens'     => '08:00',
        'closes'    => '17:00',
    ]],
    'priceRange' => '$$',
    'areaServed' => array_map(fn($a) => ['@type' => 'City', 'name' => $a['city'] . ', ' . $a['state']], $serviceAreas),
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name'  => 'Auto Repair Services',
        'itemListElement' => array_map(fn($s) => [
            '@type'       => 'Offer',
            'itemOffered' => ['@type' => 'Service', 'name' => $s['name'], 'url' => $domain . '/services/' . $s['slug']],
        ], $services),
    ],
];

if (!empty($_sameAs)) {
    $_localBusinessSchema['sameAs'] = $_sameAs;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title><?php echo htmlspecialchars($_title); ?></title>
  <meta name="description" content="<?php echo htmlspecialchars($_desc); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($_canonical); ?>">
  <meta name="robots" content="<?php echo $_robots; ?>">

  <meta property="og:type"        content="website">
  <meta property="og:title"       content="<?php echo htmlspecialchars($_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($_desc); ?>">
  <meta property="og:url"         content="<?php echo htmlspecialchars($_canonical); ?>">
  <meta property="og:image"       content="<?php echo htmlspecialchars($_ogImage); ?>">
  <meta property="og:site_name"   content="<?php echo htmlspecialchars($siteName); ?>">
  <meta property="og:locale"      content="en_US">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link rel="dns-prefetch" href="https://unpkg.com">
  <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
  <link rel="dns-prefetch" href="https://db.pageone.cloud">

  <?php if (!empty($heroPreloadImage)): ?>
  <link rel="preload" as="image" href="<?php echo htmlspecialchars($heroPreloadImage); ?>">
  <?php endif; ?>

  <!-- Preload Google Fonts stylesheet (async load below) -->
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap" media="print" onload="this.media='all'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap"></noscript>

  <?php if (!empty($useSwiper)): ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <?php endif; ?>

  <link rel="stylesheet" href="/assets/css/framework.css">

  <meta name="theme-color" content="#1a2b3c">

  <!-- Favicons -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon" type="image/png" href="/assets/images/favicon.png">
  <link rel="apple-touch-icon" href="/assets/images/favicon.png">

  <?php if (isset($currentPage) && $currentPage === 'home' && !empty($googleSearchConsoleId)): ?>
  <meta name="google-site-verification" content="<?php echo htmlspecialchars($googleSearchConsoleId); ?>">
  <?php endif; ?>

  <?php if (!empty($googleAnalyticsId) && $googleAnalyticsId !== 'G-XXXXXXXXXX'): ?>
  <!-- Google Analytics 4 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($googleAnalyticsId); ?>"></script>
  <script>window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}gtag('js',new Date());gtag('config','<?php echo htmlspecialchars($googleAnalyticsId); ?>');</script>
  <?php else: ?>
  <!-- GA4 placeholder — replace G-XXXXXXXXXX in includes/config.php to activate -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script> -->
  <?php endif; ?>

  <script type="application/ld+json">
<?php echo json_encode($_localBusinessSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
  </script>

  <?php if (!empty($schemaMarkup)): ?>
  <script type="application/ld+json">
<?php echo is_array($schemaMarkup) ? json_encode($schemaMarkup, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) : $schemaMarkup; ?>
  </script>
  <?php endif; ?>

</head>
<body>
