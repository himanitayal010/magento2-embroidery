<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Color;

use Magneto\Embroidery\Controller\Adminhtml\Color\Index;

class Delete extends Index
{
   /**
    * @return void
    */
   public function execute()
   {
      $delId = (int) $this->getRequest()->getParam('id');

      if ($delId) {
         $nodel = $this->_colorFactory->create();
         $nodel->load($delId);

         // Check this data exists or not
         if (!$nodel->getId()) {
            $this->messageManager->addError(__('This data no longer exists.'));
         } else {
               try {
                  // Delete 
                  $nodel->delete();
                  $this->messageManager->addSuccess(__('The data has been deleted.'));

                  // Redirect to grid page
                  $this->_redirect('*/*/');
                  return;
               } catch (\Exception $e) {
                   $this->messageManager->addError($e->getMessage());
                   $this->_redirect('*/*/edit', ['id' => $nodel->getId()]);
               }
            }
      }
   }
}
