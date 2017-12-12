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

//
//    public function findProduitsFemmesByFamille($famille){
//        $queryBuilder = $this->createQueryBuilder('p');
//        $queryBuilder->innerJoin('p.famille','fam')
//            ->addSelect('fam')
//            ->where($queryBuilder->expr()->eq('fam.sexe', $queryBuilder->expr()->literal("F")))
//            ->andWhere($queryBuilder->expr()->eq('fam.famille',':famille'))
//            ->setParameters(array('famille' => $famille))
//        ;
//
//        return $queryBuilder
//            ->getQuery()
//            ->getResult();
//    }

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


    public function findProduitsFiltresByFamille($famille, $arrayMarques, $prixMin, $prixMax)
    {
        $queryBuilder = $this->createQueryBuilder('p');

    }

    public function findProduitsFiltres($arrayMarques, $prixMin, $prixMax)
    {

        $queryBuilder = $this->createQueryBuilder('p');

    }


    public function findFournisseurs($fournisseur, $sexe)
    {
        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->join('p.famille', 'fam')
            ->join('p.fournisseur', 'fou')
            ->addSelect('p')
            ->where($queryBuilder->expr()->eq('fam.sexe', ':sexe'))
            ->andWhere($queryBuilder->expr()->eq('fou.id', ':id'))
            ->setParameters(array('id' => $fournisseur, 'sexe' => $sexe));

        return $queryBuilder
            ->getQuery()
            ->getResult();

    }

    public function findProduitsFiltreMarque($arrayMarque, $sexe)
    {

        $marqueSplit = explode(",", $arrayMarque);

        $queryBuilder = $this->createQueryBuilder('p');
        $queryBuilder->join('p.famille', 'f')
            ->addSelect('p')
            ->where($queryBuilder->expr()->eq('f.sexe', $queryBuilder->expr()->literal($sexe)));

        $idMarque = 0;
        $orXMarque = $queryBuilder->expr()->orX();


        foreach ($marqueSplit as $marque) {
            $orXMarque->add($queryBuilder->expr()->eq('p.fournisseur', ":marque_" . $idMarque));
            $queryBuilder->setParameter("marque_" . $idMarque, $marque);
            $idMarque++;
        }

        $queryBuilder->andWhere($orXMarque);

        return $queryBuilder
            ->getQuery()
            ->getResult();

    }


}
