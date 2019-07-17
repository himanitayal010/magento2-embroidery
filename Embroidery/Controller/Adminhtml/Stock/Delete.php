<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Stock;

use Magneto\Embroidery\Controller\Adminhtml\Stock;

class Delete extends Stock
{
   /**
    * @return void
    */
   public function execute()
   {
      $savid = (int) $this->getRequest()->getParam('id');

      if ($savid) {
         $model = $this->_stockFactory->create();
         $model->load($savid);

         // Check this data exists or not
         if (!$model->getId()) {
            $this->messageManager->addError(__('This data no longer exists.'));
         } else {
               try {
                  // Delete data
                  $model->delete();
                  $this->messageManager->addSuccess(__('The data has been deleted.'));

                  // Redirect to grid page
                  $this->_redirect('*/*/');
                  return;
               } catch (\Exception $e) {
                   $this->messageManager->addError($e->getMessage());
                   $this->_redirect('*/*/edit', ['id' => $newsModel->getId()]);
               }
            }
      }
   }
}
