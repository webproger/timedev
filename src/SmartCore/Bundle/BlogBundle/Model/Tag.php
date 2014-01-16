<?php

namespace SmartCore\Bundle\BlogBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @UniqueEntity(fields={"slug"}, message="Тэг с таким сегментом URI уже существует.")
 */
abstract class Tag implements TagInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=32, unique=true)
     * @Assert\NotBlank(message="Slug can't be empty.")
     */
    protected $slug;

    /**
     * @ORM\Column(type="string", length=32, unique=true)
     * @Assert\NotBlank(message="Title can't be empty.")
     */
    protected $title;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * @ORM\ManyToMany(targetEntity="Article", mappedBy="tags")
     *
     * @var ArrayCollection
     */
    protected $articles;

    /**
     * @ORM\Column(type="integer")
     */
    protected $weight;

    /**
     * Constructor.
     *
     * @param string $slug
     * @param string $title
     */
    public function __construct($slug = null, $title = null)
    {
        if (!$title) {
            $title = $slug;
        }

        $this->articles   = new ArrayCollection();
        $this->created_at = new \DateTime();
        $this->slug       = strtolower($slug);
        $this->title      = $title;
        $this->weight     = 0;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getTitle();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Article[]
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * @return \Datetime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @return $this
     */
    public function increment()
    {
        $this->weight += 1;

        return $this;
    }

    /**
     * @return $this
     */
    public function decrement()
    {
        $this->weight -= 1;

        return $this;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
