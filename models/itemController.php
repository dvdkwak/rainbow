<?php

class ItemController {

    /**
     * @param limit[integer] Number of items you want to retrieve maximum
     * @param offset[integer] Number of items to skip in the table
     * @return mixed False on failure, otherwise array with data
     */
    public function getAll($limit = 20, $offset = 0) {
        $conn = new db();
        $sql = "SELECT `ID` FROM `Item` WHERE `Page` = 0 LIMIT $limit OFFSET $offset";
        $result = $conn->query($sql);
        if(!$result || $result->num_rows == 0) {
            if(DEBUGMODE) {
                echo "Error: " . $conn->error;
            }
            return False; // No results
        }
        while($row = $result->fetch_assoc()) {
            $data[] = new Item($row['ID']);
        }
        return $data;
    } // end of getAll

} // end of class