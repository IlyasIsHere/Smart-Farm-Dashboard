<?php

interface FarmDAOInterface {
    // Save or update a farm in the database
    public function saveFarm(Farm $farm);

    // Get farm by ID
    public function getFarmByID($farmID);

    // TO DO: Additional methods
}

?>
