<?php

require_once(__DIR__ . '/../Models/DAOs/DAOFactory.php');

class FieldController {
    private $daoFactory;

    public function __construct(DAOFactory $daoFactory) {
        $this->daoFactory = $daoFactory;
    }

    public function displayFieldsByFarmID($farmID) {
        $fieldDAO = $this->daoFactory->createFieldDAO();
        $cropDAO = $this->daoFactory->createCropDAO();

        $fields = $fieldDAO->getFieldsByFarmID($farmID);

        $fieldsCropsMap = [];

        foreach ($fields as $field) {
            $fieldID = $field->getFieldID();
            $cropsMap = $fieldDAO->getFieldCrops($fieldID);

            $enhancedCropsMap = [];
            foreach ($cropsMap as $cropID => $area) {
                $cropInfo = $cropDAO->getCropByID($cropID);
                if ($cropInfo) {
                    $enhancedCropsMap[$cropID] = [
                        'cropType' => $cropInfo->getCropType(),
                        'area' => $area,
                    ];
                }
            }

            $fieldsCropsMap[$fieldID] = $enhancedCropsMap;
        }

        include(__DIR__ . '/../Views/fields.php');
    }
}

?>
