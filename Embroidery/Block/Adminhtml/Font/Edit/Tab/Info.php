<?php

namespace Magneto\Embroidery\Block\Adminhtml\Font\Edit\Tab;

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
        $model = $this->_coreRegistry->registry('embroidery_font');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create( ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'enctype' => 'multipart/form-data','method' => 'post']]);
        $form->setHtmlIdPrefix('font_');
        $form->setFieldNameSuffix('font');

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
            'fonts',
            'text',
            [
                'name'        => 'fonts',
                'label'    => __('Font Name'),
                'required'     => true,
                'note'      => 'Example: arial, montserrat, zcool kuaile, coiny, eater'
            ]
        );
        $fieldset->addField(
            'font_family',
            'text',
            [
                'name'        => 'font_family',
                'label'    => __('Font Family'),
                'required'     => true,
                'note'      => 'Example: "Arial",sans-serif; "Montserrat",sans-serif; "Coiny", cursive'
            ]
        );
        $fieldset->addField(
            'font_url',
            'text',
            [
                'name'        => 'font_url',
                'label'    => __('Font URL'),
                'required'     => true,
                'note'      => 'Write a cdn or url over here ex: https://fonts.googleapis.com/css?family=Montserrat'
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
        return __('Font Style');
    }
 
    /**
     * Prepare title for tab
     *
     * @return string
     */
    public function getTabTitle()
    {
        return __('Font Style');
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
