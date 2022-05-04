<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used by base request of the <strong>acceptPaymentDispute</strong>
 * method.
 */
class AcceptPaymentDisputeRequest extends AbstractModel
{
    /**
     * This container is used if the seller wishes to provide a return address to the
     * buyer. This container should be used if the seller is requesting that the buyer
     * return the item.
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
