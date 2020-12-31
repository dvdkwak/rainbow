<?php


/**
 * This function will return a link which can be used to get items from the views folder
 * @param link[string] This is the link where the system will reffer to when loading a view (images etc)
 * @param linkOnly[boolean] This determines wether a link should be returned or if a file should be included
 * @return string
 */
function view($link, $linkOnly = False) {
    // check the value of DIRECTORY, if this has no value, remove all the "/" before
    if(DIRECTORY === "/" || empty(DIRECTORY)) {
        $link = ROOT . "/views/" . $link;
    } else {
        $link = ROOT . "/" . DIRECTORY . "/views/" . $link;
    }
    if($linkOnly) {
        return $link;
    }
    include_once $link;
}