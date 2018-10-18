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
     * @ORM\Column(type="integer")
     */
    private $class_number;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Schools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $school;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClassNumber(): ?int
    {
        return $this->class_number;
    }

    public function setClassNumber(int $class_number): self
    {
        $this->class_number = $class_number;

        return $this;
    }

    public function getSchool(): ?Schools
    {
        return $this->school;
    }

    public function setSchool(?Schools $school): self
    {
        $this->school = $school;

        return $this;
    }
}
