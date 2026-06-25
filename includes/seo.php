<?php

require_once __DIR__ . '/communities.php';

$landingPages = [
    '' => [
        'path' => '/',
        'title' => 'Doral Rentals | Apartments, Condos & Townhomes for Rent',
        'h1' => 'Find a Doral rental you feel good about touring',
        'description' => 'See Doral apartments, condos, townhomes, and luxury rentals with local help from Abel Duarte.',
        'query' => ['q' => 'doral'],
        'intro' => 'See strong Doral rental options and get local guidance before you schedule a tour.',
    ],
    'doral-apartments-for-rent' => [
        'path' => '/doral-apartments-for-rent',
        'title' => 'Doral Apartments for Rent | Find Your Next Place',
        'h1' => 'Doral apartments for rent',
        'description' => 'Compare Doral apartments for rent and ask Abel Duarte which ones are worth seeing first.',
        'query' => ['q' => 'doral', 'kind' => 'apartment'],
        'intro' => 'Compare apartment-style rentals in Doral with help narrowing the best options for your move.',
    ],
    'doral-condos-for-rent' => [
        'path' => '/doral-condos-for-rent',
        'title' => 'Doral Condos for Rent | Condo Rentals in Doral',
        'h1' => 'Doral condos for rent',
        'description' => 'Find Doral condo rentals with pricing, photos, and local help from Abel Duarte.',
        'query' => ['q' => 'doral', 'kind' => 'condo'],
        'intro' => 'Explore condo rentals in Doral and get help choosing the buildings that fit your lifestyle.',
    ],
    'doral-townhomes-for-rent' => [
        'path' => '/doral-townhomes-for-rent',
        'title' => 'Doral Townhomes for Rent | Townhouse Rentals',
        'h1' => 'Doral townhomes for rent',
        'description' => 'Browse Doral townhouse rentals and get direct help from Abel Duarte.',
        'query' => ['q' => 'doral', 'kind' => 'townhome'],
        'intro' => 'Find townhome rentals in Doral when you want more space, privacy, and a neighborhood feel.',
    ],
    'luxury-apartments-doral' => [
        'path' => '/luxury-apartments-doral',
        'title' => 'Luxury Apartments in Doral | Premium Rentals',
        'h1' => 'Luxury apartments in Doral',
        'description' => 'Explore premium Doral rentals, luxury apartments, and upscale condo rentals.',
        'query' => ['q' => 'doral', 'kind' => 'apartment', 'min_price' => 3000],
        'intro' => 'Focus on Doral rentals with better finishes, amenities, and locations worth your time.',
    ],
    'pet-friendly-apartments-doral' => [
        'path' => '/pet-friendly-apartments-doral',
        'title' => 'Pet-Friendly Apartments in Doral | Rentals That Fit Your Pet',
        'h1' => 'Pet-friendly apartments in Doral',
        'description' => 'Find Doral rentals that may work for you and your pet, then ask Abel to confirm the rules.',
        'query' => ['q' => 'doral', 'kind' => 'apartment'],
        'intro' => 'Start with Doral apartment options and get help confirming pet rules before you apply.',
    ],
    'furnished-apartments-doral' => [
        'path' => '/furnished-apartments-doral',
        'title' => 'Furnished Apartments in Doral | Move-In Ready Rentals',
        'h1' => 'Furnished apartments in Doral',
        'description' => 'Find Doral rentals and ask Abel about furnished or move-in ready options.',
        'query' => ['q' => 'doral', 'kind' => 'apartment'],
        'intro' => 'Shortlist Doral rentals that may fit a faster, easier move.',
    ],
    '1-bedroom-apartments-doral' => [
        'path' => '/1-bedroom-apartments-doral',
        'title' => '1 Bedroom Apartments in Doral | One Bedroom Rentals',
        'h1' => '1 bedroom apartments in Doral',
        'description' => 'Browse one bedroom Doral rentals and ask Abel which ones match your move date.',
        'query' => ['q' => 'doral', 'kind' => 'apartment', 'beds' => 1],
        'intro' => 'Find one bedroom Doral rentals that make daily life easier.',
    ],
    '2-bedroom-apartments-doral' => [
        'path' => '/2-bedroom-apartments-doral',
        'title' => '2 Bedroom Apartments in Doral | Two Bedroom Rentals',
        'h1' => '2 bedroom apartments in Doral',
        'description' => 'Search two bedroom apartments and condos for rent in Doral.',
        'query' => ['q' => 'doral', 'kind' => 'apartment', 'beds' => 2],
        'intro' => 'Compare two bedroom Doral rentals for more space, guests, or a home office.',
    ],
    '3-bedroom-townhomes-doral' => [
        'path' => '/3-bedroom-townhomes-doral',
        'title' => '3 Bedroom Townhomes in Doral | Spacious Rentals',
        'h1' => '3 bedroom townhomes in Doral',
        'description' => 'Find three bedroom Doral townhomes and larger rental homes.',
        'query' => ['q' => 'doral', 'kind' => 'townhome', 'beds' => 3],
        'intro' => 'Focus on larger Doral rentals with room for family, work, and storage.',
    ],
];

$communityLandingPages = doral_community_pages($doralCommunities);
$landingPages = array_merge($landingPages, $communityLandingPages);

function current_landing_page(array $landingPages): array
{
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
    return $landingPages[$path] ?? $landingPages[''];
}

function landing_page_links(array $landingPages): array
{
    return array_values(array_filter($landingPages, fn ($page) => $page['path'] !== '/' && empty($page['community'])));
}

function community_page_links(array $communityLandingPages): array
{
    return array_values($communityLandingPages);
}
