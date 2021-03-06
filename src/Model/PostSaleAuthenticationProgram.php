<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used to provide the status and outcome of an order line item going
 * through the Authenticity Guarantee verification process.
 */
class PostSaleAuthenticationProgram extends AbstractModel
{
    /**
     * This field indicates the result of the authenticity verification inspection on
     * an order line item. This field is not returned when the status value of the
     * order line item is <code>PENDING</code> or <code>PASSED</code>. The possible
     * values returned here are <code>NOT_AUTHENTIC</code>,
     * <code>NOT_AS_DESCRIBED</code>, <code>CUSTOMIZED</code>,
     * <code>MISCATEGORIZED</code>, or <code>NOT_AUTHENTIC_NO_RETURN</code>. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:AuthenticityVerificationReasonEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $outcomeReason = null;

    /**
     * The value in this field indicates whether the order line item has passed or
     * failed the authenticity verification inspection, or if the inspection and/or
     * results are still pending. The possible values returned here are
     * <code>PENDING</code>, <code>PASSED</code>, <code>FAILED</code>, or
     * <code>PASSED_WITH_EXCEPTION</code>. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:AuthenticityVerificationStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $status = null;
}
