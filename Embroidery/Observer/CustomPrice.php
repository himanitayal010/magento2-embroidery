<?php

namespace Magneto\Embroidery\Observer;
 
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\App\RequestInterface;
use Magneto\Embroidery\Helper\Data;
 
class CustomPrice implements ObserverInterface
{
	protected $helper;

	protected $checkoutSession;

	public function __construct(
		\Magento\Framework\App\Action\Context $context, 
		\Magneto\Embroidery\Helper\Data $helper, 
		\Magento\Checkout\Model\Session $checkoutSession) {
        $this->helper = $helper;
        $this->_checkoutSession = $checkoutSession;
    }

	public function execute(\Magento\Framework\Event\Observer $observer) {
        $item = $observer->getEvent()->getData('quote_item');  
        $price = $item->getProduct()->getPrice();
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
        // echo '<pre>'; print_r($this->getCustomLogo()); die();
        if($this->getNameLines() >= 1 || $this->getStockLogo() >= 1 || $this->getCustomLogo() >= 1){
            $lineprice = $this->getNamePrice() * $this->getNameLines();
            $stockprice = $this->getStockPrice() * $this->getStockLogo();
            $logoprice = ($this->getLogoPrice() + $this->getLogoPriceSetupFee()) * $this->getCustomLogo();
            $newprice = $lineprice + $stockprice + $logoprice + $price;
            $item->setCustomPrice($newprice);
            $item->setOriginalCustomPrice($newprice);
            $item->getProduct()->setIsSuperMode(true);
        }   
    }

    public function getNamePrice()
    {
        return $this->helper->getNamePrice();
    }

    public function getStockPrice()
    {
        return $this->helper->getStockPrice();
    }

    public function getLogoPrice()
    {
        return $this->helper->getLogoPrice();
    }

    public function getLogoPriceSetupFee()
    {
        return $this->helper->getLogoPriceSetupFee();
    }

    public function getNameLines()
    {
        if($this->_checkoutSession->getNameEmbroidery()){
        	$line = $this->_checkoutSession->getLineCount();
            return $line;
        }else{
        	return '0';
        }
    }

    public function getStockLogo()
    {
        if($this->_checkoutSession->getStockEmbroidery()){
            $stock = $this->_checkoutSession->getStockCount();
            return $stock;
        }else{
            return '0';
        }
    }

    public function getCustomLogo()
    {
        if($this->_checkoutSession->getLogoEmbroidery()){
            $logo = $this->_checkoutSession->getLogoCount();
            return $logo;
        }else{
            return '0';
        }
    }
}