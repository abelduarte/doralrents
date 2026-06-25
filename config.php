<?php

$site_name = 'Doral Rents';
$site_domain = 'doralrents.com';
$agent_name = 'Abel Duarte';
$phone_number = '786-351-9165';
$phone_href = 'tel:17863519165';
$sms_href = 'sms:17863519165';
$contact_email = 'abel@duarterealtygroup.com';
$drg_api_base = getenv('DRG_API_BASE') ?: 'https://duarterealtygroup.com/api';
$drg_api_access_token = getenv('DRG_API_ACCESS_TOKEN') ?: '';

$bridge_client_id = getenv('BRIDGE_CLIENT_ID') ?: '';
$bridge_client_secret = getenv('BRIDGE_CLIENT_SECRET') ?: '';
$bridge_server_token = getenv('BRIDGE_SERVER_TOKEN') ?: '';
$bridge_browser_token = getenv('BRIDGE_BROWSER_TOKEN') ?: '';
$bridge_dataset = getenv('BRIDGE_DATASET') ?: '';

$sendgrid_api_key = getenv('SENDGRID_API_KEY') ?: '';
$sendgrid_from_email = getenv('SENDGRID_FROM_EMAIL') ?: 'leads@duarterealtygroup.com';
$sendgrid_from_name = getenv('SENDGRID_FROM_NAME') ?: 'Doral Rents';

if (file_exists(__DIR__ . '/config.local.php')) {
    require_once __DIR__ . '/config.local.php';
}
