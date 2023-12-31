<?php
require_once(__DIR__ . '/../Interfaces/cropDAO.php');
require_once(__DIR__ . '/../../crop.php');

class CropDAO implements CropDAOInterface {
    private $db;

    // Constructor
    public function __construct(DatabaseConnection $dbConnection) {
        $this->db = $dbConnection->getConnection();
    }

    // Save or update a crop in the database
    public function saveCrop(Crop $crop) {
        $stmt = $this->db->prepare("INSERT INTO Crop (cropID, cropType, cropBestCondition) VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE cropType = VALUES(cropType), cropBestCondition = VALUES(cropBestCondition)");

        $stmt->bind_param("iss", $crop->getCropID(), $crop->getCropType(), $crop->getCropBestCondition());

        if ($stmt->execute()) {
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Get crop by ID
    public function getCropByID($cropID) {
        $stmt = $this->db->prepare("SELECT * FROM Crop WHERE cropID = ?");
        $stmt->bind_param("i", $cropID);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new Crop($row['cropID'], $row['cropType'], $row['cropBestCondition']);
        } else {
            return null; // Crop not found
        }
    }

    // Delete a crop by ID
    public function deleteCrop($cropID) {
        $stmt = $this->db->prepare("DELETE FROM Crop WHERE cropID = ?");
        $stmt->bind_param("i", $cropID);

        if ($stmt->execute()) {
            // Successfully deleted
            return true;
        } else {
            // TO DO: Handle error

            return false;
        }
    }

    // Helper method to get weather and soil data by condition ID
    private function getWeatherSoilDataByConditionID($conditionID) {
        $stmt = $this->db->prepare("SELECT * FROM WeatherSoilData WHERE dataID = ?");
        $stmt->bind_param("i", $conditionID);

        $stmt->execute();
        $result = $stmt->get_result();

        $weatherSoilData = [];

        while ($row = $result->fetch_assoc()) {
            $weatherSoilData[] = new WeatherSoilData(
                $row['dataID'], $row['sensorID'], $row['timestamp'],
                $row['temperature'], $row['precipitation'], $row['windSpeed'],
                $row['humidity'], $row['pHLevel'], $row['nutrientContent'], $row['moistureLevel']
            );
        }

        return $weatherSoilData;
    }

    // Get crop conditions by ID
    public function getCropConditions($cropID) {
        // Assuming crop's best condition ID is stored in the Crop table
        $stmt = $this->db->prepare("SELECT cropBestCondition FROM Crop WHERE cropID = ?");
        $stmt->bind_param("i", $cropID);

        $stmt->execute();
        $stmt->bind_result($cropBestCondition);

        $conditions = [];

        if ($stmt->fetch()) {
            $conditions = $this->getWeatherSoilDataByConditionID($cropBestCondition);
        }

        return $conditions;
    }

    // Update crop conditions by ID
    public function updateCropConditions($cropID, $newCropConditions) {
        // TO DO: Implement logic
    }

    // Update crop distribution by ID
    public function updateCropDistribution($cropID, $newCropDistribution) {
        // TO DO: Implement logic
    }

    // Get crop distribution by ID
    public function getCropDistribution($cropID) {
        // TO DO: Implement logic to get crop distribution
        // Return a map
    }

    // Get all crops
    public function getAllCrops() {
        $result = $this->db->query("SELECT * FROM Crop");

        $crops = array();

        while ($row = $result->fetch_assoc()) {
            $crops[] = new Crop($row['cropID'], $row['cropType'], $row['cropBestCondition']);
        }

        return $crops;
    }
}

?>
