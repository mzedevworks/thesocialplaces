<?php
// src/AppBundle/Controller/ContactController.php
namespace AppBundle\Controller;

use AppBundle\Entity\ContactUs;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Form\ContactForm;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function indexAction(Request $request, EntityManagerInterface $em)
    {
        // create a new contact
        $contact = new ContactUs();
        $contact->setNameAndSurname('Musa');
        $contact->setCompany('Musa');
        $contact->setEmailAddress('musaz01@gmail.com');
        $contact->setTelephone(0788498213);
        $contact->setMessage('Test');

        $form = $this->createForm(ContactForm::class, $contact);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $em->persist($contact);
            if($em->flush()){
                $this->addFlash(
                    'notice',
                    'Your contact message has been successfuly send'
                );
            }
            //RMust edirect to another page to stop users 
            //from resubmiting after refreshing
            return $this->redirectToRoute('contact');
        }
        return $this->render('contact/contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
