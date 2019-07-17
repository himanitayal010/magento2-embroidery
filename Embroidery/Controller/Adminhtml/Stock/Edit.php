<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Stock;

use Magneto\Embroidery\Controller\Adminhtml\Stock;

class Edit extends Stock
{
   public function execute()
   {
      $rowId = $this->getRequest()->getParam('id');
        $model = $this->_stockFactory->create();

        if ($rowId) {
            $model->load($rowId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This data no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $this->_coreRegistry->register('embroidery_stock', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Magneto_Embroidery::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Stock Design'));

        return $resultPage;
   }
   protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magneto_Embroidery::add_row');
    }
}
