<?php

namespace Magneto\Embroidery\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;

class Data extends AbstractHelper
{
    /**
     * @var EncryptorInterface
     */
    protected $encryptor;

    /**
     * @param Context $context
     * @param EncryptorInterface $encryptor
     */
    public function __construct(
        Context $context,
        EncryptorInterface $encryptor
    )
    {
        parent::__construct($context);
        $this->encryptor = $encryptor;
    }

    /*
     * @return string
     */
    public function getNamePrice($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'embroidery/general/name_price',
            $scope
        );
    }

    /*
     * @return string
     */
    public function getStockPrice($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'embroidery/general/stock_price',
            $scope
        );
    }

    /*
     * @return string
     */
    public function getLogoPrice($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'embroidery/general/logo_price',
            $scope
        );
    }

    /*
     * @return string
     */
    public function getLogoPriceSetupFee($scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT)
    {
        return $this->scopeConfig->getValue(
            'embroidery/general/logo_price_setup_fee',
            $scope
        );
    }
}