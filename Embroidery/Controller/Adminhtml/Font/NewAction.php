<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Font;

use Magneto\Embroidery\Controller\Adminhtml\Font\Index;

class NewAction extends Index
{
   public function execute()
   {
      $this->_forward('edit');
   }
}
