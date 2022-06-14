<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used by each payment dispute that is returned with the
 * <strong>getPaymentDisputeSummaries</strong> method.
 */
class PaymentDisputeSummary extends AbstractModel
{
    /**
     * This container shows the dollar value associated with the payment dispute in the
     * currency used by the seller's marketplace. This container is returned for all
     * payment disputes returned in the response.
     *
     * @var \Ebay\Sell\Fulfillment\Model\SimpleAmount
     */
    public $amount = null;

    /**
     * This is the buyer's eBay user ID. This field is returned for all payment
     * disputes returned in the response.
     *
     * @var string
     */
    public $buyerUsername = null;

    /**
     * The timestamp in this field shows the date/time when the payment dispute was
     * closed, so this field is only returned for payment disputes in the
     * <code>CLOSED</code> state.<br/><br/>The timestamps returned here use the
     * ISO-8601 24-hour date and time format, and the time zone used is Universal
     * Coordinated Time (UTC), also known as Greenwich Mean Time (GMT), or Zulu. The
     * ISO-8601 format looks like this: <em>yyyy-MM-ddThh:mm.ss.sssZ</em>. An example
     * would be <code>2019-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $closedDate = null;

    /**
     * The timestamp in this field shows the date/time when the payment dispute was
     * opened. This field is returned for payment disputes in all states.<br/><br/>The
     * timestamps returned here use the ISO-8601 24-hour date and time format, and the
     * time zone used is Universal Coordinated Time (UTC), also known as Greenwich Mean
     * Time (GMT), or Zulu. The ISO-8601 format looks like this:
     * <em>yyyy-MM-ddThh:mm.ss.sssZ</em>. An example would be
     * <code>2019-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $openDate = null;

    /**
     * This is the unique identifier of the order involved in the payment dispute.
     * <br/><br/><span class="tablenote"><strong>Note:</strong> eBay rolled out a new
     * Order ID format in June 2019. The legacy APIs still support the old and new
     * order ID format to identify orders, but only the new order ID format is
     * supported in REST-based APIs. </span>.
     *
     * @var string
     */
    public $orderId = null;

    /**
     * This is the unique identifier of the payment dispute. This identifier is
     * automatically created by eBay once the payment dispute comes into the eBay
     * system. This identifier is passed in at the end of the
     * <strong>getPaymentDispute</strong> call URI to retrieve a specific payment
     * dispute. The <strong>getPaymentDispute</strong> method returns more details
     * about a payment dispute than the <strong>getPaymentDisputeSummaries</strong>
     * method.
     *
     * @var string
     */
    public $paymentDisputeId = null;

    /**
     * The enumeration value in this field gives the current status of the payment
     * dispute. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/api:DisputeStateEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $paymentDisputeStatus = null;

    /**
     * The enumeration value in this field gives the reason why the buyer initiated the
     * payment dispute. See <strong>DisputeReasonEnum</strong> type for a description
     * of the supported reasons that buyers can give for initiating a payment dispute.
     * For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/api:DisputeReasonEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $reason = null;

    /**
     * The timestamp in this field shows the date/time when the seller must response to
     * a payment dispute, so this field is only returned for payment disputes in the
     * <code>ACTION_NEEDED</code> state. For payment disputes that require action by
     * the seller, that same seller must call <strong>getPaymentDispute</strong> to see
     * the next action(s) that they can take against the payment dispute.<br/><br/>The
     * timestamps returned here use the ISO-8601 24-hour date and time format, and the
     * time zone used is Universal Coordinated Time (UTC), also known as Greenwich Mean
     * Time (GMT), or Zulu. The ISO-8601 format looks like this:
     * <em>yyyy-MM-ddThh:mm.ss.sssZ</em>. An example would be
     * <code>2019-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $respondByDate = null;
}
