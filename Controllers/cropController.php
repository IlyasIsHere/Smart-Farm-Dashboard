<?php

require_once(__DIR__ . '/../Models/DAOs/DAOFactory.php');

class CropController {
    private $daoFactory;

    public function __construct(DAOFactory $daoFactory) {
        $this->daoFactory = $daoFactory;
    }

    public function displayCropsByFarmID($farmID) {
        $fieldDAO = $this->daoFactory->createFieldDAO();
        $cropDAO = $this->daoFactory->createCropDAO();
        $weatherSoilDataDAO = $this->daoFactory->createWeatherSoilDataDAO();
    
        $fields = $fieldDAO->getFieldsByFarmID($farmID);
    
        $cropInfoMap = [];
        $cropTypeFieldsMap = [];

        foreach ($fields as $field) {
            $fieldID = $field->getFieldID();
            $fieldCrops = $fieldDAO->getFieldCrops($fieldID);
            $cropIDs = array_keys($fieldCrops);
    
            foreach ($cropIDs as $cropID) {
                if (isset($cropInfoMap[$cropID])) {
                    $cropInfoMap[$cropID]['fields'][] = $field->getFieldID();
                    $cropInfoMap[$cropID]['area'] += $fieldCrops[$cropID];
                } else {
                    $cropInfo = $cropDAO->getCropByID($cropID);
                    $weatherSoilData = $weatherSoilDataDAO->getWeatherSoilDataByID($cropInfo->getCropBestCondition());

                    $cropInfoMap[$cropID] = [
                        'cropType' => $cropInfo->getCropType(),
                        'temperature' => $weatherSoilData->getTemperature(),
                        'precipitation' => $weatherSoilData->getPrecipitation(),
                        'windSpeed' => $weatherSoilData->getWindSpeed(),
                        'humidity' => $weatherSoilData->getHumidity(),
                        'pHLevel' => $weatherSoilData->getPHLevel(),
                        'nutrientContent' => $weatherSoilData->getNutrientContent(),
                        'moistureLevel' => $weatherSoilData->getMoistureLevel(),
                        'fields' => [$field->getFieldID()],
                        'area' => $fieldCrops[$cropID],
                    ];
                }

                $cropInfo = $cropDAO->getCropByID($cropID);
                if (isset($cropTypeFieldsMap[$cropInfo->getCropType()])) {
                    $cropTypeFieldsMap[$cropInfo->getCropType()][] = [
                        'fieldID' => $field->getFieldID(),
                        'area' => $fieldCrops[$cropID],
                    ];
                } else {
                    $cropTypeFieldsMap[$cropInfo->getCropType()] = [
                        [
                            'fieldID' => $field->getFieldID(),
                            'area' => $fieldCrops[$cropID],
                        ],
                    ];
                }
            }
        }

        include(__DIR__ . '/../Views/crops.php');
    }
    
}

?>
