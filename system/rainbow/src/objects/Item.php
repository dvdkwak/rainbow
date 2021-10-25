<?php

namespace Rainbow\src\Objects;

use Rainbow\DB;
use Rainbow\src\Objects\Type;

class Item {
  
  // ** PROPERTIES **
  
  private $id;
  private $title;
  private $uri;
  private $short;
  private $body;
  private $status;
  private $singleEnabled;
  private $dateCreated;
  private $dateLive;
  private $dateDeleted;
  private $type;
  private $author;

  // ** METHODS **

  public function __construct($id = false) {
    if($id) {
      $this->getById($id);
    }
  }


  public function getById($id) {
    $con = DB::connect();
    $this->setId($id);
    $query = 'SELECT * FROM `Item` WHERE `id` = "' . $this->id . '"';
    $result = $con->query($query);
    if(!$con->error && $result->num_rows == 1) {
      $data = $result->fetch_assoc();
      // setting all properties
      $this->setTitle($data['title']);
      $this->setUri($data['uri']);
      $this->setShort($data['short']);
      $this->setBody($data['body']);
      $this->setStatus($data['status']);
      $this->setDateCreated($data['date_created']);
      $this->setDateLive($data['date_live']);
      $this->setDateDeleted($data['date_deleted']);
      $this->loadType();
      $this->setAuthor($data['FK_user_id']);
      return true;
    }
    return false;
  }

  /**
   * Loading the Type of which this Item is part of.
   */
  private function loadType() {
    $con = DB::connect();
    $query = 'SELECT `FK_type_id` FROM `Item` WHERE `id` = "' . $this->id . '"';
    $result = $con->query($query);
    if(!$con->error && $result->num_rows == 1) {
      $data = $result->fetch_assoc();
      $this->type = new Type($data['FK_type_id']);
    }
  }

  // ** GETTERS AND SETTERS **

  public function setId($id) {
    $con = DB::connect();
    $this->id = $con->real_escape_string($id);
  }

  public function id() {
    return $this->id;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function title() {
    return $this->title;
  }

  public function setUri($uri) {
    $this->uri = $uri;
  }

  public function uri() {
    return $this->uri;
  }

  public function setShort($short) {
    $this->short = $short;
  }

  public function short() {
    return $this->short;
  }

  public function setBody($body) {
    $this->body = $body;
  }

  public function body() {
    return $this->body;
  }

  public function setStatus($status) {
    $this->status = $status;
  }

  public function status() {
    return $this->status;
  }

  public function setSingleEnabled($singleEnabled) {
    $this->singleEnabled = $singleEnabled;
  }

  public function singleEnabled() {
    return $this->singleEnabled;
  }

  public function setDateCreated($dateCreated) {
    $this->dateCreated = $dateCreated;
  }

  public function dateCreated() {
    return $this->dateCreated;
  }

  public function setDateLive($dateLive) {
    $this->dateLive = $dateLive;
  }

  public function dateLive() {
    return $this->dateLive;
  }

  public function setDateDeleted($dateDeleted) {
    $this->dateDeleted = $dateDeleted;
  }

  public function dateDeleted() {
    return $this->dateDeleted;
  }

  public function setType($type) {
    $this->type = $type;
  }

  public function type() {
    return $this->type;
  }

  public function setAuthor($author) {
    $this->author = $author;
  }

  public function author() {
    return $this->author;
  }

}
