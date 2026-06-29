<?php
// server.php - Router script for Laravel when using PHP built-in server
// Ensures proper routing of all requests to Laravel's front controller.

$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

// If the request is for an existing file in the public directory, serve it directly.
if ($uri !== '/' && file_exists(__DIR__.'/public' . $uri)) {
    return false; // Let the built-in server handle the static file.
}

// Otherwise, forward the request to Laravel.
require __DIR__.'/public/index.php';
?>
