<?php
namespace LesAutres\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name',
            'text',
            array(
                'label' => "votre nom",
                'required' => false,
            )
        );
        $builder->add(
            'from',
            'email',
            array(
                'label' => "Votre email",
            )
        );
        $builder->add(
            'subject',
            'text',
            array(
                'label' => "Sujet",
                'required' => false,
            )
        );
        $builder->add(
            'message',
            'textarea',
            array(
                'label' => "Message",
            )
        );
    }

    public function getName()
    {
        return 'contact';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LesAutres\SiteBundle\Entity\Contact',
        ));
    }
}