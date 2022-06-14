<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains the complete details of an existing fulfillment for an order.
 */
class ShippingFulfillment extends AbstractModel
{
    /**
     * The unique identifier of the fulfillment; for example,
     * <code>9405509699937003457459</code>. This eBay-generated value is created with a
     * successful <b>createShippingFulfillment</b> call.
     *
     * @var string
     */
    public $fulfillmentId = null;

    /**
     * This array contains a list of one or more line items (and purchased quantity) to
     * which the fulfillment applies.
     *
     * @var \Ebay\Sell\Fulfillment\Model\LineItemReference[]
     */
    public $lineItems = null;

    /**
     * The tracking number provided by the shipping carrier for the package shipped in
     * this fulfillment. This field is returned if available.
     *
     * @var string
     */
    public $shipmentTrackingNumber = null;

    /**
     * The date and time that the fulfillment package was shipped. This timestamp is in
     * ISO 8601 format, which uses the 24-hour Universal Coordinated Time (UTC) clock.
     * This field should only be returned if the package has been shipped.<br /><br
     * /><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br
     * /><b>Example:</b> <code>2015-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $shippedDate = null;

    /**
     * The eBay code identifying the shipping carrier for this fulfillment. This field
     * is returned if available. <br /><br /><span
     * class="tablenote"><strong>Note:</strong> The Trading API's
     * <b>ShippingCarrierCodeType</b> enumeration type contains the most current list
     * of eBay shipping carrier codes and the countries served by each carrier. See <a
     * href="https://developer.ebay.com/Devzone/XML/docs/Reference/eBay/types/ShippingCarrierCodeType.html
     * " target="_blank">ShippingCarrierCodeType</a>.</span>.
     *
     * @var string
     */
    public $shippingCarrierCode = null;
}
