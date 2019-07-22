<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CampusRepository")
 */
class Campus
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Wilder", mappedBy="city")
     */
    private $wilders;

    public function __construct()
    {
        $this->wilders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return Collection|Wilder[]
     */
    public function getWilders(): Collection
    {
        return $this->wilders;
    }

    public function addWilder(Wilder $wilder): self
    {
        if (!$this->wilders->contains($wilder)) {
            $this->wilders[] = $wilder;
            $wilder->setCity($this);
        }

        return $this;
    }

    public function removeWilder(Wilder $wilder): self
    {
        if ($this->wilders->contains($wilder)) {
            $this->wilders->removeElement($wilder);
            // set the owning side to null (unless already changed)
            if ($wilder->getCity() === $this) {
                $wilder->setCity(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->city;
    }
}
