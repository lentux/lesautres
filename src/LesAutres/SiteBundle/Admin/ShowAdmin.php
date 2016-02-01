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
                'title',
                'text',
                array(
                    'label'  => "Titre",
                    'attr' => array(
                        'placeholder' => "ex: Aide aux Aidants",
                    ),
                )
            )
            ->add(
                'slug',
                'text',
                array(
                    'label'  => "Slug",
                    'attr' => array(
                        'placeholder' => "ex: aide-aux-aidants",
                    ),
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
                    'label'  => "Durée",
                    'required' => false,
                    'attr' => array(
                        'placeholder' => "ex: 1h30, 90 minutes",
                    ),
                )
            )
            ->add(
                'actorCount',
                'number',
                array(
                    'label'  => "Nombre de comédiens",
                    'required' => false,
                    'attr' => array(
                        'placeholder' => "ex: 3",
                    ),
                )
            )
            ->add(
                'masterCount',
                'number',
                array(
                    'label'  => "Nombre de meneurs de jeu",
                    'required' => false,
                    'attr' => array(
                        'placeholder' => "ex: 1",
                    ),
                )
            )
            ->add(
                'playletCount',
                'number',
                array(
                    'label'  => "Nombre de saynètes",
                    'required' => false,
                    'attr' => array(
                        'placeholder' => "ex: 2",
                    ),
                )
            )
            ->add(
                'summary',
                'text',
                array(
                    'label'  => "Résumé",
                    'required' => false,
                    'attr' => array(
                        'placeholder' => "ex: Le sacrifice et l'isolement de l'aidant familial",
                    ),
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
                'keywords',
                'text',
                array(
                    'label'  => "Mots-clés (une dizaine, séparés par une virgule)",
                    'required' => false,
                    'attr' => array(
                        'placeholder' => "ex: théâtre forum, aide, aidants",
                    ),
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
            ->end()
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
