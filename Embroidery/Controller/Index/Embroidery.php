<?php
namespace Magneto\Embroidery\Controller\Index;

use Magento\Framework\Controller\ResultFactory;

class Embroidery extends \Magento\Framework\App\Action\Action
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
		// Name Embroidery

		//Add Data In Session
		$name_embroidery = array();
        $i = 0;
		if($this->getRequest()->getParam('font') || $this->getRequest()->getParam('color_value')){
			$name_embroidery[0]['line'] = 'line 1';
	        $name_embroidery[0]['font'] = $this->getRequest()->getParam('font');
	        $name_embroidery[0]['color'] = $this->getRequest()->getParam('color_value');
	        $name_embroidery[0]['placement'] = $this->getRequest()->getParam('placement_value');
            $name_embroidery[0]['name_text'] = $this->getRequest()->getParam('input_valsname');
            $name_embroidery[0]['comment'] = $this->getRequest()->getParam('textatra_value_comment');
            $i = 1;
        }

        if($this->getRequest()->getParam('font2') || $this->getRequest()->getParam('color_value2')){
            // Line 2
            $name_embroidery[1]['line'] = 'line 2';
            $name_embroidery[1]['font'] = $this->getRequest()->getParam('font2');
            $name_embroidery[1]['color'] = $this->getRequest()->getParam('color_value2');
            $name_embroidery[1]['placement'] = $this->getRequest()->getParam('placement_value2');
            $name_embroidery[1]['name_text'] = $this->getRequest()->getParam('input_valsname2');
            $name_embroidery[1]['comment'] = $this->getRequest()->getParam('textatra_value_comment2');
            $i = 2;
        }

        if($this->getRequest()->getParam('font3') || $this->getRequest()->getParam('color_value3')){
            // Line 3
            $name_embroidery[2]['line'] = 'line 3';
            $name_embroidery[2]['font'] = $this->getRequest()->getParam('font3');
            $name_embroidery[2]['color'] = $this->getRequest()->getParam('color_value3');
            $name_embroidery[2]['placement'] = $this->getRequest()->getParam('placement_value3');
            $name_embroidery[2]['name_text'] = $this->getRequest()->getParam('input_valsname3');
            $name_embroidery[2]['comment'] = $this->getRequest()->getParam('textatra_value_comment3');
            $i = 3;
        }
        $encoded_name_embroidery = $this->jsonHelper->jsonEncode($name_embroidery);
        $this->_checkoutSession->setNameEmbroidery($encoded_name_embroidery);
        $this->_checkoutSession->setLineCount($i);

        //Stock Design
        $stock_embroidery = array();
        $j = 0;
        if($this->getRequest()->getParam('stockplacement_value') || $this->getRequest()->getParam('stock_value')) {
            $stock_embroidery[0]['logo'] = 'stock design 1';
            $stock_embroidery[0]['stock_value'] = $this->getRequest()->getParam('stock_value');
            $stock_embroidery[0]['stockplacement_value'] = $this->getRequest()->getParam('stockplacement_value');
            // $stock_embroidery[0]['position_value'] = $this->getRequest()->getParam('position_value');
            $stock_embroidery[0]['stock_comment'] = $this->getRequest()->getParam('stock_comment');
            $j = 1;
        }

        if($this->getRequest()->getParam('stockplacement_value2') || $this->getRequest()->getParam('stock_value2')) {
            $stock_embroidery[1]['logo'] = 'stock design 2';
            $stock_embroidery[1]['stock_value'] = $this->getRequest()->getParam('stock_value2');
            $stock_embroidery[1]['stockplacement_value'] = $this->getRequest()->getParam('stockplacement_value2');
            // $stock_embroidery[1]['position_value'] = $this->getRequest()->getParam('position_value2');
            $stock_embroidery[1]['stock_comment'] = $this->getRequest()->getParam('stock_comment2');
            $j = 2;
        }
        $encoded_stock_embroidery = $this->jsonHelper->jsonEncode($stock_embroidery);
        $this->_checkoutSession->setStockEmbroidery($encoded_stock_embroidery);
        $this->_checkoutSession->setStockCount($j);

        // Custom Logo
        $logo_embroidery = array();
        $k = 0;
        $image = $this->_checkoutSession->getImageCus();
        
        if($image){
            $decode_image = $this->jsonHelper->jsonDecode($image);
            if($decode_image){
            if(!is_array($decode_image)){
                $decode_image = $this->jsonHelper->jsonDecode($decode_image);
            }
            if(count($decode_image) >= 1){
                if($this->getRequest()->getParam('logo_placement') && $decode_image[0]['custom_logo']) {
                    $logo_embroidery[0]['logo'] = 'custom logo 1';
                    $logo_embroidery[0]['placement'] = $this->getRequest()->getParam('logo_placement');
                    // $logo_embroidery[0]['position'] = $this->getRequest()->getParam('logo_position');
                    $logo_embroidery[0]['comment'] = $this->getRequest()->getParam('logo_comment');
                    $logo_embroidery[0]['custom_logo'] = $decode_image[0]['custom_logo'];
                    $k = 1;
                }
                if(count($decode_image) >= 2){
                    if($this->getRequest()->getParam('logo_placement2') && $decode_image[1]['custom_logo']) {
                        $logo_embroidery[1]['logo'] = 'custom logo 2';
                        $logo_embroidery[1]['placement'] = $this->getRequest()->getParam('logo_placement2');
                        // $logo_embroidery[1]['position'] = $this->getRequest()->getParam('logo_position2');
                        $logo_embroidery[1]['comment'] = $this->getRequest()->getParam('logo_comment2');
                        $logo_embroidery[1]['custom_logo'] = $decode_image[1]['custom_logo'];
                        $k = 2;
                    }
                }
                $encoded_logo_embroidery = $this->jsonHelper->jsonEncode($logo_embroidery);
                $this->_checkoutSession->setLogoEmbroidery($encoded_logo_embroidery);
                $this->_checkoutSession->setLogoCount($k);
               
            }
            }
        }
        $this->_checkoutSession->unsImageCus();  

		$resultJson = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        // return $this->_redirect('checkout/cart/add');
        return $resultJson;
	}
}