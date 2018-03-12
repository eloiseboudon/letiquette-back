<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 05/03/2018
 * Time: 08:33
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;

/**
 * Wishlist
 *
 * @ORM\Table(name="wishlist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WishlistRepository")
 */
class Wishlist
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
    private $produit;


    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", cascade={"persist"})
     * @var User
     */
    private $user;



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
     * Set produit
     *
     * @param \AppBundle\Entity\Produits $produit
     *
     * @return Wishlist
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
     * Set user.
     *
     * @param \UserBundle\Entity\User|null $user
     *
     * @return User
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \UserBundle\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }

}
