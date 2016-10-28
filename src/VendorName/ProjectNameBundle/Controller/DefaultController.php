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
        # Load example service
        $example_service = $this->get('vendorname_projectname.example_service');

        # Create new response for caching
        $response = new Response();

        # Return rendered template with response cache
        return $this->render('VendorNameProjectNameBundle:Default:index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir')) . DIRECTORY_SEPARATOR,
            'example_var' => $example_service->getVar()
        ], $response);
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
        # Define example data
        $defaults = [
            'name' => 'Symfony'
        ];

        # Merge default data with request data
        $data = array_merge($defaults, json_decode($request->getContent(), true));

        # Return Json response
        return $this->json($data, 200);
    }
}