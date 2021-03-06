<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 17/01/2018
 * Time: 16:20
 */


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Panier
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Membres", cascade={"persist"})
     * @var Membres
     */
    private $membre;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Panier", cascade={"persist"})
     * @var Panier
     */
    private $panier;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Adresse", cascade={"persist"})
     * @var Adresse
     */
    private $livraison;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Adresse", cascade={"persist"})
     * @var Adresse
     */
    private $facturation;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set membre.
     *
     * @param \AppBundle\Entity\Membres|null $membre
     *
     * @return Commande
     */
    public function setMembre(\AppBundle\Entity\Membres $membre = null)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre.
     *
     * @return \AppBundle\Entity\Membres|null
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * Set panier.
     *
     * @param \AppBundle\Entity\Panier|null $panier
     *
     * @return Commande
     */
    public function setPanier(\AppBundle\Entity\Panier $panier = null)
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * Get panier.
     *
     * @return \AppBundle\Entity\Panier|null
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * Set livraison.
     *
     * @param \AppBundle\Entity\Adresse|null $livraison
     *
     * @return Commande
     */
    public function setLivraison(\AppBundle\Entity\Adresse $livraison = null)
    {
        $this->livraison = $livraison;

        return $this;
    }

    /**
     * Get livraison.
     *
     * @return \AppBundle\Entity\Adresse|null
     */
    public function getLivraison()
    {
        return $this->livraison;
    }

    /**
     * Set facturation.
     *
     * @param \AppBundle\Entity\Adresse|null $facturation
     *
     * @return Commande
     */
    public function setFacturation(\AppBundle\Entity\Adresse $facturation = null)
    {
        $this->facturation = $facturation;

        return $this;
    }

    /**
     * Get facturation.
     *
     * @return \AppBundle\Entity\Adresse|null
     */
    public function getFacturation()
    {
        return $this->facturation;
    }



    /**
     * Set date.
     *
     * @param \DateTime $date
     *
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
