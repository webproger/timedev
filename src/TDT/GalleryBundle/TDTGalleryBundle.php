<?php

namespace TDT\GalleryBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class TDTGalleryBundle extends Bundle
{
    public function getParent()
    {
        return 'SmartGalleryBundle';
    }
}
