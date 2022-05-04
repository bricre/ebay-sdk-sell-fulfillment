<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used by the base response of the <strong>getActivities</strong>
 * method, and includes a log of all activities of a payment dispute, from creation
 * to resolution.
 */
class PaymentDisputeActivityHistory extends AbstractModel
{
    /**
     * This array holds all activities of a payment dispute, from creation to
     * resolution. For each activity, the activity type, the actor, and a timestamp is
     * shown. The <strong>getActivities</strong> response is dynamic, and grows with
     * each recorded activity.
     *
     * @var \Ebay\Sell\Fulfillment\Model\PaymentDisputeActivity[]
     */
    public $activity = null;
}
