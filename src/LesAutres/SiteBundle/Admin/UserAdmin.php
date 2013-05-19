<?php
namespace LesAutres\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class UserAdmin extends Admin
{
    protected $translationDomain = 'SonataPageBundle';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with(
                'Général',
                array(
                    'description' => "",
                )
            )
            ->add(
                'username',
                'text',
                array(
                    'label'  => "Identifiant",
                )
            )
            ->add(
                'firstname',
                'text',
                array(
                    'label'  => "Prénom",
                )
            )
            ->add(
                'lastname',
                'text',
                array(
                    'label'  => "Nom",
                )
            )
            ->add(
                'email',
                'email',
                array(
                    'label' => "Email"
                )
            )
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add(
                'username',
                null,
                array(
                    'label' => "Identifiant"
                )
            )
            ->add(
                'firstname',
                null,
                array(
                    'label' => "Prénom"
                )
            )
            ->add(
                'lastname',
                null,
                array(
                    'label' => "Nom"
                )
            )
            ->add(
                'email',
                null,
                array(
                    'label' => "Email"
                )
            )
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'username',
                null,
                array(
                    'label' => "Identifiant"
                )
            )
            ->add(
                'firstname',
                null,
                array(
                    'label' => "Prénom"
                )
            )
            ->add(
                'lastname',
                null,
                array(
                    'label' => "Nom"
                )
            )
            ->add(
                'email',
                null,
                array(
                    'label' => "Email"
                )
            )
            ->add(
                '_action',
                'actions',
                array(
                    'actions' => array(
                        'view' => array(),
                        'edit' => array(),
                        'delete' => array(),
                    )
                )
            )
        ;
    }

    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add(
                'username',
                null,
                array(
                    'label' => "Identifiant"
                )
            )
            ->add(
                'firstname',
                null,
                array(
                    'label' => "Prénom"
                )
            )
            ->add(
                'lastname',
                null,
                array(
                    'label' => "Nom"
                )
            )
            ->add(
                'email',
                null,
                array(
                    'label' => "Email"
                )
            )
        ;
    }
}
