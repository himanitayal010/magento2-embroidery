<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Stock;

use Magneto\Embroidery\Controller\Adminhtml\Stock;

class NewAction extends Stock
{
   public function execute()
   {
      $this->_forward('edit');
   }
}
