<?php

namespace SmartCore\Bundle\BlogBundle\Service;

use Doctrine\ORM\EntityManager;
use SmartCore\Bundle\BlogBundle\Entity\Article;
use SmartCore\Bundle\BlogBundle\Entity\Category;
use SmartCore\Bundle\BlogBundle\Entity\Tag;

class BlogService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var \Doctrine\ORM\EntityRepository
     */
    protected $articlesRepo;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->articlesRepo = $em->getRepository('SmartBlogBundle:Article');
    }

    /**
     * @param Category $category
     * @param null $offset
     * @param null $limit
     * @return Article[]|null
     */
    public function getArticlesByCategory(Category $category = null, $offset = null, $limit  = null)
    {

    }

    /**
     * @param Tag $tag
     * @param null $offset
     * @param null $limit
     * @return Article[]|null
     */
    public function getArticlesByTag(Tag $tag, $offset = null, $limit  = null)
    {

    }

    /**
     * @param integer $year
     * @param integer $month
     * @param integer $day
     * @return Article[]|null
     */
    public function getArticlesByDate($year = null, $month = null, $day = null)
    {

    }

    /**
     * @param integer $id
     * @return Article|null
     */
    public function getArticle($id)
    {

    }
}
