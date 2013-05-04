<?php

namespace LesAutres\SiteBundle;

use LesAutres\SiteBundle\Twig\Extension\TwigExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class LesAutresSiteBundle extends Bundle
{
    public function boot()
    {
        $extension = new TwigExtension();
        $this->container->get('twig')->addExtension($extension);
    }
}
