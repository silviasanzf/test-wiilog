<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/^[a-zA-Z\-]+$/", match=true, message="Le champs ne prend que des lettres ou tiret")
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Regex(pattern="/^[a-zA-Z\-]+$/", match=true, message="Le champs ne prend que des lettres ou tiret")
     */
    private $firstName;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/", match=true, message="Le format attendu est 00 00 00 00 00")
     */
    private $mobilPhone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$/", match=true, message="Le format attendu est 00 00 00 00 00")
     */
    private $officePhone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Regex(pattern="/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$/", match=true, message="le format n'est pas conforme")
     */
    private $email;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="contact")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;



    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Civility", inversedBy="contacts")
     */
    private $civility;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Role", inversedBy="contacts")
     */
    private $roles;

    public function __construct()
    {

        $this->roles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }


    public function getMobilPhone(): ?string
    {
        return $this->mobilPhone;
    }

    public function setMobilPhone(?string $mobilPhone): self
    {
        $this->mobilPhone = $mobilPhone;

        return $this;
    }

    public function getOfficePhone(): ?string
    {
        return $this->officePhone;
    }

    public function setOfficePhone(?string $officePhone): self
    {
        $this->officePhone = $officePhone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }



    public function addRole(Role $role): self
    {
        if (!$this->roles->contains($role)) {
            $this->roles[] = $role;
        }

        return $this;
    }

    public function removeRole(Role $role): self
    {
        if ($this->roles->contains($role)) {
            $this->roles->removeElement($role);
        }

        return $this;
    }


    public function getCivility(): ?Civility
    {
        return $this->civility;
    }

    public function setCivility(?Civility $civility): self
    {
        $this->civility = $civility;

        return $this;
    }

    public function __toString() {
        return $this->name;
    }

    /**
     * @return Collection|Role[]
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }
    public function setRoles(?Roles $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
}
