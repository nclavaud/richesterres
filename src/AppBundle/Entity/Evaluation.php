<?php

namespace AppBundle\Entity;

use AppBundle\Form\EvaluationType;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\EvaluationRepository")
 */
class Evaluation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var guid
     *
     * @ORM\Column(name="uuid", type="guid")
     */
    private $uuid;

    /**
     * @var string
     *
     * @ORM\Column(name="farm_name", type="string", length=255)
     */
    private $farmName;

    /**
     * @var string
     *
     * @ORM\Column(name="farm_category", type="string", length=255)
     */
    private $farmCategory;

    /**
     * @var float
     *
     * @ORM\Column(name="farm_position_latitude", type="float")
     */
    private $farmPositionLatitude;

    /**
     * @var float
     *
     * @ORM\Column(name="farm_position_longitude", type="float")
     */
    private $farmPositionLongitude;

    /**
     * @var string
     *
     * @ORM\Column(name="farm_website_url", type="string", length=255, nullable=true)
     */
    private $farmWebsiteUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="farm_photo_url", type="string", length=255)
     */
    private $farmPhotoUrl;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating_environment", type="integer")
     */
    private $ratingEnvironment;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating_health", type="integer")
     */
    private $ratingHealth;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating_social", type="integer")
     */
    private $ratingSocial;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set uuid
     *
     * @param guid $uuid
     *
     * @return Evaluation
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return guid
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set farmName
     *
     * @param string $farmName
     *
     * @return Evaluation
     */
    public function setFarmName($farmName)
    {
        $this->farmName = $farmName;

        return $this;
    }

    /**
     * Get farmName
     *
     * @return string
     */
    public function getFarmName()
    {
        return $this->farmName;
    }

    /**
     * Set farmCategory
     *
     * @param string $farmCategory
     *
     * @return Evaluation
     */
    public function setFarmCategory($farmCategory)
    {
        $this->farmCategory = $farmCategory;

        return $this;
    }

    /**
     * Get farmCategory
     *
     * @return string
     */
    public function getFarmCategory()
    {
        return $this->farmCategory;
    }

    public function getFarmCategoryName()
    {
        return EvaluationType::$categories[$this->farmCategory];
    }

    /**
     * Set farmPositionLatitude
     *
     * @param float $farmPositionLatitude
     *
     * @return Evaluation
     */
    public function setFarmPositionLatitude($farmPositionLatitude)
    {
        $this->farmPositionLatitude = $farmPositionLatitude;

        return $this;
    }

    /**
     * Get farmPositionLatitude
     *
     * @return float
     */
    public function getFarmPositionLatitude()
    {
        return $this->farmPositionLatitude;
    }

    /**
     * Set farmPositionLongitude
     *
     * @param float $farmPositionLongitude
     *
     * @return Evaluation
     */
    public function setFarmPositionLongitude($farmPositionLongitude)
    {
        $this->farmPositionLongitude = $farmPositionLongitude;

        return $this;
    }

    /**
     * Get farmPositionLongitude
     *
     * @return float
     */
    public function getFarmPositionLongitude()
    {
        return $this->farmPositionLongitude;
    }

    /**
     * Set farmWebsiteUrl
     *
     * @param string $farmWebsiteUrl
     *
     * @return Evaluation
     */
    public function setFarmWebsiteUrl($url)
    {
        $this->farmWebsiteUrl = $url;

        return $this;
    }

    /**
     * Get farmPhotoUrl
     *
     * @return string
     */
    public function getFarmWebsiteUrl()
    {
        return $this->farmWebsiteUrl;
    }

    /**
     * Set farmPhotoUrl
     *
     * @param string $farmPhotoUrl
     *
     * @return Evaluation
     */
    public function setFarmPhotoUrl($url)
    {
        $this->farmPhotoUrl = $url;

        return $this;
    }

    /**
     * Get farmPhotoUrl
     *
     * @return string
     */
    public function getFarmPhotoUrl()
    {
        return $this->farmPhotoUrl;
    }

    /**
     * Set ratingEnvironment
     *
     * @param integer $ratingEnvironment
     *
     * @return Evaluation
     */
    public function setRatingEnvironment($ratingEnvironment)
    {
        $this->ratingEnvironment = $ratingEnvironment;

        return $this;
    }

    /**
     * Get ratingEnvironment
     *
     * @return integer
     */
    public function getRatingEnvironment()
    {
        return $this->ratingEnvironment;
    }

    /**
     * Set ratingHealth
     *
     * @param integer $ratingHealth
     *
     * @return Evaluation
     */
    public function setRatingHealth($ratingHealth)
    {
        $this->ratingHealth = $ratingHealth;

        return $this;
    }

    /**
     * Get ratingHealth
     *
     * @return integer
     */
    public function getRatingHealth()
    {
        return $this->ratingHealth;
    }

    /**
     * Set ratingSocial
     *
     * @param integer $ratingSocial
     *
     * @return Evaluation
     */
    public function setRatingSocial($ratingSocial)
    {
        $this->ratingSocial = $ratingSocial;

        return $this;
    }

    /**
     * Get ratingSocial
     *
     * @return integer
     */
    public function getRatingSocial()
    {
        return $this->ratingSocial;
    }
}

