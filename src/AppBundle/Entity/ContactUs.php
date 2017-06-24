<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContactUs
 *
 * @ORM\Table(name="contact_us")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactUsRepository")
 */
class ContactUs
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name_and_surname", type="text", unique=true)
     */
    private $nameAndSurname;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="text", unique=true)
     */
    private $emailAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="text")
     */
    private $company;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text")
     */
    private $message;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nameAndSurname
     *
     * @param string $nameAndSurname
     *
     * @return ContactUs
     */
    public function setNameAndSurname($nameAndSurname)
    {
        $this->nameAndSurname = $nameAndSurname;

        return $this;
    }

    /**
     * Get nameAndSurname
     *
     * @return string
     */
    public function getNameAndSurname()
    {
        return $this->nameAndSurname;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return ContactUs
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set company
     *
     * @param string $company
     *
     * @return ContactUs
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return ContactUs
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return int
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set message
     *
     * @param string $message
     *
     * @return ContactUs
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
