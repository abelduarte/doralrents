<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/bridge.php';

function h($value): string { return htmlspecialchars((string) $value, ENT_QUOTES); }
function money($value): string { return $value ? '$' . number_format((float) $value) : 'Price on request'; }

$error = null;
$listing = null;
try {
    $listing = fetch_listing_detail($bridge_dataset, $bridge_server_token, $_GET);
    if (!$listing) {
        $error = 'Listing not found or no longer available.';
    }
} catch (Throwable $e) {
    $error = $e->getMessage();
}

$address = $listing ? ($listing['address'] ?? 'Doral rental listing') : 'Doral rental listing';
$photo = $listing ? listing_photo($listing, $bridge_browser_token) : null;
$title = $address . ' | Doral Rental Listing';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo h($title); ?></title>
  <meta name="description" content="View this Doral rental listing and contact Abel Duarte at 786-351-9165.">
  <link rel="stylesheet" href="/styles.css">
  <link rel="icon" href="/favicon.png">
</head>
<body>
  <header class="site-header">
    <a class="brand" href="/"><span class="brand-mark">DR</span><span>Doral Rents</span></a>
    <a class="header-call" href="<?php echo h($phone_href); ?>">Call <?php echo h($phone_number); ?></a>
  </header>
  <main class="detail-page">
    <a class="back-link" href="/">Back to Doral rentals</a>
    <?php if ($error): ?>
      <div class="alert"><?php echo h($error); ?> Call Abel at <?php echo h($phone_number); ?> for similar Doral rentals.</div>
    <?php else: ?>
      <section class="detail-hero">
        <div class="detail-photo">
          <?php if ($photo): ?><img src="<?php echo h($photo); ?>" alt="<?php echo h($address); ?>" onerror="this.parentElement.classList.add('is-empty'); this.remove()"><?php endif; ?>
        </div>
        <aside class="detail-summary">
          <h1><?php echo h($address); ?></h1>
          <div class="detail-price"><?php echo h(money($listing['price'] ?? null)); ?>/mo</div>
          <div class="listing-meta">
            <span><?php echo h($listing['bedrooms'] ?? '-'); ?> bd</span>
            <span><?php echo h($listing['bathrooms'] ?? '-'); ?> ba</span>
            <?php if (!empty($listing['livingArea'])): ?><span><?php echo number_format((float) $listing['livingArea']); ?> sqft</span><?php endif; ?>
          </div>
          <p><?php echo h($listing['remarks'] ?? 'Contact Abel for availability and showing details.'); ?></p>
          <a class="button primary wide" href="<?php echo h($phone_href); ?>">Call Abel Duarte</a>
          <a class="button secondary wide" href="<?php echo h($sms_href); ?>">Text 786-351-9165</a>
        </aside>
      </section>
    <?php endif; ?>
  </main>
  <div class="mobile-cta">
    <a href="<?php echo h($phone_href); ?>">Call Abel</a>
    <a href="<?php echo h($sms_href); ?>">Text</a>
  </div>
</body>
</html>
