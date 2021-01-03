<?php

// ____________________________ THE ROUTES _________________________________

/**
 * In this area you add extra routes to your application, these routes look like:
 * $route->add('uri', 'view', 'controller');
 */

$route->add('admin', 'admin/home.php', 'admin/home.php');

// admin routes
$route->add('admin/page', 'admin/page.php', 'admin/page.php');
$route->add('admin/item', 'admin/item.php');

// _________________________________________________________________________