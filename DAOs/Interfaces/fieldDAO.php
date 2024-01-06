<?php

interface FieldDAOInterface {
    // Save or update a field in the database
    public function saveField(Field $field);

    // Get field by ID
    public function getFieldByID($fieldID);

    // TO DO: Additional methods
}

?>
