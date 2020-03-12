<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Guest
 *
 * @ORM\Table(name="guest")
 * @ORM\Entity
 */
class Guest
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
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=80, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=80, nullable=false)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="member_since", type="date", nullable=false)
     */
    private $memberSince;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getMemberSince(): ?\DateTimeInterface
    {
        return $this->memberSince;
    }

    public function setMemberSince(\DateTimeInterface $memberSince): self
    {
        $this->memberSince = $memberSince;

        return $this;
    }


}
