<?php
namespace LesAutres\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class DateAdmin extends Admin
{
    protected $translationDomain = 'SonataPageBundle';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'event',
                'entity',
                array(
                    'class' => 'LesAutresSiteBundle:Event',
                    'query_builder' => function($repository) { return $repository->createQueryBuilder('e')->orderBy('e.id', 'ASC'); },
                    'label'  => "Événement",
                )
            )
            ->add(
                'date',
                'datetime',
                array(
                    'label'  => "Date",
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add(
                'event',
                null,
                array(
                    'label'  => "Événement",
                )
            )
            ->add(
                'date',
                null,
                array(
                    'label'  => "Date",
                )
            )
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'event',
                null,
                array(
                    'label'  => "Événement",
                )
            )
            ->add(
                'date',
                null,
                array(
                    'label'  => "Date",
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
                'event',
                null,
                array(
                    'label'  => "Événement",
                )
            )
            ->add(
                'date',
                null,
                array(
                    'label'  => "Date",
                )
            )
        ;
    }
}
