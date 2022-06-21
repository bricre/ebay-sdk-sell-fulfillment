<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains information about the various monetary exchanges that apply
 * to the net balance due for the order.
 */
class PaymentSummary extends AbstractModel
{
    /**
     * This array consists of payment information for the order, including payment
     * status, payment method, payment amount, and payment date. This array is always
     * returned, although some of the fields under this container will not be returned
     * until payment has been made.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Payment[]
     */
    public $payments = null;

    /**
     * This array is always returned, but is returned as an empty array unless the
     * seller has submitted a partial or full refund to the buyer for the order. If a
     * refund has occurred, the refund amount and refund date will be shown for each
     * refund.
     *
     * @var \Ebay\Sell\Fulfillment\Model\OrderRefund[]
     */
    public $refunds = null;

    /**
     * This is the total price that the seller receives for the entire order after all
     * costs (item cost, delivery cost, taxes) are added for all line items, minus any
     * discounts and/or promotions for any of the line items. Note that this value is
     * subject to change before payment is actually made by the buyer (if the
     * <strong>paymentStatus</strong> value was <code>PENDING</code> or
     * <code>FAILED</code>), or if a partial or full refund occurs with the order.<br
     * /><br /><span class="tablenote"><strong>Note:</strong> For orders that are
     * subject to 'eBay Collect and Remit' tax, the 'Collect and Remit' tax amount for
     * the order will be included in this <strong>totalDueSeller</strong>
     * value.<br><br>To determine if 'Collect and Remit' taxes were added into this
     * <strong>totalDueSeller</strong> value, the user can check for the corresponding
     * <strong>lineItems.ebayCollectAndRemitTaxes</strong> and the
     * <strong>lineItems.taxes</strong> containers in the response. If both of these
     * containers appear for one or more line items in the response with the following
     * <strong>taxType</strong> values, the 'Collect and Remit' tax amount that the
     * buyer paid is included in this amount:<ul><li><code>STATE_SALES_TAX</code>:
     * US</li><li><code>PROVINCE_SALES_TAX</code>: Provincial Sales Tax in
     * Canada</li><li><code>GST</code>: Canada, Australia, and New
     * Zealand</li><li><code>VAT</code>: VAT collected for UK and EU
     * countries</li></ul></span>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $totalDueSeller = null;
}
