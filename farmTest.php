<?php
require_once 'Models/DAOs/DAOFactory.php';
require_once 'Controllers/farmController.php';

$daoFactory = DAOFactory::getInstance();

$farmID = 1;

$farmController = new farmController($daoFactory);

$farmID = 1;

$farmController->displayFarmInfo($farmID);
?>
