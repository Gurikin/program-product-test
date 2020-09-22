<?php

namespace App\Entity;

use App\Repository\EventCustomTimeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventCustomTimeRepository::class)
 */
class EventCustomTime
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=EventCustom::class, inversedBy="eventCustomTimes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $customId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomId(): ?EventCustom
    {
        return $this->customId;
    }

    public function setCustomId(?EventCustom $customId): self
    {
        $this->customId = $customId;

        return $this;
    }

    public function getTime(): ?string
    {
        return $this->time;
    }

    public function setTime(string $time): self
    {
        $this->time = $time;

        return $this;
    }
}
