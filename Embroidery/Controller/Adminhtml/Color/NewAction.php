<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Color;

use Magneto\Embroidery\Controller\Adminhtml\Color\Index;

class NewAction extends Index
{
   public function execute()
   {
      $this->_forward('edit');
   }
}
