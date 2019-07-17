<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Stock;

use Magneto\Embroidery\Controller\Adminhtml\Stock;

class Index extends Stock
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
        $resultPage->getConfig()->getTitle()->prepend(__('Stock Design'));

        return $resultPage;
   }
}
