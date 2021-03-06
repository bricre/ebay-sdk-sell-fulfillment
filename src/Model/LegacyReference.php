<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * Type defining the <b>legacyReference</b> container. This container is needed if
 * the seller is issuing a refund for an individual order line item, and wishes to
 * use an item ID and transaction ID to identify the order line item.
 */
class LegacyReference extends AbstractModel
{
    /**
     * The unique identifier of a listing in legacy/Trading API format. <br/><br/><span
     * class="tablenote"><strong>Note:</strong> Both <b>legacyItemId</b> and
     * <b>legacyTransactionId</b> are needed to identify an order line item. </span>.
     *
     * @var string
     */
    public $legacyItemId = null;

    /**
     * The unique identifier of a sale/transaction in legacy/Trading API format. A
     * 'transaction ID' is created once a buyer purchases a 'Buy It Now' item or if an
     * auction listing ends with a winning bidder. <br/><br/><span
     * class="tablenote"><strong>Note:</strong> Both <b>legacyItemId</b> and
     * <b>legacyTransactionId</b> are needed to identify an order line item. </span>.
     *
     * @var string
     */
    public $legacyTransactionId = null;
}
