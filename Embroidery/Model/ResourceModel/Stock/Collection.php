<?php
namespace Magneto\Embroidery\Model\ResourceModel\Stock;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
	protected $_idFieldName = 'id';

	protected $_eventPrefix = 'embroidery_stock_stocklogo_collection';

	protected $_eventObject = 'stock_collection';

    protected function _construct()
    {
        $this->_init('Magneto\Embroidery\Model\Stock','Magneto\Embroidery\Model\ResourceModel\Stock');
    }
}