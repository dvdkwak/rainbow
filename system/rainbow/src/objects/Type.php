<?php

namespace Rainbow\src\Objects;

use Rainbow\DB;

class Type {

  // ** PROPERTIES **

  private $id;
  private $name;
  private $description;

  // ** METHODS **

  public function __construct($id = false) {
    if($id) {
      $this->getById($id);
    }
  }

  /**
   * Getting all data by the given id.
   */
  public function getById($id) {
    $this->setId($id);
    $con = DB::connect();
    $query = 'SELECT * FROM `Type` WHERE `id` = "' . $this->id . '"';
    $result = $con->query($query);
    if(!$con->error && $result->num_rows == 1) {
      $data = $result->fetch_assoc();
      $this->setName($data['name']);
      $this->setDescription($data['description']);
    }
  } // end of getByID

  // ** GETTERS AND SETTERS **

  public function setId($id) {
    $id = DB::connect()->real_escape_string($id);
    $this->id = $id;
  }

  public function id() {
    return $this->id;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function name() {
    return $this->name;
  }

  public function setDescription($description) {
    $this->description = $description;
  }

  public function description() {
    return $this->description;
  }

}
