<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

// Classe para gerenciar as entidades
class EntityManagerCreator
{
    #Entidade no doctrine significa mapear os objetos/classes
    #do negócio para o banco de dados e para mapear o doctrine
    #precisamos de um gerenciador de entidades que é o que
    #vamos implementar abaixo
    public function criaEntityManager(): EntityManagerInterface     
    {
        // Essa classe cria as configurações necessárias com base em annotations
        // que o doctrine precisa
        $config = Setup::createXMLMetadataConfiguration(
            // Aqui temos o caminho onde está a classe EntityManagerCreator
            // até a pasta onde estão as classes que é em mapeamentos
            // O caminho parte da pasta Helper até a pasta src e depois
            // até à raiz do projeto, depois volta para a pasta mapeamentos
            [__DIR__ . '/../../mapeamentos'],
            true
        );
        // Aqui temos a conexão com o banco em questão e seu devido caminho
        $connection = [
            'driver' => 'pdo_pgsql',
            'host' => 'localhost',
            'dbname' => 'alura_filmes_novo',
            'user' => 'postgres',
            'password' => '1112' 
        ];

        // Aqui temos o retorno da conexão através da classe create que faz a conaxão efetivamente
        return EntityManager::create($connection, $config);
    }
}