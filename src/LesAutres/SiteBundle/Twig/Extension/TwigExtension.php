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
            'count' => new \Twig_Function_Method($this, 'count'),
        );
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
     * Count
     *
     * @return integer
     */
    public function count($data)
    {
        return count($data);
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