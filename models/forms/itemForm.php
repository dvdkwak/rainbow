<?php

class ItemForm {

    public function __construct() {

    } // end of construct


    /**
     * This will render the item form on screen
     */
    public function render() {
        view('forms/admin/itemForm.php');
    } // end of render


    /**
     * Method which handles the ItemForm
     * This triggers either a create or update of an item
     */
    public function handle() {
        if(isset($_POST['saveItem'])) {
            echo "<pre>";
            var_dump($_POST);
            echo "</pre>";
        }
        return null;
    } // end of handle

} // end of class