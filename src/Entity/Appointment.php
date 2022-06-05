<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Appointment
{
     /**
     * @var string
     * @Assert\NotBlank(message="Thanks to indicate your first name")
     * @Assert\Length(min=2, max=100)
     */
    private $firstName;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(min=2, max=100)
     */
    private $lastName;

    /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Email()
     */
    private $email;

    /**
     * @var string
     * @Assert\NotBlank()
     */
    private $phone;

     /**
     * @var string
     * @Assert\NotBlank()
     */
    private $disease;

     /**
     * @var string
     * @Assert\NotBlank()
     */
    private $methodContact;

     /**
     * @var string
     * @Assert\NotBlank()
     * @Assert\Length(
     *  min=10,
     *  max=255,
     *  minMessage = "Your message must contain at least 10 characters",
     *  maxMessage = "Your message must contain less than 255 characters"
     * )
     */
    private $message;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getDisease(): ?string
    {
        return $this->disease;
    }

    public function setDisease(string $disease): self
    {
        $this->disease = $disease;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get the value of methodContact
     *
     * @return  string
     */ 
    public function getMethodContact()
    {
        return $this->methodContact;
    }

    /**
     * Set the value of methodContact
     *
     * @param  string  $methodContact
     *
     * @return  self
     */ 
    public function setMethodContact(string $methodContact)
    {
        $this->methodContact = $methodContact;

        return $this;
    }
}
