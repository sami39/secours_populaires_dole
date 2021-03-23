<?php

namespace App\Entity;

use App\Repository\AdherentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdherentsRepository::class)
 */
class Adherents
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomPrenom;

    /**
     * @ORM\Column(type="bigint")
     */
    private $Dossier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $FrequenceMensuelle;

    /**
     * @ORM\Column(type="bigint")
     */
    private $NbPassage;

    /**
     * @ORM\Column(type="date")
     */
    private $Inscription;

    /**
     * @ORM\Column(type="bigint")
     */
    private $Adulte;

    /**
     * @ORM\Column(type="bigint")
     */
    private $Enfant;

    /**
     * @ORM\Column(type="bigint")
     */
    private $Colis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Observation;

    /**
     * @ORM\OneToMany(targetEntity=Appointment::class, mappedBy="adherents")
     */
    private $Appointment;

    public function __construct()
    {
        $this->Appointment = new ArrayCollection();
    }

   
   

    
    

   
    public function __toString()
    {
        return $this->getNomPrenom();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrenom(): ?string
    {
        return $this->NomPrenom;
    }

    public function setNomPrenom(string $NomPrenom): self
    {
        $this->NomPrenom = $NomPrenom;

        return $this;
    }

    public function getDossier(): ?string
    {
        return $this->Dossier;
    }

    public function setDossier(string $Dossier): self
    {
        $this->Dossier = $Dossier;

        return $this;
    }

    public function getFrequenceMensuelle(): ?string
    {
        return $this->FrequenceMensuelle;
    }

    public function setFrequenceMensuelle(string $FrequenceMensuelle): self
    {
        $this->FrequenceMensuelle = $FrequenceMensuelle;

        return $this;
    }

    public function getNbPassage(): ?string
    {
        return $this->NbPassage;
    }

    public function setNbPassage(string $NbPassage): self
    {
        $this->NbPassage = $NbPassage;

        return $this;
    }

    public function getInscription(): ?\DateTimeInterface
    {
        return $this->Inscription;
    }

    public function setInscription(\DateTimeInterface $Inscription): self
    {
        $this->Inscription = $Inscription;

        return $this;
    }

    public function getAdulte(): ?string
    {
        return $this->Adulte;
    }

    public function setAdulte(string $Adulte): self
    {
        $this->Adulte = $Adulte;

        return $this;
    }

    public function getEnfant(): ?string
    {
        return $this->Enfant;
    }

    public function setEnfant(string $Enfant): self
    {
        $this->Enfant = $Enfant;

        return $this;
    }

    public function getColis(): ?string
    {
        return $this->Colis;
    }

    public function setColis(string $Colis): self
    {
        $this->Colis = $Colis;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->Telephone;
    }

    public function setTelephone(string $Telephone): self
    {
        $this->Telephone = $Telephone;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->Observation;
    }

    public function setObservation(string $Observation): self
    {
        $this->Observation = $Observation;

        return $this;
    }

    /**
     * @return Collection|Appointment[]
     */
    public function getAppointment(): Collection
    {
        return $this->Appointment;
    }

    public function addAppointment(Appointment $appointment): self
    {
        if (!$this->Appointment->contains($appointment)) {
            $this->Appointment[] = $appointment;
            $appointment->setAdherents($this);
        }

        return $this;
    }

    public function removeAppointment(Appointment $appointment): self
    {
        if ($this->Appointment->removeElement($appointment)) {
            // set the owning side to null (unless already changed)
            if ($appointment->getAdherents() === $this) {
                $appointment->setAdherents(null);
            }
        }

        return $this;
    }

     
     

     
    

   

   

    
    

    
 
}
