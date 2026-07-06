<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/seo.php';

$output = __DIR__ . '/../sitemap.xml';
$xml = new XMLWriter();
$xml->openMemory();
$xml->setIndent(true);
$xml->setIndentString('  ');
$xml->startDocument('1.0', 'UTF-8');
$xml->startElement('urlset');
$xml->writeAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

foreach ($landingPages as $page) {
    if (!empty($page['not_found'])) {
        continue;
    }
    $xml->startElement('url');
    $xml->writeElement('loc', canonical_url($page['path']));
    $xml->writeElement('lastmod', $sitemap_lastmod);
    $xml->endElement();
}

$xml->endElement();
$xml->endDocument();

file_put_contents($output, $xml->outputMemory());
