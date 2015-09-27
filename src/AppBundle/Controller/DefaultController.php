<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;
use AppBundle\Form\EvaluationFilter;
use AppBundle\Form\EvaluationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template("AppBundle::index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $evaluations = array();

        $filterForm = $this->createFilterForm();
        $filterForm->handleRequest($request);

        if (!$filterForm->isSubmitted() || $filterForm->isValid()) {
            $evaluations = $this->getRepository()->filter($filterForm->getData());
        }
    
        return array(
            'evaluations' => $evaluations,
            'filter_form' => $filterForm->createView(),
        );
    }

    /**
     * @Route("/{id}", name="detail")
     * @Template("AppBundle::detail.html.twig")
     */
    public function detailAction(Evaluation $evaluation, Request $request)
    {
        return array(
            'evaluation' => $evaluation,
            'point_mid' => array(150, 150),
            'point_env' => $this->getCoordinates(0, $evaluation->getRatingEnvironment()*12, 180),
            'point_hea' => $this->getCoordinates(0, $evaluation->getRatingHealth()*12, -60),
            'point_soc' => $this->getCoordinates(0, $evaluation->getRatingSocial()*12, 60),
        );
    }

    private function getCoordinates($x, $y, $angle)
    {
        $a = deg2rad($angle);

        $ox=0;$oy=0;
        $dx = 150 + ( cos($a) * ($x - $ox) - sin($a) * ($y - $oy) );
        $dy = 150 + ( sin($a) * ($x - $ox) + cos($a) * ($y - $oy) );

        return array($dx, $dy);
    }

    private function createFilterForm()
    {
        $defaultData = array(
            'category' => null,
            'minRatingEnvironment' => 0,
            'minRatingHealth' => 0,
            'minRatingSocial' => 0,
        );
        
        return $this->createForm(new EvaluationFilter(), $defaultData, array(
            'method' => 'GET',
        ));
    }

    private function getRepository()
    {
        return $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle\Entity\Evaluation');
    }
}
