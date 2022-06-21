<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains information about the type and amount of tax that eBay will
 * collect and remit to the state, province, country, or other taxing authority in
 * the buyer's location, as required by that taxing authority.<br/><br/>'Collect
 * and Remit' tax includes:<ul><li>US state-mandated sales tax</li><li>Federal and
 * Provincial Sales Tax in Canada</li><li>'Goods and Services' tax in Canada,
 * Australia, and New Zealand</li><li>VAT collected for the UK and EU
 * countries</li></ul>.
 */
class EbayCollectAndRemitTax extends AbstractModel
{
    /**
     * The monetary amount of the 'Collect and Remit' tax. This currently
     * includes:<br/><ul><li>US state-mandated sales tax</li><li>Federal and Provincial
     * Sales Tax in Canada</li><li>'Goods and Services' tax in Canada, Australia, and
     * New Zealand</li><li>VAT collected for the UK and EU countries</li></ul><br /><br
     * /><span class="tablenote"><strong>Note:</strong> If the corresponding
     * <strong>taxType</strong> is <code>STATE_SALES_TAX</code>,
     * <code>PROVINCE_SALES_TAX</code>, <code>GST</code>, or <code>VAT</code>, and the
     * <strong>lineItems.taxes</strong> container also appears for this line item with
     * the same tax amount, the order is subject to 'eBay Collect and Remit' tax. For
     * orders that are subject to 'eBay Collect and Remit' tax, the tax amount in this
     * field will be included in the <strong>lineItems.total</strong>,
     * <strong>paymentSummary.payments.amount</strong>,
     * <strong>paymentSummary.totalDueSeller</strong>, and
     * <strong>pricingSummary.total</strong> fields.</span>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Amount
     */
    public $amount = null;

    /**
     * This container field describes the line-item level VAT tax details. <p><span
     * class="tablenote"><b>Note:</b> On January 31, 2022, the
     * <strong>orders.fulfillmentStartInstructions.shippingStep.shipTo.contactAddress.addressLine2</strong>
     * will stop being used to return VAT information, so developers should make sure
     * they integrate with the new fields before that time. </span></p>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\EbayTaxReference
     */
    public $ebayReference = null;

    /**
     * The type of tax and fees that eBay will collect and remit to the taxing or fee
     * authority. See the <strong>TaxTypeEnum</strong> type definition for more
     * information about each tax or fee type. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:TaxTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $taxType = null;

    /**
     * This field indicates the collection method used to collect the 'Collect and
     * Remit' tax for the order. This field is always returned for orders subject to
     * 'Collect and Remit' tax, and its value is always <code>NET</code>.<br /><br
     * /><span class="tablenote"><strong>Note:</strong> Although the
     * <strong>collectionMethod</strong> field is returned for all orders subject to
     * 'Collect and Remit' tax, the <strong>collectionMethod</strong> field and the
     * <strong>CollectionMethodEnum</strong> type are not currently of any practical
     * use, although this field may have use in the future. If and when the logic of
     * this field is changed, this note will be updated and a note will also be added
     * to the Release Notes.</span> For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:CollectionMethodEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $collectionMethod = null;
}
