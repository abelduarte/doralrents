<?php

$landingPages = [
    '' => [
        'path' => '/',
        'title' => 'Doral Rentals | Apartments, Condos & Townhomes for Rent',
        'h1' => 'Find Doral rentals that are actually worth touring',
        'description' => 'Browse Doral apartments, condos, townhomes, and luxury rentals with help from Abel Duarte.',
        'query' => ['q' => 'doral'],
        'intro' => 'Live rental listings in Doral with fast help from a local agent.',
    ],
    'doral-apartments-for-rent' => [
        'path' => '/doral-apartments-for-rent',
        'title' => 'Doral Apartments for Rent | Updated Listings',
        'h1' => 'Doral apartments for rent',
        'description' => 'Search Doral apartments for rent and request availability from Abel Duarte.',
        'query' => ['q' => 'doral', 'kind' => 'apartment'],
        'intro' => 'Apartment-style rentals in Doral, including condos and multifamily options.',
    ],
    'doral-condos-for-rent' => [
        'path' => '/doral-condos-for-rent',
        'title' => 'Doral Condos for Rent | Updated Condo Rentals',
        'h1' => 'Doral condos for rent',
        'description' => 'Find Doral condo rentals with photos, pricing, beds, baths, and local agent help.',
        'query' => ['q' => 'doral', 'kind' => 'condo'],
        'intro' => 'Condo rentals in Doral with building-style living and flexible search filters.',
    ],
    'doral-townhomes-for-rent' => [
        'path' => '/doral-townhomes-for-rent',
        'title' => 'Doral Townhomes for Rent | Townhouse Rentals',
        'h1' => 'Doral townhomes for rent',
        'description' => 'Browse Doral townhouse rentals with updated IDX listings and direct agent contact.',
        'query' => ['q' => 'doral', 'kind' => 'townhome'],
        'intro' => 'Townhome rentals in Doral for renters who want more space and a residential feel.',
    ],
    'luxury-apartments-doral' => [
        'path' => '/luxury-apartments-doral',
        'title' => 'Luxury Apartments in Doral | Premium Rentals',
        'h1' => 'Luxury apartments in Doral',
        'description' => 'Explore premium Doral rentals, luxury apartments, and upscale condo rentals.',
        'query' => ['q' => 'doral', 'kind' => 'apartment', 'min_price' => 3000],
        'intro' => 'Upscale Doral rentals with polished finishes, amenities, and strong locations.',
    ],
    'pet-friendly-apartments-doral' => [
        'path' => '/pet-friendly-apartments-doral',
        'title' => 'Pet-Friendly Apartments in Doral | Rental Listings',
        'h1' => 'Pet-friendly apartments in Doral',
        'description' => 'Search Doral rentals and ask Abel Duarte to confirm pet rules before you tour.',
        'query' => ['q' => 'doral', 'kind' => 'apartment'],
        'intro' => 'Start with active apartment rentals, then confirm pet restrictions before scheduling.',
    ],
    'furnished-apartments-doral' => [
        'path' => '/furnished-apartments-doral',
        'title' => 'Furnished Apartments in Doral | Move-In Ready Rentals',
        'h1' => 'Furnished apartments in Doral',
        'description' => 'Find Doral rentals and ask for furnished or move-in ready availability.',
        'query' => ['q' => 'doral', 'kind' => 'apartment'],
        'intro' => 'Use these Doral rental listings as a starting point for furnished availability.',
    ],
    '1-bedroom-apartments-doral' => [
        'path' => '/1-bedroom-apartments-doral',
        'title' => '1 Bedroom Apartments in Doral | One Bedroom Rentals',
        'h1' => '1 bedroom apartments in Doral',
        'description' => 'Browse one bedroom Doral rentals and contact Abel Duarte for current availability.',
        'query' => ['q' => 'doral', 'kind' => 'apartment', 'beds' => 1],
        'intro' => 'One bedroom rentals in Doral for efficient, well-located living.',
    ],
    '2-bedroom-apartments-doral' => [
        'path' => '/2-bedroom-apartments-doral',
        'title' => '2 Bedroom Apartments in Doral | Two Bedroom Rentals',
        'h1' => '2 bedroom apartments in Doral',
        'description' => 'Search two bedroom apartments and condos for rent in Doral.',
        'query' => ['q' => 'doral', 'kind' => 'apartment', 'beds' => 2],
        'intro' => 'Two bedroom rentals in Doral for roommates, families, or home office flexibility.',
    ],
    '3-bedroom-townhomes-doral' => [
        'path' => '/3-bedroom-townhomes-doral',
        'title' => '3 Bedroom Townhomes in Doral | Spacious Rentals',
        'h1' => '3 bedroom townhomes in Doral',
        'description' => 'Find three bedroom Doral townhomes and larger rental homes.',
        'query' => ['q' => 'doral', 'kind' => 'townhome', 'beds' => 3],
        'intro' => 'Three bedroom Doral rentals with more room for family, work, and storage.',
    ],
];

function current_landing_page(array $landingPages): array
{
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
    return $landingPages[$path] ?? $landingPages[''];
}

function landing_page_links(array $landingPages): array
{
    return array_values(array_filter($landingPages, fn ($page) => $page['path'] !== '/'));
}

