<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/seo.php';
require_once __DIR__ . '/includes/bridge.php';

$pageData = current_landing_page($landingPages);
$filters = array_merge($pageData['query'], [
    'q' => $_GET['q'] ?? ($pageData['query']['q'] ?? 'doral'),
    'kind' => $_GET['kind'] ?? ($pageData['query']['kind'] ?? ''),
    'min_price' => $_GET['min_price'] ?? ($pageData['query']['min_price'] ?? ''),
    'max_price' => $_GET['max_price'] ?? '',
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
    $idxError = 'PHP cURL is not enabled.';
}

function h($value): string { return htmlspecialchars((string) $value, ENT_QUOTES); }
function money($value): string { return $value ? '$' . number_format((float) $value) : 'Price on request'; }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo h($pageData['title']); ?></title>
  <meta name="description" content="<?php echo h($pageData['description']); ?>">
  <link rel="canonical" href="https://<?php echo h($site_domain . $pageData['path']); ?>">
  <link rel="icon" href="/favicon.ico" sizes="any">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16.png">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
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
    </nav>
    <a class="header-call" href="<?php echo h($phone_href); ?>">Call <?php echo h($phone_number); ?></a>
  </header>

  <main>
    <section class="hero">
      <div class="hero-copy">
        <h1><?php echo h($pageData['h1']); ?></h1>
        <p><?php echo h($pageData['intro']); ?> Call or text Abel Duarte when a listing looks close, and he can help confirm availability before you waste a showing.</p>
        <div class="hero-actions">
          <a class="button primary" href="<?php echo h($phone_href); ?>">Call Abel</a>
          <a class="button secondary" href="<?php echo h($sms_href); ?>">Text 786-351-9165</a>
        </div>
      </div>
      <form class="search-panel" method="get" action="/">
        <label>
          <span>Location</span>
          <input name="q" value="<?php echo h($filters['q']); ?>" placeholder="Doral, 33178, building name">
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
          <span>Beds</span>
          <select name="beds">
            <option value="">Any</option>
            <?php for ($i = 1; $i <= 4; $i++): ?>
              <option value="<?php echo $i; ?>" <?php echo (string) $filters['beds'] === (string) $i ? 'selected' : ''; ?>><?php echo $i; ?>+</option>
            <?php endfor; ?>
          </select>
        </label>
        <button type="submit">Search Doral Rentals</button>
      </form>
    </section>

    <section class="results-section" id="listings">
      <div class="section-heading">
        <div>
          <h2>Available rental listings</h2>
          <p>Updated from the IDX feed. Photos and availability can change quickly.</p>
        </div>
        <a class="text-link" href="<?php echo h($phone_href); ?>">Ask Abel what is still available</a>
      </div>

      <?php if ($idxError): ?>
        <div class="alert"><?php echo h($idxError); ?> Add Bridge credentials in `config.local.php` or GitHub Secrets to show live listings.</div>
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
                <a href="<?php echo h(listing_url($listing)); ?>">Details</a>
                <a href="<?php echo h($phone_href); ?>">Call Abel</a>
              </div>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="community-section">
      <div class="section-heading">
        <div>
          <h2>Doral condo communities</h2>
          <p>Community pages are based on the subdivision names currently appearing in the rental feed.</p>
        </div>
        <a class="text-link" href="<?php echo h($phone_href); ?>">Ask for a short list</a>
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
        <p>Start with the page that matches how you are searching, then call or text when you want availability checked.</p>
      </div>
      <div class="seo-links">
        <?php foreach (landing_page_links($landingPages) as $landing): ?>
          <a href="<?php echo h($landing['path']); ?>"><?php echo h($landing['h1']); ?></a>
        <?php endforeach; ?>
      </div>
    </section>

    <section class="agent-section">
      <img src="/assets/images/abel.jpg" alt="Abel Duarte">
      <div>
        <h2>Tour faster with Abel Duarte</h2>
        <p>For Doral rentals, speed matters. Tap once to call or text Abel at <?php echo h($phone_number); ?> and ask about current availability, pet rules, application requirements, or nearby alternatives.</p>
        <div class="hero-actions">
          <a class="button primary" href="<?php echo h($phone_href); ?>">Call Abel</a>
          <a class="button secondary" href="<?php echo h($sms_href); ?>">Text Abel</a>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <span>Doral Rents by Abel Duarte, Licensed Real Estate Broker</span>
    <a href="<?php echo h($phone_href); ?>"><?php echo h($phone_number); ?></a>
  </footer>

  <div class="mobile-cta">
    <a href="<?php echo h($phone_href); ?>">Call Abel</a>
    <a href="<?php echo h($sms_href); ?>">Text</a>
  </div>
</body>
</html>
