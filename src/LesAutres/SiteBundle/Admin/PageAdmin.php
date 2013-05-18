<?php
namespace LesAutres\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class PageAdmin extends Admin
{
    protected $translationDomain = 'SonataPageBundle';

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add(
                'title',
                'text',
                array(
                    'label'  => "Titre",
                )
            )
            ->add(
                'slug',
                'text',
                array(
                    'label'  => "Slug",
                )
            )
            ->add(
                'summary',
                'text',
                array(
                    'label'  => "Résumé",
                    'required' => false,
                )
            )
            ->add(
                'text',
                'textarea',
                array(
                    'label'  => "Texte",
                    'attr' => array('class' => 'tinymce', 'tinymce'=>'{"theme":"simple"}')
                )
            )
            ->add(
                'keywords',
                'text',
                array(
                    'label'  => "Mots-clés",
                    'required' => false,
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add(
                'title',
                null,
                array(
                    'label'  => "Titre",
                )
            )
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add(
                'title',
                null,
                array(
                    'label'  => "Titre",
                )
            )
            ->add(
                'author',
                null,
                array(
                    'label'  => "Auteur",
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
                'title',
                null,
                array(
                    'label'  => "Titre",
                )
            )
            ->add(
                'author',
                null,
                array(
                    'label'  => "Auteur",
                )
            )
            ->add(
                'summary',
                null,
                array(
                    'label'  => "Résumé",
                )
            )
            ->add(
                'text',
                null,
                array(
                    'label'  => "Texte",
                )
            )
            ->add(
                'shows',
                null,
                array(
                    'label'  => "Spectacles",
                )
            )
        ;
    }
}
