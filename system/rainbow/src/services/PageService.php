<?php

namespace Rainbow\src\Services;

use Rainbow\DB;
use Rainbow\src\Objects\Page;

class PageService {

  public static function getActivePageByUri($url) {
    // getting current date to match with in the query
    $con = DB::connect();
    $date = date("Y-m-d");
    $query = 'SELECT `id` FROM Page WHERE `uri` = "' . $url . '" AND `status` = 1 AND `date_live` <= "' . $date . '"';
    $result = $con->query($query);
    if($error = $con->error) {
      die('Mysql error: ' . $error);
    }
    // if one such a page exists...
    if($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $data = new Page($row['id']);
    } else {
      $data = false;
    }
    return $data;
  }

}
