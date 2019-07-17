<?php
namespace Magneto\Embroidery\Model\ResourceModel;

class Stock extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magneto_embroidery_stock', 'id');
    }
}