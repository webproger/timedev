<?php

namespace TDT\BlogBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TDTBlogBundle extends Bundle
{
    public function getParent()
    {
        return 'SmartBlogBundle';
    }
}
