<?php

namespace Joao21dev\Magazord\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration(
            [
                $rootDir . '/src'
            ],
            true 
        );
        $connection = [
            'driver' => 'pdo_pgsql',
            'host' => 'postgres', 
            'port' => 5432,
            'dbname' => 'postgres',
            'user' => 'admin',
            'password' => 'admin',
        ];


        return EntityManager::create($connection, $config);
    }
}
