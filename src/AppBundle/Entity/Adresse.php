<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 13/03/2018
 * Time: 16:03
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * Membres
 *
 * @ORM\Table(name="adresse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdresseRepository")
 */
class Adresse
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
     * @var string
     *
     * @ORM\Column(name="nomAdresse", type="string", length=255)
     */
    private $nomAdresse;
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;
    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;


    /**
     * @var string
     *
     * @ORM\Column(name="adMail", type="string", length=255)
     */
    private $adMail;


    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255)
     */
    private $ville;


    /**
     * @var string
     *
     * @ORM\Column(name="codePostal", type="string", length=255)
     */
    private $codePostal;


    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=255)
     */
    private $pays;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomAdresse.
     *
     * @param string $nomAdresse
     *
     * @return Adresse
     */
    public function setNomAdresse($nomAdresse)
    {
        $this->nomAdresse = $nomAdresse;

        return $this;
    }

    /**
     * Get nomAdresse.
     *
     * @return string
     */
    public function getNomAdresse()
    {
        return $this->nomAdresse;
    }

    /**
     * Set nom.
     *
     * @param string $nom
     *
     * @return Adresse
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom.
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom.
     *
     * @param string $prenom
     *
     * @return Adresse
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom.
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adMail.
     *
     * @param string $adMail
     *
     * @return Adresse
     */
    public function setAdMail($adMail)
    {
        $this->adMail = $adMail;

        return $this;
    }

    /**
     * Get adMail.
     *
     * @return string
     */
    public function getAdMail()
    {
        return $this->adMail;
    }

    /**
     * Set adresse.
     *
     * @param string $adresse
     *
     * @return Adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse.
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville.
     *
     * @param string $ville
     *
     * @return Adresse
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville.
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codePostal.
     *
     * @param string $codePostal
     *
     * @return Adresse
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal.
     *
     * @return string
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set pays.
     *
     * @param string $pays
     *
     * @return Adresse
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays.
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set membre.
     *
     * @param \AppBundle\Entity\Membres|null $membre
     *
     * @return Adresse
     */
    public function setMembre(\AppBundle\Entity\Membres $membre = null)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre.
     *
     * @return \AppBundle\Entity\Membres|null
     */
    public function getMembre()
    {
        return $this->membre;
    }
}
