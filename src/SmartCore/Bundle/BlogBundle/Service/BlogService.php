<?php

namespace SmartCore\Bundle\BlogBundle\Service;

use Doctrine\ORM\EntityManager;
use SmartCore\Bundle\BlogBundle\Model\Article;
use SmartCore\Bundle\BlogBundle\Model\CategoryInterface;
use SmartCore\Bundle\BlogBundle\Model\Tag;

class BlogService
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var \SmartCore\Bundle\BlogBundle\Repository\ArticleRepository
     */
    protected $articlesRepo;

    /**
     * @var integer
     */
    protected $articlesPerPage;

    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->articlesRepo = $em->getRepository('TDTBlogBundle:Article'); // @todo конфиг репы как у FOSUB

        $this->articlesPerPage = 10; // @todo сделать кол-во статей на страницу через конфиг.
    }

    /**
     * @param CategoryInterface $category
     * @param null $offset
     * @param null $limit
     * @return Article[]|null
     */
    public function getArticlesByCategory(CategoryInterface $category = null, $offset = null, $limit  = null)
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

    /**
     * @param null $count
     * @return Article[]|null
     */
    public function getLastArticles($count = null)
    {
        if (!$count) {
            $count = $this->articlesPerPage;
        }

        return $this->articlesRepo->getLastArticles($count);
    }
}
