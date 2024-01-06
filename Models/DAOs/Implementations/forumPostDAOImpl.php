<?php
require_once(__DIR__ . '/../Interfaces/forumPostDAO.php');
require_once(__DIR__ . '/../../forumPost.php');

class ForumPostDAO implements ForumPostDAOInterface {
    private $db;

    // Constructor
    public function __construct(DatabaseConnection $dbConnection) {
        $this->db = $dbConnection->getConnection();
    }

    // Save or update a forum post in the database
    public function saveForumPost(ForumPost $forumPost) {
        $stmt = $this->db->prepare("INSERT INTO ForumPost (postID, content, timestamp, forumID) VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE content = VALUES(content), timestamp = VALUES(timestamp), forumID = VALUES(forumID)");

        $stmt->bind_param("issi", $forumPost->getPostID(), $forumPost->getContent(), $forumPost->getTimestamp(), $forumPost->getForumID());

        if ($stmt->execute()) {
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Get forum post by ID
    public function getForumPostByID($postID) {
        $stmt = $this->db->prepare("SELECT * FROM ForumPost WHERE postID = ?");
        $stmt->bind_param("i", $postID);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new ForumPost($row['postID'], $row['content'], $row['timestamp'], $row['forumID']);
        } else {
            return null; // Forum post not found
        }
    }

    // TO DO: Additional methods
}

?>
