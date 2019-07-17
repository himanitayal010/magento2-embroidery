<?php

/**
 * Override cart item block in custom module
 */

namespace Magneto\Embroidery\Block\Cart;

class AbstractCart
{

    public function afterGetItemRenderer(\Magento\Checkout\Block\Cart\AbstractCart $subject, $result)
    {
        $result->setTemplate('Magneto_Embroidery::cart/item/default.phtml');
        return $result;
    }
}