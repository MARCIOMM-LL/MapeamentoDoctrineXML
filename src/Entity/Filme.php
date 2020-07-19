<?php

namespace Alura\Doctrine\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Filme
{
    private $id;
    private $titulo;
    private $sinopse;
    private $anoLancamento;
    private $ultimaAtualizacao;
    private $atores;

    public function __construct(
        ?int $id,
        string $titulo,
        string $anoLancamento,
        ?string $sinopse = null
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
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
}
