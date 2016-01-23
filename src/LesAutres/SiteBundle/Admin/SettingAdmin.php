<?php
namespace LesAutres\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class SettingAdmin extends Admin
{
    protected $translationDomain = 'SonataPageBundle';
    protected $maxPerPage = 100;
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'id',
    );

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
                    'required' => false,
                )
            )
            ->add(
                'value',
                'text',
                array(
                    'label'  => "Valeur",
                    'required' => false,
                )
            )
            ->end()
        ;
    }

    /*protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add(
                'setting_name',
                null,
                array(
                    'label'  => "Nom",
                )
            )
        ;
    }*/

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
                'value',
                null,
                array(
                    'label'  => "Valeur",
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
                'value',
                null,
                array(
                    'label'  => "Valeur",
                )
            )
        ;
    }
}
