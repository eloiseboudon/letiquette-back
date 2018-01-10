<?php
/**
 * Created by PhpStorm.
 * User: Eloise
 * Date: 18/10/2017
 * Time: 15:41
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;



/**
 * Membres
 *
 * @ORM\Table(name="membres")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MembresRepository")
 */
class Membres
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
     * @ORM\Column(name="login", type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;
    protected $plainPassword;


    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Villes", cascade={"persist"})
     * @var Villes
     */
    private $ville;

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
     * @ORM\Column(name="numTel", type="string", length=255)
     */
    private $numTel;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Membres
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Membres
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adMail
     *
     * @param string $adMail
     *
     * @return Membres
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
     * @return Membres
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
     * @return Membres
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
     * Set ville
     *
     * @param \AppBundle\Entity\Villes $ville
     *
     * @return Membres
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

    /**
     * Set login
     *
     * @param string $login
     *
     * @return Membres
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Membres
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }


    /**
     * Get password
     *
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }


    public function getRoles()
    {
        return [];
    }

    public function getSalt()
    {
        return null;
    }

    public function eraseCredentials()
    {
        // Suppression des données sensibles
        $this->plainPassword = null;
    }
}
