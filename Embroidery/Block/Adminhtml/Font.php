<?php
namespace Magneto\Embroidery\Block\Adminhtml;

class Font extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_font';
		$this->_blockGroup = 'Magneto_Embroidery';
		$this->_headerText = __('Fonts');
		$this->_addButtonLabel = __('Add New Font Color');
		parent::_construct();
	}
}