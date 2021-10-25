<?php

/**
 * SYSTEM FILE, DONT TOUCH THIS!
 */

// Including the main configuration file
include_once "system/config/config.php";
$route = new Route;

// including all routes
include_once ROOT . "routes.php";

// Here the page will be generated
$page = $route->createPage(URL_PARAMS, URL);

// if the page is a rainbow page, use the rainbow pageBuilder
if(isset($page['rainbow']) && $page['rainbow']) {
    // Page is the main object of Rainbow Page :D
    $Page = $page['page'];
    include_once \Rainbow\RainbowService::generatePage();
}

// including the right controller if set
if(isset($page['controller']) && !empty($page['controller'])) {
    include_once ROOT . "controllers/" . $page['controller'];
}

// including the right view and showing it if set
if(isset($page['view']) && !empty($page['view'])){
    include_once ROOT."views/".$page['view'];
}
