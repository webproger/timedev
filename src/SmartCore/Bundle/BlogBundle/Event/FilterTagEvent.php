<?php

namespace SmartCore\Bundle\BlogBundle\Event;

use SmartCore\Bundle\BlogBundle\Model\TagInterface;
use Symfony\Component\EventDispatcher\Event;

class FilterTagEvent extends Event
{
    /**
     * @var TagInterface
     */
    protected $tag;

    /**
     * Constructor.
     *
     * @param TagInterface $tag
     */
    public function __construct(TagInterface $tag)
    {
        $this->tag = $tag;
    }

    /**
     * @return TagInterface
     */
    public function getTag()
    {
        return $this->tag;
    }
}
