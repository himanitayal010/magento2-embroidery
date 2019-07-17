<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Font;

use Magneto\Embroidery\Controller\Adminhtml\Font;

class Edit extends Font
{

    public function execute()
    {
        $rowId = $this->getRequest()->getParam('id');
        $model = $this->_fontFactory->create();

        if ($rowId) {
            $model->load($rowId);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This data no longer exists.'));
                $this->_redirect('*/*/');
                return;
            }
        }

        $this->_coreRegistry->register('embroidery_font', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Magneto_Embroidery::main_menu');
        $resultPage->getConfig()->getTitle()->prepend(__('Font Style'));

        return $resultPage;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magneto_Embroidery::add_row');
    }
}
