<?php

namespace VacanciBundle\Controller;

use VacanciBundle\Entity\Vacanci;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class VacanciController extends Controller
{
    /**
     * @Route("/new/vacancis", name="new_vacanci_clients")
     * @param Request $request
     * @return Response
     */
    public function newVacanciAction(Request $request)
    {
        $person = new Vacanci();
        $options['action'] = $this->generateUrl('new_vacanci_clients');
        $form = $this->createForm("VacanciBundle\Form\VacanciType", $person, $options);
        $form->handleRequest($request);
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($person);
            $em->flush();
            $this->sendMessage($person);
            return $this->render('Vacancy/success.html.twig', array('form'=>$form->createView()));
        }
        return $this->render('Vacancy/form.html.twig', array(
        	'form'=>$form->createView(),
        	)
        );
    }

    public function sendMessage($person)
    {
	    $message = \Swift_Message::newInstance()
            ->setSubject('Отклик на вакансию')
            ->setFrom('robot@kino.rent')
            ->setTo('robot@kino.rent')
            ->setBody(
                $this->renderView(
                    'Emails/Otclick.html.twig',
                    array(
                        'person' => $person
                    )
                ),
                'text/html'
            )
        ;
        $failedRecipients = array();
        $this->get('mailer')->send($message, $failedRecipients);

        if (count($failedRecipients)==0) {
            return new Response(null, 200);
        } else {
            return new Response(null, 400);
        }
    }
}
