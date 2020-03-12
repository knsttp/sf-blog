<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="FK_16", columns={"guest_id"})})
 * @ORM\Entity
 */
class Reservation
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_in", type="date", nullable=false)
     */
    private $dateIn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_out", type="date", nullable=false)
     */
    private $dateOut;

    /**
     * @var string
     *
     * @ORM\Column(name="made_by", type="string", length=20, nullable=false)
     */
    private $madeBy;

    /**
     * @var int
     *
     * @ORM\Column(name="guest_id", type="integer", nullable=false)
     */
    private $guestId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateIn(): ?\DateTimeInterface
    {
        return $this->dateIn;
    }

    public function setDateIn(\DateTimeInterface $dateIn): self
    {
        $this->dateIn = $dateIn;

        return $this;
    }

    public function getDateOut(): ?\DateTimeInterface
    {
        return $this->dateOut;
    }

    public function setDateOut(\DateTimeInterface $dateOut): self
    {
        $this->dateOut = $dateOut;

        return $this;
    }

    public function getMadeBy(): ?string
    {
        return $this->madeBy;
    }

    public function setMadeBy(string $madeBy): self
    {
        $this->madeBy = $madeBy;

        return $this;
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


}
