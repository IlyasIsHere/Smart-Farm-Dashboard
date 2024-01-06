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

    // Delete a farm by ID
    public function deleteFarm($farmID) {
        $stmt = $this->db->prepare("DELETE FROM Farm WHERE farmID = ?");
        $stmt->bind_param("i", $farmID);

        if ($stmt->execute()) {
            // Successfully deleted
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Update farm name by ID
    public function updateFarmName($farmID, $name) {
        $stmt = $this->db->prepare("UPDATE Farm SET name = ? WHERE farmID = ?");
        $stmt->bind_param("si", $name, $farmID);

        if ($stmt->execute()) {
            // Successfully updated
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Update farm localisation by ID
    public function updateFarmLocalisation($farmID, $latitude, $longitude) {
        $stmt = $this->db->prepare("UPDATE Farm SET latitude = ?, longitude = ? WHERE farmID = ?");
        $stmt->bind_param("ddi", $latitude, $longitude, $farmID);

        if ($stmt->execute()) {
            // Successfully updated
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Update farm owner by ID
    public function updateFarmOwner($farmID, $ownerName) {
        $stmt = $this->db->prepare("UPDATE Farm SET ownerName = ? WHERE farmID = ?");
        $stmt->bind_param("si", $ownerName, $farmID);

        if ($stmt->execute()) {
            // Successfully updated
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Get all farms
    public function getAllFarms() {
        $result = $this->db->query("SELECT * FROM Farm");

        $farms = array();

        while ($row = $result->fetch_assoc()) {
            $farms[] = new Farm($row['farmID'], $row['name'], $row['ownerName'], $row['email'], $row['phoneNum'], $row['latitude'], $row['longitude']);
        }

        return $farms;
    }
}

?>
