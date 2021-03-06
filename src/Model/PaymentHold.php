<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains information about a hold placed on a payment to a seller for
 * an order, including the reason why the buyer's payment for the order is being
 * held, the expected release date of the funds into the seller's account, the
 * current state of the hold, and the actual release date if the payment has been
 * released, and possible actions the seller can take to expedite the payout of
 * funds into their account.
 */
class PaymentHold extends AbstractModel
{
    /**
     * The date and time that the payment being held is expected to be released to the
     * seller. This timestamp is in ISO 8601 format, which uses the 24-hour Universal
     * Coordinated Time (UTC) clock. This field will be returned if known by eBay. <br
     * /><br /><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br
     * /><b>Example:</b> <code>2015-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $expectedReleaseDate = null;

    /**
     * The monetary amount of the payment being held. This field is always returned
     * with the <strong>paymentHolds</strong> array.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $holdAmount = null;

    /**
     * The reason that the payment is being held. A seller's payment may be held for a
     * number of reasons, including when the seller is new, the seller's level is below
     * standard, or if a return case or 'Significantly not as described' case is
     * pending against the seller. This field is always returned with the
     * <strong>paymentHolds</strong> array.
     *
     * @var string
     */
    public $holdReason = null;

    /**
     * The current stage or condition of the hold. This field is always returned with
     * the <strong>paymentHolds</strong> array.<br /><br /><b>Applicable
     * values:</b><ul><li><code>HELD</code></li><li><code>HELD_PENDING</code></li><li><code>NOT_HELD</code></li><li><code>RELEASE_CONFIRMED</code></li><li><code>RELEASE_FAILED</code></li><li><code>RELEASE_PENDING</code></li><li><code>RELEASED</code></li></ul>.
     *
     * @var string
     */
    public $holdState = null;

    /**
     * The date and time that the payment being held was actually released to the
     * seller. This timestamp is in ISO 8601 format, which uses the 24-hour Universal
     * Coordinated Time (UTC) clock. This field is not returned until the seller's
     * payment is actually released into the seller's account.<br /><br
     * /><b>Format:</b> <code>[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss].[sss]Z</code> <br
     * /><b>Example:</b> <code>2015-08-04T19:09:02.768Z</code>.
     *
     * @var string
     */
    public $releaseDate = null;

    /**
     * A list of one or more possible actions that the seller can take to expedite the
     * release of the payment hold.
     *
     * @var \Ebay\Sell\Fulfillment\Model\SellerActionsToRelease[]
     */
    public $sellerActionsToRelease = null;
}
