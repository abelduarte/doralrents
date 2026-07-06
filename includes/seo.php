<?php

require_once __DIR__ . '/communities.php';

$sitemap_lastmod = '2026-07-06';

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
        'description' => 'Browse Doral townhomes for rent and compare townhouse rentals by layout, community, budget, and commute.',
        'query' => ['q' => 'doral', 'kind' => 'townhome'],
        'intro' => 'Find townhome rentals in Doral when you want more space, privacy, parking, and a neighborhood feel.',
        'content_blocks' => [
            [
                'heading' => 'How to compare Doral townhome rentals',
                'body' => 'Townhomes in Doral can vary a lot by community rules, parking, bedroom layout, association approval time, and outdoor space. Start by comparing total monthly cost, move-in timing, garage or driveway access, and whether the floor plan works for guests, remote work, or family routines.',
            ],
            [
                'heading' => 'Where renters often focus',
                'body' => 'Many renters start near Islands at Doral, Landmark, Downtown Doral, Doral Isles, and Park Central because those areas can offer a mix of townhomes, newer construction, and practical access to schools, parks, shopping, and major roads.',
            ],
        ],
        'faqs' => [
            [
                'question' => 'Are Doral townhomes usually harder to rent than apartments?',
                'answer' => 'They can move quickly because there are fewer townhome rentals than apartment-style options. Association approval, pet rules, and move-in deposits should be checked before you apply.',
            ],
            [
                'question' => 'What should I confirm before touring a Doral townhouse?',
                'answer' => 'Confirm parking, association approval timing, pet restrictions, included utilities, yard or patio responsibility, and whether the advertised rent matches the required move-in costs.',
            ],
        ],
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
        'content_blocks' => [
            [
                'heading' => 'What makes a Doral townhome feel luxury',
                'body' => 'Higher-end townhomes often compete on newer construction, garage parking, larger bedroom suites, outdoor areas, gated access, and proximity to Downtown Doral, parks, and commuter routes. The best fit depends on whether you value finishes, privacy, school access, or shorter drive times most.',
            ],
        ],
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
        'content_blocks' => [
            [
                'heading' => 'Best-fit uses for a 3 bedroom townhome',
                'body' => 'Three bedroom townhomes are a common fit for renters who need a home office, guest room, or more separation than an apartment can provide. Check bedroom placement, stairs, storage, parking, and association timelines before deciding which homes are worth touring.',
            ],
        ],
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
        'content_blocks' => [
            [
                'heading' => 'How to shop under $3,500',
                'body' => 'Townhomes under $3,500 can be competitive when inventory is tight. Compare total move-in cost, association fees, pet deposits, and commute tradeoffs instead of judging by rent alone.',
            ],
        ],
    ],
    'townhomes-for-rent-in-doral' => [
        'path' => '/townhomes-for-rent-in-doral',
        'title' => 'Townhomes for Rent in Doral | Local Townhouse Search',
        'h1' => 'Townhomes for rent in Doral',
        'description' => 'Search townhomes for rent in Doral and get local help comparing communities, approval timelines, and move-in costs.',
        'query' => ['q' => 'doral', 'kind' => 'townhome'],
        'intro' => 'Compare Doral townhomes by community, bedroom count, parking, approval timing, and total move-in cost.',
        'content_blocks' => [
            [
                'heading' => 'A focused townhome search saves time',
                'body' => 'The best Doral townhome search starts with the practical constraints: commute, school zone preference, parking needs, pet rules, association approval time, and whether stairs or split-level layouts work for daily life.',
            ],
            [
                'heading' => 'Tour the strongest matches first',
                'body' => 'A rental can look similar online but feel very different in person. Prioritize homes with the right parking, natural light, storage, and community access before spending time on listings with uncertain approval rules or weak availability.',
            ],
        ],
        'faqs' => [
            [
                'question' => 'How much do townhomes for rent in Doral usually cost?',
                'answer' => 'Pricing changes with inventory, bedroom count, condition, and community. The most useful comparison is total monthly cost plus move-in funds, not rent alone.',
            ],
            [
                'question' => 'Can I rent a Doral townhome quickly?',
                'answer' => 'Some townhomes can move quickly, but association approval may add time. Before applying, confirm application steps, deposits, and any HOA timeline.',
            ],
        ],
    ],
    'townhouse-for-rent-in-doral' => [
        'path' => '/townhouse-for-rent-in-doral',
        'title' => 'Townhouse for Rent in Doral | Find the Right Fit',
        'h1' => 'Find a townhouse for rent in Doral',
        'description' => 'Find a townhouse for rent in Doral with help checking availability, move-in costs, parking, and community rules.',
        'query' => ['q' => 'doral', 'kind' => 'townhome'],
        'intro' => 'Find a Doral townhouse that fits your space needs, budget, commute, and move-in timeline.',
        'content_blocks' => [
            [
                'heading' => 'What to check on a single townhouse listing',
                'body' => 'Before you apply for a townhouse, confirm the exact bedrooms and baths, parking assignment, included appliances, pet policy, association approval, move-in deposits, and whether the listing is still active.',
            ],
            [
                'heading' => 'Have backup options ready',
                'body' => 'A strong townhouse can receive multiple inquiries quickly. Keep two or three comparable Doral options ready so you can move without restarting your search if the first choice is taken.',
            ],
        ],
    ],
    'doral-rental-communities' => [
        'path' => '/doral-rental-communities',
        'title' => 'Doral Rental Communities | Apartments, Condos & Townhomes',
        'h1' => 'Doral rental communities',
        'description' => 'Compare Doral rental communities and get help choosing where to focus your apartment, condo, or townhome search.',
        'query' => ['q' => 'doral'],
        'intro' => 'Use Doral rental communities to narrow your search by lifestyle, commute, building style, and move-in timing.',
        'content_blocks' => [
            [
                'heading' => 'Choosing the right Doral rental community',
                'body' => 'Doral communities differ by building age, amenities, association rules, parking, access to parks, and proximity to Downtown Doral, schools, shopping, and major roads. A community-first search helps you avoid touring homes that are technically available but not practical for your routine.',
            ],
            [
                'heading' => 'Community rules matter before you apply',
                'body' => 'Many condo and townhome communities have association applications, pet limits, move-in rules, deposits, and approval timelines. Confirm those details early so a good listing does not turn into a delayed or expensive move.',
            ],
        ],
        'faqs' => [
            [
                'question' => 'Which Doral rental community is best?',
                'answer' => 'The best community depends on your budget, commute, preferred property type, parking needs, pet rules, and move-in date. Shortlisting by those details is usually faster than starting with every available rental.',
            ],
            [
                'question' => 'Do Doral rental communities require association approval?',
                'answer' => 'Many condo and townhome communities do require approval. Before applying, confirm the documents, fees, deposits, and expected approval timeline.',
            ],
        ],
    ],
];

$communityLandingPages = doral_community_pages($doralCommunities);
$landingPages = array_merge($landingPages, $communityLandingPages);

function current_landing_page(array $landingPages): array
{
    $path = trim(parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH), '/');
    if (!isset($landingPages[$path])) {
        http_response_code(404);
        return array_merge($landingPages[''], [
            'title' => 'Doral Rental Page Not Found | Doral Rents',
            'h1' => 'Doral rental page not found',
            'description' => 'This Doral rental page could not be found. Search current Doral rentals and get local help.',
            'intro' => 'The page you requested could not be found, but you can still search current Doral rental options here.',
            'not_found' => true,
        ]);
    }
    return $landingPages[$path];
}

function landing_page_links(array $landingPages): array
{
    return array_values(array_filter($landingPages, fn ($page) => $page['path'] !== '/' && empty($page['community'])));
}

function community_page_links(array $communityLandingPages): array
{
    return array_values($communityLandingPages);
}

function canonical_url(string $path): string
{
    global $site_domain;
    return 'https://' . $site_domain . $path;
}

function json_ld(array $data): string
{
    return json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
}

function landing_page_schema(array $pageData): array
{
    global $site_name, $site_domain, $phone_number, $contact_email;

    $url = canonical_url($pageData['path']);
    $schema = [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'RealEstateAgent',
                '@id' => 'https://' . $site_domain . '/#agent',
                'name' => $site_name,
                'url' => 'https://' . $site_domain . '/',
                'telephone' => $phone_number,
                'email' => $contact_email,
                'areaServed' => [
                    '@type' => 'City',
                    'name' => 'Doral',
                    'addressRegion' => 'FL',
                    'addressCountry' => 'US',
                ],
            ],
            [
                '@type' => 'WebSite',
                '@id' => 'https://' . $site_domain . '/#website',
                'name' => $site_name,
                'url' => 'https://' . $site_domain . '/',
            ],
            [
                '@type' => 'WebPage',
                '@id' => $url . '#webpage',
                'url' => $url,
                'name' => $pageData['title'],
                'description' => $pageData['description'],
                'isPartOf' => ['@id' => 'https://' . $site_domain . '/#website'],
                'about' => ['@id' => 'https://' . $site_domain . '/#agent'],
            ],
        ],
    ];

    if (!empty($pageData['community'])) {
        $schema['@graph'][] = [
            '@type' => 'BreadcrumbList',
            '@id' => $url . '#breadcrumb',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Doral rentals',
                    'item' => 'https://' . $site_domain . '/',
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => $pageData['community']['name'] . ' rentals',
                    'item' => $url,
                ],
            ],
        ];
    }

    if (!empty($pageData['faqs'])) {
        $schema['@graph'][] = [
            '@type' => 'FAQPage',
            '@id' => $url . '#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer'],
                ],
            ], $pageData['faqs']),
        ];
    }

    return $schema;
}
