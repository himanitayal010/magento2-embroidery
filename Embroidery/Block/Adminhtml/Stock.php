<?php
namespace Magneto\Embroidery\Block\Adminhtml;

class Stock extends \Magento\Backend\Block\Widget\Grid\Container
{

	protected function _construct()
	{
		$this->_controller = 'adminhtml_stock';
		$this->_blockGroup = 'Magneto_Embroidery';
		$this->_headerText = __('Stock');
		$this->_addButtonLabel = __('Add New Stock Design');
		parent::_construct();
	}
}