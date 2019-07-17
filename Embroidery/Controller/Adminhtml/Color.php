<?php
namespace Magneto\Embroidery\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magneto\Embroidery\Model\ColorFactory;

class Color extends Action
{
    protected $_coreRegistry;

    protected $_resultPageFactory;

    protected $_colorFactory;

    public function __construct(
        Context $context,
        Registry $coreRegistry,
        PageFactory $resultPageFactory,
        ColorFactory $colorFactory
    ) {
       parent::__construct($context);
        $this->_coreRegistry = $coreRegistry;
        $this->_resultPageFactory = $resultPageFactory;
        $this->_colorFactory = $colorFactory;
    }

    public function execute()
    {
        $this->resultPage = $this->resultPageFactory->create();
        $this->resultPage->setActiveMenu('Magneto_Embroidery::manage_color');
        return $this->resultPage;     
    }  

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magneto_Embroidery::manage_color');
    }
}