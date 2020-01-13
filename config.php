<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('REQUIRE_PATH', __DIR__ .'/');
define('SITE', 'http://localhost/torrent/');
define('RES_PATH', SITE .'public/');

include 'vendor/wilkins/composer-file-loader/src/PackageLoader.php';

use Wilkins\PackageLoader\PackageLoader;

$loader = new PackageLoader();
$loader->load(REQUIRE_PATH);