<?php

namespace Magneto\Embroidery\Controller\Adminhtml\Stock;

use Magneto\Embroidery\Controller\Adminhtml\Stock;
use Magento\Backend\App\Action\Context;

class Save extends Stock
{    
   public function execute()
   {
      $isPost = $this->getRequest()->getPost();
      
      if ($isPost) {
         $model = $this->_stockFactory->create();
         $savid = $this->getRequest()->getParam('id');         

         if ($savid) {
            $model->load($savid);
         }

         $formData = $this->getRequest()->getParam('stock');
         $fileImage = $this->getRequest()->getFiles('stock_design');
            $fileName = ($fileImage && array_key_exists('name', $fileImage)) ? $fileImage['name'] : null;
            if ($fileImage && $fileName) {
                try {
                    /** @var \Magento\Framework\ObjectManagerInterface $uploader */
                    $uploader = $this->_objectManager->create(
                        'Magento\MediaStorage\Model\File\Uploader',
                        ['fileId' => 'stock_design']
                    );
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    /** @var \Magento\Framework\Image\Adapter\AdapterInterface $imageAdapterFactory */
                    $imageAdapterFactory = $this->_objectManager->get('Magento\Framework\Image\AdapterFactory')
                        ->create();
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);
                    $uploader->setAllowCreateFolders(true);
                    /** @var \Magento\Framework\Filesystem\Directory\Read $mediaDirectory */
                    $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
                        ->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);

                    $result = $uploader->save(
                        $mediaDirectory
                            ->getAbsolutePath('embroidery')
                    );
                    //$data['profile'] = 'Modulename/Profile/'. $result['file'];
                    $model->setStockDesign('embroidery'.$result['file']); //Database field name
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                    }
                }
            }

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
         $this->_redirect('*/*/edit', ['id' => $savid]);
      }
   }
}
