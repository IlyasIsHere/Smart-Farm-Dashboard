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

    // TO DO: Additional methods
}


?>
