<?php

namespace Rainbow\src\Objects;

use Rainbow\DB;
use Rainbow\src\Objects\Item;
use Rainbow\src\Services\ItemService;

class Page {

  // ** PROPERTIES **
  private $id;
  private $metaTitle;
  private $metaDescription;
  private $metaKeywords;
  private $uri;
  private $status;
  private $dateCreated;
  private $dateLive;
  private $dateDeleted;
  private $coat;
  private $items;

  // ** METHODS **

  public function __construct($id = false) {
    if($id) {
      $this->getById($id);
    }
  }

  public function getById($id) {
    $con = DB::connect();
    $this->setId($id);
    $query = 'SELECT * FROM `Page` WHERE `id` = "' . $this->id . '"';
    $result = $con->query($query);
    if(!$con->error && $result->num_rows == 1) {
      $data = $result->fetch_assoc();
      // setting all properties
      $this->setMetaTitle($data['meta_title']);
      $this->setMetaDescription($data['meta_description']);
      $this->setMetaKeywords($data['meta_keywords']);
      $this->setUri($data['uri']);
      $this->setStatus($data['status']);
      $this->setDateCreated($data['date_created']);
      $this->setDateLive($data['date_live']);
      $this->setDateDeleted($data['date_deleted']);
      $this->setCoat($data['FK_coat_id']);
      $this->loadItems();
      return true;
    }
    return false;
  }


  /**
   * Method to load all active items which are part of this object.
   */
  private function loadItems() {
    $this->items = ItemService::getActiveItemsByPage($this);
  } // end of loadItems


  /**
   * This loads all items which are connected to this object.
   */
  private function loadAllItems() {
    $con = DB::connect();
    $query = 'SELECT `FK_item_id` FROM `Page_has_Item` WHERE `FK_page_id` = "' . $this->id() . '"';
    $result = $con->query($query);
    if(!$con->error && $result->num_rows >= 1) {
      while($row = $result->fetch_assoc()) {
        $items[] = new Item($row['FK_item_id']);
      }
      $this->items = $items;
    }
  } // end of loadAllItems

  // ** GETTERS AND SETTERS **

  public function setId($id) {
    $this->id = $id;
  }

  public function id() {
    return $this->id;
  }

  public function setMetaTitle($metaTitle) {
    $this->metaTitle = $metaTitle;
  }

  public function metaTitle() {
    return $this->metaTitle;
  }

  public function setMetaDescription($meta_description) {
    $this->metaDescription = $meta_description;
  }

  public function metaDescription() {
    return $this->metaDescription;
  }

  public function setMetaKeywords($meta_keywords) {
    $this->metaKeywords = $meta_keywords;
  }

  public function metaKeywords() {
    return $this->metaKeywords;
  }

  public function setUri($uri) {
    $this->uri = $uri;
  }

  public function uri() {
    return $this->uri;
  }

  public function setStatus($status) {
    $this->status = $status;
  }

  public function status() {
    return $this->status;
  }

  public function setDateCreated($dateCreated) {
    $this->setDateCreated = $dateCreated;
  }

  public function dateCreated() {
    return $this->dateCreated;
  }

  public function setDateLive($dateLive) {
    $this->setDateLive = $dateLive;
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

  public function setCoat($coat) {
    $this->coat = $coat;
  }

  public function coat() {
    return $this->coat;
  }

  public function setItems($items) {
    $this->items = $items;
  }

  public function items() {
    return $this->items;
  }

}
