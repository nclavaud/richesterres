<?php

namespace AppBundle\ValueObject;

class Rating
{
    private $environmentRating;
    private $socialRating;
    private $healthRating;

    public function __construct($environmentRating, $socialRating, $healthRating)
    {
        $this->environmentRating = $environmentRating;
        $this->socialRating = $socialRating;
        $this->healthRating = $healthRating;
    }

    public function getEnvironmentRating()
    {
        return $this->environmentRating;
    }

    public function getSocialRating()
    {
        return $this->socialRating;
    }

    public function getHealthRating()
    {
        return $this->healthRating;
    }
}
