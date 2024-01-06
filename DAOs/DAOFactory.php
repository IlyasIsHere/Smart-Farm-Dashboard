<?php

require_once 'singleConnection.php';
require_once 'Implementations/farmDAOImpl.php'; 
require_once 'Implementations/fieldDAOImpl.php';
require_once 'Implementations/cropDAOImpl.php';
require_once 'Implementations/weatherSoilDataDAOImpl.php'; 
require_once 'Implementations/communityForumDAOImpl.php';
require_once 'Implementations/forumPostDAOImpl.php';

class DAOFactory {
    private static $instance;
    private $dbConnection;

    // Private constructor to prevent instantiation
    private function __construct() {
        $this->dbConnection = DatabaseConnection::getInstance();
    }

    // Get the instance of the DAOFactory
    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new DAOFactory();
        }

        return self::$instance;
    }

    // Create and return an instance of FarmDAO
    public function createFarmDAO() {
        return new FarmDAO($this->dbConnection);
    }

    // Create and return an instance of FieldDAO
    public function createFieldDAO() {
        return new FieldDAO($this->dbConnection);
    }

    // Create and return an instance of CropDAO
    public function createCropDAO() {
        return new CropDAO($this->dbConnection);
    }

    // Create and return an instance of communityForumDAO
    public function createCommunityForumDAO() {
        return new CropDAO($this->dbConnection);
    }

    // Create and return an instance of forumPostDAO
    public function createForumPostDAO() {
        return new CropDAO($this->dbConnection);
    }

    // Create and return an instance of weatherSoilDataDAO
    public function createWeatherSoilDataDAO() {
        return new CropDAO($this->dbConnection);
    }
}


?>
