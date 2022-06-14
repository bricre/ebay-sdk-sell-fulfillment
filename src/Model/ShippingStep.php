<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains shipping information for a fulfillment, including the
 * shipping carrier, the shipping service option, the shipment destination, and the
 * Global Shipping Program reference ID.
 */
class ShippingStep extends AbstractModel
{
    /**
     * The unique identifier of the shipping carrier being used to ship the line item.
     * <br /><br /><span class="tablenote"><strong>Note:</strong> The Trading API's <a
     * href="https://developer.ebay.com/devzone/XML/docs/Reference/eBay/GeteBayDetails.html
     * " target="_blank">GeteBayDetails</a> call can be used to retrieve the latest
     * shipping carrier and shipping service option enumeration values.</span>.
     *
     * @var string
     */
    public $shippingCarrierCode = null;

    /**
     * The unique identifier of the shipping service option being used to ship the line
     * item.<br /><br /><span class="tablenote"><strong>Note:</strong> Use the Trading
     * API's <a
     * href="https://developer.ebay.com/devzone/XML/docs/Reference/eBay/GeteBayDetails.html
     * " target="_blank">GeteBayDetails</a> call to retrieve the latest shipping
     * carrier and shipping service option enumeration values. When making the <a
     * href="https://developer.ebay.com/devzone/XML/docs/Reference/eBay/GeteBayDetails.html
     * " target="_blank">GeteBayDetails</a> call, include the
     * <strong>DetailName</strong> field in the request payload and set its value to
     * <code>ShippingServiceDetails</code>. Each valid shipping service option
     * (returned in <strong>ShippingServiceDetails.ShippingService</strong> field) and
     * corresponding shipping carrier (returned in
     * <strong>ShippingServiceDetails.ShippingCarrier</strong> field) is returned in
     * response payload.</span>.
     *
     * @var string
     */
    public $shippingServiceCode = null;

    /**
     * This container consists of shipping and contact information about the individual
     * or organization to whom the fulfillment package will be shipped.<br/><span
     * class="tablenote"><strong>Note:</strong> When <b>FulfillmentInstructionsType</b>
     * is <code>FULFILLED_BY_EBAY</code>, there will be no <b>shipTo</b> address
     * displayed.</span><br/><span class="tablenote"><strong>Note:</strong> For a
     * Global Shipping Program shipment, this is the address of the international
     * shipping provider's domestic warehouse. The international shipping provider is
     * responsible for delivery to the final destination address. For more information,
     * see <a
     * href="https://developer.ebay.com/devzone/guides/features-guide/default.html#Development/Shipping-APIWork.html#AddressingaGlobalShippingProgramShipment
     * " target="_blank">Addressing a Global Shipping Program Shipment</a>.</span>.
     *
     * @var \Ebay\Sell\Fulfillment\Model\ExtendedContact
     */
    public $shipTo = null;

    /**
     * This is the unique identifer of the Global Shipping Program (GSP) shipment. This
     * field is only returned if the line item is being shipped via GSP (the value of
     * the <b>fulfillmentStartInstructions.ebaySupportedFulfillment</b> field will be
     * <code>true</code>. The international shipping provider uses the
     * <b>shipToReferenceId</b> value as the primary reference number to retrieve the
     * relevant details about the buyer, the order, and the fulfillment, so the
     * shipment can be completed. <br /><br />Sellers must include this value on the
     * shipping label immediately above the street address of the international
     * shipping provider. <br /><br />Example: "Reference #1234567890123456" <br /><br
     * /><span class="tablenote"><strong>Note:</strong> This value is the same as the
     * <b>ShipToAddress.ReferenceID</b> value returned by the Trading API's GetOrders
     * call.</span>.
     *
     * @var string
     */
    public $shipToReferenceId = null;
}
