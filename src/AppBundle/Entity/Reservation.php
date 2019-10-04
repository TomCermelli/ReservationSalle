<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne as ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn as JoinColumn;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReservationRepository")
 */
class Reservation
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
    * @var int
    *
    * @ORM\Column(name="numero_semaine", type="integer")
    */
    private $numeroSemaine;

    /**
     *
     * @ManyToOne(targetEntity="Formateur", inversedBy="nomComplet")
     * @JoinColumn(name="fk_formateur_id", referencedColumnName="id")
     */
    private $formateur;

    /**
     * @ManyToOne(targetEntity="Horaire")
     * @JoinColumn(name="fk_horaire_id", referencedColumnName="id")
     */
    private $horaire;

    /**
     * @ManyToOne(targetEntity="Semaine")
     * @JoinColumn(name="fk_semaine_id", referencedColumnName="id")
     */
    private $semaine;

    /**
     * @ManyToOne(targetEntity="Promo")
     * @JoinColumn(name="fk_promo_id", referencedColumnName="id")
     */
    private $promo;

    /**
     * @ManyToOne(targetEntity="Salle")
     * @JoinColumn(name="fk_salle_id", referencedColumnName="id")
     */
    private $salle;

    /**
     * @ManyToOne(targetEntity="Salle")
     * @JoinColumn(name="fk_etage_id", referencedColumnName="id")
     */
    private $etage;


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
     * @param mixed $formateur
     */
    public function setFormateur($formateur)
    {
        $this->formateur = $formateur;
    }

    /**
     * @return mixed
     */
    public function getFormateur()
    {
        return $this->formateur;
    }

    /**
     * @param mixed $horaire
     */
    public function setHoraire($horaire)
    {
        $this->horaire = $horaire;
    }

    /**
     * @return mixed
     */
    public function getHoraire()
    {
        return $this->horaire;
    }

    /**
     * @param mixed $semaine
     */
    public function setSemaine($semaine)
    {
        $this->semaine = $semaine;
    }

    /**
     * @return mixed
     */
    public function getSemaine()
    {
        return $this->semaine;
    }

    /**
     * @param mixed $promo
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;
    }

    /**
     * @return mixed
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * @param mixed $salle
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;
    }

    /**
     * @return mixed
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * @param mixed $etage
     */
    public function setEtage($etage)
    {
        $this->etage = $etage;
    }

    /**
     * @return mixed
     */
    public function getEtage()
    {
        return $this->etage;
    }

    /**
     * @param int $numeroSemaine
     */
    public function setNumeroSemaine($numeroSemaine)
    {
        $this->numeroSemaine = $numeroSemaine;
    }

    /**
     * @return int
     */
    public function getNumeroSemaine()
    {
        return $this->numeroSemaine;
    }
    public function __toString()
    {
        $format = "%s,%s,%s,%s,%s";
        return sprintf($format, $this->numeroSemaine, $this->salle, $this->etage, $this->formateur,$this->promo);
    }
}

