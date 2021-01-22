<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commune
 *
 * @ORM\Table(name="commune")
 * @ORM\Entity
 */
class Commune
{
    /**
     * @var int
     *
     * @ORM\Column(name="IdCommune", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcommune;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCommune", type="string", length=255, nullable=false)
     */
    private $nomcommune;

    public function getIdcommune(): ?int
    {
        return $this->idcommune;
    }

    public function getNomcommune(): ?string
    {
        return $this->nomcommune;
    }

    public function setNomcommune(string $nomcommune): self
    {
        $this->nomcommune = $nomcommune;

        return $this;
    }


}
