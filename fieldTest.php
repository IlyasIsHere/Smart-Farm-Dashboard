<?php
require_once 'Models/DAOs/DAOFactory.php';
require_once 'Controllers/fieldController.php';

$daoFactory = DAOFactory::getInstance();

$farmID = 1;

$fieldController = new FieldController($daoFactory);

$farmID = 1;

$fieldController->displayFieldsByFarmID($farmID);
?>
