<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Color;

use Magneto\Embroidery\Controller\Adminhtml\Color;

class Save extends Color
{
    
   public function execute()
   {
      $isPost = $this->getRequest()->getPost();
      if ($isPost) {
         $model = $this->_colorFactory->create();
         $savId = $this->getRequest()->getParam('id');

         if ($savId) {
            $model->load($savId);
         }
         $formData = $this->getRequest()->getParam('color');
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
         $this->_redirect('*/*/edit', ['id' => $savId]);
      }
   }
}
