<?php

/**
 * Item is the main object within this project
 * Properties:
 * - ID
 * - Title
 * - Uri
 * - Short
 * - Content
 * - Author
 * - Tags
 * - Keywords
 * - Active
 * - Deleted
 * - Date_Created
 * - Date_Live
 * - Date_Deleted
 */

class Item {

    public $id;
    public $title;
    public $uri;
    public $keywords;
    public $short;
    public $content;
    public $active;
    public $deleted;
    public $dateCreated;
    public $dateLive;
    public $dateDeleted;
    public $tags;
    public $author;


    /**
     * @param ID[integer] Optional, can be passed to get item by id
     * @return boolean
     */
    public function __construct($id = null) {
        if(isset($id) && !empty($id)) {
            return $this->getById($id);
        }
    } // end of construct


    /**
     * @param ID[integer] The id to get the item
     * @return boolean True on succes, False on Failure
     */
    public function getById($id) {
        if(!isset($id) || empty($id)) {
            return False; // id has not been given
        }
        $conn = new db();
        $this->id = $conn->real_escape_string($id);
        $sql = "SELECT * FROM `Item` WHERE `ID` = '$id'";
        $result = $conn->query($sql);
        if(!$result || $result->num_rows != 1) {
            return False; // No data gained from set id
        }
        $data = $result->fetch_assoc();
        $this->title = $data['Title'];
        $this->uri = $data['Uri'];
        $this->keywords = $data['Keywords'];
        $this->short = $data['Short'];
        $this->content = $data['Content'];
        $this->active = $data['Active'];
        $this->deleted = $data['Deleted'];
        $this->dateCreated = $data['Date_Created'];
        $this->dateLive = $data['Date_Live'];
        $this->dateDeleted = $data['Date_Deleted'];
        $this->author = $data['FK_Author_ID'];
        return True;
    } // end of getById


    public function create() {
        $conn = new db();
        $query = "INSERT INTO `Item`
                       VALUES (``)";
    }

}