<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReservedRoom
 *
 * @ORM\Table(name="reserved_room", indexes={@ORM\Index(name="fk_reserved_room_room_type1", columns={"room_type_id"}), @ORM\Index(name="fk_reserved_room_reservation1", columns={"reservation_id"})})
 * @ORM\Entity
 */
class ReservedRoom
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
     * @var int|null
     *
     * @ORM\Column(name="number_of_rooms", type="integer", nullable=true)
     */
    private $numberOfRooms;

    /**
     * @var \Reservation
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reservation_id", referencedColumnName="id")
     * })
     */
    private $reservation;

    /**
     * @var \RoomType
     *
     * @ORM\ManyToOne(targetEntity="RoomType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="room_type_id", referencedColumnName="id")
     * })
     */
    private $roomType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberOfRooms(): ?int
    {
        return $this->numberOfRooms;
    }

    public function setNumberOfRooms(?int $numberOfRooms): self
    {
        $this->numberOfRooms = $numberOfRooms;

        return $this;
    }

    public function getReservation(): ?Reservation
    {
        return $this->reservation;
    }

    public function setReservation(?Reservation $reservation): self
    {
        $this->reservation = $reservation;

        return $this;
    }

    public function getRoomType(): ?RoomType
    {
        return $this->roomType;
    }

    public function setRoomType(?RoomType $roomType): self
    {
        $this->roomType = $roomType;

        return $this;
    }


}
