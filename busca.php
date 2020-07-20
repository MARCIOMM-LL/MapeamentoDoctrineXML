<?php

use Alura\Doctrine\Entity\Filme;
use Alura\Doctrine\Entity\Idioma;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once 'vendor/autoload.php';

// Parênteses em volta da classe serve para encadear métodos
$em = (new EntityManagerCreator())->criaEntityManager();

/**@var Filme[] $filmes */
$filmes = $em->getRepository(Filme::class)->findAll();

foreach ($filmes as $filme) {
    echo $filme->getTitulo() . "\n" . 'Idioma: ' . $filme->getIdiomaAudio();
    echo "\n";

    echo implode( ', ', $filme->getAtores());
    echo "\n";
}