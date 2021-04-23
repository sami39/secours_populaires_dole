<?php

namespace App\Entity;

use App\Repository\AppointmentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AppointmentRepository::class)
 */
class Appointment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * 
     * @Groups({"Appointment:list"})
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * 
     * @Groups({"Appointment:list"})
     */
    private $date;


    /**
     * @ORM\Column(type="boolean")
     * 
     * @Groups({"Appointment:list"})
     */
    private $paye;

    /**
     * @ORM\Column(type="bigint")
     * 
     * @Groups({"Appointment:list"})
     */
    private $Dette;

    /**
     * @ORM\ManyToOne(targetEntity=Adherents::class, inversedBy="Appointment")
     * @ORM\JoinColumn(nullable=false)
     * 
     * @Groups({"Appointment:list"})
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






    public function getPaye(): ?bool
    {
        return $this->paye;
    }

    public function setPaye(bool $paye): self
    {
        $this->paye = $paye;

        return $this;
    }

    public function getDette(): ?int
    {
        return $this->Dette;
    }

    public function setDette(int $Dette): self
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