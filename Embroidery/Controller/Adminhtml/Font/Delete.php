<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Font;

use Magneto\Embroidery\Controller\Adminhtml\Font\Index;

class Delete extends Index
{
   /**
    * @return void
    */
   public function execute()
   {
      $newsId = (int) $this->getRequest()->getParam('id');

      if ($newsId) {
         $newsModel = $this->_newsFactory->create();
         $newsModel->load($newsId);

         // Check this news exists or not
         if (!$newsModel->getId()) {
            $this->messageManager->addError(__('This news no longer exists.'));
         } else {
               try {
                  // Delete news
                  $newsModel->delete();
                  $this->messageManager->addSuccess(__('The news has been deleted.'));

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
