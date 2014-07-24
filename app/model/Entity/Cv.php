<?php

namespace App\Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="cv")
 * @method self setName(string $value)
 * @method self setMail(string $value)
 * @method self setPhone(string $value)
 * @method self setMobile(string $value)
 * @method self setAddress(string $value)
 * @method self setDateOfBirth(\DateTime $value)
 * @method self setNationality(string $value)
 * @method self setMotherTongue(string $value)
 * @method self setNonParsed(string $value)
 * @method string getName()
 * @method string getMail()
 * @method string getPhone()
 * @method string getMobile()
 * @method string getAddress()
 * @method \DateTime getDateOfBirth()
 * @method string getNationality()
 * @method string getMotherTongue()
 * @method string getNonParsed()
 */
class Cv extends Entity
{

    /**
     * @ORM\Column(name="extern_id", type="string")
     */
    protected $externId;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $mail;

    /**
     * @ORM\Column(type="string")
     */
    protected $phone;

    /**
     * @ORM\Column(type="string")
     */
    protected $mobile;

    /**
     * @ORM\Column(type="string")
     */
    protected $address;

    /**
     * @ORM\Column(name="date_of_birth", type="datetime")
     */
    protected $dateOfBirth;

    /**
     * @ORM\Column(type="string")
     */
    protected $nationality;

    /**
     * @ORM\Column(name="mother_tongue", type="string")
     */
    protected $motherTongue;

    /**
     * @ORM\Column(name="non_parsed_html", type="text")
     */
    protected $nonParsed;
    
    // <editor-fold defaultstate="collapsed" desc="setters">
    // </editor-fold>
    // <editor-fold defaultstate="collapsed" desc="getters">
    // </editor-fold>

    /**
     * Render entity
     * @return string
     */
    public function render()
    {
        return $this->getName();
    }

}
