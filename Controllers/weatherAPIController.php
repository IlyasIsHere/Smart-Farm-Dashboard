<?php
require_once(__DIR__ . '/../Models/weatherAPI.php');

class WeatherController {
    private $weatherApi;

    public function __construct($apiKey) {
        $this->weatherApi = OpenWeatherMapApi::getInstance($apiKey);
    }

    public function displayWeather($city) {
        try {
            $weatherData = $this->weatherApi->getWeather($city);

            if ($weatherData) {
                //include(__DIR__ . '/../Views/weather.php');
                var_dump($weatherData);
            } else {
                echo "Invalid city name or weather data not available.";
            }
        } catch (Exception $e) {
            echo "Error fetching weather data: " . $e->getMessage();
        }
    }
}