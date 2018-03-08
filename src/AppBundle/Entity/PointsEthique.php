<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 18/10/2017
 * Time: 15:34
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;




/**
 * PointsEthique
 *
 * @ORM\Table(name="pointsEthique")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PointsEthiqueRepository")
 */
class PointsEthique
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
     * @ORM\Column(name="nomEthique", type="string", length=255)
     */
    private $nomEthique;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="text")
     *
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
     * Set nomEthique
     *
     * @param string $nomEthique
     *
     * @return PointsEthique
     */
    public function setNomEthique($nomEthique)
    {
        $this->nomEthique = $nomEthique;

        return $this;
    }

    /**
     * Get nomEthique
     *
     * @return string
     */
    public function getNomEthique()
    {
        return $this->nomEthique;
    }


    /**
     * Set image
     *
     * @param string $image
     *
     * @return PointsEthique
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
}
