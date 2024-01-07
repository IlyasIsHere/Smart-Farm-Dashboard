<?php
require_once 'Controllers/weatherAPIController.php';

$apiKey = '0c7317311fe4e439efd28e29bba99e7a';

$weatherController = new WeatherController($apiKey);

$city = 'El Jadida';

$weatherController->displayWeather($city);

?>
