<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 18/10/2017
 * Time: 15:51
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use UserBundle\Entity\User;


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
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User", cascade={"persist"})
     * @var User
     */
    private $user;



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

    /**
     * Set user.
     *
     * @param \UserBundle\Entity\User|null $user
     *
     * @return DetailsEthique
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
