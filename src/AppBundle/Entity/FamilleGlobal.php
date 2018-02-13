<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 23/10/2017
 * Time: 16:34
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;


/**
 * FamilleGlobal
 *
 * @ORM\Table(name="familleGlobal")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FamilleGlobalRepository")
 *
 * */

class FamilleGlobal
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
     * @ORM\Column(name="familleGlobal", type="string", length=255)
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
     * Set familleGlobal
     *
     * @param string $familleGlobal
     *
     * @return FamilleGlobal
     */
    public function setFamilleGlobal($familleGlobal)
    {
        $this->familleGlobal = $familleGlobal;

        return $this;
    }

    /**
     * Get familleGlobal
     *
     * @return string
     */
    public function getFamilleGlobal()
    {
        return $this->familleGlobal;
    }
}
