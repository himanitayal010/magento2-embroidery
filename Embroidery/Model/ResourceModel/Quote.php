<?php
namespace Magneto\Embroidery\Model\ResourceModel;

class Quote extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magneto_quote', 'id');
    }
}