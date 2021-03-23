<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppointmentRepository::class)
 */
class Appointment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;
 

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hygiene;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $couche;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lessive;

    /**
     * @ORM\Column(type="boolean")
     */
    private $paye;

    /**
     * @ORM\Column(type="bigint")
     */
    private $Dette;

    /**
     * @ORM\ManyToOne(targetEntity=Adherents::class, inversedBy="Appointment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $adherents;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    

    public function getHygiene(): ?string
    {
        return $this->hygiene;
    }

    public function setHygiene(string $hygiene): self
    {
        $this->hygiene = $hygiene;

        return $this;
    }

    public function getCouche(): ?string
    {
        return $this->couche;
    }

    public function setCouche(string $couche): self
    {
        $this->couche = $couche;

        return $this;
    }

    public function getLessive(): ?string
    {
        return $this->lessive;
    }

    public function setLessive(string $lessive): self
    {
        $this->lessive = $lessive;

        return $this;
    }

    public function getPaye(): ?bool
    {
        return $this->paye;
    }

    public function setPaye(bool $paye): self
    {
        $this->paye = $paye;

        return $this;
    }

    public function getDette(): ?string
    {
        return $this->Dette;
    }

    public function setDette(string $Dette): self
    {
        $this->Dette = $Dette;

        return $this;
    }

    public function getAdherents(): ?Adherents
    {
        return $this->adherents;
    }

    public function setAdherents(?Adherents $adherents): self
    {
        $this->adherents = $adherents;

        return $this;
    }
}
