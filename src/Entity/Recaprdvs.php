<?php

namespace App\Entity;

use App\Repository\RecaprdvsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecaprdvsRepository::class)
 */
class Recaprdvs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $presenciel;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hygiene;

    /**
     * @ORM\Column(type="boolean")
     */
    private $lessive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $couche;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPresenciel(): ?bool
    {
        return $this->presenciel;
    }

    public function setPresenciel(bool $presenciel): self
    {
        $this->presenciel = $presenciel;

        return $this;
    }

    public function getHygiene(): ?bool
    {
        return $this->hygiene;
    }

    public function setHygiene(bool $hygiene): self
    {
        $this->hygiene = $hygiene;

        return $this;
    }

    public function getLessive(): ?bool
    {
        return $this->lessive;
    }

    public function setLessive(bool $lessive): self
    {
        $this->lessive = $lessive;

        return $this;
    }

    public function getCouche(): ?bool
    {
        return $this->couche;
    }

    public function setCouche(bool $couche): self
    {
        $this->couche = $couche;

        return $this;
    }
}
