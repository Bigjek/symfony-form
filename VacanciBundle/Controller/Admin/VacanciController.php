<?php

namespace VacanciBundle\Controller\Admin;

use VacanciBundle\Entity\Vacanci;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class VacanciController
 * @package VacanciBundle\Controller\Admin
 */
class VacanciController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/otclick", name="admin_otclick")
     */
    public function newListAction()
    {
        $entities = $this->getDoctrine()->getRepository('VacanciBundle:Vacanci')->findAll();
        return $this->render('VacanciBundle:Admin/Vacanci:index.html.twig', array(
            'entities' => $entities
        ));
    }
}