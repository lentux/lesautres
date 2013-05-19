<?php
namespace LesAutres\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class PlaceAdmin extends Admin
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
                'name',
                'text',
                array(
                    'label'  => "Nom",
                )
            )
            ->add(
                'description',
                'textarea',
                array(
                    'label'  => "Description",
                    'required' => false,
                )
            )
            ->add(
                'street',
                'text',
                array(
                    'label'  => "Adresse",
                )
            )
            ->add(
                'zipcode',
                'number',
                array(
                    'label'  => "Code postal",
                )
            )
            ->add(
                'city',
                'text',
                array(
                    'label'  => "Ville",
                )
            )
            ->add(
                'departement',
                'entity',
                array(
                    'class' => 'LesAutresSiteBundle:Departement',
                    'query_builder' => function($repository) { return $repository->createQueryBuilder('d')->orderBy('d.id', 'ASC'); },
                    'preferred_choices' => $this->modelManager->findBy('LesAutres\SiteBundle\Entity\Departement', array('number' => '84')),
                    'label'  => "Département",
                )
            )
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add(
                'name',
                null,
                array(
                    'label'  => "Nom",
                )
            )
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'name',
                null,
                array(
                    'label'  => "Nom",
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
                'name',
                null,
                array(
                    'label'  => "Nom",
                )
            )
            ->add(
                'description',
                null,
                array(
                    'label'  => "Description",
                )
            )
            ->add(
                'street',
                null,
                array(
                    'label'  => "Adresse",
                )
            )
            ->add(
                'zipcode',
                null,
                array(
                    'label'  => "Code postal",
                )
            )
            ->add(
                'city',
                null,
                array(
                    'label'  => "Ville",
                )
            )
            ->add(
                'departement',
                null,
                array(
                    'label'  => "Département",
                )
            )
        ;
    }
}
