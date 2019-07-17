<?php
namespace Magneto\Embroidery\Model\ResourceModel;

class Font extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function _construct()
    {
        $this->_init('magneto_embroidery_fonts', 'id');
    }
}