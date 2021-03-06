<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used by the response payload of the <strong>addEvidence</strong>
 * method. Its only field is an unique identifier of an evidence set.
 */
class AddEvidencePaymentDisputeResponse extends AbstractModel
{
    /**
     * The value returned in this field is the unique identifier of the newly-created
     * evidence set. Upon a successful call, this value is automatically genererated.
     * This new evidence set for the payment dispute includes the evidence file(s) that
     * were passed in to the <strong>fileId</strong> array in the request payload. The
     * <strong>evidenceId</strong> value will be needed if the seller wishes to add to
     * the evidence set by using the <strong>updateEvidence</strong> method, or if they
     * want to retrieve a specific evidence file within the evidence set by using the
     * <strong>fetchEvidenceContent</strong> method.
     *
     * @var string
     */
    public $evidenceId = null;
}
