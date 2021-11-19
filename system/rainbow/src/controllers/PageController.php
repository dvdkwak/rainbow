<?php

namespace Rainbow\src\Controllers;

use Rainbow\src\Services\PageService;

class PageController {

  /**
   * This method gets called to setup the right methods in order to handle whatever has to do with page.
   * It generates the page overview and
   * It generates the new page tab.
   */
  public static function init($request = null) {
    switch($request) {
      case 'new':
        $data = "";
        self::handleCreatePage();
        include_once ROOT . "/system/rainbow/views/admin/newPage.php";
        break;
      default:
        $data = PageService::getAllPages();
        include_once ROOT . "/system/rainbow/views/admin/page.php";
        break;
    }
    return $data;
  } // end of init

  /**
   * This method handles the post request on creating a new page.
   */
  private static function handleCreatePage() {
    if(!isset($_POST['test'])) {
      return false;
    }
    // checking wether minimal data is set
    if(empty($_POST['body']) || empty($_POST['metaTitle'])) {
      return false;
    }
    return true;
  } // end of handleCreatePage

}
