<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Color;

use Magneto\Embroidery\Controller\Adminhtml\Color;

class Edit extends Color
{
   public function execute()
   {
      $rowId = $this->getRequest()->getParam('id');
        $model = $this->_colorFactory->create();

        if ($rowId) {
            $model->load($rowId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This data no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $this->_coreRegistry->register('embroidery_color', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Magneto_Embroidery::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Font Color'));

        return $resultPage;
   }
   protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magneto_Embroidery::add_row');
    }
}
