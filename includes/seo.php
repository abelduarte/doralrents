<?php

require_once __DIR__ . '/communities.php';

$landingPages = [
    '' => [
        'path' => '/',
        'title' => 'Doral Rentals | Apartments, Condos & Townhomes for Rent',
        'h1' => 'Find a Doral rental you feel good about touring',
        'description' => 'See Doral apartments, condos, townhomes, and luxury rentals with local guidance before you tour.',
        'query' => ['q' => 'doral'],
        'intro' => 'See strong Doral rental options and get local guidance before you schedule a tour.',
    ],
    'doral-apartments-for-rent' => [
        'path' => '/doral-apartments-for-rent',
        'title' => 'Doral Apartments for Rent | Find Your Next Place',
        'h1' => 'Doral apartments for rent',
        'description' => 'Compare Doral apartments for rent and get help choosing which ones are worth seeing first.',
        'query' => ['q' => 'doral', 'kind' => 'apartment'],
        'intro' => 'Compare apartment-style rentals in Doral with help narrowing the best options for your move.',
    ],
    'doral-condos-for-rent' => [
        'path' => '/doral-condos-for-rent',
        'title' => 'Doral Condos for Rent | Condo Rentals in Doral',
        'h1' => 'Doral condos for rent',
        'description' => 'Find Doral condo rentals with pricing, photos, and local help before you schedule a tour.',
        'query' => ['q' => 'doral', 'kind' => 'condo'],
        'intro' => 'Explore condo rentals in Doral and get help choosing the buildings that fit your lifestyle.',
    ],
    'doral-townhomes-for-rent' => [
        'path' => '/doral-townhomes-for-rent',
        'title' => 'Doral Townhomes for Rent | Townhouse Rentals',
        'h1' => 'Doral townhomes for rent',
        'description' => 'Browse Doral townhouse rentals and get direct help choosing the right fit.',
        'query' => ['q' => 'doral', 'kind' => 'townhome'],
        'intro' => 'Find townhome rentals in Doral when you want more space, privacy, and a neighborhood feel.',
    ],
    'doral-houses-for-rent' => [
        'path' => '/doral-houses-for-rent',
        'title' => 'Houses for Rent in Doral | Single Family Rentals',
        'h1' => 'Houses for rent in Doral',
        'description' => 'Browse Doral houses for rent and get help comparing single family rental options.',
        'query' => ['q' => 'doral', 'kind' => 'home'],
        'intro' => 'Find single family rentals in Doral with more privacy, yard space, and room to settle in.',
    ],
    'luxury-apartments-doral' => [
        'path' => '/luxury-apartments-doral',
        'title' => 'Luxury Apartments in Doral | Premium Rentals',
        'h1' => 'Luxury apartments in Doral',
        'description' => 'Explore premium Doral rentals, luxury apartments, and upscale condo rentals.',
        'query' => ['q' => 'doral', 'kind' => 'apartment', 'min_price' => 3000],
        'intro' => 'Focus on Doral rentals with better finishes, amenities, and locations worth your time.',
    ],
    'luxury-condos-doral' => [
        'path' => '/luxury-condos-doral',
        'title' => 'Luxury Condos in Doral | Upscale Condo Rentals',
        'h1' => 'Luxury condos in Doral',
        'description' => 'Compare upscale Doral condo rentals with strong amenities, locations, and finishes.',
        'query' => ['q' => 'doral', 'kind' => 'condo', 'min_price' => 3500],
        'intro' => 'Focus on higher-end Doral condo rentals with stronger buildings, amenities, and layouts.',
    ],
    'luxury-townhomes-doral' => [
        'path' => '/luxury-townhomes-doral',
        'title' => 'Luxury Townhomes in Doral | Premium Townhouse Rentals',
        'h1' => 'Luxury townhomes in Doral',
        'description' => 'Find premium Doral townhomes for rent with more space, privacy, and upgraded finishes.',
        'query' => ['q' => 'doral', 'kind' => 'townhome', 'min_price' => 3500],
        'intro' => 'Compare upscale Doral townhomes when you want more space without losing a polished feel.',
    ],
    'pet-friendly-apartments-doral' => [
        'path' => '/pet-friendly-apartments-doral',
        'title' => 'Pet-Friendly Apartments in Doral | Rentals That Fit Your Pet',
        'h1' => 'Pet-friendly apartments in Doral',
        'description' => 'Find Doral rentals that may work for you and your pet, then confirm the rules before you apply.',
        'query' => ['q' => 'doral', 'kind' => 'apartment'],
        'intro' => 'Start with Doral apartment options and get help confirming pet rules before you apply.',
    ],
    'furnished-apartments-doral' => [
        'path' => '/furnished-apartments-doral',
        'title' => 'Furnished Apartments in Doral | Move-In Ready Rentals',
        'h1' => 'Furnished apartments in Doral',
        'description' => 'Find Doral rentals and ask about furnished or move-in ready options.',
        'query' => ['q' => 'doral', 'kind' => 'apartment'],
        'intro' => 'Shortlist Doral rentals that may fit a faster, easier move.',
    ],
    '1-bedroom-apartments-doral' => [
        'path' => '/1-bedroom-apartments-doral',
        'title' => '1 Bedroom Apartments in Doral | One Bedroom Rentals',
        'h1' => '1 bedroom apartments in Doral',
        'description' => 'Browse one bedroom Doral rentals and find options that match your move date.',
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
    '3-bedroom-apartments-doral' => [
        'path' => '/3-bedroom-apartments-doral',
        'title' => '3 Bedroom Apartments in Doral | Larger Apartment Rentals',
        'h1' => '3 bedroom apartments in Doral',
        'description' => 'Browse three bedroom apartments and condo-style rentals in Doral.',
        'query' => ['q' => 'doral', 'kind' => 'apartment', 'beds' => 3],
        'intro' => 'Find larger Doral apartment rentals with room for family, guests, or a dedicated office.',
    ],
    '2-bedroom-condos-doral' => [
        'path' => '/2-bedroom-condos-doral',
        'title' => '2 Bedroom Condos in Doral | Condo Rentals',
        'h1' => '2 bedroom condos in Doral',
        'description' => 'Search two bedroom condo rentals in Doral with photos, pricing, and local guidance.',
        'query' => ['q' => 'doral', 'kind' => 'condo', 'beds' => 2],
        'intro' => 'Compare two bedroom condo rentals in Doral buildings and communities worth touring first.',
    ],
    '3-bedroom-townhomes-doral' => [
        'path' => '/3-bedroom-townhomes-doral',
        'title' => '3 Bedroom Townhomes in Doral | Spacious Rentals',
        'h1' => '3 bedroom townhomes in Doral',
        'description' => 'Find three bedroom Doral townhomes and larger rental homes.',
        'query' => ['q' => 'doral', 'kind' => 'townhome', 'beds' => 3],
        'intro' => 'Focus on larger Doral rentals with room for family, work, and storage.',
    ],
    '4-bedroom-townhomes-doral' => [
        'path' => '/4-bedroom-townhomes-doral',
        'title' => '4 Bedroom Townhomes in Doral | Large Townhouse Rentals',
        'h1' => '4 bedroom townhomes in Doral',
        'description' => 'Find four bedroom Doral townhomes with more room for family, work, and guests.',
        'query' => ['q' => 'doral', 'kind' => 'townhome', 'beds' => 4],
        'intro' => 'Shortlist larger Doral townhomes when bedroom count and storage matter most.',
    ],
    '4-bedroom-homes-doral' => [
        'path' => '/4-bedroom-homes-doral',
        'title' => '4 Bedroom Homes for Rent in Doral | Family Rentals',
        'h1' => '4 bedroom homes for rent in Doral',
        'description' => 'Browse four bedroom houses for rent in Doral and get help moving quickly on the right fit.',
        'query' => ['q' => 'doral', 'kind' => 'home', 'beds' => 4],
        'intro' => 'Find larger Doral homes for rent with more room for family, work, and everyday life.',
    ],
    'doral-rentals-under-2500' => [
        'path' => '/doral-rentals-under-2500',
        'title' => 'Doral Rentals Under $2,500 | Apartments & Condos',
        'h1' => 'Doral rentals under $2,500',
        'description' => 'Find Doral rentals under $2,500 and get help checking availability before they move.',
        'query' => ['q' => 'doral', 'max_price' => 2500],
        'intro' => 'Start with lower-priced Doral rentals and move quickly when a strong option appears.',
    ],
    'doral-rentals-under-3000' => [
        'path' => '/doral-rentals-under-3000',
        'title' => 'Doral Rentals Under $3,000 | Apartments, Condos & Townhomes',
        'h1' => 'Doral rentals under $3,000',
        'description' => 'Search Doral rentals under $3,000 with current listings and local showing guidance.',
        'query' => ['q' => 'doral', 'max_price' => 3000],
        'intro' => 'Compare Doral rentals under $3,000 and get help separating good values from weak fits.',
    ],
    'apartments-under-2500-doral' => [
        'path' => '/apartments-under-2500-doral',
        'title' => 'Apartments Under $2,500 in Doral | Budget-Friendly Rentals',
        'h1' => 'Apartments under $2,500 in Doral',
        'description' => 'Browse apartment-style rentals under $2,500 in Doral and ask which ones are worth touring.',
        'query' => ['q' => 'doral', 'kind' => 'apartment', 'max_price' => 2500],
        'intro' => 'Focus on budget-friendly Doral apartments and condo-style rentals with real availability.',
    ],
    'doral-townhomes-under-3500' => [
        'path' => '/doral-townhomes-under-3500',
        'title' => 'Doral Townhomes Under $3,500 | Townhouse Rentals',
        'h1' => 'Doral townhomes under $3,500',
        'description' => 'Find Doral townhomes under $3,500 and get help comparing the best available options.',
        'query' => ['q' => 'doral', 'kind' => 'townhome', 'max_price' => 3500],
        'intro' => 'Look for Doral townhomes under $3,500 when you want more space without overspending.',
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
