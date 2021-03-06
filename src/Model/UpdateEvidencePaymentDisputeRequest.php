<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used by the request payload of the <strong>updateEvidence</strong>
 * method. The <strong>updateEvidence</strong> method is used to update an existing
 * evidence set against a payment dispute with one or more evidence files.
 */
class UpdateEvidencePaymentDisputeRequest extends AbstractModel
{
    /**
     * The unique identifier of the evidence set that is being updated with new
     * evidence files.
     *
     * @var string
     */
    public $evidenceId = null;

    /**
     * This field is used to indicate the type of evidence being provided through one
     * or more evidence files. All evidence files (if more than one) should be
     * associated with the evidence type passed in this field. See the
     * <strong>EvidenceTypeEnum</strong> type for the supported evidence types. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/api:EvidenceTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $evidenceType = null;

    /**
     * This array is used to specify one or more evidence files that will be added to
     * the evidence set associated with a payment dispute. At least one evidence file
     * must be specified in the <strong>files</strong> array.<br><br> The unique
     * identifier of an evidence file is returned in the response payload of the
     * <strong>uploadEvidence</strong> method.
     *
     * @var \Ebay\Sell\Fulfillment\Model\FileEvidence[]
     */
    public $files = null;

    /**
     * This required array identifies the order line item(s) for which the evidence
     * file(s) will be applicable. Both the <strong>itemId</strong> and
     * <strong>lineItemID</strong> fields are needed to identify each order line item,
     * and both of these values are returned under the
     * <strong>evidenceRequests.lineItems</strong> array in the
     * <strong>getPaymentDispute</strong> response.
     *
     * @var \Ebay\Sell\Fulfillment\Model\OrderLineItems[]
     */
    public $lineItems = null;
}
