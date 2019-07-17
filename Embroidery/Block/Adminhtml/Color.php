<?php
namespace Magneto\Embroidery\Block\Adminhtml;

class Color extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_color';
		$this->_blockGroup = 'Magneto_Embroidery';
		$this->_headerText = __('Color');
		$this->_addButtonLabel = __('Add New Font Style');
		parent::_construct();
	}
}