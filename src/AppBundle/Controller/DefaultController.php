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
        );
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
