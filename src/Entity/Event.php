<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
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
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=EventTime::class, mappedBy="eventId")
     */
    private $eventTimes;

    /**
     * @ORM\OneToMany(targetEntity=EventCustom::class, mappedBy="eventId", orphanRemoval=true)
     */
    private $eventCustoms;

    /**
     * @ORM\OneToMany(targetEntity=EventBid::class, mappedBy="eventId", orphanRemoval=true)
     */
    private $eventBids;

    public function __construct()
    {
        $this->eventTimes = new ArrayCollection();
        $this->eventCustoms = new ArrayCollection();
        $this->eventBids = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|EventTime[]
     */
    public function getEventTimes(): Collection
    {
        return $this->eventTimes;
    }

    public function addEventTime(EventTime $eventTime): self
    {
        if (!$this->eventTimes->contains($eventTime)) {
            $this->eventTimes[] = $eventTime;
            $eventTime->setEventId($this);
        }

        return $this;
    }

    public function removeEventTime(EventTime $eventTime): self
    {
        if ($this->eventTimes->contains($eventTime)) {
            $this->eventTimes->removeElement($eventTime);
            // set the owning side to null (unless already changed)
            if ($eventTime->getEventId() === $this) {
                $eventTime->setEventId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EventCustom[]
     */
    public function getEventCustoms(): Collection
    {
        return $this->eventCustoms;
    }

    public function addEventCustom(EventCustom $eventCustom): self
    {
        if (!$this->eventCustoms->contains($eventCustom)) {
            $this->eventCustoms[] = $eventCustom;
            $eventCustom->setEventId($this);
        }

        return $this;
    }

    public function removeEventCustom(EventCustom $eventCustom): self
    {
        if ($this->eventCustoms->contains($eventCustom)) {
            $this->eventCustoms->removeElement($eventCustom);
            // set the owning side to null (unless already changed)
            if ($eventCustom->getEventId() === $this) {
                $eventCustom->setEventId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|EventBid[]
     */
    public function getEventBids(): Collection
    {
        return $this->eventBids;
    }

    public function addEventBid(EventBid $eventBid): self
    {
        if (!$this->eventBids->contains($eventBid)) {
            $this->eventBids[] = $eventBid;
            $eventBid->setEventId($this);
        }

        return $this;
    }

    public function removeEventBid(EventBid $eventBid): self
    {
        if ($this->eventBids->contains($eventBid)) {
            $this->eventBids->removeElement($eventBid);
            // set the owning side to null (unless already changed)
            if ($eventBid->getEventId() === $this) {
                $eventBid->setEventId(null);
            }
        }

        return $this;
    }
}
