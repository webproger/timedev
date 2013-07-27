<?php

namespace TDT\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SmartCore\Bundle\BlogBundle\Model\Article as SmartArticle;
use SmartCore\Bundle\BlogBundle\Model\CategoryTrait;
use SmartCore\Bundle\BlogBundle\Model\TagTrait;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog_articles",
 *      indexes={
 *          @ORM\Index(name="created", columns={"created"})
 *      }
 * )
 */
class Article extends SmartArticle
{
    use CategoryTrait;
    use TagTrait;

    /**
     * @ORM\ManyToOne(targetEntity="TDT\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="author_id")
     */
    protected $author;

    /**
     * @param UserInterface $author
     * @return $this
     */
    public function setAuthor(UserInterface $author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
