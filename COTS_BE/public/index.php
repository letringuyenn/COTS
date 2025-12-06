<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// --- Simple CORS handling for local dev ---
// Allow the Vite dev server origin and echo the Origin header when credentials are used.
$origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';
$allowed = [
    'http://localhost:5173',
    'http://127.0.0.1:5173',
    'http://localhost:3000',
];
if (in_array($origin, $allowed)) {
    header('Access-Control-Allow-Origin: ' . $origin);
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Accept, Origin, Authorization, X-XSRF-TOKEN');
}

// Handle preflight requests and exit early
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // return 200 with CORS headers
    http_response_code(200);
    exit(0);
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

$app->handleRequest(Request::capture());
