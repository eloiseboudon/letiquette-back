<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 18/10/2017
 * Time: 16:02
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;



/**
 * Fournisseurs
 *
 * @ORM\Table(name="fournisseurs")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FournisseursRepository")
 */

class Fournisseurs
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Villes", cascade={"persist"})
     * @var Villes
     */
    private $ville;


    /**
     * @var string
     *
     * @ORM\Column(name="nomMarque", type="string", length=255)
     *
     * @Serializer\Groups({"produit"})
     */
    private $nomMarque;

    /**
     * @var string
     *
     * @ORM\Column(name="nomResponsable", type="string", length=255)
     */
    private $nomResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="adMail", type="string", length=255)
     */
    private $adMail;

    /**
     * @var string
     *
     * @ORM\Column(name="Adresse", type="string", length=255)
     */
    private $adresse;


    /**
     * @var string
     *
     * @ORM\Column(name="numTel", type="string", length=255)
     */
    private $numTel;

    /**
     * @ORM\Column(name="logo", type="text")
     *
     * @Serializer\Groups({"produit"})
     */
    private $logo;



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
     * Set nomMarque
     *
     * @param string $nomMarque
     *
     * @return Fournisseurs
     */
    public function setNomMarque($nomMarque)
    {
        $this->nomMarque = $nomMarque;

        return $this;
    }

    /**
     * Get nomMarque
     *
     * @return string
     */
    public function getNomMarque()
    {
        return $this->nomMarque;
    }

    /**
     * Set nomResponsable
     *
     * @param string $nomResponsable
     *
     * @return Fournisseurs
     */
    public function setNomResponsable($nomResponsable)
    {
        $this->nomResponsable = $nomResponsable;

        return $this;
    }

    /**
     * Get nomResponsable
     *
     * @return string
     */
    public function getNomResponsable()
    {
        return $this->nomResponsable;
    }

    /**
     * Set adMail
     *
     * @param string $adMail
     *
     * @return Fournisseurs
     */
    public function setAdMail($adMail)
    {
        $this->adMail = $adMail;

        return $this;
    }

    /**
     * Get adMail
     *
     * @return string
     */
    public function getAdMail()
    {
        return $this->adMail;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Fournisseurs
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set numTel
     *
     * @param string $numTel
     *
     * @return Fournisseurs
     */
    public function setNumTel($numTel)
    {
        $this->numTel = $numTel;

        return $this;
    }

    /**
     * Get numTel
     *
     * @return string
     */
    public function getNumTel()
    {
        return $this->numTel;
    }

    /**
     * Set logo
     *
     * @param string $logo
     *
     * @return Fournisseurs
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set ville
     *
     * @param \AppBundle\Entity\Villes $ville
     *
     * @return Fournisseurs
     */
    public function setVille(\AppBundle\Entity\Villes $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \AppBundle\Entity\Villes
     */
    public function getVille()
    {
        return $this->ville;
    }
}
