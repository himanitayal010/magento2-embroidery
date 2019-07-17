<?php
namespace Magneto\Embroidery\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magneto\Embroidery\Model\StockFactory;

use Magento\Framework\Filesystem;
use Magento\Store\Model\StoreManagerInterface;

class Stock extends Action
{
    protected $_coreRegistry;

    protected $_resultPageFactory;

    protected $_stockFactory;
    protected $_adapterFactory;
    protected $_fileUploaderFactory;
    protected $_filesystem;
    protected $timezoneInterface;
    protected $_mediaDirectory;

    public function __construct(
        Context $context,
        StoreManagerInterface $storeManager,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        StockFactory $stockFactory,
        \Magento\Framework\Image\AdapterFactory $adapterFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $fileUploaderFactory,
        \Magento\Framework\Filesystem $filesystem
    ) {
        parent::__construct($context);
        $this->_storeManager = $storeManager;
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_stockFactory = $stockFactory;
        $this->_adapterFactory = $adapterFactory;
        $this->_fileUploaderFactory = $fileUploaderFactory;
        $this->_filesystem = $filesystem;
    }

    public function execute()
    {
        $this->resultPage = $this->resultPageFactory->create();
        $this->resultPage->setActiveMenu('Magneto_Embroidery::manage_stock');
        return $this->resultPage;     
    }  

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magneto_Embroidery::manage_stock');
    }
}
