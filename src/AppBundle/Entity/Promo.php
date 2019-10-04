<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promo
 *
 * @ORM\Table(name="promo")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromoRepository")
 */
class Promo
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
     * @ORM\Column(name="nom_promo", type="string", length=255, unique=true)
     */
    private $nomPromo;

    /**
     * @var int
     *
     * @ORM\Column(name="nbr_eleve", type="integer")
     */
    private $nbrEleve;


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
     * Set nomPromo
     *
     * @param string $nomPromo
     *
     * @return Promo
     */
    public function setNomPromo($nomPromo)
    {
        $this->nomPromo = $nomPromo;

        return $this;
    }

    /**
     * Get nomPromo
     *
     * @return string
     */
    public function getNomPromo()
    {
        return $this->nomPromo;
    }

    /**
     * Set nbrEleve
     *
     * @param integer $nbrEleve
     *
     * @return Promo
     */
    public function setNbrEleve($nbrEleve)
    {
        $this->nbrEleve = $nbrEleve;

        return $this;
    }

    /**
     * Get nbrEleve
     *
     * @return int
     */
    public function getNbrEleve()
    {
        return $this->nbrEleve;
    }
    public function __toString()
    {
        $format = "%s,nombre d'élèves %s";
        return sprintf($format, $this->nomPromo, $this->nbrEleve);
    }
}

