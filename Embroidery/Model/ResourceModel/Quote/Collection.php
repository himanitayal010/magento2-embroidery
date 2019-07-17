<?php
namespace Magneto\Embroidery\Model\ResourceModel\Quote;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection 
{
    protected function _construct()
    {
        $this->_init('Magneto\Embroidery\Model\Quote','Magneto\Embroidery\Model\ResourceModel\Quote');
    }
}