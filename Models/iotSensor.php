<?php

class IoTSensor {
  public $sensorID;
  public $sensorType;
  public $fieldID;

  // Constructor
  public function __construct($sensorID, $sensorType, $fieldID) {
    $this->sensorID = $sensorID;
    $this->sensorType = $sensorType;
    $this->fieldID = $fieldID;
  }

  // Getters
  public function getSensorID() {
    return $this->sensorID;
  }

  public function getSensorType() {
    return $this->sensorType;
  }

  public function getFieldID() {
    return $this->fieldID;
  }

  // Setters
  public function setSensorID($sensorID) {
    $this->sensorID = $sensorID;
  }

  public function setSensorType($sensorType) {
    $this->sensorType = $sensorType;
  }

  public function setFieldID($fieldID) {
    $this->fieldID = $fieldID;
  }
}

?>