<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 19/10/2017
 * Time: 09:40
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produits
 *
 * @ORM\Table(name="produits")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitsRepository")
 */
class Produits
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Familles", cascade={"persist"})
     * @var Familles
     */
    private $famille;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Fournisseurs", cascade={"persist"})
     * @var Fournisseurs
     */
    private $fournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="Libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="Prix", type="decimal", scale=2)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="text")
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="text")
     */
    private $description;


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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Produits
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set prix
     *
     * @param string $prix
     *
     * @return Produits
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Produits
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produits
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set famille
     *
     * @param \AppBundle\Entity\Familles $famille
     *
     * @return Produits
     */
    public function setFamille(\AppBundle\Entity\Familles $famille = null)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return \AppBundle\Entity\Familles
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set fournisseur
     *
     * @param \AppBundle\Entity\Fournisseurs $fournisseur
     *
     * @return Produits
     */
    public function setFournisseur(\AppBundle\Entity\Fournisseurs $fournisseur = null)
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    /**
     * Get fournisseur
     *
     * @return \AppBundle\Entity\Fournisseurs
     */
    public function getFournisseur()
    {
        return $this->fournisseur;
    }
}
