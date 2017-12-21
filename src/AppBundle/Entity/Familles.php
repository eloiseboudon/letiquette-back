<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 19/10/2017
 * Time: 08:10
 */

namespace AppBundle\Entity;



use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Familles
 *
 * @ORM\Table(name="familles")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FamillesRepository")
 */
class Familles
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
     * @var string
     *
     * @ORM\Column(name="Famille", type="string", length=255)
     *
     * @Serializer\Groups({"produits"})
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="Sexe", type="string", length=10)
     */
    private $sexe;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FamilleGlobal", cascade={"persist"})
     * @var FamilleGlobal
     */
    private $familleGlobal;


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
     * Set famille
     *
     * @param string $famille
     *
     * @return Familles
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Familles
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set familleGlobal
     *
     * @param \AppBundle\Entity\FamilleGlobal $familleGlobal
     *
     * @return Familles
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
