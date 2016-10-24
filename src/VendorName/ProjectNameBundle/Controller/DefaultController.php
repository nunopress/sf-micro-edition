<?php

namespace VendorName\ProjectNameBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 *
 * @package VendorName\ProjectNameBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return Response
     *
     * @Route("/")
     */
    public function indexAction()
    {
        $example_service = $this->get('vendorname_projectname.example_service');

        return $this->render('VendorNameProjectNameBundle:Default:index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir')) . DIRECTORY_SEPARATOR,
            'example_var' => $example_service->getVar()
        ]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @Route("/api")
     * @Method("POST")
     */
    public function apiAction(Request $request)
    {
        $defaults = [
            'name' => 'Symfony'
        ];

        $data = array_merge($defaults, json_decode($request->getContent(), true));

        return $this->json($data, 200);
    }
}