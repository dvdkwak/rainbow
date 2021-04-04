<?php

$pageTitle = "admin | items";

// retrieving the top 20 items
$itemController = new ItemController();
$items = $itemController->getAll(20);

// if no items retrieved, pass an array to display an error
if(!$items) {
    $items = [];
}