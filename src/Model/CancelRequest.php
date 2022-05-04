<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains information about a buyer request to cancel an order.
 */
class CancelRequest extends AbstractModel
{
    /**
     * The date and time that the order cancellation was completed, if applicable. This
     * timestamp is in ISO 8601 format, which uses the 24-hour Universal Coordinated
     * Time (UTC) clock. This field is not returned until the cancellation request has
     * actually been approved by the seller.<br /><br /><b>Format:</b>
     * <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br /><b>Example:</b>
     * <code>2015-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $cancelCompletedDate = null;

    /**
     * This string value indicates the party who made the initial cancellation request.
     * Typically, either the 'Buyer' or 'Seller'. If a cancellation request has been
     * made, this field should be returned.
     *
     * @var string
     */
    public $cancelInitiator = null;

    /**
     * The reason why the <b>cancelInitiator</b> initiated the cancellation request.
     * Cancellation reasons for a buyer might include 'order placed by mistake' or
     * 'order won't arrive in time'. For a seller, a typical cancellation reason is
     * 'out of stock'. If a cancellation request has been made, this field should be
     * returned.
     *
     * @var string
     */
    public $cancelReason = null;

    /**
     * The date and time that the order cancellation was requested. This timestamp is
     * in ISO 8601 format, which uses the 24-hour Universal Coordinated Time (UTC)
     * clock. This field is returned for each cancellation request.<br /><br
     * /><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br
     * /><b>Example:</b> <code>2015-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $cancelRequestedDate = null;

    /**
     * The unique identifier of the order cancellation request. This field is returned
     * for each cancellation request.
     *
     * @var string
     */
    public $cancelRequestId = null;

    /**
     * The current stage or condition of the cancellation request. This field is
     * returned for each cancellation request. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:CancelRequestStateEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $cancelRequestState = null;
}
