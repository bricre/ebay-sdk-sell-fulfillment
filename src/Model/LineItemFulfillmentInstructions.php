<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains the specifications for processing the fulfillment of a line
 * item, including the handling window and the delivery window. These fields
 * provide guidance for <i>eBay Guaranteed Delivery</i> as well as for
 * non-guaranteed delivery.
 */
class LineItemFulfillmentInstructions extends AbstractModel
{
    /**
     * This field is returned as <code>true</code> if the order line item is qualified
     * for eBay Guaranteed Delivery, or <code>false</code> if it is not eligible. Only
     * domestic shipments are available for eBay Guaranteed Delivery. At this time,
     * eBay Guaranteed Delivery is only available to a select number of sellers on the
     * US and Australia sites, but this feature will be enabled on more eBay sites in
     * 2019.<br/><br/>  There are two different eBay Guaranteed Delivery options -
     * 'Handling time' option and 'Door-to-Door' option. With both options, the seller
     * is commiting to getting the order delivered to the buyer within three business
     * days after purchase. <br/><br/> With the 'Handling time' option, the seller's
     * stated handling time for a listing must be 'same-day' or '1-day', and at least
     * one of the available shipping service options should have a shipping time that
     * guarantees that the buyer receives the order on time. With this option, eBay
     * will set the 'ship-by date' and expected delivery window for the seller, and the
     * seller should just make sure they physically ship the order by the
     * <strong>shipToDate</strong>.<br/><br/> With the 'Door-to-door' option, the
     * seller must create regional shipping rate tables (with shipping costs and
     * delivery times based on destination regions), and then apply these regional
     * shipping rates/delivery times to the listing. <br/><br/> If a 'Door-to-door'
     * order does not arrive on time, the seller must refund the buyer the full
     * shipping cost (if any), and the buyer also has the option of returning the item
     * for a full refund, and the seller will also have to pay the return shipping
     * cost. With 'Handling time' option, as long as the seller meets the stated
     * handling time, and ships using the correct shipping service option, eBay will
     * refund the buyer the shipping cost and pay for return shipping label (if buyer
     * wants to return item) if the order arrives after the expected delivery time.
     * <br/><br/> For more information on the details and requirements of eBay
     * Guaranteed Delivery, see the <a
     * href="https://www.ebay.com/help/selling/shipping-items/offering-ebay-guaranteed-delivery?id=4645"
     * target="_blank">Offering eBay Guaranteed Delivery</a> help topic.<br/><br/> This
     * field will always be returned regardless of whether the listing site offers eBay
     * Guaranteed Delivery or if the seller is opted in to the feature.
     *
     * @var bool
     */
    public $guaranteedDelivery = null;

    /**
     * The estimated latest date and time that the buyer can expect to receive the line
     * item based on the seller's stated handling time and the transit times of the
     * available shipping service options. If the listing is eligible for eBay
     * Guaranteed Delivery (value of <b>guaranteedDelivery</b> field is
     * <code>true</code>, the seller must pay extra attention to this date, as a
     * failure to deliver by this date/time can result in a 'Late shipment' seller
     * defect, and can affect seller level and Top-Rated Seller status. In addition to
     * the seller defect, buyers will be eligible for a shipping cost refund, and will
     * also be eligible to return the item for a full refund (with no return shipping
     * charge) if they choose. <br /><br /><span
     * class="tablenote"><strong>Note:</strong> This timestamp is in ISO 8601 format,
     * which uses the 24-hour Universal Coordinated Time (UTC) clock. <br /><br
     * /><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br
     * /><b>Example:</b> <code>2015-08-04T19:09:02.768Z</code></span>.
     *
     * @var string
     */
    public $maxEstimatedDeliveryDate = null;

    /**
     * The estimated earliest date and time that the buyer can expect to receive the
     * line item based on the seller's stated handling time and the transit times of
     * the available shipping service options.<br /><br /><span
     * class="tablenote"><strong>Note:</strong> This timestamp is in ISO 8601 format,
     * which uses the 24-hour Universal Coordinated Time (UTC) clock. <br /><br
     * /><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br
     * /><b>Example:</b> <code>2015-08-04T19:09:02.768Z</code></span>.
     *
     * @var string
     */
    public $minEstimatedDeliveryDate = null;

    /**
     * The latest date and time by which the seller should ship line item in order to
     * meet the expected delivery window. This timestamp will be set by eBay based on
     * time of purchase and the seller's stated handling time. If the listing is
     * eligible for eBay Guaranteed Delivery (value of <b>guaranteedDelivery</b> field
     * is <code>true</code>, the seller must pay extra attention to this date, as a
     * failure to physically ship the line item by this date/time can result in a 'Late
     * shipment' seller defect, and can affect seller level and Top-Rated Seller
     * status. In addition to the seller defect, buyers will be eligible for a shipping
     * cost refund, and will also be eligible to return the item for a full refund
     * (with no return shipping charge) if they choose. <br /><br /><span
     * class="tablenote"><strong>Note:</strong> This timestamp is in ISO 8601 format,
     * which uses the 24-hour Universal Coordinated Time (UTC) clock. <br /><br
     * /><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br
     * /><b>Example:</b> <code>2015-08-04T19:09:02.768Z</code></span>.
     *
     * @var string
     */
    public $shipByDate = null;
}
