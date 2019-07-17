<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Color;

use Magneto\Embroidery\Controller\Adminhtml\Color;

class MassDelete extends Color
{    
   public function execute()
   {
      $delIds = $this->getRequest()->getParam('color');

        foreach ($delIds as $delId) {
            try {
                $model = $this->_colorFactory->create();
                $model->load($delId)->delete();
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
        }

        if (count($delIds)) {
            $this->messageManager->addSuccess(
                __('A total of %1 record(s) were deleted.', count($delIds))
            );
        }

        $this->_redirect('*/*/index');
   }
}