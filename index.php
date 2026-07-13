<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/seo.php';
require_once __DIR__ . '/includes/bridge.php';

$pageData = current_landing_page($landingPages);
$canonicalUrl = canonical_url($pageData['path']);
$filters = array_merge($pageData['query'], [
    'q' => $_GET['q'] ?? ($pageData['query']['q'] ?? 'doral'),
    'kind' => $_GET['kind'] ?? ($pageData['query']['kind'] ?? ''),
    'min_price' => $_GET['min_price'] ?? ($pageData['query']['min_price'] ?? ''),
    'max_price' => $_GET['max_price'] ?? ($pageData['query']['max_price'] ?? ''),
    'beds' => $_GET['beds'] ?? ($pageData['query']['beds'] ?? ''),
    'baths' => $_GET['baths'] ?? '',
    'community' => $_GET['community'] ?? ($pageData['query']['community'] ?? ''),
]);

$idxError = null;
$listings = [];
if (function_exists('curl_init')) {
    try {
        $listings = fetch_bridge_listings($bridge_dataset, $bridge_server_token, $filters, 12);
    } catch (Throwable $e) {
        $idxError = $e->getMessage();
    }
} else {
    $idxError = 'Homes are temporarily unavailable.';
}

function h($value): string { return htmlspecialchars((string) $value, ENT_QUOTES); }
function money($value): string { return $value ? '$' . number_format((float) $value) : 'Price on request'; }
function listing_search_snapshot(array $listings): array
{
    $prices = [];
    $beds = [];
    $communities = [];

    foreach ($listings as $listing) {
        if (!empty($listing['price'])) {
            $prices[] = (float) $listing['price'];
        }
        if (!empty($listing['bedrooms'])) {
            $beds[] = (int) $listing['bedrooms'];
        }
        if (!empty($listing['community'])) {
            $community = ucwords(strtolower(trim((string) $listing['community'])));
            if ($community !== '') {
                $communities[$community] = ($communities[$community] ?? 0) + 1;
            }
        }
    }

    arsort($communities);
    $bedValues = array_values(array_unique($beds));
    sort($bedValues);

    return [
        'count' => count($listings),
        'price_min' => empty($prices) ? null : min($prices),
        'price_max' => empty($prices) ? null : max($prices),
        'beds' => $bedValues,
        'communities' => array_slice(array_keys($communities), 0, 3),
    ];
}

function bed_summary(array $beds): string
{
    if (empty($beds)) {
        return 'Mixed bedroom counts';
    }
    return implode(', ', array_map(fn ($bed) => $bed . '+ bd', $beds));
}

$searchSnapshot = listing_search_snapshot($listings);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo h($pageData['title']); ?></title>
  <meta name="description" content="<?php echo h($pageData['description']); ?>">
  <?php if (!empty($pageData['not_found'])): ?>
  <meta name="robots" content="noindex,follow">
  <?php else: ?>
  <link rel="canonical" href="<?php echo h($canonicalUrl); ?>">
  <?php endif; ?>
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="<?php echo h($site_name); ?>">
  <meta property="og:title" content="<?php echo h($pageData['title']); ?>">
  <meta property="og:description" content="<?php echo h($pageData['description']); ?>">
  <meta property="og:url" content="<?php echo h($canonicalUrl); ?>">
  <meta property="og:image" content="<?php echo h(canonical_url('/assets/images/doralrents-logo.png')); ?>">
  <meta name="twitter:card" content="summary_large_image">
  <?php if (empty($pageData['not_found'])): ?>
  <script type="application/ld+json"><?php echo json_ld(landing_page_schema($pageData)); ?></script>
  <?php endif; ?>
  <link rel="icon" href="/favicon.ico?v=2" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png?v=2">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16.png?v=2">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png?v=2">
  <link rel="stylesheet" href="/styles.css">
</head>
<body>
  <header class="site-header">
    <a class="brand" href="/" aria-label="Doral Rents home">
      <img class="brand-logo" src="/assets/images/doralrents-logo.png" alt="DoralRents.com">
    </a>
    <nav class="nav-links" aria-label="Main navigation">
      <a href="/doral-apartments-for-rent">Apartments</a>
      <a href="/doral-condos-for-rent">Condos</a>
      <a href="/doral-townhomes-for-rent">Townhomes</a>
      <a href="/doral-rental-communities">Communities</a>
    </nav>
    <a class="header-call" href="<?php echo h($phone_href); ?>">Call now</a>
  </header>

  <main>
    <section class="hero">
      <div class="hero-copy">
        <h1><?php echo h($pageData['h1']); ?></h1>
        <p><?php echo h($pageData['intro']); ?> Call or text for a quick shortlist, showing advice, and a smoother path to the right place.</p>
        <div class="hero-actions">
          <a class="button primary" href="<?php echo h($phone_href); ?>">Call now</a>
          <a class="button secondary" href="<?php echo h($sms_href); ?>">Text your move date</a>
        </div>
      </div>
      <form class="search-panel" method="get" action="/">
        <input type="hidden" name="q" value="doral">
        <label>
          <span>Community</span>
          <select name="community">
            <option value="">All Doral communities</option>
            <?php foreach ($doralCommunities as $community): ?>
              <option value="<?php echo h($community['terms']); ?>" <?php echo $filters['community'] === $community['terms'] ? 'selected' : ''; ?>>
                <?php echo h($community['name']); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </label>
        <label>
          <span>Rental type</span>
          <select name="kind">
            <option value="">Any rental</option>
            <option value="apartment" <?php echo $filters['kind'] === 'apartment' ? 'selected' : ''; ?>>Apartment / condo</option>
            <option value="townhome" <?php echo $filters['kind'] === 'townhome' ? 'selected' : ''; ?>>Townhome</option>
            <option value="home" <?php echo $filters['kind'] === 'home' ? 'selected' : ''; ?>>House</option>
          </select>
        </label>
        <label>
          <span>Min rent</span>
          <input name="min_price" inputmode="numeric" value="<?php echo h($filters['min_price']); ?>" placeholder="$2,500">
        </label>
        <label>
          <span>Max rent</span>
          <input name="max_price" inputmode="numeric" value="<?php echo h($filters['max_price']); ?>" placeholder="$4,000">
        </label>
        <label>
          <span>Beds</span>
          <select name="beds">
            <option value="">Any</option>
            <?php for ($i = 1; $i <= 4; $i++): ?>
              <option value="<?php echo $i; ?>" <?php echo (string) $filters['beds'] === (string) $i ? 'selected' : ''; ?>><?php echo $i; ?>+</option>
            <?php endfor; ?>
          </select>
        </label>
        <button type="submit">Show Matching Homes</button>
      </form>
    </section>

    <section class="results-section" id="listings">
      <div class="section-heading">
        <div>
          <h2>Doral rentals worth a closer look</h2>
          <p>Shortlist the homes that fit your budget, space, and timing, then move quickly on the best ones.</p>
        </div>
        <a class="text-link" href="<?php echo h($phone_href); ?>">Get a shortlist</a>
      </div>

      <?php if ($idxError): ?>
        <div class="alert">Homes are temporarily unavailable here. Call now and get help finding strong Doral options.</div>
      <?php endif; ?>

      <?php if (!$idxError && $searchSnapshot['count'] > 0): ?>
        <div class="market-snapshot" aria-label="Current rental search snapshot">
          <div>
            <span class="snapshot-label">Current search snapshot</span>
            <strong><?php echo h($searchSnapshot['count']); ?> rentals shown</strong>
          </div>
          <?php if ($searchSnapshot['price_min'] && $searchSnapshot['price_max']): ?>
            <div>
              <span class="snapshot-label">Displayed rent range</span>
              <strong><?php echo h(money($searchSnapshot['price_min'])); ?>-<?php echo h(money($searchSnapshot['price_max'])); ?>/mo</strong>
            </div>
          <?php endif; ?>
          <div>
            <span class="snapshot-label">Bedroom mix</span>
            <strong><?php echo h(bed_summary($searchSnapshot['beds'])); ?></strong>
          </div>
          <?php if (!empty($searchSnapshot['communities'])): ?>
            <div>
              <span class="snapshot-label">Communities appearing here</span>
              <strong><?php echo h(implode(', ', $searchSnapshot['communities'])); ?></strong>
            </div>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <div class="listing-grid">
        <?php foreach ($listings as $listing): ?>
          <?php
            $photo = listing_photo($listing, $bridge_browser_token);
            if (!$photo) { continue; }
            $address = $listing['address'] ?? 'Doral rental';
          ?>
          <article class="listing-card">
            <a href="<?php echo h(listing_url($listing)); ?>" class="photo-wrap">
              <img src="<?php echo h($photo); ?>" alt="<?php echo h($address); ?>" loading="lazy" onerror="this.closest('.listing-card').remove()">
            </a>
            <div class="listing-body">
              <div class="listing-topline">
                <strong><?php echo h(money($listing['price'] ?? null)); ?>/mo</strong>
                <span><?php echo h($listing['propertySubType'] ?? 'Rental'); ?></span>
              </div>
              <a class="listing-title" href="<?php echo h(listing_url($listing)); ?>"><?php echo h($address ?: 'Doral rental'); ?></a>
              <?php if (!empty($listing['community'])): ?>
                <div class="listing-community"><?php echo h($listing['community']); ?></div>
              <?php endif; ?>
              <div class="listing-meta">
                <span><?php echo h($listing['bedrooms'] ?? '-'); ?> bd</span>
                <span><?php echo h($listing['bathrooms'] ?? '-'); ?> ba</span>
                <?php if (!empty($listing['livingArea'])): ?><span><?php echo number_format((float) $listing['livingArea']); ?> sqft</span><?php endif; ?>
              </div>
              <div class="card-actions">
                <a href="<?php echo h(listing_url($listing)); ?>">See details</a>
                <a href="<?php echo h($phone_href); ?>">Ask about it</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <?php if (!empty($pageData['content_blocks']) || !empty($pageData['faqs'])): ?>
      <section class="guide-section">
        <?php if (!empty($pageData['content_blocks'])): ?>
          <div class="guide-grid">
            <?php foreach ($pageData['content_blocks'] as $block): ?>
              <article>
                <h2><?php echo h($block['heading']); ?></h2>
                <p><?php echo h($block['body']); ?></p>
              </article>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($pageData['related_links'])): ?>
          <div class="related-guide">
            <div>
              <h2>Keep narrowing your Doral search</h2>
              <p>Use these focused searches when bedroom count, parking, or community fit matters more than seeing every rental at once.</p>
            </div>
            <div class="related-links">
              <?php foreach ($pageData['related_links'] as $link): ?>
                <a href="<?php echo h($link['path']); ?>"><?php echo h($link['label']); ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (!empty($pageData['faqs'])): ?>
          <div class="faq-list">
            <h2>Questions renters ask</h2>
            <?php foreach ($pageData['faqs'] as $faq): ?>
              <details>
                <summary><?php echo h($faq['question']); ?></summary>
                <p><?php echo h($faq['answer']); ?></p>
              </details>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </section>
    <?php endif; ?>

    <section class="community-section">
      <div class="section-heading">
        <div>
          <h2>Doral condo communities</h2>
          <p>Start with a community you already like, or use the list to discover areas that match your commute, budget, and lifestyle.</p>
        </div>
        <a class="text-link" href="<?php echo h($phone_href); ?>">Ask where to focus</a>
      </div>
      <div class="community-links">
        <?php foreach (community_page_links($communityLandingPages) as $landing): ?>
          <a href="<?php echo h($landing['path']); ?>"><?php echo h($landing['community']['name']); ?></a>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="seo-section">
      <div>
        <h2>Doral rental searches</h2>
        <p>Choose the search that fits your move, then call or text for a focused list of places to see first.</p>
      </div>
      <div class="seo-links">
        <?php foreach (landing_page_links($landingPages) as $landing): ?>
          <a href="<?php echo h($landing['path']); ?>"><?php echo h($landing['h1']); ?></a>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="agent-section">
      <img src="/assets/images/abel.jpg" alt="Local Doral rental agent">
      <div>
        <h2>Move faster with a local Doral agent</h2>
        <p>The best rentals can go quickly. Tap once to call or text and get help with availability, pet rules, application steps, and better nearby alternatives.</p>
        <div class="hero-actions">
          <a class="button primary" href="<?php echo h($phone_href); ?>">Call now</a>
          <a class="button secondary" href="<?php echo h($sms_href); ?>">Text questions</a>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <span>Doral Rents | Local rental guidance</span>
    <a href="<?php echo h($phone_href); ?>">Call now</a>
  </footer>

  <div class="mobile-cta">
    <a href="<?php echo h($phone_href); ?>">Call now</a>
    <a href="<?php echo h($sms_href); ?>">Text</a>
  </div>
</body>
</html>
