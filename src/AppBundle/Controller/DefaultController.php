<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $evaluations = $this->getRepository()->findAll();

        return $this->render('default/index.html.twig', array(
            'evaluations' => $evaluations,
        ));
    }

    /**
     * @Route("/{id}", name="detail")
     */
    public function detailAction(Evaluation $evaluation, Request $request)
    {
        return $this->render('default/detail.html.twig', array(
            'evaluation' => $evaluation,
        ));
    }

    private function getRepository()
    {
        return $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle\Entity\Evaluation');
    }
}
