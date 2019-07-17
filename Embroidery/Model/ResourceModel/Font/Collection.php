<?php
namespace Magneto\Embroidery\Model\ResourceModel\Font;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
	protected $_idFieldName = 'id';

	protected $_eventPrefix = 'embroidery_font_color_collection';

	protected $_eventObject = 'stock_collection';

    protected function _construct()
    {
        $this->_init('Magneto\Embroidery\Model\Font','Magneto\Embroidery\Model\ResourceModel\Font');
    }
}