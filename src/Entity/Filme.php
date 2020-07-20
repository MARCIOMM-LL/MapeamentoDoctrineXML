<?php

namespace Alura\Doctrine\Entity;

use Alura\Doctrine\Entity\Ator;
use Doctrine\Common\Collections\ArrayCollection;

class Filme
{
    private $id;
    private $titulo;
    private $sinopse;
    private $anoLancamento;
    private $ultimaAtualizacao;
    private $idiomaAudio;
    private $idiomaOriginal;
    private $atores;

    public function __construct(?int $id, string $titulo, Idioma $idiomaAudio, Idioma $idiomaOriginal, ?string $anoLancamento = null, ?string $sinopse = null) 
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->idiomaAudio = $idiomaAudio;
        $this->idiomaOriginal = $idiomaOriginal;
        $this->sinopse = $sinopse;
        $this->anoLancamento = $anoLancamento;
        $this->ultimaAtualizacao = new \DateTimeImmutable();
        $this->atores = new ArrayCollection();
    }

    public function addAtor(Ator $ator): void
    {
        if ($this->atores->contains($ator)) {
            return;
        }

        $this->atores->add($ator);
        $ator->addFilme($this);
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    /**@var Filme[] $filmes */
    public function getIdiomaAudio(): string
    {
        return $this->idiomaAudio;
    }

    public function getAtores(): array
    {
        return $this->atores->map(function (Ator $ator) {
            return $ator->getNome();
        })->toArray();
    }
}