<?php

namespace AppBundle\Entity;

/**
 * EvaluationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EvaluationRepository extends \Doctrine\ORM\EntityRepository
{
    public function filter(array $data)
    {
        $qb = $this->createQueryBuilder('e');

        if (!empty($data['category'])) {
            $qb
                ->andWhere('e.farmCategory = :category')
                ->setParameter('category', $data['category'])
            ;
        }

        foreach (array('Environment', 'Health', 'Social') as $topic) {
            $parameterName = 'e.rating' . $topic;
            $fieldName = 'minRating' . $topic;
            if (!empty($data[$fieldName])) {
                $qb
                    ->andWhere(sprintf('%s >= :%s', $parameterName, $fieldName))
                    ->setParameter($fieldName, $data[$fieldName])
                ;
            }
        }

        return $qb->getQuery()->getResult();
    }
}
