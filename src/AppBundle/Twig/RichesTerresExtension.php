<?php

namespace AppBundle\Twig;

use AppBundle\ValueObject\Rating;

class RichesTerresExtension extends \Twig_Extension
{
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('richesterresRating', array($this, 'rating'), array('is_safe' => array('html'))),
        );
    }

    public function rating(Rating $rating)
    {
        $mid = array(150, 150);
        $env = $this->getRotatedCoordinates(0, $rating->getEnvironmentRating()*12, 180);
        $hea = $this->getRotatedCoordinates(0, $rating->getHealthRating()*12, -60);
        $soc = $this->getRotatedCoordinates(0, $rating->getSocialRating()*12, 60);

        $html = <<<"EOT"
<div style="position: relative; width: 300px; margin: 0 auto;">
    <svg height="300" width="300" style="position: absolute; top: 9px; left: 0px;">
        <polygon points="$mid[0],$mid[1] $env[0],$env[1] $hea[0],$hea[1]" style="fill: #0b8743;" />
        <polygon points="$mid[0],$mid[1] $hea[0],$hea[1] $soc[0],$soc[1]" style="fill: #2db34b;" />
        <polygon points="$mid[0],$mid[1] $env[0],$env[1] $soc[0],$soc[1]" style="fill: #71c15e;" />
    </svg>
    <img src="img/richesterres-blank.png" alt="Riches Terres" style="margin-bottom: 10px; cursor:pointer; width: 297px; height: 297px;">
</div>
EOT;

        return $html;
    }

    public function getName()
    {
        return 'richesterres_extension';
    }

    private function getRotatedCoordinates($x, $y, $angle)
    {
        $a = deg2rad($angle);

        $ox = 0;
        $oy = 0;
        $dx = 150 + ( cos($a) * ($x - $ox) - sin($a) * ($y - $oy) );
        $dy = 150 + ( sin($a) * ($x - $ox) + cos($a) * ($y - $oy) );

        return array($dx, $dy);
    }
}
