<?php

class Farm {
  public $farmID;
  public $name;
  public $ownerName;
  public $email;
  public $phoneNum;
  public $latitude;
  public $longitude;

  // Constructor
  public function __construct($farmID, $name, $ownerName, $email, $phoneNum, $latitude, $longitude) {
    $this->farmID = $farmID;
    $this->name = $name;
    $this->ownerName = $ownerName;
    $this->email = $email;
    $this->phoneNum = $phoneNum;
    $this->latitude = $latitude;
    $this->longitude = $longitude;
  }

  // Getters
  public function getFarmID() {
    return $this->farmID;
  }

  public function getName() {
    return $this->name;
  }

  public function getOwnerName() {
    return $this->ownerName;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getPhoneNum() {
    return $this->phoneNum;
  }

  public function getLatitude() {
    return $this->latitude;
  }

  public function getLongitude() {
    return $this->longitude;
  }

  // Setters
  public function setFarmID($farmID) {
    $this->farmID = $farmID;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setOwnerName($ownerName) {
    $this->ownerName = $ownerName;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setPhoneNum($phoneNum) {
    $this->phoneNum = $phoneNum;
  }

  public function setLatitude($latitude) {
    $this->latitude = $latitude;
  }

  public function setLongitude($longitude) {
    $this->longitude = $longitude;
  }
}

?>
