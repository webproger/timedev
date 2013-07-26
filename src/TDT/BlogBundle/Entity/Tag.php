<?php

namespace TDT\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SmartCore\Bundle\BlogBundle\Model\Tag as SmartTag;

/**
 * @ORM\Entity
 * @ORM\Table(name="blog_tags")
 */
class Tag extends SmartTag
{

}
