<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used by the request payload of the
 * <strong>contestPaymentDispute</strong> method.
 */
class ContestPaymentDisputeRequest extends AbstractModel
{
    /**
     * This container is needed if the seller is requesting that the buyer return the
     * item. If this container is used, all relevant fields must be included, including
     * <strong>fullName</strong> and <strong>primaryPhone</strong>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\ReturnAddress
     */
    public $returnAddress = null;

    /**
     * This integer value indicates the revision number of the payment dispute. This
     * field is required. The current <strong>revision</strong> number for a payment
     * dispute can be retrieved with the <strong>getPaymentDispute</strong> method.
     * Each time an action is taken against a payment dispute, this integer value
     * increases by 1.
     *
     * @var int
     */
    public $revision = null;
}
