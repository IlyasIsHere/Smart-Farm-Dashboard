<?php
require_once 'Models/DAOs/DAOFactory.php';
require_once 'Controllers/cropController.php';

$daoFactory = DAOFactory::getInstance();

$farmID = 1;

$cropController = new CropController($daoFactory);

$farmID = 1;

$cropController->displayCropsByFarmID($farmID);
?>
