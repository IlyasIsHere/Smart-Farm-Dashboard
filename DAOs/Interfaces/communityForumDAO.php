<?php

interface CommunityForumDAOInterface {
    // Save or update a community forum in the database
    public function saveCommunityForum(CommunityForum $communityForum);

    // Get community forum by ID
    public function getCommunityForumByID($forumID);

    // TO DO: Additional methods
}

?>
