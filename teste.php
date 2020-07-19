<?php

use Alura\Doctrine\Entity\Ator;
use Alura\Doctrine\Entity\Filme;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once 'vendor/autoload.php';

// Parênteses em volta da classe serve para encadear métodos
$em = (new EntityManagerCreator())->criaEntityManager();

$ator = new Ator(null, 'Márcio', 'Miranda');
$filme1 = new Filme(null, 'Avatar', '2020');
$filme2 = new Filme(null, 'Scarface', '1982');

$ator->addFilme($filme1);
$ator->addFilme($filme2);

$em->persist($ator);
$em->persist($filme1);
$em->persist($filme2);

$em->flush();