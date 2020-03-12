<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OccupiedRoom
 *
 * @ORM\Table(name="occupied_room", indexes={@ORM\Index(name="FK_39", columns={"reservation_id"}), @ORM\Index(name="FK_48", columns={"room_id"})})
 * @ORM\Entity
 */
class OccupiedRoom
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="check_in", type="datetime", nullable=true)
     */
    private $checkIn;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="check_out", type="datetime", nullable=true)
     */
    private $checkOut;

    /**
     * @var int
     *
     * @ORM\Column(name="reservation_id", type="integer", nullable=false)
     */
    private $reservationId;

    /**
     * @var int
     *
     * @ORM\Column(name="room_id", type="integer", nullable=false)
     */
    private $roomId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheckIn(): ?\DateTimeInterface
    {
        return $this->checkIn;
    }

    public function setCheckIn(?\DateTimeInterface $checkIn): self
    {
        $this->checkIn = $checkIn;

        return $this;
    }

    public function getCheckOut(): ?\DateTimeInterface
    {
        return $this->checkOut;
    }

    public function setCheckOut(?\DateTimeInterface $checkOut): self
    {
        $this->checkOut = $checkOut;

        return $this;
    }

    public function getReservationId(): ?int
    {
        return $this->reservationId;
    }

    public function setReservationId(int $reservationId): self
    {
        $this->reservationId = $reservationId;

        return $this;
    }

    public function getRoomId(): ?int
    {
        return $this->roomId;
    }

    public function setRoomId(int $roomId): self
    {
        $this->roomId = $roomId;

        return $this;
    }


}
