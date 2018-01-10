<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 18/10/2017
 * Time: 15:51
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;



/**
 * DetailsEthique
 *
 * @ORM\Table(name="detailsEthique")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DetailsEthiqueRepository")
*/

class DetailsEthique
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PointsEthique", cascade={"persist"})
     * @var PointsEthique
     */
    private $point;


    /**
     * @var int
     *
     * @ORM\Column(name="DetailPoint", type="integer", nullable=true)
     */
    private $detailPoint;





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
     * Set detailPoint
     *
     * @param integer $detailPoint
     *
     * @return DetailsEthique
     */
    public function setDetailPoint($detailPoint)
    {
        $this->detailPoint = $detailPoint;

        return $this;
    }

    /**
     * Get detailPoint
     *
     * @return integer
     */
    public function getDetailPoint()
    {
        return $this->detailPoint;
    }

    /**
     * Set membre
     *
     * @param \AppBundle\Entity\Membres $membre
     *
     * @return DetailsEthique
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
     * Set point
     *
     * @param \AppBundle\Entity\PointsEthique $point
     *
     * @return DetailsEthique
     */
    public function setPoint(\AppBundle\Entity\PointsEthique $point = null)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return \AppBundle\Entity\PointsEthique
     */
    public function getPoint()
    {
        return $this->point;
    }
}
