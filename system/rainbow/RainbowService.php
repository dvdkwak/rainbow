<?php

namespace Rainbow;

use Rainbow\src\Controllers\PageController;
use Rainbow\src\Services\PageService;
use Rainbow\DB;

class RainbowService {

  /**
   * This method handles the page building as meant by rainbow.
   */
  public static function createPage($urlParams, $url) {
    // if the first url Param is 'admin' then we need the Rainbow Admin page builder.
    if($urlParams[0] == "admin") {
      self::generateAdminPage($urlParams);
      $data = [
        'rainbow' => 'true',
        'page' => '',
      ];
      return $data;
    } // createPage

    // Selecting the page and/or items which are allocated to this url.
    $con = DB::connect();
    $url = $con->real_escape_string($url);

    // getting the active page by url if exists.
    if(!$page = PageService::getActivePageByUri($url)) {
      $data = false;
    } else {
      $data = [
        'rainbow' => 'true',
        'page' => $page,
      ];
    }

    // returning the data
    return $data;
  } // end of createPage


  /**
   * Method to generate a rainbow page. This will return the paths which need to be loaded.
   * The path is built up by the connected coat of the page.
   */
  public static function generatePage() {
    // loading the default index.php
    return ROOT . "/system/rainbow/views/index.php";
  } // end of generatePage


  /**
   * Method to show the right admin page.
   */
  private static function generateAdminPage($urlParams) {
    if(count($urlParams) >= 2) {
      switch ($urlParams[1]) {
        case 'page':
          include_once ROOT . "/system/rainbow/src/controllers/PageController.php";
          if(count($urlParams) >= 3 && $urlParams[2] != "new") {
            $request = $urlParams[2];
          } elseif(count($urlParams) >= 3 && $urlParams[2] == "new") {
            $request = "new";
          } else {
            $request = "";
          }
          $data = PageController::init($request);
          break;
      }
    } else {
      include_once ROOT . "/system/rainbow/views/admin/index.php";
    }
  } // end of generateAdminPage

}
