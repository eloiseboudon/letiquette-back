<?php

namespace AppBundle\Repository;


use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * ProduitsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitsRepository extends EntityRepository
{
    public function findProduitBySexe($sexe){

        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->innerJoin('p.famille','fam')
            ->addSelect('fam')
            ->where($queryBuilder->expr()->eq('fam.sexe',':sexe'))
            ->setParameters(array('sexe' => $sexe));

        return $queryBuilder
            ->getQuery()
            ->getResult();

    }


    public function findProduitByFamille($famille){

        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->innerJoin('p.famille','fam')
            ->addSelect('fam')
            ->where($queryBuilder->expr()->eq('fam.famille',':famille'))
            ->setParameters(array('famille' => $famille));

        return $queryBuilder
            ->getQuery()
            ->getResult();

    }


}
