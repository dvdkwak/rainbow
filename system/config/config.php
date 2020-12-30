<?php

// Setting the global url variable
if(!empty($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "home";
}

// setting the $urlParams variable
$urlParams = explode("/", trim($url, "/"));

// Defining the global variable url
define("URL", $url);

// Defining the global variable $urlParams
define("URL_PARAMS", $urlParams);

// including the settings from the local config file
// path is directly to config because this file is included to the index as well
include_once "config.php";

// Defining the root folder
$root = $_SERVER['DOCUMENT_ROOT'];
if(!empty(DIRECTORY) && DIRECTORY !== "/") {
    $root .= "/" . DIRECTORY . "/";
} else {
    $root .= "/";
}
define("ROOT", $root);

// setting the php error logging according to the 'DEBUGMODE'
if(DEBUGMODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

// Basic includes and running autoloader
include_once ROOT . "system/functions/asset.php";
include_once ROOT . "system/functions/autoloader.php";
