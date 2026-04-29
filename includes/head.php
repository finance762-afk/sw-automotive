<?php
/**
 * SW Automotive — Head Component
 *
 * Required page variables before including:
 *   $pageTitle       — full <title> string for this page
 *   $pageDescription — meta description (140–160 chars)
 *   $canonicalUrl    — absolute self-referencing canonical URL
 *   $currentPage     — slug string (e.g. 'home', 'about', 'auto-repair')
 *
 * Optional page variables:
 *   $ogImage          — absolute URL to OG share image
 *   $schemaMarkup     — array or JSON string for page-specific JSON-LD
 *   $useSwiper        — bool, loads Swiper CSS when true
 *   $heroPreloadImage — absolute URL to LCP hero image for <link rel="preload">
 *   $noindex          — bool, outputs noindex,nofollow when true
 */

if (!isset($siteName)) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/config.php';
}
if (!function_exists('isActivePage')) {
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/functions.php';
}

/* ---------------------------------------------------------------
   Title / meta defaults (dynamic — built from config vars)
   --------------------------------------------------------------- */
$_defaultTitle = $siteName
    . ' | ' . ucwords($primaryKeyword)
    . ' | ' . $address['city'] . ', ' . $address['state'];

$_title = (isset($pageTitle) && $pageTitle !== '')
    ? $pageTitle
    : $_defaultTitle;

$_defaultDesc = $siteName
    . ' provides honest, factory-level auto repair in '
    . $address['city'] . ', ' . $address['state']
    . '. ASE certified technicians, all makes & models, diesel, hybrid, and EV service.'
    . ' 27 years of dealership experience. Call for a free estimate.';

$_desc = (isset($pageDescription) && $pageDescription !== '')
    ? $pageDescription
    : $_defaultDesc;

$_canonical = (isset($canonicalUrl) && $canonicalUrl !== '')
    ? $canonicalUrl
    : $domain;

$_ogImage = (isset($ogImage) && $ogImage !== '')
    ? $ogImage
    : 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489125528-v0msw7-574610223_855128843758998_4100558135674674243_n.jpg';

$_robots = (isset($noindex) && $noindex) ? 'noindex, nofollow' : 'index, follow';

$_sameAs = array_values(array_filter(array_values($socialLinks), fn($v) => !empty(trim($v ?? ''))));

/* ---------------------------------------------------------------
   LocalBusiness (AutoRepair) Schema
   --------------------------------------------------------------- */
$_localBusinessSchema = [
    '@context'    => 'https://schema.org',
    '@type'       => 'AutoRepair',
    '@id'         => $domain . '/#business',
    'name'        => $siteName,
    'url'         => $domain,
    'telephone'   => $phone,
    'email'       => $email,
    'description' => $siteName
        . ' provides honest, factory-level auto repair in '
        . $address['city'] . ', ' . $address['state']
        . '. ASE certified technicians with 27 years of dealership experience'
        . ' servicing all makes and models — including diesel, hybrid, and EV vehicles.',
    'foundingYear' => (string) $yearEstablished,
    'image'        => $_ogImage,
    'logo'         => ['@type' => 'ImageObject', 'url' => $logoUrl],
    'address'      => [
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
    'openingHoursSpecification' => [[
        '@type'     => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        'opens'     => '08:00',
        'closes'    => '17:00',
    ]],
    'priceRange'  => '$$',
    'areaServed'  => array_map(fn($a) => [
        '@type' => 'City',
        'name'  => $a['city'] . ', ' . $a['state'],
    ], $serviceAreas),
    'hasOfferCatalog' => [
        '@type' => 'OfferCatalog',
        'name'  => 'Auto Repair Services',
        'itemListElement' => array_map(fn($s) => [
            '@type'       => 'Offer',
            'itemOffered' => [
                '@type' => 'Service',
                'name'  => $s['name'],
                'url'   => $domain . '/services/' . $s['slug'],
            ],
        ], $services),
    ],
];

// AggregateRating — only when review data exists
if (!empty($reviews)) {
    $totalRating = array_sum(array_column($reviews, 'rating'));
    $_localBusinessSchema['aggregateRating'] = [
        '@type'       => 'AggregateRating',
        'ratingValue' => round($totalRating / count($reviews), 1),
        'reviewCount' => count($reviews),
        'bestRating'  => '5',
        'worstRating' => '1',
    ];
}

if (!empty($_sameAs)) {
    $_localBusinessSchema['sameAs'] = $_sameAs;
}

/* ---------------------------------------------------------------
   WebSite Schema — homepage only
   --------------------------------------------------------------- */
$_websiteSchema = null;
if (isset($currentPage) && $currentPage === 'home') {
    $_websiteSchema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'WebSite',
        '@id'         => $domain . '/#website',
        'url'         => $domain,
        'name'        => $siteName,
        'description' => $tagline,
        'potentialAction' => [
            '@type'       => 'SearchAction',
            'target'      => $domain . '/?s={search_term_string}',
            'query-input' => 'required name=search_term_string',
        ],
    ];
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

  <!-- Open Graph -->
  <meta property="og:type"        content="website">
  <meta property="og:title"       content="<?php echo htmlspecialchars($_title); ?>">
  <meta property="og:description" content="<?php echo htmlspecialchars($_desc); ?>">
  <meta property="og:url"         content="<?php echo htmlspecialchars($_canonical); ?>">
  <meta property="og:image"       content="<?php echo htmlspecialchars($_ogImage); ?>">
  <meta property="og:site_name"   content="<?php echo htmlspecialchars($siteName); ?>">
  <meta property="og:locale"      content="en_US">

  <!-- Performance hints -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="dns-prefetch" href="https://fonts.googleapis.com">
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link rel="dns-prefetch" href="https://unpkg.com">
  <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
  <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
  <link rel="dns-prefetch" href="https://db.pageone.cloud">

  <!-- Preload: Bebas Neue heading font (Latin subset, woff2) -->
  <link rel="preload" as="font" type="font/woff2"
        href="https://fonts.gstatic.com/s/bebasneuet/v2/JTURjIg1_i6t8kCHKm45_dJE3g.woff2"
        crossorigin>

<?php if (!empty($heroPreloadImage)): ?>
  <!-- Preload: hero image (LCP) -->
  <link rel="preload" as="image" href="<?php echo htmlspecialchars($heroPreloadImage); ?>">
<?php endif; ?>

  <!-- Google Fonts — async to avoid render-blocking -->
  <link rel="preload" as="style"
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap"
        media="print" onload="this.media='all'">
  <noscript>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Roboto:wght@400;500;700&display=swap">
  </noscript>

<?php if (!empty($useSwiper)): ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<?php endif; ?>

  <link rel="stylesheet" href="/assets/css/framework.css">

  <meta name="theme-color" content="#1a2b3c">

  <!-- Favicons -->
  <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
  <link rel="icon" type="image/png"     href="/assets/images/favicon.png">
  <link rel="apple-touch-icon"          href="/assets/images/favicon.png">

<?php if (isset($currentPage) && $currentPage === 'home' && !empty($googleSearchConsoleId)): ?>
  <!-- Google Search Console verification -->
  <meta name="google-site-verification" content="<?php echo htmlspecialchars($googleSearchConsoleId); ?>">
<?php endif; ?>

<?php if (!empty($googleAnalyticsId) && $googleAnalyticsId !== 'G-XXXXXXXXXX'): ?>
  <!-- Google Analytics 4 -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo htmlspecialchars($googleAnalyticsId); ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){ dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', '<?php echo htmlspecialchars($googleAnalyticsId); ?>');
  </script>
<?php else: ?>
  <!-- GA4 placeholder — replace G-XXXXXXXXXX in includes/config.php to activate -->
  <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script> -->
<?php endif; ?>

  <!-- LocalBusiness (AutoRepair) Schema -->
  <script type="application/ld+json">
<?php echo json_encode($_localBusinessSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
  </script>

<?php if ($_websiteSchema): ?>
  <!-- WebSite Schema (homepage) -->
  <script type="application/ld+json">
<?php echo json_encode($_websiteSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>
  </script>
<?php endif; ?>

<?php if (!empty($schemaMarkup)): ?>
  <!-- Page-specific Schema -->
  <script type="application/ld+json">
<?php echo is_array($schemaMarkup)
    ? json_encode($schemaMarkup, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE)
    : $schemaMarkup; ?>
  </script>
<?php endif; ?>

</head>
<body>
