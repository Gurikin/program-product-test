<?php

namespace App\Entity;

use App\Repository\EventCustomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventCustomRepository::class)
 */
class EventCustom
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Event::class, inversedBy="eventCustoms")
     * @ORM\JoinColumn(nullable=false)
     */
    private $eventId;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\OneToMany(targetEntity=EventCustomTime::class, mappedBy="customId", orphanRemoval=true)
     */
    private $eventCustomTimes;

    public function __construct()
    {
        $this->eventCustomTimes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEventId(): ?Event
    {
        return $this->eventId;
    }

    public function setEventId(?Event $eventId): self
    {
        $this->eventId = $eventId;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|EventCustomTime[]
     */
    public function getEventCustomTimes(): Collection
    {
        return $this->eventCustomTimes;
    }

    public function addEventCustomTime(EventCustomTime $eventCustomTime): self
    {
        if (!$this->eventCustomTimes->contains($eventCustomTime)) {
            $this->eventCustomTimes[] = $eventCustomTime;
            $eventCustomTime->setCustomId($this);
        }

        return $this;
    }

    public function removeEventCustomTime(EventCustomTime $eventCustomTime): self
    {
        if ($this->eventCustomTimes->contains($eventCustomTime)) {
            $this->eventCustomTimes->removeElement($eventCustomTime);
            // set the owning side to null (unless already changed)
            if ($eventCustomTime->getCustomId() === $this) {
                $eventCustomTime->setCustomId(null);
            }
        }

        return $this;
    }
}
