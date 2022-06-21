<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains a summary of cumulative costs and charges for all line items
 * of an order, including item price, price adjustments, sales taxes, delivery
 * costs, and order discounts.
 */
class PricingSummary extends AbstractModel
{
    /**
     * This container shows the total amount of any adjustments that were applied to
     * the cost of the item(s) in the order. This amount does not include shipping,
     * discounts, fixed fees, or taxes.<br/><br/>This container is only returned if
     * price adjustments were made to the order after the initial
     * transaction/commitment to buy occurred.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $adjustment = null;

    /**
     * This container shows the total cost of delivering the order to the buyer, before
     * any shipping/delivery discount is applied.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $deliveryCost = null;

    /**
     * This container shows the total amount of delivery discounts (including shipping
     * discounts) that apply to the order. This should be a negative real
     * number.<br/><br/>This container is only returned if delivery discounts are being
     * applied to the order.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $deliveryDiscount = null;

    /**
     * This container shows the total amount of any special fees applied to the order,
     * such as a tire recycling fee or an electronic waste fee. <br/><br/>This
     * container is returned if special fees are being applied to the order and if the
     * <b>fieldGroups</b> is set to <code>TAX_BREAKDOWN</code>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $fee = null;

    /**
     * This container shows the total amount of all item price discounts (including
     * promotions) that apply to the order and reduce its cost to the buyer. This
     * should be a negative real number. <br/><br/>This container is only returned if
     * special discounts are being applied to the order.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $priceDiscountSubtotal = null;

    /**
     * This container shows the cumulative costs of of all units of all line items in
     * the order, before any discount is applied.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $priceSubtotal = null;

    /**
     * This container shows the total amount of tax for the order. To calculate the tax
     * percentage rate, divide this value by the value of the <b>total</b> field.
     * <br/><br/>This container is only returned if any type of tax (sales tax, tax on
     * shipping, tax on handling, import tax, etc.) is applied to the order.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $tax = null;

    /**
     * The total cost of the order after adding all line item costs, delivery costs,
     * sales tax, and special fees, and then subtracting all special discounts and
     * price adjustments.<br /><br /><span class="tablenote"><strong>Note:</strong> For
     * orders that are subject to 'eBay Collect and Remit' tax, the 'Collect and Remit'
     * tax amount for the order will be included in this <strong>total</strong> value
     * only when the <strong>fieldGroups</strong> query parameter is set to
     * <code>TAX_BREAKDOWN</code>. If the <strong>fieldGroups</strong> query parameter
     * is not set to <code>TAX_BREAKDOWN</code>, 'Collect and Remit' will not be added
     * into this <strong>total</strong> value.<br><br>To determine if 'Collect and
     * Remit' taxes were added into this <strong>total</strong> value, the user can
     * check for the corresponding <strong>lineItems.ebayCollectAndRemitTaxes</strong>
     * and the <strong>lineItems.taxes</strong> containers in the response. If both of
     * these containers appear for one or more line items in the response with the
     * following <strong>taxType</strong> values, the 'Collect and Remit' tax amount
     * that the buyer paid is included in this
     * amount:<ul><li><code>STATE_SALES_TAX</code>: US state-mandated sales
     * tax</li><li><code>PROVINCE_SALES_TAX</code>: Provincial Sales Tax in
     * Canada</li><li><code>GST</code>: 'Good and Services' tax in Canada, Australia,
     * and New Zealand</li><li><code>VAT</code>: VAT collected for UK and EU
     * countries</li></ul></span>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $total = null;
}
