<?php
// src/AppBundle/Form/ContactForm.php
namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\ContactUs;

class ContactForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder)
    {
        $builder
            ->add('name_and_surname', TextType::class, array(
                                    'label'  => 'Name and Surname (required)',
                                ))
            ->add('company', TextType ::class, array(
                                    'label'  => 'Company',
                                ))
            ->add('email_address', TextType::class, array(
                                    'label'  => 'Email Address (required)',
                                ))
            ->add('telephone', TextType::class,  array(
                                    'label'  => 'Telephone Number',
                                ))
            ->add('message', TextareaType::class, array(
                                    'label' => 'Your Message', 
                                    'attr' => array('rows' => 10)
                                ))
            ->add('save', SubmitType::class, array('label' => 'Send'))
        ;
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => ContactUs::class,
        ));
    }
}

