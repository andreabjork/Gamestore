<?php
header('Content-Type: text/html; charset=utf-8');

// Things we might want to change
const DEBUG = true;
const CACHE_TIME = 600;
const CACHE_FS = 'cache/';
const WS_URL = 'http://apis.is/concerts';

if (DEBUG) {
	ini_set('display_errors', 1);
	error_reporting(~0);
}
/*
// Our dependencies
$logger = require('log.php');
require('cache.php');
require('product.class.php');

$cache = new Cache(60);

// Track how long we're doing all of this
$logger->Log("Starting");

$rest = new RestClient($cache, $logger);

try {
	$data = $rest->Request(WS_URL, 'GET', true);
}
catch (Exception $e) {
	// make sure the view can handle a false $data
	$data = false;
}
*/
include('views/header.php');
include('views/page.php');
include('views/footer.php');
/*
// How long have been?
$logger->Log("Finished!");
*/
if (DEBUG) {
	include('views/debug.php');
}

