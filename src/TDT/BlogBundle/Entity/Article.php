<?php

namespace TDT\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SmartCore\Bundle\BlogBundle\Model\Article as SmartArticle;
use SmartCore\Bundle\BlogBundle\Model\CategoryTrait;
use SmartCore\Bundle\BlogBundle\Model\TagTrait;

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
     * @ORM\OneToOne(targetEntity="TDT\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id")
     */
    protected $user;

    /**
     * @param mixed $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return \TDT\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
