<?php

namespace TDT\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TDTUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
