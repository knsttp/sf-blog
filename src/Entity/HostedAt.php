<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HostedAt
 *
 * @ORM\Table(name="hosted_at", indexes={@ORM\Index(name="FK_29", columns={"guest_id"}), @ORM\Index(name="FK_51", columns={"occupied_room_id"})})
 * @ORM\Entity
 */
class HostedAt
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="guest_id", type="integer", nullable=false)
     */
    private $guestId;

    /**
     * @var int
     *
     * @ORM\Column(name="occupied_room_id", type="integer", nullable=false)
     */
    private $occupiedRoomId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGuestId(): ?int
    {
        return $this->guestId;
    }

    public function setGuestId(int $guestId): self
    {
        $this->guestId = $guestId;

        return $this;
    }

    public function getOccupiedRoomId(): ?int
    {
        return $this->occupiedRoomId;
    }

    public function setOccupiedRoomId(int $occupiedRoomId): self
    {
        $this->occupiedRoomId = $occupiedRoomId;

        return $this;
    }


}
