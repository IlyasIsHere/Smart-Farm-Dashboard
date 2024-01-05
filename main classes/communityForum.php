<?php

class CommunityForum {
  public $forumID;
  public $forumName;
  public $farmID;

  // Constructor
  public function __construct($forumID, $forumName, $farmID) {
    $this->forumID = $forumID;
    $this->forumName = $forumName;
    $this->farmID = $farmID;
  }

  // Getters
  public function getForumID() {
    return $this->forumID;
  }

  public function getForumName() {
    return $this->forumName;
  }

  public function getFarmID() {
    return $this->farmID;
  }

  // Setters
  public function setForumID($forumID) {
    $this->forumID = $forumID;
  }

  public function setForumName($forumName) {
    $this->forumName = $forumName;
  }

  public function setFarmID($farmID) {
    $this->farmID = $farmID;
  }
}

?>