<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This is the base type of the <b>issueRefund</b> response payload. As long as the
 * <b>issueRefund</b> method does not trigger an error, a response payload will be
 * returned.
 */
class Refund extends AbstractModel
{
    /**
     * The unique identifier of the order refund. This value is returned unless the
     * refund operation fails (<b>refundStatus</b> value shows <code>FAILED</code>).
     * This identifier can be used to track the status of the refund through a
     * <b>getOrder</b> or <b>getOrders</b> call. For order-level refunds, check the
     * <b>paymentSummary.refunds.refundId</b> field in the
     * <b>getOrder</b>/<b>getOrders</b> response, and for line item level refunds,
     * check the <b>lineItems.refunds.refundId</b> field(s) in the
     * <b>getOrder</b>/<b>getOrders</b> response.
     *
     * @var string
     */
    public $refundId = null;

    /**
     * The value returned in this field indicates the success or failure of the refund
     * operation. A successful <b>issueRefund</b> operation should result in a value of
     * <code>PENDING</code>. A failed <b>issueRefund</b> operation should result in a
     * value of <code>FAILED</code>, and an HTTP status code and/or and API error code
     * may also get returned to possibly indicate the issue.<br/><br/>The refunds
     * issued through this method are processed asynchronously, so the refund will not
     * show as 'Refunded' right away. A seller will have to make a subsequent <a
     * href="https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/methods/getOrder"
     * target="_blank">getOrder</a> call to check the status of the refund.  The status
     * of an order refund can be found in the <a
     * href="https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/methods/getOrder#response.paymentSummary.refunds.refundStatus"
     * target="_blank">paymentSummary.refunds.refundStatus</a> field of the <a
     * href="https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/methods/getOrder"
     * target="_blank">getOrder</a> response. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:RefundStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $refundStatus = null;
}
