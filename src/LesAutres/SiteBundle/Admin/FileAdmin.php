<?php
namespace LesAutres\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class FileAdmin extends Admin
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
                'path',
                'text',
                array(
                    'label'  => "Nom",
                    'required' => false,
                    'read_only' => true,
                )
            )
            ->add(
                'isImage',
                'checkbox',
                array(
                    'label' => "Illustration",
                    'required' => false,
                )
            )
            ->add(
                'isPdf',
                'checkbox',
                array(
                    'label' => "Dossier pdf",
                    'required' => false,
                )
            )
            ->add(
                'file',
                'file',
                array(
                    'label'  => "Fichier",
                    'required' => false,
                )
            )
            ->end()
        ;
    }
    
    public function prePersist($file)
    {
        $file->upload();
    }
 
    public function preUpdate($file)
    {
        $file->upload();
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
                'path',
                null,
                array(
                    'label'  => "Fichier",
                )
            )
            ->add(
                'mimeType',
                null,
                array(
                    'label'  => "Mime Type",
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
                'mimeType',
                null,
                array(
                    'label'  => "Mime Type",
                )
            )
            ->add(
                'path',
                null,
                array(
                    'label'  => "Fichier",
                )
            )
        ;
    }
}
