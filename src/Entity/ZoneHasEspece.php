<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ZoneHasEspece
 *
 * @ORM\Table(name="zone_has_espece", indexes={@ORM\Index(name="idZone", columns={"idZone", "idEspece"})})
 * @ORM\Entity
 */
class ZoneHasEspece
{
    /**
     * @var int
     *
     * @ORM\Column(name="idZone", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idzone;

    /**
     * @var int
     *
     * @ORM\Column(name="idEspece", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idespece;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreEspece", type="integer", nullable=false)
     */
    private $nombreespece;

    public function getIdzone(): ?int
    {
        return $this->idzone;
    }

    public function getIdespece(): ?int
    {
        return $this->idespece;
    }

    public function getNombreespece(): ?int
    {
        return $this->nombreespece;
    }

    public function setNombreespece(int $nombreespece): self
    {
        $this->nombreespece = $nombreespece;

        return $this;
    }


}
