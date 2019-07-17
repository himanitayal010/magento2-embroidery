<?php

namespace Magneto\Embroidery\Block\Adminhtml\Stock\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;
use Magento\Backend\Block\Template\Context;
use Magento\Framework\Registry;
use Magento\Framework\Data\FormFactory;
use Magento\Cms\Model\Wysiwyg\Config;

class Info extends Generic implements TabInterface
{
   /**
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        array $data = []
    ) {
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form fields
     *
     * @return \Magento\Backend\Block\Widget\Form
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('embroidery_stock');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create( ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'enctype' => 'multipart/form-data','method' => 'post']]);
        $form->setHtmlIdPrefix('stock_');
       
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('General')]
        );

        if ($model->getId()) {
            $fieldset->addField(
                'id',
                'hidden',
                ['name' => 'id']
            );
        }
        $fieldset->addField(
            'stock_design_name',
            'text',
            [
                'name'        => 'stock_design_name',
                'label'    => __('Stock Design Name'),
                'required'     => true
            ]
        );
        $fieldset->addField(
            'stock_design',
            'image',
            [
                'name' => 'stock_design',
                'label' => __('Stock Design'),
                'title' => __('Stock Design'),
                'note' => __('Allowed image types: jpg,png')
            ]
        );

        $data = $model->getData();
        $form->setValues($data);
        $this->setForm($form);

        return parent::_prepareForm();
    }

    /**
     * Prepare label for tab
     *
     * @return string
     */
    public function getTabLabel()
    {
        return __('Stock Design');
    }
 
    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Stock Design');
    }
 
    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }
 
    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }
}
