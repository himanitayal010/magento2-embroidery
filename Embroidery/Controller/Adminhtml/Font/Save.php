<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Font;

use Magneto\Embroidery\Controller\Adminhtml\Font\Index;

class Save extends Index
{
    
   public function execute()
   {
      $isPost = $this->getRequest()->getPost();

      if ($isPost) {
         $model = $this->_fontFactory->create();
         $postId = $this->getRequest()->getParam('id');

         if ($postId) {
            $model->load($postId);
         }
         $formData = $this->getRequest()->getParam('font');
         $model->setData($formData);
         
         try {
            // Save data
            $model->save();

            // Display success message
            $this->messageManager->addSuccess(__('The data has been saved.'));

            // Check if 'Save and Continue'
            if ($this->getRequest()->getParam('back')) {
               return $this->_redirect('*/*/edit', ['id' => $model->getId(), '_current' => true]);
            }

            // Go to grid page
            return $this->_redirect('*/*/');
         } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
         }

         $this->_getSession()->setFormData($formData);
         $this->_redirect('*/*/edit', ['id' => $postId]);
      }
   }
}
