<?php

class FieldDAO implements FieldDAOInterface {
    private $db;

    // Constructor
    public function __construct(DatabaseConnection $dbConnection) {
        $this->db = $dbConnection->getConnection();
    }

    // Save or update a field in the database
    public function saveField(Field $field) {
        $stmt = $this->db->prepare("INSERT INTO Field (fieldID, area, longitude, latitude, farmID) VALUES (?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE area = VALUES(area), longitude = VALUES(longitude), latitude = VALUES(latitude), farmID = VALUES(farmID)");

        $stmt->bind_param("idddi", $field->getFieldID(), $field->getArea(), $field->getLongitude(), $field->getLatitude(), $field->getFarmID());

        if ($stmt->execute()) {
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Get field by ID
    public function getFieldByID($fieldID) {
        $stmt = $this->db->prepare("SELECT * FROM Field WHERE fieldID = ?");
        $stmt->bind_param("i", $fieldID);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Field($row['fieldID'], $row['area'], $row['longitude'], $row['latitude'], $row['farmID']);
        } else {
            return null; // Field not found
        }
    }

    // Delete a field by ID
    public function deleteField($fieldID) {
        $stmt = $this->db->prepare("DELETE FROM Field WHERE fieldID = ?");
        $stmt->bind_param("i", $fieldID);

        if ($stmt->execute()) {
            // Successfully deleted
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Get crops associated with a field by ID
    public function getFieldCrops($fieldID) {
        // TO DO: Implement logic to get crops associated with the field
        // Return a map
    }

    // Update crops associated with a field by ID
    public function updateFieldCrops($fieldID, $cropsArea) {
        // TO DO: Implement logic to update crops associated with the field
    }

    // Update field area by ID
    public function updateFieldArea($fieldID, $newArea) {
        $stmt = $this->db->prepare("UPDATE Field SET area = ? WHERE fieldID = ?");
        $stmt->bind_param("di", $newArea, $fieldID);

        if ($stmt->execute()) {
            // Successfully updated
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Get all fields
    public function getAllFields() {
        $result = $this->db->query("SELECT * FROM Field");

        $fields = array();

        while ($row = $result->fetch_assoc()) {
            $fields[] = new Field($row['fieldID'], $row['area'], $row['longitude'], $row['latitude'], $row['farmID']);
        }

        return $fields;
    }
}


?>
