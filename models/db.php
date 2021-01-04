<?php

/**
 * db object is a starter object which is used to create the database connection
 */

class db extends Mysqli {

  public function __construct() {
    @parent::__construct(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
  }

}