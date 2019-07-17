<?php
namespace Magneto\Embroidery\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Imagetwo extends \Magento\Framework\App\Action\Action
{
	protected $resultFactory;

	protected $checkoutSession;

	protected $jsonHelper;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		ResultFactory $resultFactory,
		\Magento\Checkout\Model\Session $checkoutSession,
		\Magento\Framework\Json\Helper\Data $jsonHelper,
        \Magento\Framework\Filesystem $fileSystem,
		array $data = []
		)
	{
        $this->_filesystem = $fileSystem;
		$this->resultFactory = $resultFactory;
		$this->_checkoutSession = $checkoutSession;
		$this->jsonHelper = $jsonHelper;
		return parent::__construct($context);
	}

	public function execute()
	{
        // Custom Logo
        $image = array();

        $fileImage = $this->getRequest()->getFiles('file');
        if($fileImage){
            $fileName = ($fileImage && array_key_exists('name', $fileImage)) ? $fileImage['name'] : null;
            if ($fileImage && $fileName) {
                try {
                        /** @var \Magento\Framework\ObjectManagerInterface $uploader */
                    $uploader = $this->_objectManager->create(
                            'Magento\MediaStorage\Model\File\Uploader',
                            ['fileId' => 'file']
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
                                ->getAbsolutePath('embroidery/custom_logo')
                    );
                        //$data['profile'] = 'Modulename/Profile/'. $result['file'];
                    $image[2]['custom_logo'] = 'embroidery/custom_logo'.$result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addError($e->getMessage());
                    }
                }
            }
        }
        $first_logo = $this->_checkoutSession->getImageCus();
        $first_logo_decode = $this->jsonHelper->jsonDecode($first_logo);

        $new_image = $this->jsonHelper->jsonEncode(array_merge($first_logo_decode, (array)$image));

        $this->_checkoutSession->unsImageCus();

        $encoded_image = $this->jsonHelper->jsonEncode($new_image);
        $this->_checkoutSession->setImageCus($encoded_image);

		$resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        // return $this->_redirect('checkout/cart/add');
        return $resultJson;
	}
}