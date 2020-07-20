<?php

use Alura\Doctrine\Entity\Ator;
use Alura\Doctrine\Entity\Filme;
use Alura\Doctrine\Entity\Idioma;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once 'vendor/autoload.php';

// Parênteses em volta da classe serve para encadear métodos
$em = (new EntityManagerCreator())->criaEntityManager();

$ator = new Ator(null, 'Márcio', 'Miranda');

$portugues = new Idioma(null, 'Português');
$alemao = new Idioma(null, 'Alemão');
$ingles = new Idioma(null, 'Inglês');

$filme1 = new Filme(null, 'Avatar', $portugues, $alemao);
$filme2 = new Filme(null, 'Long\'s brother', $portugues, $ingles);

$ator->addFilme($filme1);
$ator->addFilme($filme2);

$em->persist($ator);

$em->flush();