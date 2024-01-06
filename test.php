<?php
require_once 'singleConnection.php';
require_once 'DAOs/Implementations/farmDAOImpl.php';

$dbConnection = DatabaseConnection::getInstance();

$farmDAO = new FarmDAO($dbConnection);

$farmID = 1;

$farm = $farmDAO->getFarmByID($farmID);

if ($farm) {
    echo "Farm ID: " . $farm->getFarmID() . "<br>";
    echo "Name: " . $farm->getName() . "<br>";
    echo "Owner: " . $farm->getOwnerName() . "<br>";
    echo "Email: " . $farm->getEmail() . "<br>";
    echo "Phone Number: " . $farm->getPhoneNum() . "<br>";
    echo "Latitude: " . $farm->getLatitude() . "<br>";
    echo "Longitude: " . $farm->getLongitude() . "<br>";
} else {
    echo "Farm not found.";
}
?>
