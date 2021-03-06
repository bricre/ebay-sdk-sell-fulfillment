<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

class EbayVaultProgram extends AbstractModel
{
    /**
     * This field specifies how an eBay vault order will be fulfilled. Supported
     * options are:<ul><li><b>Seller to Vault</b>: the order will be shipped by the
     * seller to an authenticator.</li><li><b>Vault to Vault</b>: the order will be
     * shipped from an eBay vault to the buyer's vault.</li><li><b>Vault to Buyer</b>:
     * the order will be shipped from an eBay vault to the buyer's shipping
     * address.</li></ul> For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:EbayVaultFulfillmentTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $fulfillmentType = null;
}
