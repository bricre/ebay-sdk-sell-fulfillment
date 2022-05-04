<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type describes the physical location of an order.
 */
class ItemLocation extends AbstractModel
{
    /**
     * The two-letter <a href="https://www.iso.org/iso-3166-country-codes.html"
     * title="https://www.iso.org" target="_blank">ISO 3166</a> code representing the
     * country of the address. For implementation help, refer to <a
     * href='https://developer.ebay.com/api-docs/sell/fulfillment/types/ba:CountryCodeEnum'>eBay
     * API documentation</a>.
     *
     * @var string
     */
    public $countryCode = null;

    /**
     * Indicates the geographical location of the item (along with the value in the
     * <strong>countryCode</strong> field). This field provides city, province, state,
     * or similar information.
     *
     * @var string
     */
    public $location = null;

    /**
     * The postal code of the address.
     *
     * @var string
     */
    public $postalCode = null;
}
