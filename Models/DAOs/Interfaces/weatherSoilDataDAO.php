<?php

interface WeatherSoilDataDAOInterface {
    // Save or update weather and soil data in the database
    public function saveWeatherSoilData(WeatherSoilData $weatherSoilData);

    // Get weather and soil data by ID
    public function getWeatherSoilDataByID($dataID);

    // TO DO: Additional methods
}

?>
