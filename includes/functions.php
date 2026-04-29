<?php
/**
 * SW Automotive — Helper Functions
 */

function isActivePage(string $page): bool {
    global $currentPage;
    return isset($currentPage) && $currentPage === $page;
}

function formatPhone(string $phone): string {
    $digits = preg_replace('/\D/', '', $phone);
    if (strlen($digits) === 10) {
        return '(' . substr($digits, 0, 3) . ') ' . substr($digits, 3, 3) . '-' . substr($digits, 6);
    }
    if (strlen($digits) === 11 && $digits[0] === '1') {
        return '(' . substr($digits, 1, 3) . ') ' . substr($digits, 4, 3) . '-' . substr($digits, 7);
    }
    return $phone;
}

function getServiceSlug(string $name): string {
    $slug = strtolower(trim($name));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s]+/', '-', $slug);
    return trim($slug, '-');
}

function getAreaSlug(string $city, string $state = 'va'): string {
    $slug = strtolower(trim($city));
    $slug = preg_replace('/[^a-z0-9\s-]/', '', $slug);
    $slug = preg_replace('/[\s]+/', '-', $slug);
    return trim($slug, '-') . '-' . strtolower($state);
}

function generateFAQSchema(array $faqs): array {
    return [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(fn($faq) => [
            '@type' => 'Question',
            'name'  => $faq['q'],
            'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
        ], $faqs),
    ];
}

function generateServiceSchema(array $service, array $faqs = []): array {
    global $siteName, $domain, $address, $phone, $logoUrl;

    $schema = [
        '@context' => 'https://schema.org',
        '@graph'   => [[
            '@type'       => 'Service',
            '@id'         => $domain . '/services/' . $service['slug'] . '/#service',
            'name'        => $service['name'],
            'description' => $service['description'],
            'url'         => $domain . '/services/' . $service['slug'],
            'provider'    => [
                '@type'   => 'LocalBusiness',
                '@id'     => $domain . '/#business',
                'name'    => $siteName,
                'telephone' => $phone,
                'address' => [
                    '@type'           => 'PostalAddress',
                    'addressLocality' => $address['city'],
                    'addressRegion'   => $address['state'],
                    'addressCountry'  => 'US',
                ],
            ],
            'areaServed'  => ['@type' => 'City', 'name' => $address['city'] . ', ' . $address['state']],
            'serviceType' => $service['name'],
        ]],
    ];

    if (!empty($faqs)) {
        $schema['@graph'][] = generateFAQSchema($faqs);
    }

    return $schema;
}

function generateMetaTags(string $title, string $description, string $canonical): array {
    return [
        'title'       => $title,
        'description' => $description,
        'canonical'   => $canonical,
        'og_title'    => $title,
        'og_desc'     => $description,
        'og_url'      => $canonical,
    ];
}

function renderStars(int $count = 5): string {
    return str_repeat('<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>', $count);
}
