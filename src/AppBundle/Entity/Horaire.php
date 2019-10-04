<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horaire
 *
 * @ORM\Table(name="horaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\HoraireRepository")
 */
class Horaire
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
     * @ORM\Column(name="demi_journee", type="string", length=255, unique=true)
     */
    private $demiJournee;


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
     * Set demiJournee
     *
     * @param string $demiJournee
     *
     * @return Horaire
     */
    public function setDemiJournee($demiJournee)
    {
        $this->demiJournee = $demiJournee;

        return $this;
    }

    /**
     * Get demiJournee
     *
     * @return string
     */
    public function getDemiJournee()
    {
        return $this->demiJournee;
    }
    public function __toString()
    {
        $format = "%s";
        return sprintf($format, $this->demiJournee);
    }
}

