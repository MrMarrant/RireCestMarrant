<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lieu
 *
 * @ORM\Table(name="lieu")
 * @ORM\Entity
 */
class Lieu
{
    /**
     * @var int
     *
     * @ORM\Column(name="idLieu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlieu;

    /**
     * @var string
     *
     * @ORM\Column(name="nomDepartement", type="string", length=255, nullable=false)
     */
    private $nomdepartement;

    /**
     * @var int
     *
     * @ORM\Column(name="idCommune", type="integer", nullable=false)
     */
    private $idcommune;

    public function getIdlieu(): ?int
    {
        return $this->idlieu;
    }

    public function getNomdepartement(): ?string
    {
        return $this->nomdepartement;
    }

    public function setNomdepartement(string $nomdepartement): self
    {
        $this->nomdepartement = $nomdepartement;

        return $this;
    }

    public function getIdcommune(): ?int
    {
        return $this->idcommune;
    }

    public function setIdcommune(int $idcommune): self
    {
        $this->idcommune = $idcommune;

        return $this;
    }


}
