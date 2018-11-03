<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AvatarsRepository")
 */
class Avatars
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
    private $avatar;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserSettings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $setting;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(string $avatar): self
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getSetting(): ?UserSettings
    {
        return $this->setting;
    }

    public function setSetting(?UserSettings $setting): self
    {
        $this->setting = $setting;

        return $this;
    }
}
