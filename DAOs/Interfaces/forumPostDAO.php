<?php

interface ForumPostDAOInterface {
    // Save or update a forum post in the database
    public function saveForumPost(ForumPost $forumPost);

    // Get forum post by ID
    public function getForumPostByID($postID);

    // TO DO: Additional methods
}

?>
