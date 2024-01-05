<?php

class WeatherSoilData {
  public $dataID;
  public $sensorID;
  public $timestamp;
  public $temperature;
  public $precipitation;
  public $windSpeed;
  public $humidity;
  public $pHLevel;
  public $nutrientContent;
  public $moistureLevel;

  // Constructor
  public function __construct($dataID, $sensorID, $timestamp, $temperature, $precipitation, $windSpeed, $humidity, $pHLevel, $nutrientContent, $moistureLevel) {
    $this->dataID = $dataID;
    $this->sensorID = $sensorID;
    $this->timestamp = $timestamp;
    $this->temperature = $temperature;
    $this->precipitation = $precipitation;
    $this->windSpeed = $windSpeed;
    $this->humidity = $humidity;
    $this->pHLevel = $pHLevel;
    $this->nutrientContent = $nutrientContent;
    $this->moistureLevel = $moistureLevel;
  }

  // Getters
  public function getDataID() {
    return $this->dataID;
  }

  public function getSensorID() {
    return $this->sensorID;
  }

  public function getTimestamp() {
    return $this->timestamp;
  }

  public function getTemperature() {
    return $this->temperature;
  }

  public function getPrecipitation() {
    return $this->precipitation;
  }

  public function getWindSpeed() {
    return $this->windSpeed;
  }

  public function getHumidity() {
    return $this->humidity;
  }

  public function getPHLevel() {
    return $this->pHLevel;
  }

  public function getNutrientContent() {
    return $this->nutrientContent;
  }

  public function getMoistureLevel() {
    return $this->moistureLevel;
  }

  // Setters
  public function setDataID($dataID) {
    $this->dataID = $dataID;
  }

  public function setSensorID($sensorID) {
    $this->sensorID = $sensorID;
  }

  public function setTimestamp($timestamp) {
    $this->timestamp = $timestamp;
  }

  public function setTemperature($temperature) {
    $this->temperature = $temperature;
  }

  public function setPrecipitation($precipitation) {
    $this->precipitation = $precipitation;
  }

  public function setWindSpeed($windSpeed) {
    $this->windSpeed = $windSpeed;
  }

  public function setHumidity($humidity) {
    $this->humidity = $humidity;
  }

  public function setPHLevel($pHLevel) {
    $this->pHLevel = $pHLevel;
  }

  public function setNutrientContent($nutrientContent) {
    $this->nutrientContent = $nutrientContent;
  }

  public function setMoistureLevel($moistureLevel) {
    $this->moistureLevel = $moistureLevel;
  }
}

?>