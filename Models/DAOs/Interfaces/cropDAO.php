<?php

interface CropDAOInterface {
    // Save or update a crop in the database
    public function saveCrop(Crop $crop);

    // Get crop by ID
    public function getCropByID($cropID);

    // Delete a crop by ID
    public function deleteCrop($cropID);

    // Update crop conditions by ID
    public function updateCropConditions($cropID, $newCropConditions);

    // Update crop distribution by ID
    public function updateCropDistribution($cropID, $newCropDistribution);

    // Get crop distribution by ID
    public function getCropDistribution($cropID);

    // Get all crops
    public function getAllCrops();
}

?>
