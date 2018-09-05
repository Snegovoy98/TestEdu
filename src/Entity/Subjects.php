<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubjectsRepository")
 */
class Subjects
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
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Classes")
     */
    private $class;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $no;

    public function __construct()
    {
        $this->class = new ArrayCollection();
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

    /**
     * @return Collection|Classes[]
     */
    public function getClass(): Collection
    {
        return $this->class;
    }

    public function addClass(Classes $class): self
    {
        if (!$this->class->contains($class)) {
            $this->class[] = $class;
        }

        return $this;
    }

    public function removeClass(Classes $class): self
    {
        if ($this->class->contains($class)) {
            $this->class->removeElement($class);
        }

        return $this;
    }

    public function getNo(): ?string
    {
        return $this->no;
    }

    public function setNo(string $no): self
    {
        $this->no = $no;

        return $this;
    }
}
