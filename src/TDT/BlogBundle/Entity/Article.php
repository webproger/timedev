<?php

namespace TDT\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SmartCore\Bundle\BlogBundle\Model\Article as SmartArticle;
use SmartCore\Bundle\BlogBundle\Model\CategoryTrait;

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

    /**
     * @ORM\OneToOne(targetEntity="TDT\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id")
     */
    protected $user;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="articles")
     * @ORM\JoinTable(name="blog_articles_tags_relations",
     *      joinColumns={@ORM\JoinColumn(name="article_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id")}
     * )
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $tags;

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

    /**
     * @param Tag $tag
     * @return $this
     */
    public function addTag(Tag $tag)
    {
        $this->tags[] = $tag;
        return $this;
    }

    /**
     * @param Tag $tag
     * @return $this
     */
    public function removeTag(Tag $tag)
    {
        $this->tags->removeElement($tag);
        return $this;
    }

    /**
     * @return Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }
}
