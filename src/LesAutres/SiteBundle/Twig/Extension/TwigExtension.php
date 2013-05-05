<?php
# Udpa/UdpaBundle/Twig/Extension/UdpaTwigExtension.php

namespace LesAutres\SiteBundle\Twig\Extension;

use LesAutres\SiteBundle\Entity\Date;
use Symfony\Component\HttpKernel\KernelInterface;

class TwigExtension extends \Twig_Extension
{
    public function __construct()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return array(
            'today' => new \Twig_Function_Method($this, 'today'),
            'formatTime' => new \Twig_Function_Method($this, 'formatTime'),
        );
    }



    /**
     * Returns the formated time string.
     *
     * @return string
     */
    public function formatTime($minutes)
    {
        if ($minutes < 60)
        {
            return $minutes." minute".($minutes > 1 ? 's' : '');
        }
        
        $hours = (int)($minutes / 60);
        $minutes = $minutes % 60;
        
        if ($minutes == 0)
        {
            return $hours." heure".($hours > 1 ? 's' : '');
        }
        
        return $hours." h ".($minutes < 10 ? '0' : '').$minutes;
    }



    /**
     * Formate la date d'aujourd'hui en français
     *
     * @return string
     */
    public function today()
    {
        $today = new Date();
        return $today->getFormatedDate(false);
    }



    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'lesautres';
    }
}