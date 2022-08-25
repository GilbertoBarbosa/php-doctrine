<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
    public static function createEntityManager(): EntityManager
    {
        // Create a simple "default" Doctrine ORM configuration for Annotations
        
        $config = ORMSetup::createAnnotationMetadataConfiguration(
            [__DIR__ . "/.."], 
            true
        );
        // or if you prefer YAML or XML
        // $config = ORMSetup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);

        // database configuration parameters
        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . '/../../db.sqlite',
        ];

        // obtaining the entity manager
        return EntityManager::create($conn, $config);
    }
}