<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClassesRepository")
 */
class Classes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Schools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $class_number;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Schools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $School;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassNumber(): ?Schools
    {
        return $this->class_number;
    }

    public function setClassNumber(?Schools $class_number): self
    {
        $this->class_number = $class_number;

        return $this;
    }

    public function getSchool(): ?Schools
    {
        return $this->School;
    }

    public function setSchool(?Schools $School): self
    {
        $this->School = $School;

        return $this;
    }
}
