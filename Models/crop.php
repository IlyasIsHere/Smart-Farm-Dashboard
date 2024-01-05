<?php

class Crop {
  public $cropID;
  public $cropType;
  public $cropBestCondition;

  // Constructor
  public function __construct($cropID, $cropType, $cropBestCondition) {
    $this->cropID = $cropID;
    $this->cropType = $cropType;
    $this->cropBestCondition = $cropBestCondition;
  }

  // Getters
  public function getCropID() {
    return $this->cropID;
  }

  public function getCropType() {
    return $this->cropType;
  }

  public function getCropBestCondition() {
    return $this->cropBestCondition;
  }

  // Setters
  public function setCropID($cropID) {
    $this->cropID = $cropID;
  }

  public function setCropType($cropType) {
    $this->cropType = $cropType;
  }

  public function setCropBestCondition($cropBestCondition) {
    $this->cropBestCondition = $cropBestCondition;
  }
}

?>
