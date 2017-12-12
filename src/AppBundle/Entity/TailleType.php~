<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 23/10/2017
 * Time: 15:47
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TailleType
 *
 * @ORM\Table(name="tailleType")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TailleTypeRepository")
 *
 * */
class TailleType
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FamilleGlobal", cascade={"persist"})
     * @var FamilleGlobal
     */
    private $familleGlobal;




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
     * Set taille
     *
     * @param \AppBundle\Entity\Tailles $taille
     *
     * @return TailleType
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




    /**
     * Set familleGlobal
     *
     * @param \AppBundle\Entity\FamilleGlobal $familleGlobal
     *
     * @return TailleType
     */
    public function setFamilleGlobal(\AppBundle\Entity\FamilleGlobal $familleGlobal = null)
    {
        $this->familleGlobal = $familleGlobal;

        return $this;
    }

    /**
     * Get familleGlobal
     *
     * @return \AppBundle\Entity\FamilleGlobal
     */
    public function getFamilleGlobal()
    {
        return $this->familleGlobal;
    }
}
