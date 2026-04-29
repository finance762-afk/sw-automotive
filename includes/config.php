<?php
/**
 * SW Automotive — Site Configuration
 */

$slug            = 'sw-automotive';
$siteName        = 'SW Automotive';
$tagline         = "Your Car's Best Friend in Manassas";
$phone           = '';
$phoneSecondary  = '';
$phoneDisplay    = '';
$email           = '';
$ownerName       = '';

$address = [
    'street' => '10404 Morias Ct',
    'city'   => 'Manassas',
    'state'  => 'VA',
    'zip'    => '20110',
];
$addressFull = $address['street'] . ', ' . $address['city'] . ', ' . $address['state'] . ' ' . $address['zip'];

$siteUrl   = 'https://sw-automotive.com';
$domain    = 'https://sw-automotive.com';
$industry  = 'auto_repair';

$googleAnalyticsId     = 'G-XXXXXXXXXX';
$googleSearchConsoleId = '';

$yearEstablished = 2022;
$yearsInBusiness = 4;

$colors = [
    'primary'     => '#1a2b3c',
    'primaryRgb'  => '26, 43, 60',
    'primaryDark' => '#111e2b',
    'secondary'   => '#4d5e6f',
    'accent'      => '#06b6d4',
    'accentRgb'   => '6, 182, 212',
    'bgDark'      => '#0e1822',
];

$primaryKeyword    = 'auto repair manassas va';
$secondaryKeywords = [
    'automotive repair manassas',
    'car repair manassas',
    'auto mechanic manassas va',
    'diesel repair manassas',
    'brake repair manassas',
    'transmission repair manassas va',
    'oil change manassas',
    'auto repair near me',
    'car mechanic near me',
    'automotive service manassas',
    'auto shop manassas va',
    'small engine repair manassas',
];

$services = [
    [
        'name'        => 'Automotive Maintenance',
        'slug'        => 'automotive-maintenance',
        'description' => 'Comprehensive preventive maintenance to keep your vehicle running reliably for 200,000+ miles.',
        'keywords'    => ['automotive maintenance Manassas VA', 'car maintenance Manassas', 'vehicle maintenance Virginia'],
        'icon'        => 'wrench',
        'photo'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489117834-7nskhk-481084972_666864315902592_7682232985457324721_n.jpg',
    ],
    [
        'name'        => 'Auto Repair',
        'slug'        => 'auto-repair',
        'description' => 'Full-service auto repair for all makes and models — diagnostics, drivetrain, electrical, and more.',
        'keywords'    => ['auto repair Manassas VA', 'car repair Manassas', 'automotive repair Virginia', 'mechanic Manassas'],
        'icon'        => 'car',
        'photo'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489118932-0bjda4-481056416_666864469235910_8829031006203149386_n.jpg',
    ],
    [
        'name'        => 'Diesel Repair',
        'slug'        => 'diesel-repair',
        'description' => 'Specialized diesel engine repair and maintenance for trucks and diesel vehicles of all sizes.',
        'keywords'    => ['diesel repair Manassas VA', 'diesel mechanic Manassas', 'truck repair Virginia'],
        'icon'        => 'fuel',
        'photo'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489119856-1ybgxb-310074191_175091698429386_8965809722095922256_n.jpg',
    ],
    [
        'name'        => 'Small Engine Repair',
        'slug'        => 'small-engine-repair',
        'description' => 'Professional repair for lawn mowers, generators, pressure washers, and small engine equipment.',
        'keywords'    => ['small engine repair Manassas VA', 'lawn mower repair Manassas', 'generator repair Virginia'],
        'icon'        => 'settings-2',
        'photo'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489120732-6flc8u-1A89AD25-537B-4A03-8A23-71BDAB7B326F.jpeg',
    ],
    [
        'name'        => 'Light Duty Diesel Repair',
        'slug'        => 'light-duty-diesel-repair',
        'description' => 'Expert diesel service for pickup trucks and smaller diesel vehicles — all brands, all systems.',
        'keywords'    => ['light duty diesel repair Manassas', 'diesel pickup repair VA', 'diesel truck repair Virginia'],
        'icon'        => 'truck',
        'photo'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489121516-zgsofk-35A7AB29-CD6D-42C1-9F8B-4DBC0EED858A.jpeg',
    ],
    [
        'name'        => 'Brake Replacement',
        'slug'        => 'brake-replacement',
        'description' => 'Brake pads, rotors, calipers, and full brake system inspection — stop safely every time.',
        'keywords'    => ['brake replacement Manassas VA', 'brake repair Manassas', 'brake service Virginia'],
        'icon'        => 'disc',
        'photo'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489122298-9ztwvg-78EFAC10-5F5E-4413-8F0D-C6E19900BE0A.jpeg',
    ],
    [
        'name'        => 'Oil Changes',
        'slug'        => 'oil-changes',
        'description' => 'Accurate oil changes using the correct grade for your engine — quick service, zero upsells.',
        'keywords'    => ['oil change Manassas VA', 'quick oil change Manassas', 'motor oil service Virginia'],
        'icon'        => 'droplets',
        'photo'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489123088-e1la4q-2020-08-21__3_.jpg',
    ],
    [
        'name'        => 'Transmission Repair',
        'slug'        => 'transmission-repair',
        'description' => 'Automatic and manual transmission diagnostics, fluid service, and full rebuild when needed.',
        'keywords'    => ['transmission repair Manassas VA', 'transmission service Manassas', 'automatic transmission repair'],
        'icon'        => 'cog',
        'photo'       => 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489123898-fhfzf2-2020-08-21__4_.jpg',
    ],
];

$serviceAreas = [
    [ 'city' => 'Manassas',      'state' => 'VA', 'zip' => '20110', 'slug' => 'manassas-va',      'primary' => true  ],
    [ 'city' => 'Manassas Park', 'state' => 'VA', 'zip' => '20111', 'slug' => 'manassas-park-va', 'primary' => false ],
    [ 'city' => 'Haymarket',     'state' => 'VA', 'zip' => '20169', 'slug' => 'haymarket-va',     'primary' => false ],
    [ 'city' => 'Gainesville',   'state' => 'VA', 'zip' => '20155', 'slug' => 'gainesville-va',   'primary' => false ],
    [ 'city' => 'Woodbridge',    'state' => 'VA', 'zip' => '22191', 'slug' => 'woodbridge-va',    'primary' => false ],
    [ 'city' => 'Bristow',       'state' => 'VA', 'zip' => '20136', 'slug' => 'bristow-va',       'primary' => false ],
    [ 'city' => 'Nokesville',    'state' => 'VA', 'zip' => '20181', 'slug' => 'nokesville-va',    'primary' => false ],
    [ 'city' => 'Centreville',   'state' => 'VA', 'zip' => '20120', 'slug' => 'centreville-va',   'primary' => false ],
];

$socialLinks = [
    'facebook'  => '',
    'instagram' => '',
    'google'    => '',
    'yelp'      => '',
];

$formAction = 'https://db.pageone.cloud/functions/v1/leads/sw-automotive';

$logoUrl = 'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/logo/1777488955961-6uw3vo-Logo__2_.jpg';

$clientPhotos = [
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489117834-7nskhk-481084972_666864315902592_7682232985457324721_n.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489118932-0bjda4-481056416_666864469235910_8829031006203149386_n.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489119856-1ybgxb-310074191_175091698429386_8965809722095922256_n.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489120732-6flc8u-1A89AD25-537B-4A03-8A23-71BDAB7B326F.jpeg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489121516-zgsofk-35A7AB29-CD6D-42C1-9F8B-4DBC0EED858A.jpeg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489122298-9ztwvg-78EFAC10-5F5E-4413-8F0D-C6E19900BE0A.jpeg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489123088-e1la4q-2020-08-21__3_.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489123898-fhfzf2-2020-08-21__4_.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489124708-tbcbgr-2020-08-21.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489125528-v0msw7-574610223_855128843758998_4100558135674674243_n.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489126638-f4l6be-483962234_666123242659560_7431100441034816467_n.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489127458-maycxw-483967544_666123539326197_472977410931771103_n.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489128298-hbkbfb-483851008_666123465992871_8283192258420531462_n.jpg',
    'https://db.pageone.cloud/storage/v1/object/public/client-assets/sw-automotive/photos/1777489129128-tvaas5-480214652_661491616439862_5774994120961816785_n.jpg',
];

$businessHours = [
    'monday'    => '8:00 AM – 5:00 PM',
    'tuesday'   => '8:00 AM – 5:00 PM',
    'wednesday' => '8:00 AM – 5:00 PM',
    'thursday'  => '8:00 AM – 5:00 PM',
    'friday'    => '8:00 AM – 5:00 PM',
    'saturday'  => 'Closed',
    'sunday'    => 'Closed',
];
$hoursDisplay = 'Mon–Fri: 8 AM – 5 PM';

$trustSignals = [
    'Licensed & Insured',
    'ASE Certified Technicians',
    '4+ Years Serving Manassas',
    'All Makes & Models',
    'Hybrid & EV Capable',
];

$certifications = [
    'ASE Certified',
    'Nissan Master Technician',
    'Light Duty Diesel Certified',
    'Hybrid & EV Certified',
];
