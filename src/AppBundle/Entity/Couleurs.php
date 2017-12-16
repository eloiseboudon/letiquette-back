<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 19/10/2017
 * Time: 08:13
 */

namespace AppBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Couleurs
 *
 * @ORM\Table(name="couleurs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CouleursRepository")
 */
class Couleurs
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
     * @ORM\Column(name="Couleur", type="string", length=255)
     */
    private $couleur;


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
     * Set couleur
     *
     * @param string $couleur
     *
     * @return Couleurs
     */
    public function setCouleur($couleur)
    {
        $this->Couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string
     */
    public function getCouleur()
    {
        return $this->Couleur;
    }
}
