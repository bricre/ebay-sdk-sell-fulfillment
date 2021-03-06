<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains the details of each line item in an order.
 */
class LineItem extends AbstractModel
{
    /**
     * This array contains information about one or more sales promotions or discounts
     * applied to the line item. It is always returned, but will be returned as an
     * empty array if no special sales promotions or discounts apply to the order line
     * item.
     *
     * @var \Ebay\Sell\Fulfillment\Model\AppliedPromotion[]
     */
    public $appliedPromotions = null;

    /**
     * This container consists of a breakdown of all costs associated with the
     * fulfillment of the line item.
     *
     * @var \Ebay\Sell\Fulfillment\Model\DeliveryCost
     */
    public $deliveryCost = null;

    /**
     * The cost of the line item after applying any discounts. This container is only
     * returned if the order line item was discounted through a promotion.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $discountedLineItemCost = null;

    /**
     * This container will be returned if the order line item is subject to a 'Collect
     * and Remit' tax that eBay will collect and remit to the proper taxing authority
     * on the buyer's behalf.<br/><br/>'Collect and Remit' tax includes:<ul><li>US
     * state-mandated sales tax</li><li>Federal and Provincial Sales Tax in
     * Canada</li><li>'Goods and Services' tax in Canada, Australia, and New
     * Zealand</li><li>VAT collected for the UK and EU countries</li></ul>The amount of
     * this tax is shown in the <strong>amount</strong> field, and the type of tax is
     * shown in the <strong>taxType</strong> field.<br/><br/>eBay will display the tax
     * type and amount during checkout in accordance with the buyer's address, and
     * handle collection and remittance of the tax without requiring the seller to take
     * any action.
     *
     * @var \Ebay\Sell\Fulfillment\Model\EbayCollectAndRemitTax[]
     */
    public $ebayCollectAndRemitTaxes = null;

    /**
     * This container consists of information that is needed by the seller to send a
     * digital gift card to the buyer, or recipient of the digital gift card. This
     * container is only returned and applicable for digital gift card line items.
     *
     * @var \Ebay\Sell\Fulfillment\Model\GiftDetails
     */
    public $giftDetails = null;

    /**
     * This container field describes the physical location of the order line item.
     *
     * @var \Ebay\Sell\Fulfillment\Model\ItemLocation
     */
    public $itemLocation = null;

    /**
     * The eBay-generated legacy listing item ID of the listing. Note that the unique
     * identifier of a listing in REST-based APIs is called the
     * <strong>listingId</strong> instead.
     *
     * @var string
     */
    public $legacyItemId = null;

    /**
     * The unique identifier of a single variation within a multiple-variation listing.
     * This field is only returned if the line item purchased was from a
     * multiple-variation listing.
     *
     * @var string
     */
    public $legacyVariationId = null;

    /**
     * The selling price of the line item before applying any discounts. The value of
     * this field is calculated by multiplying the single unit price by the number of
     * units purchased (value of the <b>quantity</b> field).
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $lineItemCost = null;

    /**
     * This container consists of information related to shipping dates and
     * expectations, including the 'ship-by date' and expected delivery windows that
     * are based on the seller's stated handling time and the shipping service option
     * that will be used. These fields provide guidance on making sure expected
     * delivery dates are made, whether the order is a <i>eBay Guaranteed Delivery</i>
     * order or a non-guaranteed delivery order.
     *
     * @var \Ebay\Sell\Fulfillment\Model\LineItemFulfillmentInstructions
     */
    public $lineItemFulfillmentInstructions = null;

    /**
     * This enumeration value indicates the current fulfillment status of the line
     * item. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:LineItemFulfillmentStatusEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $lineItemFulfillmentStatus = null;

    /**
     * This is the unique identifier of an eBay order line item. This field is created
     * as soon as there is a commitment to buy from the seller.
     *
     * @var string
     */
    public $lineItemId = null;

    /**
     * The unique identifier of the eBay marketplace where the line item was listed.
     * For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/ba:MarketplaceIdEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $listingMarketplaceId = null;

    /**
     * Contains information about the eBay programs, if any, under which the line item
     * was listed.
     *
     * @var \Ebay\Sell\Fulfillment\Model\LineItemProperties
     */
    public $properties = null;

    /**
     * The unique identifier of the eBay marketplace where the line item was listed.
     * Often, the <strong>listingMarketplaceId</strong> and the
     * <strong>purchaseMarketplaceId</strong> identifier are the same, but there are
     * occasions when an item will surface on multiple eBay marketplaces. For
     * implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/ba:MarketplaceIdEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $purchaseMarketplaceId = null;

    /**
     * The number of units of the line item in the order. These are represented as a
     * group by a single <b>lineItemId</b>.
     *
     * @var int
     */
    public $quantity = null;

    /**
     * This array is always returned, but is returned as an empty array unless the
     * seller has submitted a partial or full refund to the buyer for the order. If a
     * refund has occurred, the refund amount and refund date will be shown for each
     * refund.
     *
     * @var \Ebay\Sell\Fulfillment\Model\LineItemRefund[]
     */
    public $refunds = null;

    /**
     * Seller-defined Stock-Keeping Unit (SKU). This inventory identifier must be
     * unique within the seller's eBay inventory. SKUs are optional when listing in the
     * legacy/Trading API system, but SKUs are required when listing items through the
     * Inventory API model.
     *
     * @var string
     */
    public $sku = null;

    /**
     * The eBay listing type of the line item. The most common listing types are
     * <code>AUCTION</code> and <code>FIXED_PRICE</code>. For implementation help,
     * refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:SoldFormatEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $soldFormat = null;

    /**
     * Contains a list of taxes applied to the line item, if any. This array is always
     * returned, but will be returned as empty if no taxes are applicable to the line
     * item.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Tax[]
     */
    public $taxes = null;

    /**
     * The title of the listing.
     *
     * @var string
     */
    public $title = null;

    /**
     * This is the total price that the buyer must pay for the line item after all
     * costs (item cost, delivery cost, taxes,) are added, minus any discounts and/or
     * promotions.<br /><br /><span class="tablenote"><strong>Note:</strong> For orders
     * that are subject to 'eBay Collect and Remit' tax, the 'Collect and Remit' tax
     * amount for the order will be included in this <strong>total</strong> value only
     * when the <strong>fieldGroups</strong> query parameter is set to
     * <code>TAX_BREAKDOWN</code>. If the <strong>fieldGroups</strong> query parameter
     * is not set to <code>TAX_BREAKDOWN</code>, 'Collect and Remit' will not be added
     * into this <strong>total</strong> value.<br><br>To determine if 'Collect and
     * Remit' taxes were added into this <strong>total</strong> value, the user can
     * check for the corresponding <strong>lineItems.ebayCollectAndRemitTaxes</strong>
     * and the <strong>lineItems.taxes</strong> containers in the response. If both of
     * these containers appear for one or more line items in the response with the
     * following <strong>taxType</strong> values, the 'Collect and Remit' tax amount
     * that the buyer paid is in this amount:<ul><li><code>STATE_SALES_TAX</code>: US
     * state-mandated sales tax</li><li><code>PROVINCE_SALES_TAX</code>: Provincial
     * Sales Tax in Canada</li><li><code>GST</code>: 'Goods and Services' tax in
     * Canada, Australia, and New Zealand</li><li><code>VAT</code>: VAT collected for
     * UK and EU countries</li></ul></span>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $total = null;
}
