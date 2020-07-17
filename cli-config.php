<?php

use Alura\Doctrine\Helper\EntityManagerCreator;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/vendor/autoload.php';

$entityManagerFactory = new EntityManagerCreator();
$entityManager = $entityManagerFactory->criaEntityManager();

return ConsoleRunner::createHelperSet($entityManager);