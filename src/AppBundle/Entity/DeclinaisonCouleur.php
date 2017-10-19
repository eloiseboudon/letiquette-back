<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 19/10/2017
 * Time: 09:38
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * DeclinaisonCouleur
 *
 * @ORM\Table(name="declinaisonCouleur")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeclinaisonCouleurRepository")
 */
class DeclinaisonCouleur
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produits", cascade={"persist"})
     * @var Produits
     */
    private $produits;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Couleurs", cascade={"persist"})
     * @var Couleurs
     */
    private $couleur;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set produits
     *
     * @param \AppBundle\Entity\Produits $produits
     *
     * @return DeclinaisonCouleur
     */
    public function setProduits(\AppBundle\Entity\Produits $produits = null)
    {
        $this->produits = $produits;

        return $this;
    }

    /**
     * Get produits
     *
     * @return \AppBundle\Entity\Produits
     */
    public function getProduits()
    {
        return $this->produits;
    }

    /**
     * Set couleur
     *
     * @param \AppBundle\Entity\Couleurs $couleur
     *
     * @return DeclinaisonCouleur
     */
    public function setCouleur(\AppBundle\Entity\Couleurs $couleur = null)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return \AppBundle\Entity\Couleurs
     */
    public function getCouleur()
    {
        return $this->couleur;
    }
}
