<?php

namespace Rainbow\src\Services;

use Rainbow\DB;
use Rainbow\src\Objects\Item;

class ItemService {

  /**
   * This returns all items which are connected to the given page, active and the date of live is passed.
   */
  public static function getActiveItemsByPage($page) {
    // getting current date to match with in the query
    $con = DB::connect();
    $date = date("Y-m-d");
    $query = 'SELECT `Item`.`id` 
                FROM `Item` 
                JOIN `Page_has_Item` 
                  ON `Page_has_Item`.`FK_item_id` = `Item`.`id` 
               WHERE `Item`.`status` = 1 
                 AND `Item`.`date_live` <= "' . $date . '"
                 AND `Page_has_Item`.`FK_page_id` = "' . $page->id() . '"';
    $result = $con->query($query);
    if($error = $con->error) {
      die('Mysql error: ' . $error);
    }
    // if one or more such item(s) exists...
    if($result->num_rows >= 1) {
      while($row = $result->fetch_assoc()) {
        $data[] = new Item($row['id']);
      }
    } else {
      $data = false;
    }
    return $data;
  } // end of getActiveItemsByPage

}
