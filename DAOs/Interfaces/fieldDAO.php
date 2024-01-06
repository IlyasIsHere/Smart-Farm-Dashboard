<?php

interface FieldDAOInterface {
    // Save or update a field in the database
    public function saveField(Field $field);

    // Get field by ID
    public function getFieldByID($fieldID);

    // Delete a field by ID
    public function deleteField($fieldID);

    // Get crops associated with a field by ID
    public function getFieldCrops($fieldID);

    // Update crops associated with a field by ID
    public function updateFieldCrops($fieldID, $cropsArea);

    // Update field area by ID
    public function updateFieldArea($fieldID, $newArea);

    // Get all fields
    public function getAllFields();
}

?>
