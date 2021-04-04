<?php

$pageTitle = "Admin | Page";

// retrieving the top 20 pages
$pageController = new PageController();
$pages = $pageController->getAll(20);

// if no items retrieved, pass an array to display an error
if(!$pages) {
    $pages = [];
}