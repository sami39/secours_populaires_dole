<?php

namespace App\Entity;

use App\Repository\AdherentsRepository;
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
    private $paye;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hygiene;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lessive;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Couches;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Observation;

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

    public function getPaye(): ?string
    {
        return $this->paye;
    }

    public function setPaye(string $paye): self
    {
        $this->paye = $paye;

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

    public function getLessive(): ?string
    {
        return $this->Lessive;
    }

    public function setLessive(string $Lessive): self
    {
        $this->Lessive = $Lessive;

        return $this;
    }

    public function getCouches(): ?string
    {
        return $this->Couches;
    }

    public function setCouches(string $Couches): self
    {
        $this->Couches = $Couches;

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
}
