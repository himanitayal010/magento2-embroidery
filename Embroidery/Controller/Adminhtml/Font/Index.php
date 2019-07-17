<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Font;

use Magneto\Embroidery\Controller\Adminhtml\Font;

class Index extends Font
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
        $resultPage->getConfig()->getTitle()->prepend(__('Name Fonts'));

        return $resultPage;
   }
}
