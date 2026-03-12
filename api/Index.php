<?php

/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */

$minPhpVersion = '8.1'; // Match with your CodeIgniter setup
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;
    exit(1);
}

/*
 *---------------------------------------------------------------
 * SET PATH CONSTANTS
 *---------------------------------------------------------------
 */

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure correct working directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

/*
 *---------------------------------------------------------------
 * LOAD CONFIG & BOOTSTRAP
 *---------------------------------------------------------------
 */

// Load paths config (adjust path if your folder structure differs)
require FCPATH . '../app/Config/Paths.php';
$paths = new Config\Paths();

// Load framework bootstrap
require $paths->systemDirectory . '/Boot.php';

// Initialize CodeIgniter
exit(CodeIgniter\Boot::bootWeb($paths));
