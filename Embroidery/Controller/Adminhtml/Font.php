<?php
namespace Magneto\Embroidery\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magneto\Embroidery\Model\FontFactory;

class Font extends Action
{
    protected $_coreRegistry;

    protected $_resultPageFactory;

    protected $_fontFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        FontFactory $fontFactory
    ) {
       parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_fontFactory = $fontFactory;
    }

    public function execute()
    {
        $this->resultPage = $this->resultPageFactory->create();
        $this->resultPage->setActiveMenu('Magneto_Embroidery::manage_font');
        return $this->resultPage;     
    }  

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magneto_Embroidery::manage_font');
    }
}
