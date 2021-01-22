<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Espece
 *
 * @ORM\Table(name="espece")
 * @ORM\Entity
 */
class Espece
{
    /**
     * @var int
     *
     * @ORM\Column(name="idEspece", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idespece;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEspece", type="string", length=255, nullable=false)
     */
    private $nomespece;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreTotale", type="integer", nullable=false)
     */
    private $nombretotale;

    public function getIdespece(): ?int
    {
        return $this->idespece;
    }

    public function getNomespece(): ?string
    {
        return $this->nomespece;
    }

    public function setNomespece(string $nomespece): self
    {
        $this->nomespece = $nomespece;

        return $this;
    }

    public function getNombretotale(): ?int
    {
        return $this->nombretotale;
    }

    public function setNombretotale(int $nombretotale): self
    {
        $this->nombretotale = $nombretotale;

        return $this;
    }


}
