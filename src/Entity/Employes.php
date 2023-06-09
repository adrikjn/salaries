<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmployesRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployesRepository::class)]
class Employes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    #[Assert\Length(min:2, max:25, minMessage:"Pas assez de caractère. Il faut au moins {{ limit }} caractères", maxMessage:"Trop de caractère. Il faut au maximum {{ limit }} caractères")]
    #[Assert\Regex(pattern: '/^[^0-9]{2,25}$/', message: "Le prénom ne peut contenir que des lettres")]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    #[Assert\Length(min:2, max:25, minMessage:"Pas assez de caractère. Il faut au moins {{ limit }} caractères", maxMessage:"Trop de caractère. Il faut au maximum {{ limit }} caractères")]
    #[Assert\Regex(pattern: '/^[^0-9]{2,25}$/', message: "Le prénom ne peut contenir que des lettres")]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    #[Assert\Length(min: 10, max: 10, exactMessage: "Le nombres de caractères souhaités est de {{ limit }}")]
    #[Assert\Regex(pattern: '/^[0-9]{10}$/', message:"Le téléphone doit être composé uniquement de chiffres")]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    #[Assert\Length(min:8, max:50, minMessage:"Pas assez de caractère. Il faut au moins {{ limit }} caractères", maxMessage:"Trop de caractère. Il faut au maximum {{ limit }} caractères")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    #[Assert\Length(min:5, max:50, minMessage:"Pas assez de caractère. Il faut au moins {{ limit }} caractères", maxMessage:"Trop de caractère. Il faut au maximum {{ limit }} caractères")]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?string $poste = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    #[Assert\Regex(pattern: '/^(?:[5-9]\d{2}|[1-9]\d{3,4}|100000)$/',
    message: "Le salaire doit être un nombre entre 500 et 100000")]
    private ?float $salaire = null;

    #[ORM\Column(type: 'date')]
    #[Assert\NotBlank(message:"Ce champ ne peut pas être vide")]
    private ?\DateTimeInterface $datedenaissance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): static
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?float
    {
        return $this->salaire;
    }

    public function setSalaire(float $salaire): static
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(?DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;
        return $this;
    }
}
