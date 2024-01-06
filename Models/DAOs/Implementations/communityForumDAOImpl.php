<?php
require_once(__DIR__ . '/../Interfaces/communityForumDAO.php');
require_once(__DIR__ . '/../../communityForum.php');

class CommunityForumDAO implements CommunityForumDAOInterface {
    private $db;

    // Constructor
    public function __construct(DatabaseConnection $dbConnection) {
        $this->db = $dbConnection->getConnection();
    }

    // Save or update a community forum in the database
    public function saveCommunityForum(CommunityForum $communityForum) {
        $stmt = $this->db->prepare("INSERT INTO CommunityForum (forumID, forumName, farmID) VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE forumName = VALUES(forumName), farmID = VALUES(farmID)");

        $stmt->bind_param("isi", $communityForum->getForumID(), $communityForum->getForumName(), $communityForum->getFarmID());

        if ($stmt->execute()) {
            return true;
        } else {
            // TO DO: Handle error
            return false;
        }
    }

    // Get community forum by ID
    public function getCommunityForumByID($forumID) {
        $stmt = $this->db->prepare("SELECT * FROM CommunityForum WHERE forumID = ?");
        $stmt->bind_param("i", $forumID);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new CommunityForum($row['forumID'], $row['forumName'], $row['farmID']);
        } else {
            return null; // Community forum not found
        }
    }

    // TO DO: Additional methods
}

?>
