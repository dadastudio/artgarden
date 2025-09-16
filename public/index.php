<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
	require $maintenance;
}
$customTmp = '/home/serwer2529539/tmp';
if (is_dir($customTmp)) {
	putenv("TMP=$customTmp");
	putenv("TEMP=$customTmp");
	putenv("TMPDIR=$customTmp");
	// UWAGA: upload_tmp_dir jest SYSTEM i nie nadpiszemy go ini_setem,
	// ale gdy pozostaje puste, PHP używa sys_get_temp_dir(),
	// czyli trafi do $customTmp ustawionego powyżej.
}
// Register the Composer autoloader...
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__ . '/../bootstrap/app.php';

$app->handleRequest(Request::capture());
