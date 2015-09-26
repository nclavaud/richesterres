<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Evaluation;
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
        $evaluations = $this->getRepository()->findAll();

        return array(
            'evaluations' => $evaluations,
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

    private function getRepository()
    {
        return $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle\Entity\Evaluation');
    }
}
