<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 17/01/2018
 * Time: 16:20
 */


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set membre
     *
     * @param \AppBundle\Entity\Membres $membre
     *
     * @return Commande
     */
    public function setMembre(\AppBundle\Entity\Membres $membre = null)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     *
     * @return \AppBundle\Entity\Membres
     */
    public function getMembre()
    {
        return $this->membre;
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
}
