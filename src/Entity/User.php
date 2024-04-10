<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'fos_user')]
#[ORM\Entity]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    protected $id;

    public function __construct()
    {
    }

    #[ORM\Column(name: 'name', type: 'string', length: 255, nullable: true)]
    protected $name;

    #[ORM\Column(name: 'first_name', type: 'string', length: 255, nullable: true)]
    protected $firstName;

    #[ORM\Column(name: 'last_name', type: 'string', length: 255, nullable: true)]
    protected $lastName;

    #[ORM\Column(name: 'phone_number', type: 'string', length: 255, nullable: true)]
    protected $phoneNumber;

    #[ORM\Column(name: 'location', type: 'string', length: 255, nullable: true)]
    protected $location;

    #[ORM\Column(name: 'website', type: 'string', length: 255, nullable: true)]
    protected $website;

    #[ORM\Column(type: 'string', name: 'provider_id', nullable: true)]
    protected $providerId;


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function setName(mixed $name): void
    {
        $this->name = $name;
    }


    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName(mixed $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName(mixed $lastName): void
    {
        $this->lastName = $lastName;
    }


    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation(mixed $location): void
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getWebsite()
    {
        return $this->website;
    }

    public function setWebsite(mixed $website): void
    {
        $this->website = $website;
    }

    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    public function setProviderId(mixed $providerId): void
    {
        $this->providerId = $providerId;
    }

}
