<?php

namespace CompBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CompanyAdmin extends Admin
{

    /**
     * Конфигурация отображения записи
     *
     * @param \Sonata\AdminBundle\Show\ShowMapper $showMapper
     * @return void
     */
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->addIdentifier('nameCompany', null, array('label' => 'Company'))
            ->add('year', null, array('label' => 'Year'))
            ->add('description', null, array('label' => 'Description'))
            ->add('category', null, array('label' => 'Category'))
            ->add('createdAt', null, array('label' => 'Created'))
            ->add('updatedAt', null, array('label' => 'Updated'));
    }

    /**
     * Конфигурация формы редактирования записи
     *
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nameCompany')
            ->add('year')
            ->add('description')
            ->add('category');

    }

    /**
     * Конфигурация списка записей
     *
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nameCompany', null, array('label' => 'Company'))
            ->add('year', null, array('label' => 'Year'))
            ->add('description', null, array('label' => 'Description'))
            ->add('category', null, array('label' => 'Category'))
            ->add('createdAt', null, array('label' => 'Created'))
            ->add('updatedAt', null, array('label' => 'Updated'));
    }

    /**
     * Поля, по которым производится поиск в списке записей
     *
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nameCompany', null, array('label' => 'Назва компанії'));
    }




}
