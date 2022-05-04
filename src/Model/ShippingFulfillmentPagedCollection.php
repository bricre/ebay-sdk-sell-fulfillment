<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains the specifications for the entire collection of shipping
 * fulfillments that are associated with the order specified by a
 * <b>getShippingFulfillments</b> call. The <b>fulfillments</b> container returns
 * an array of all the fulfillments in the collection.
 */
class ShippingFulfillmentPagedCollection extends AbstractModel
{
    /**
     * This array contains one or more fulfillments required for the order that was
     * specified in method endpoint.
     *
     * @var \Ebay\Sell\Fulfillment\Model\ShippingFulfillment[]
     */
    public $fulfillments = null;

    /**
     * The total number of fulfillments in the specified order.<br /><br /><span
     * class="tablenote"><strong>Note:</strong> If no fulfillments are found for the
     * order, this field is returned with a value of <code>0</code>.</span>.
     *
     * @var int
     */
    public $total = null;

    /**
     * This array is only returned if one or more errors or warnings occur with the
     * call request.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Error[]
     */
    public $warnings = null;
}
