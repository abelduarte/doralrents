<?php

function listing_token(array $listing): string
{
    foreach (['id', 'ListingKey', 'ListingId', 'ListingKeyNumeric'] as $key) {
        if (!empty($listing[$key])) {
            return (string) $listing[$key];
        }
    }
    return '';
}

function listing_url(array $listing): string
{
    $params = $listing['query'] ?? [];
    if (empty($params)) {
        $token = listing_token($listing);
        if ($token) {
            $params['id'] = $token;
        }
    }
    return '/listing.php?' . http_build_query($params);
}

function listing_photo(array $listing, string $browserToken): ?string
{
    if (!empty($listing['photo'])) {
        return $listing['photo'];
    }
    if (!empty($listing['photos'][0])) {
        return $listing['photos'][0];
    }
    return null;
}

function drg_api_get(string $path, array $params = []): array
{
    global $drg_api_base, $drg_api_access_token;
    $url = rtrim($drg_api_base, '/') . '/' . ltrim($path, '/');
    if (!empty($params)) {
        $url .= '?' . http_build_query($params);
    }
    $ch = curl_init($url);
    $headers = ['Accept: application/json'];
    if ($drg_api_access_token !== '') {
        $headers[] = 'X-DRG-API-Key: ' . $drg_api_access_token;
    }
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 12,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTPHEADER => $headers,
    ]);
    $raw = curl_exec($ch);
    $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    if ($raw === false) {
        throw new RuntimeException('Duarte Realty API request failed: ' . $error);
    }
    $decoded = json_decode($raw, true);
    if (!is_array($decoded)) {
        throw new RuntimeException('Duarte Realty API returned invalid JSON.');
    }
    if ($status >= 400 || isset($decoded['error'])) {
        throw new RuntimeException('Duarte Realty API error (' . $status . '): ' . ($decoded['error'] ?? 'Unexpected API error.'));
    }
    return $decoded;
}

function fetch_bridge_listings(string $dataset, string $serverToken, array $filters, int $limit = 12, int $offset = 0): array
{
    $response = drg_api_get('/rentals.php', [
        'q' => $filters['q'] ?? 'doral',
        'kind' => $filters['kind'] ?? '',
        'min_price' => $filters['min_price'] ?? '',
        'max_price' => $filters['max_price'] ?? '',
        'beds' => $filters['beds'] ?? '',
        'baths' => $filters['baths'] ?? '',
        'limit' => $limit,
        'offset' => $offset,
    ]);
    return $response['listings'] ?? [];
}

function fetch_listing_detail(string $dataset, string $serverToken, array $ids): ?array
{
    $response = drg_api_get('/listing.php', array_intersect_key($ids, array_flip(['id', 'key', 'listingId', 'idnum'])));
    return $response['listing'] ?? null;
}
