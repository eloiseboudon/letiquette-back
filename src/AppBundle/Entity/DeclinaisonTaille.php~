<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 19/10/2017
 * Time: 09:37
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeclinaisonTaille
 *
 * @ORM\Table(name="declinaisonTaille")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeclinaisonTailleRepository")
 */
class DeclinaisonTaille
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
     * Set produits
     *
     * @param \AppBundle\Entity\Produits $produits
     *
     * @return DeclinaisonTaille
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
     * Set taille
     *
     * @param \AppBundle\Entity\Tailles $taille
     *
     * @return DeclinaisonTaille
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
