<?php

// ____________________________ THE ROUTES _________________________________

/**
 * In this area you add extra routes to your application, these routes look like:
 * $route->add('uri', 'view', 'controller');
 */

$route->add('admin', 'admin/home.php', 'admin/home.php');

// admin routes
$route->add('admin/page', 'admin/page.php', 'admin/page.php');
$route->add('admin/item', 'admin/item.php', 'admin/item.php');
$route->add('admin/author', 'admin/author.php', 'admin/author.php');

// Rainbow routes
$route->add('item/{itemId}', 'item.php', 'item.php');

// _________________________________________________________________________