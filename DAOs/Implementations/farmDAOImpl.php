<?php

class FarmDAO implements FarmDAOInterface {
    private $db;

    // Constructor
    public function __construct(DatabaseConnection $dbConnection) {
        $this->db = $dbConnection->getConnection();
    }

    // Save or update a farm in the database
    public function saveFarm(Farm $farm) {
        $stmt = $this->db->prepare("INSERT INTO Farm (farmID, name, ownerName, email, phoneNum, latitude, longitude) VALUES (?, ?, ?, ?, ?, ?, ?) 
        ON DUPLICATE KEY UPDATE name = VALUES(name), ownerName = VALUES(ownerName), email = VALUES(email), phoneNum = VALUES(phoneNum), latitude = VALUES(latitude), longitude = VALUES(longitude)");

        $stmt->bind_param("issssss", $farm->getFarmID(), $farm->getName(), $farm->getOwnerName(), $farm->getEmail(), $farm->getPhoneNum(), $farm->getLatitude(), $farm->getLongitude());

        if ($stmt->execute()) {
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Get farm by ID
    public function getFarmByID($farmID) {
        $stmt = $this->db->prepare("SELECT * FROM Farm WHERE farmID = ?");
        $stmt->bind_param("i", $farmID);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Farm($row['farmID'], $row['name'], $row['ownerName'], $row['email'], $row['phoneNum'], $row['latitude'], $row['longitude']);
        } else {
            return null; // Farm not found
        }
    }

    // TO DO: Additional methods
}

?>
