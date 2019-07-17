<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Stock;

use Magneto\Embroidery\Controller\Adminhtml\Stock;

class MassDelete extends Stock
{
   public function execute()
   {
      // Get IDs of the selected data
      $savid = $this->getRequest()->getParam('stock');

        foreach ($savid as $massId) {
            try {
                $model = $this->_stockFactory->create();
                $model->load($massId)->delete();
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }

        if (count($savid)) {
            $this->messageManager->addSuccess(
                __('A total of %1 record(s) were deleted.', count($savid))
            );
        }

        $this->_redirect('*/*/index');
   }
}