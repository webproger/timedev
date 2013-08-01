<?php

namespace SmartCore\Bundle\MediaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="media_collections")
 */
class Collection
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=64)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    protected $descr;

    /**
     * @var array
     *
     * @ORM\Column(type="array")
     */
    protected $params;

    /**
     * @var string
     *
     * @ORM\Column(name="relative_path", type="string", length=255)
     */
    protected $relativePath;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Collection
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set descr
     *
     * @param string $descr
     * @return Collection
     */
    public function setDescr($descr)
    {
        $this->descr = $descr;
    
        return $this;
    }

    /**
     * Get descr
     *
     * @return string 
     */
    public function getDescr()
    {
        return $this->descr;
    }

    /**
     * Set params
     *
     * @param array $params
     * @return Collection
     */
    public function setParams($params)
    {
        $this->params = $params;
    
        return $this;
    }

    /**
     * Get params
     *
     * @return array 
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Set relativePath
     *
     * @param string $relativePath
     * @return Collection
     */
    public function setRelativePath($relativePath)
    {
        $this->relativePath = $relativePath;
    
        return $this;
    }

    /**
     * Get relativePath
     *
     * @return string 
     */
    public function getRelativePath()
    {
        return $this->relativePath;
    }
}
