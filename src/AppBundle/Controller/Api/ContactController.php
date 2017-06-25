<?php
namespace AppBundle\Controller\Api;

use AppBundle\Entity\Contact;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
/**
 * This will handle api calls for the Contact Entity
 *
 * @author musa
 */
class ContactController extends Controller
{
   /**
    * @Route("api/contact", name="api_contact")
    * @Method("POST")
    */
    public function newAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $contact = new Contact();
        $contact->setCompany($data['company']);
        $contact->setEmailAddress($data['email']);
        $contact->setNameAndSurname($data['name_and_email']);
        $contact->setMessage($data['message']);
        $contact->setMessage($data['telephone']);
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($contact);
        $em->flush();
        
        return new Response('Created');
    }
}
