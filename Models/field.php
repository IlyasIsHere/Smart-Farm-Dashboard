<?php

class Field {
  public $fieldID;
  public $area;
  public $longitude;
  public $latitude;
  public $farmID;

  // Constructor
  public function __construct($fieldID, $area, $longitude, $latitude, $farmID) {
    $this->fieldID = $fieldID;
    $this->area = $area;
    $this->longitude = $longitude;
    $this->latitude = $latitude;
    $this->farmID = $farmID;
  }

  // Getters
  public function getFieldID() {
    return $this->fieldID;
  }

  public function getArea() {
    return $this->area;
  }

  public function getLongitude() {
    return $this->longitude;
  }

  public function getLatitude() {
    return $this->latitude;
  }

  public function getFarmID() {
    return $this->farmID;
  }

  // Setters
  public function setFieldID($fieldID) {
    $this->fieldID = $fieldID;
  }

  public function setArea($area) {
    $this->area = $area;
  }

  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }

  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  public function setFarmID($farmID) {
    $this->farmID = $farmID;
  }
}

?>