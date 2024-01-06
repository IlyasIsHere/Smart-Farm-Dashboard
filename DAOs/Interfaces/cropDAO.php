<?php

interface CropDAOInterface {
    // Save or update a crop in the database
    public function saveCrop(Crop $crop);

    // Get crop by ID
    public function getCropByID($cropID);

    // TO DO: Additional methods
}

?>
