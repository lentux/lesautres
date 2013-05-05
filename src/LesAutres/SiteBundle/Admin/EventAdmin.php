<?php
namespace LesAutres\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class EventAdmin extends Admin
{
    protected $translationDomain = 'SonataPageBundle';

    protected function configureFormFields(FormMapper $formMapper)
    {
        ///$this->getConfigurationPool()->getContainer()->get('doctrine');
        $formMapper
            ->add(
                'title',
                'text',
                array(
                    'label'  => "Titre",
                )
            )
            ->add(
                'description',
                'text',
                array(
                    'label'  => "Description",
                    'required' => false,
                )
            )
            ->add(
                'show',
                'entity',
                array(
                    'class' => 'LesAutresSiteBundle:Show',
                    'query_builder' => function($repository) { return $repository->createQueryBuilder('s')->orderBy('s.id', 'ASC'); },
                    'label'  => "Spectacle",
                )
            )
            ->add(
                'place',
                'entity',
                array(
                    'class' => 'LesAutresSiteBundle:Place',
                    'query_builder' => function($repository) { return $repository->createQueryBuilder('p')->orderBy('p.id', 'ASC'); },
                    'label'  => "Lieu",
                    'required' => false,
                )
            )
            ->add(
                'dates',
                'sonata_type_collection',
                array(
                    'label'  => "Dates",
                    'required' => false,
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add(
                'show',
                null,
                array(
                    'label'  => "Spectacle",
                )
            )
            ->add(
                'place',
                null,
                array(
                    'label'  => "Lieu",
                )
            )
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'show',
                null,
                array(
                    'label'  => "Spectacle",
                )
            )
            ->add(
                'place',
                null,
                array(
                    'label'  => "Lieu",
                )
            )
            ->add(
                'dates',
                null,
                array(
                    'label'  => "Dates",
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
                'show',
                null,
                array(
                    'label'  => "Spectacle",
                )
            )
            ->add(
                'place',
                null,
                array(
                    'label'  => "Lieu",
                )
            )
            ->add(
                'dates',
                null,
                array(
                    'label'  => "Dates",
                )
            )
        ;
    }
}
