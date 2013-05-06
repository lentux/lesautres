<?php
namespace LesAutres\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class ShowAdmin extends Admin
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
                'page',
                'entity',
                array(
                    'class' => 'LesAutresSiteBundle:Page',
                    'query_builder' => function($repository) { return $repository->createQueryBuilder('p')->orderBy('p.id', 'ASC'); },
                    'property' => 'title',
                    'label'  => "Page",
                )
            )
            ->add(
                'duration',
                'text',
                array(
                    'label'  => "Durée (en minutes)",
                    'required' => false,
                )
            )
            ->add(
                'actorCount',
                'number',
                array(
                    'label'  => "Nombre de comédiens",
                    'required' => false,
                )
            )
            ->add(
                'masterCount',
                'number',
                array(
                    'label'  => "Nombre de meneurs de jeu",
                    'required' => false,
                )
            )
            ->add(
                'playletCount',
                'number',
                array(
                    'label'  => "Nombre de saynètes",
                    'required' => false,
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
                )
            )
            ->add(
                'files',
                'sonata_type_collection',
                array(
                    'cascade_validation' => true,
                    'label'  => "Fichiers",
                    'required' => false,
                ),
                array(
                    'edit' => 'inline',
                    'inline' => 'table',
                )
            )
        ;
    }
    
    public function prePersist($show)
    {
        $show->setFiles($show->getFiles());
    }
 
    public function preUpdate($show)
    {
        $show->setFiles($show->getFiles());
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
                'page',
                null,
                array(
                    'label'  => "Page",
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
                'page',
                null,
                array(
                    'label'  => "Page",
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
                'events',
                null,
                array(
                    'label'  => "Événements",
                )
            )
        ;
    }
}
