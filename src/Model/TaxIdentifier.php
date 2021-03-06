<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type is used by the <strong>taxIdentifier</strong> container that is
 * returned in <strong>getOrder</strong>. The <strong>taxIdentifier</strong>
 * container consists of taxpayer identification information for buyers from Italy,
 * Spain, or Guatemala. It is currently only returned for orders occurring on the
 * eBay Italy or eBay Spain marketplaces.<br /><br /><span
 * class="tablenote"><strong>Note:</strong> Currently, the
 * <strong>taxIdentifier</strong> container is only returned in
 * <strong>getOrder</strong> and not in <strong>getOrders</strong>. So, if a seller
 * wanted to view a buyer's tax information for a particular order returned in
 * <strong>getOrders</strong>, that seller would need to use the
 * <strong>orderId</strong> value for that particular order, and then run a
 * <strong>getOrder</strong> call against that order ID. </span>.
 */
class TaxIdentifier extends AbstractModel
{
    /**
     * This value is the unique tax ID associated with the buyer. The type of tax
     * identification is shown in the <strong>taxIdentifierType</strong> field.
     *
     * @var string
     */
    public $taxpayerId = null;

    /**
     * This enumeration value indicates the type of tax identification being used for
     * the buyer. The different tax types are defined in the
     * <strong>TaxIdentifierTypeEnum</strong> type. For implementation help, refer to
     * <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/sel:TaxIdentifierTypeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $taxIdentifierType = null;

    /**
     * This two-letter code indicates the country that issued the buyer's tax ID. The
     * country that the two-letter code represents can be found in the
     * <strong>CountryCodeEnum</strong> type, or in the  <a
     * href="https://www.iso.org/iso-3166-country-codes.html ">ISO 3166</a> standard.
     * For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/ba:CountryCodeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $issuingCountry = null;
}
