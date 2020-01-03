<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offices
 *
 * @ORM\Table(name="offices")
 * @ORM\Entity
 */
class Offices
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=255, nullable=false)
     */
    private $street = '';

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=false)
     */
    private $city = '';

    /**
     * @var float
     *
     * @ORM\Column(name="latitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $latitude;

    /**
     * @var float
     *
     * @ORM\Column(name="longitude", type="float", precision=10, scale=0, nullable=false)
     */
    private $longitude;

    /**
     * @var string
     *
     * @ORM\Column(name="is_open_in_weekends", type="string", length=0, nullable=false, options={"default"="N"})
     */
    private $isOpenInWeekends = 'N';

    /**
     * @var string
     *
     * @ORM\Column(name="has_support_desk", type="string", length=0, nullable=false, options={"default"="N"})
     */
    private $hasSupportDesk = 'N';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getIsOpenInWeekends(): ?string
    {
        return $this->isOpenInWeekends;
    }

    public function setIsOpenInWeekends(string $isOpenInWeekends): self
    {
        $this->isOpenInWeekends = $isOpenInWeekends;

        return $this;
    }

    public function getHasSupportDesk(): ?string
    {
        return $this->hasSupportDesk;
    }

    public function setHasSupportDesk(string $hasSupportDesk): self
    {
        $this->hasSupportDesk = $hasSupportDesk;

        return $this;
    }


}
