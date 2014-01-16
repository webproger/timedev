<?php

namespace SmartCore\Bundle\BlogBundle\Model;

trait CategoryTrait
{
    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="articles", cascade={"persist"})
     * @ORM\JoinColumn(name="category_id")
     */
    protected $category;

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return $this
     */
    public function setCategory(CategoryInterface $category = null)
    {
        $this->category = $category;

        return $this;
    }
}
