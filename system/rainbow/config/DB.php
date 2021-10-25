<?php

namespace Rainbow;

class DB {

  /**
   * Method which returns a connection object to the database.
   */
  public static function connect() {
    return new \Mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  }

}
