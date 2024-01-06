<?php

require_once(__DIR__ . '/../Models/DAOs/DAOFactory.php');

class FieldController {
    private $daoFactory;

    public function __construct(DAOFactory $daoFactory) {
        $this->daoFactory = $daoFactory;
    }

    public function displayFieldsByFarmID($farmID) {
        $fieldDAO = $this->daoFactory->createFieldDAO();

        $fields = $fieldDAO->getFieldsByFarmID($farmID);

        include(__DIR__ . '/../Views/fields.php');
    }
}

?>
