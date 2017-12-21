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
    public function findProduitBySexe($sexe)
    {

        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->innerJoin('p.famille', 'fam')
            ->addSelect('fam')
            ->where($queryBuilder->expr()->eq('fam.sexe', ':sexe'))
            ->setParameters(array('sexe' => $sexe));

        return $queryBuilder
            ->getQuery()
            ->getResult();

    }

    public function findProduitsByFamille($id)
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->innerJoin('p.famille', 'fam')
            ->addSelect('fam')
            ->where($queryBuilder->expr()->eq('fam.id', ':id'))
            ->setParameters(array('id' => $id));

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }


    public function findEverything()
    {
//        $queryBuilder = $this->_em->createQueryBuilder('p')
//            ->select('e')
//            ->leftjoin('AppBundle:DeclinaisonEthique', 'e','WITH','e.produit=p')
//            ->leftjoin('AppBundle:DeclinaisonTaille', 't','WITH','t.produit=p');
//
//
//        return $queryBuilder
//            ->getQuery()
//            ->getResult();






        $queryBuilder = $this->_em->createQuery('SELECT p,e,t
        FROM AppBundle:Produits p LEFT JOIN AppBundle:DeclinaisonEthique e WITH e.produit=p
        LEFT JOIN AppBundle:DeclinaisonTaille t WITH t.produit=p');


        return $queryBuilder
            ->getScalarResult();


    }

}
