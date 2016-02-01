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
    protected $maxPerPage = 100;
    protected $datagridValues = array(
        '_page' => 1,
        '_sort_order' => 'DESC',
        '_sort_by' => 'id',
    );

    protected function configureFormFields(FormMapper $formMapper)
    {
        //$this->getSubject()->setDescription();
        //$this->getConfigurationPool()->getContainer()->get('doctrine');
        //$session = $this->getConfigurationPool()->getContainer()->get('request')->getSession();
        
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
                    'required' => false,
                    'attr' => array(
                        'placeholder' => "ex: Festival d'Avignon",
                    ),
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
                'link',
                'text',
                array(
                    'label'  => "Lien vers le site de l'événement",
                    'required' => false,
                    'attr' => array(
                        'placeholder' => "ex: http://www.festival-avignon.com",
                    ),
                )
            )
            ->add(
                'show',
                'entity',
                array(
                    'class' => 'LesAutresSiteBundle:Show',
                    'query_builder' => function($repository) { return $repository->createQueryBuilder('s')->orderBy('s.id', 'ASC'); },
                    'label'  => "Spectacle",
                    'required' => false,
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
                    'cascade_validation' => true,
                    'label'  => "Dates (laisser l'heure à 0h00 pour ne pas définir d'heure)",
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
    
    public function prePersist($event)
    {
        $event->setDates($event->getDates());
    }
 
    public function preUpdate($event)
    {
        $event->setDates($event->getDates());
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
