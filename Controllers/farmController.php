<?php

require_once(__DIR__ . '/../Models/DAOs/DAOFactory.php');

class FarmController {
    private $daoFactory;

    public function __construct(DAOFactory $daoFactory) {
        $this->daoFactory = $daoFactory;
    }

    public function displayFarmInfo($farmID) {
        $farmDAO = $this->daoFactory->createFarmDAO();

        $farm = $farmDAO->getFarmByID($farmID);

        if ($farm) {
            include(__DIR__ . '/../Views/user.php');
        } else {
            echo "Farm not found.";
        }
    }
}

?>
