<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 15/12/2017
 * Time: 14:41
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * ImagesProduit
 *
 * @ORM\Table(name="imagesProduit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ImagesProduitRepository")
 */
class ImagesProduit
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Groups({"produits"})
     *
     */
    private $id;



    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produits", cascade={"persist"})
     * @var Produits
     */
    private $produit;


    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="text")
     * @Serializer\Groups({"produits"})
     *
     */
    private $image;


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
     * Set image
     *
     * @param string $image
     *
     * @return ImagesProduit
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
     * Set produit
     *
     * @param \AppBundle\Entity\Produits $produit
     *
     * @return ImagesProduit
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
}
