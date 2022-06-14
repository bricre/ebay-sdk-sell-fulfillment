<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains information about the order's buyer.
 */
class Buyer extends AbstractModel
{
    /**
     * This container consists of address information that can be used by sellers for
     * tax purpose.<br/><br/><span class="tablenote"><strong>Note:</strong> When using
     * the eBay vault program, if an item is shipped to a vault, the tax address will
     * be the vault address.</span>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\TaxAddress
     */
    public $taxAddress = null;

    /**
     * This container consists of taxpayer identification information for buyers from
     * Italy, Spain, or Guatemala. It is currently only returned for orders occurring
     * on the eBay Italy or eBay Spain marketplaces.<br /><br /><span
     * class="tablenote"><strong>Note:</strong> Currently, the
     * <strong>taxIdentifier</strong> container is only returned in
     * <strong>getOrder</strong> and not in <strong>getOrders</strong>. So, if a seller
     * wanted to view a buyer's tax information for a particular order returned in
     * <strong>getOrders</strong>, that seller would need to use the
     * <strong>orderId</strong> value for that particular order, and then run a
     * <strong>getOrder</strong> call against that order ID. </span>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\TaxIdentifier
     */
    public $taxIdentifier = null;

    /**
     * The buyer's eBay user ID.
     *
     * @var string
     */
    public $username = null;
}
