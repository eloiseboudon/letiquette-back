<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 17/01/2018
 * Time: 16:20
 */


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;

/**
 * Panier
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommanderRepository")
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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", cascade={"persist"})
     * @var User
     */
    private $user;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Panier", cascade={"persist"})
     * @var Panier
     */
    private $panier;



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
     * Set panier
     *
     * @param \AppBundle\Entity\Panier $panier
     *
     * @return Commande
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
     * Set user.
     *
     * @param \UserBundle\Entity\User|null $user
     *
     * @return Commande
     */
    public function setUser(\UserBundle\Entity\User $user = null)
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
