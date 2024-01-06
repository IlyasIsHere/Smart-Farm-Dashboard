<?php

interface FarmDAOInterface {
    // Save or update a farm in the database
    public function saveFarm(Farm $farm);

    // Get farm by ID
    public function getFarmByID($farmID);

    // Delete a farm by ID
    public function deleteFarm($farmID);

    // Update farm name by ID
    public function updateFarmName($farmID, $name);

    // Update farm localisation by ID
    public function updateFarmLocalisation($farmID, $latitude, $longitude);

    // Update farm owner by ID
    public function updateFarmOwner($farmID, $ownerName);

    // Get all farms
    public function getAllFarms();
}

?>
