<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 19/10/2017
 * Time: 09:57
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailPanier
 *
 * @ORM\Table(name="detailPanier")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetailPanierRepository")
 */
class DetailPanier
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Panier", cascade={"persist"})
     * @var Panier
     */
    private $panier;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produits", cascade={"persist"})
     * @var Produits
     */
    private $produit;

    /**
     * @var string
     *
     * @ORM\Column(name="Quantite", type="integer")
     */
    private $quantite;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Tailles", cascade={"persist"})
     * @var Tailles
     */
    private $taille;




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
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return DetailPanier
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set panier
     *
     * @param \AppBundle\Entity\Panier $panier
     *
     * @return DetailPanier
     */
    public function setPanier(\AppBundle\Entity\Panier $panier = null)
    {
        $this->panier = $panier;

        return $this;
    }

    /**
     * Get panier
     *
     * @return \AppBundle\Entity\Panier
     */
    public function getPanier()
    {
        return $this->panier;
    }

    /**
     * Set produit
     *
     * @param \AppBundle\Entity\Produits $produit
     *
     * @return DetailPanier
     */
    public function setProduit(\AppBundle\Entity\Produits $produit = null)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \AppBundle\Entity\Produits
     */
    public function getProduit()
    {
        return $this->produit;
    }

    /**
     * Set taille
     *
     * @param \AppBundle\Entity\Tailles $taille
     *
     * @return DetailPanier
     */
    public function setTaille(\AppBundle\Entity\Tailles $taille = null)
    {
        $this->taille = $taille;

        return $this;
    }

    /**
     * Get taille
     *
     * @return \AppBundle\Entity\Tailles
     */
    public function getTaille()
    {
        return $this->taille;
    }
}
