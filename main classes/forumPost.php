<?php

class ForumPost {
  public $postID;
  public $content;
  public $timestamp;
  public $forumID;

  // Constructor
  public function __construct($postID, $content, $timestamp, $forumID) {
    $this->postID = $postID;
    $this->content = $content;
    $this->timestamp = $timestamp;
    $this->forumID = $forumID;
  }

  // Getters
  public function getPostID() {
    return $this->postID;
  }

  public function getContent() {
    return $this->content;
  }

  public function getTimestamp() {
    return $this->timestamp;
  }

  public function getForumID() {
    return $this->forumID;
  }

  // Setters
  public function setPostID($postID) {
    $this->postID = $postID;
  }

  public function setContent($content) {
    $this->content = $content;
  }

  public function setTimestamp($timestamp) {
    $this->timestamp = $timestamp;
  }

  public function setForumID($forumID) {
    $this->forumID = $forumID;
  }
}

?>