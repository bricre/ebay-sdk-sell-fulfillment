<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains refund information for a line item.
 */
class LineItemRefund extends AbstractModel
{
    /**
     * This field shows the refund amount for a line item. This field is only returned
     * if the buyer is due a refund for the line item.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $amount = null;

    /**
     * The date and time that the refund was issued for the line item. This timestamp
     * is in ISO 8601 format, which uses the 24-hour Universal Coordinated Time (UTC)
     * clock. This field is not returned until the refund has been issued. <br /><br
     * /><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br
     * /><b>Example:</b> <code>2015-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $refundDate = null;

    /**
     * Unique identifier of a refund that was initiated for an order's line item
     * through the <b>issueRefund</b> method. If the <b>issueRefund</b> method was used
     * to issue a refund at the order level, this identifier is returned at the order
     * level instead (<b>paymentSummary.refunds.refundId</b> field).<br/><br/> A
     * <b>refundId</b> value is returned in the response of the <b>issueRefund</b>
     * method, and this same value will be returned in the <b>getOrder</b> and
     * <b>getOrders</b> responses for pending and completed refunds.
     *
     * @var string
     */
    public $refundId = null;

    /**
     * This field is reserved for internal or future use.
     *
     * @var string
     */
    public $refundReferenceId = null;
}
