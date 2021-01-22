<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Metier
 *
 * @ORM\Table(name="metier")
 * @ORM\Entity
 */
class Metier
{
    /**
     * @var int
     *
     * @ORM\Column(name="idMetier", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmetier;

    /**
     * @var string
     *
     * @ORM\Column(name="nomMetier", type="string", length=255, nullable=false)
     */
    private $nommetier;

    public function getIdmetier(): ?int
    {
        return $this->idmetier;
    }

    public function getNommetier(): ?string
    {
        return $this->nommetier;
    }

    public function setNommetier(string $nommetier): self
    {
        $this->nommetier = $nommetier;

        return $this;
    }


}
