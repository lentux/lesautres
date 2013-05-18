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
            'isMobile' => new \Twig_Function_Method($this, 'isMobile'),
        );
    }
    
    
    
    /**
     * returns true if one of the specified mobile browsers is detected
     */
    function isMobile()
    {
        $regex_match="/(nokia|iphone|android|motorola|^mot\-|softbank|foma|docomo|kddi|up\.browser|up\.link|";
        $regex_match.="htc|dopod|blazer|netfront|helio|hosin|huawei|novarra|CoolPad|webos|techfaith|palmsource|";
        $regex_match.="blackberry|alcatel|amoi|ktouch|nexian|samsung|^sam\-|s[cg]h|^lge|ericsson|philips|sagem|wellcom|bunjalloo|maui|";
        $regex_match.="symbian|smartphone|midp|wap|phone|windows ce|iemobile|^spice|^bird|^zte\-|longcos|pantech|gionee|^sie\-|portalmmm|";
        $regex_match.="jig\s browser|hiptop|^ucweb|^benq|haier|^lct|opera\s*mobi|opera\*mini|320x320|240x320|176x220";
        $regex_match.=")/i";
        
        return
            isset($_SERVER['HTTP_X_WAP_PROFILE']) or
            isset($_SERVER['HTTP_PROFILE']) or
            preg_match($regex_match, strtolower($_SERVER['HTTP_USER_AGENT']))
        ;
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