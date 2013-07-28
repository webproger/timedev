<?php

namespace SmartCore\Bundle\BlogBundle\Service;

use Doctrine\ORM\EntityManager;
use SmartCore\Bundle\BlogBundle\Model\Article;
use SmartCore\Bundle\BlogBundle\Model\CategoryInterface;
use SmartCore\Bundle\BlogBundle\Model\Tag;
use SmartCore\Bundle\BlogBundle\Model\TagInterface;

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
     * @var \SmartCore\Bundle\BlogBundle\Repository\TagRepository
     */
    protected $tagsRepo;

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
        $this->tagsRepo = $em->getRepository('TDTBlogBundle:Tag'); // @todo конфиг репы как у FOSUB

        $this->articlesPerPage = 3; // @todo сделать кол-во статей на страницу через конфиг.
    }

    /**
     * @param integer $id
     * @return Article|null
     */
    public function getArticle($id)
    {
        return $this->articlesRepo->find($id);
    }

    /**
     * @return int
     */
    public function getArticlesPerPage()
    {
        return $this->articlesPerPage;
    }

    /**
     * @param CategoryInterface $category
     * @param integer $limit
     * @param integer $offset
     * @return Article[]|null
     */
    public function getArticlesByCategory(CategoryInterface $category = null, $limit  = null, $offset = null)
    {
        return $this->articlesRepo->findByCategory($category, $limit, $offset);
    }

    /**
     * @param CategoryInterface $category
     * @return \Doctrine\ORM\Query
     */
    public function getFindByCategoryQuery(CategoryInterface $category = null)
    {
        return $this->articlesRepo->getFindByCategoryQuery($category);
    }

    /**
     * @param TagInterface $tag
     * @param null $limit
     * @param null $offset
     * @return Article[]|null
     */
    public function getArticlesByTag(TagInterface $tag, $limit  = null, $offset = null)
    {
        return $this->articlesRepo->findByTag($tag);
    }

    /**
     * @param integer $year
     * @param integer $month
     * @param integer $day
     * @return Article[]|null
     */
    public function getArticlesByDate($year = null, $month = null, $day = null)
    {
        // @todo
    }

    /**
     * @param string $slug
     * @return Article|null
     */
    public function getArticleBySlug($slug)
    {
        return $this->articlesRepo->findOneBy(['slug' => $slug]);
    }

    /**
     * @param CategoryInterface $category
     * @return integer
     */
    public function getArticlesCountByCategory(CategoryInterface $category = null)
    {
        return $this->articlesRepo->getCountByCategory($category);
    }

    /**
     * @param integer $limit
     * @return Article[]|null
     */
    public function getLastArticles($limit = null)
    {
        if (!$limit) {
            $limit = $this->articlesPerPage;
        }

        return $this->articlesRepo->findLast($limit);
    }

    /**
     * @param TagInterface $tag
     * @return integer
     *
     * @todo возможность выбора по нескольким тэгам.
     */
    public function getArticlesCountByTag(TagInterface $tag = null)
    {
        return $this->articlesRepo->getCountByTag($tag);
    }

    /**
     * @param string $slug
     * @return TagInterface
     */
    public function getTagBySlug($slug)
    {
        return $this->tagsRepo->findOneBy(['slug' => $slug]);
    }

    /**
     * @return Tag[]|null
     */
    public function getTagsCloud()
    {
        return $this->tagsRepo->findAll();
    }
}
