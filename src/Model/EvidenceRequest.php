<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used by the <strong>evidenceRequests</strong> array that is
 * returned in the <strong>getPaymentDispute</strong> response if one or more
 * evidential documents are being requested to help resolve the payment dispute.
 */
class EvidenceRequest extends AbstractModel
{
    /**
     * Unique identifier of the evidential file set. Potentially, each evidential file
     * set can have more than one file, that is why there is this file set identifier,
     * and then an identifier for each file within this file set.
     *
     * @var string
     */
    public $evidenceId = null;

    /**
     * This enumeration value shows the type of evidential document provided. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/api:EvidenceTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $evidenceType = null;

    /**
     * This array shows one or more order line items associated with the evidential
     * document that has been provided.
     *
     * @var \Ebay\Sell\Fulfillment\Model\OrderLineItems[]
     */
    public $lineItems = null;

    /**
     * The timestamp in this field shows the date/time when eBay requested the
     * evidential document from the seller in response to a payment dispute.
     * <br/><br/>The timestamps returned here use the ISO-8601 24-hour date and time
     * format, and the time zone used is Universal Coordinated Time (UTC), also known
     * as Greenwich Mean Time (GMT), or Zulu. The ISO-8601 format looks like this:
     * <em>yyyy-MM-ddThh:mm.ss.sssZ</em>. An example would be
     * <code>2019-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $requestDate = null;

    /**
     * The timestamp in this field shows the date/time when the seller is expected to
     * provide a requested evidential document to eBay.  <br/><br/>The timestamps
     * returned here use the ISO-8601 24-hour date and time format, and the time zone
     * used is Universal Coordinated Time (UTC), also known as Greenwich Mean Time
     * (GMT), or Zulu. The ISO-8601 format looks like this:
     * <em>yyyy-MM-ddThh:mm.ss.sssZ</em>. An example would be
     * <code>2019-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $respondByDate = null;
}
