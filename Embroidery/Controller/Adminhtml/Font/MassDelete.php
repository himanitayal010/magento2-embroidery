<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Font;

use Magneto\Embroidery\Controller\Adminhtml\Font\Index;

class MassDelete extends Index
{
   public function execute()
   {
      // Get IDs of the selected news
      $newsIds = $this->getRequest()->getParam('font');

        foreach ($newsIds as $newsId) {
            try {
                $newsModel = $this->fontFactory->create();
                $newsModel->load($newsId)->delete();
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }

        if (count($newsIds)) {
            $this->messageManager->addSuccess(
                __('A total of %1 record(s) were deleted.', count($newsIds))
            );
        }

        $this->_redirect('*/*/index');
   }
}