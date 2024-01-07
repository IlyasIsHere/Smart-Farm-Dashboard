<?php

class OpenWeatherMapApi {
    private static $instance;
    private $apiKey;
    private $apiEndpoint = 'https://api.openweathermap.org/data/2.5/weather';

    private function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public static function getInstance($apiKey) {
        if (!self::$instance) {
            self::$instance = new OpenWeatherMapApi($apiKey);
        }

        return self::$instance;
    }

    public function getWeather($city) {
        $url = $this->apiEndpoint . '?q=' . urlencode($city) . '&appid=' . $this->apiKey;
        $data = $this->fetchData($url);

        if (isset($data['cod']) && $data['cod'] === '404') {
            throw new Exception("City not found");
        }

        return $data;
    }

    private function fetchData($url) {
        $response = file_get_contents($url);

        if ($response === false) {
            throw new Exception("Failed to fetch data from OpenWeatherMap API");
        }

        $data = json_decode($response, true);

        return $data;
    }
}

?>

