<?php

namespace SmartCore\Bundle\BlogBundle\Repository;

use Doctrine\ORM\EntityRepository;
use SmartCore\Bundle\BlogBundle\Model\Article; // @todo ArticleInterface

class ArticleRepository extends EntityRepository
{
    /**
     * @param null $count
     * @return Article[]|null
     */
    public function getLastArticles($count = null)
    {
        $query = $this
            ->getEntityManager()
            ->createQuery('
                SELECT a
                FROM TDTBlogBundle:Article a
                ORDER BY a.created_at DESC
            ');

        if ((int) $count) {
            $query->setMaxResults($count);
        }

        return $query->getResult();
    }
}
