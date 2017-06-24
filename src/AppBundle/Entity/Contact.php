<?php
// src/AppBundle/Entity/Contact.php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Contact
{
     /**
     * @Assert\NotBlank()
     */
    protected $name_and_surname;
     /**
     * @Assert\NotBlank()
     * 
     */
    protected $email_address;

    protected $company;
    
    protected $telephone_number;
    
     /**
     * @Assert\NotBlank()
     */
    protected $message;

    public function getNameAndSurname()
    {
        return $this->name_and_surname;
    }

    public function setNameAndSurname($name)
    {
        $this->name_and_surname = $name;
    }

    public function getEmailAddress()
    {
        return $this->email_address;
    }

    public function setEmailAddress($email)
    {
        $this->email_address = $email;
    }
    
    public function getCompany()
    {
        return $this->company;
    }
    
    public function setCompany($company)
    {
        $this->company = $company;
    }
    
    public function getTelephoneNumber()
    {
        return $this->company;
    }
    
    public function setTelephoneNumber($telephone)
    {
        $this->telephone_number = $telephone;
    }
   
    public function setMessage($message)
    {
        $this->message = $message;
    }
    public function getMessage()
    {
        return $this->message;
    }
}

