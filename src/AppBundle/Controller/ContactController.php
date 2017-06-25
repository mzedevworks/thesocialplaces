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
    public function indexAction(Request $request, 
                                    EntityManagerInterface $em, 
                                    \Swift_Mailer $mailer
                                )
    {
        // create a new contact
        $contact = new ContactUs();

        $form = $this->createForm(ContactForm::class, $contact);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            $em->persist($contact);
            $em->flush();
            
            //Send email to user
            //Emails should be set in a config file and template for emails to 
            //dynamically pull form the databse
            $message = new \Swift_Message('Contact Success');
            $message->setFrom('socialplaces@noreply.co.za');
            $message->setTo($contact->getEmailAddress());
            $message->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/contact.html.twig
                    'emails/contact.html.twig',
                    array('name' => $contact->getNameAndSurname())
                ),
                'text/html'
            );
            $mailer->send($message);
            
            //To create a class to handle the sending of mails
            $adminMessage = new \Swift_Message('User Just send Contact Message');
            $adminMessage->setFrom('socialplaces@noreply.co.za');
            $adminMessage->setTo('musaz01@gmail.com');
            $adminMessage->setBody(
                $this->renderView(
                    // app/Resources/views/Emails/aontact-admin.html.twig
                    'emails/contact_admin.html.twig',
                    array(
                            'name' => $contact->getNameAndSurname(),
                            'email' => $contact->getEmailAddress(),
                            'telephone' => $contact->getTelephone(),
                            'message' => $contact->getMessage(),
                            'company' => $contact->getCompany()
                        )
                ),
                'text/html'
            );
            $mailer->send($message);
            //Must edirect to another page to stop users 
            //from resubmit after refreshing
            return $this->redirectToRoute('homepage');
        }
        return $this->render('contact/contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
