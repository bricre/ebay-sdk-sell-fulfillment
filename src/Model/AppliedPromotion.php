<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains information about a sales promotion that is applied to a line
 * item.
 */
class AppliedPromotion extends AbstractModel
{
    /**
     * A description of the applied sales promotion.
     *
     * @var string
     */
    public $description = null;

    /**
     * The monetary amount of the sales promotion.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $discountAmount = null;

    /**
     * An eBay-generated unique identifier of the sales promotion.<br/><br/> Multiple
     * types of sales promotions are available to eBay Store owners, including order
     * size/volume discounts, shipping discounts, special coupons, and price markdowns.
     * Sales promotions can be managed through the Marketing tab of Seller Hub in My
     * eBay, or by using the Trading API's <b>SetPromotionalSale</b> call or the
     * Marketing API's <b>createItemPromotion</b> method.
     *
     * @var string
     */
    public $promotionId = null;
}
