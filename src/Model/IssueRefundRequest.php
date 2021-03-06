<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * The base type used by the request payload of the <b>issueRefund</b> method.
 */
class IssueRefundRequest extends AbstractModel
{
    /**
     * The enumeration value passed into this field indicates the reason for the
     * refund. One of the defined enumeration values in the <b>ReasonForRefundEnum</b>
     * type must be used.<br/><br/>This field is required, and it is highly recommended
     * that sellers use the correct refund reason, especially in the case of a
     * buyer-requested cancellation or 'buyer remorse' return to indicate that there
     * was nothing wrong with the item(s) or with the shipment of the
     * order.<br/><br/><span class="tablenote"><strong>Note:</strong> If issuing
     * refunds for more than one order line item, keep in mind that the refund reason
     * must be the same for each of the order line items. If the refund reason is
     * different for one or more order line items in an order, the seller would need to
     * make separate <b>issueRefund</b> calls, one for each refund reason. </span> For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/api:ReasonForRefundEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $reasonForRefund = null;

    /**
     * This free-text field allows the seller to clarify why the refund is being issued
     * to the buyer.<br/><br/><b>Max Length</b>: 100.
     *
     * @var string
     */
    public $comment = null;

    /**
     * The <b>refundItems</b> array is only required if the seller is issuing a refund
     * for one or more individual order line items in a multiple line item order.
     * Otherwise, the seller just uses the <b>orderLevelRefundAmount</b> container to
     * specify the amount of the refund for the entire order.
     *
     * @var \Ebay\Sell\Fulfillment\Model\RefundItem[]
     */
    public $refundItems = null;

    /**
     * This container is used to specify the amount of the refund for the entire order.
     * If a seller wants to issue a refund for an individual line item within a
     * multiple line item order, the seller would use the <b>refundItems</b> array
     * instead.
     *
     * @var \Ebay\Sell\Fulfillment\Model\SimpleAmount
     */
    public $orderLevelRefundAmount = null;
}
