<?php
 
namespace UserBundle\Entity;
 
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
 
/**
 * User.
 *
 * @ORM\Table("fos_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    const ROLE_ADMIN = 'ROLE_ADMIN';
 
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


}
