<?php
namespace Magneto\Embroidery\Model\ResourceModel\Color;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
	protected $_idFieldName = 'id';

	protected $_eventPrefix = 'embroidery_name_color_collection';

	protected $_eventObject = 'name_collection';

    protected function _construct()
    {
        $this->_init('Magneto\Embroidery\Model\Color','Magneto\Embroidery\Model\ResourceModel\Color');
    }
}