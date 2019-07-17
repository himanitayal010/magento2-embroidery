<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Color;

use Magneto\Embroidery\Controller\Adminhtml\Color;

class Index extends Color
{
    /**
     * @return void
     */
   public function execute()
   {
      if ($this->getRequest()->getQuery('ajax')) {
            $this->_forward('grid');
            return;
        }
        
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Magneto_Embroidery::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Name Color'));

        return $resultPage;
   }
}
