<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used to provide details about the seller payments for an order.
 */
class Payment extends AbstractModel
{
    /**
     * The amount that seller receives for the order via the payment method mentioned
     * in <strong>Payment.paymentMethod</strong>.<br /><br /><span
     * class="tablenote"><strong>Note:</strong> For orders that are subject to 'eBay
     * Collect and Remit' tax, which includes US state-mandated sales tax, Federal and
     * Provincial Sales Tax in Canada, 'Good and Services' tax in Canada, Australia,
     * and New Zealand, and VAT collected for UK or EU, the 'Collect and Remit' tax
     * amount for the order will be included in this <strong>amount.value</strong>
     * field (and in the <strong>amount.convertedFromValue</strong> field if currency
     * conversion is applicable).<br><br> To determine if 'Collect and Remit' taxes
     * were added into this <strong>totalDueSeller</strong> value, the user can check
     * for the corresponding <strong>lineItems.ebayCollectAndRemitTaxes</strong> and
     * the <strong>lineItems.taxes</strong> containers in the response. If both of
     * these containers appear for one or more line items in the response with the
     * following <strong>taxType</strong> values, the 'Collect and Remit' tax amount
     * that the buyer paid is included in this
     * amount:<ul><li><code>STATE_SALES_TAX</code>:
     * US</li><li><code>PROVINCE_SALES_TAX</code>: Provincial Sales Tax in
     * Canada</li><li><code>GST</code>: Canada, Australia, and New
     * Zealand</li><li><code>VAT</code>: UK and EU countries</li></ul></span>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $amount = null;

    /**
     * The date and time that the payment was received by the seller. This field will
     * not be returned if buyer has yet to pay for the order. This timestamp is in ISO
     * 8601 format, which uses the 24-hour Universal Coordinated Time (UTC) clock. <br
     * /><br /><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br
     * /><b>Example:</b> <code>2015-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $paymentDate = null;

    /**
     * This container is only returned if eBay is temporarily holding the seller's
     * funds for the order. If a payment hold has been placed on the order, this
     * container includes the reason for the payment hold, the expected release date of
     * the funds into the seller's account, the current state of the hold, and as soon
     * as the payment hold has been released, the actual release date.
     *
     * @var \Ebay\Sell\Fulfillment\Model\PaymentHold[]
     */
    public $paymentHolds = null;

    /**
     * The payment method used to pay for the order. See the
     * <strong>PaymentMethodTypeEnum</strong> type for more information on the payment
     * methods. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:PaymentMethodTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $paymentMethod = null;

    /**
     * This field is only returned if payment has been made by the buyer, and the
     * <strong>paymentMethod</strong> is <code>ESCROW</code>. This field contains a
     * special ID for ESCROW.
     *
     * @var string
     */
    public $paymentReferenceId = null;

    /**
     * The enumeration value returned in this field indicates the status of the payment
     * for the order. See the <strong>PaymentStatusEnum</strong> type definition for
     * more information on the possible payment states. For implementation help, refer
     * to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:PaymentStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $paymentStatus = null;
}
