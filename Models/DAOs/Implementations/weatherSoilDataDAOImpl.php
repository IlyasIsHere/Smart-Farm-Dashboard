<?php
require_once(__DIR__ . '/../Interfaces/weatherSoilDataDAO.php');
require_once(__DIR__ . '/../../weatherSoilData.php');

class WeatherSoilDataDAO implements WeatherSoilDataDAOInterface {
    private $db;

    // Constructor
    public function __construct(DatabaseConnection $dbConnection) {
        $this->db = $dbConnection->getConnection();
    }

    // Save or update weather and soil data in the database
    public function saveWeatherSoilData(WeatherSoilData $weatherSoilData) {
        $stmt = $this->db->prepare("INSERT INTO WeatherSoilData (dataID, sensorID, timestamp, temperature, precipitation, windSpeed, humidity, pHLevel, nutrientContent, moistureLevel)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE sensorID = VALUES(sensorID), timestamp = VALUES(timestamp), temperature = VALUES(temperature),
            precipitation = VALUES(precipitation), windSpeed = VALUES(windSpeed), humidity = VALUES(humidity),
            pHLevel = VALUES(pHLevel), nutrientContent = VALUES(nutrientContent), moistureLevel = VALUES(moistureLevel)");

        $stmt->bind_param("iidddddddd", $weatherSoilData->getDataID(), $weatherSoilData->getSensorID(), $weatherSoilData->getTimestamp(),
            $weatherSoilData->getTemperature(), $weatherSoilData->getPrecipitation(), $weatherSoilData->getWindSpeed(),
            $weatherSoilData->getHumidity(), $weatherSoilData->getPHLevel(), $weatherSoilData->getNutrientContent(), $weatherSoilData->getMoistureLevel());

        if ($stmt->execute()) {
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Get weather and soil data by ID
    public function getWeatherSoilDataByID($dataID) {
        $stmt = $this->db->prepare("SELECT * FROM WeatherSoilData WHERE dataID = ?");
        $stmt->bind_param("i", $dataID);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new WeatherSoilData(
                $row['dataID'], $row['sensorID'], $row['timestamp'],
                $row['temperature'], $row['precipitation'], $row['windSpeed'],
                $row['humidity'], $row['pHLevel'], $row['nutrientContent'], $row['moistureLevel']
            );
        } else {
            return null; // Weather and soil data not found
        }
    }

    // TO DO: Additional methods
}

?>
