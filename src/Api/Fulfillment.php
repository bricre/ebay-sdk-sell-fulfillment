<?php

namespace Ebay\Sell\Fulfillment\Api;

use Ebay\Sell\Fulfillment\Model\ShippingFulfillment;
use Ebay\Sell\Fulfillment\Model\ShippingFulfillmentDetails;
use Ebay\Sell\Fulfillment\Model\ShippingFulfillmentPagedCollection;

class Fulfillment extends AbstractAPI
{
    /**
     * Use this call to retrieve the contents of all fulfillments currently defined for
     * a specified order based on the order's unique identifier, <b>orderId</b>. This
     * value is returned in the <b>getOrders</b> call's <b>members.orderId</b> field
     * when you search for orders by creation date or shipment status.
     *
     * @param string $orderId The unique identifier of the order. Order ID values are
     *                        shown in My eBay/Seller Hub, and are also returned by the <b>getOrders</b>
     *                        method in the <b>orders.orderId</b> field. <br/><br/><span
     *                        class="tablenote"><strong>Note:</strong> A new order ID format was introduced to
     *                        all eBay APIs (legacy and REST) in June 2019. In REST APIs that return Order
     *                        IDs, including the Fulfillment API, all order IDs are returned in the new
     *                        format, but the <strong>getShippingFulfillments</strong> method will accept both
     *                        the legacy and new format order ID. The new format is a non-parsable string,
     *                        globally unique across all eBay marketplaces, and consistent for both single
     *                        line item and multiple line item orders. These order identifiers will be
     *                        automatically generated after buyer payment, and unlike in the past, instead of
     *                        just being known and exposed to the seller, these unique order identifiers will
     *                        also be known and used/referenced by the buyer and eBay customer support.
     *                        </span>
     *
     * @return ShippingFulfillmentPagedCollection
     */
    public function gets(string $orderId): ShippingFulfillmentPagedCollection
    {
        return $this->request(
        'getShippingFulfillments',
        'GET',
        "order/$orderId/shipping_fulfillment",
        null,
        [],
        []
        );
    }

    /**
     * When you group an order's line items into one or more packages, each package
     * requires a corresponding plan for handling, addressing, and shipping; this is a
     * <i>shipping fulfillment</i>. For each package, execute this call once to
     * generate a shipping fulfillment associated with that package. <br /><br /> <span
     * class="tablenote"><strong>Note:</strong> A single line item in an order can
     * consist of multiple units of a purchased item, and one unit can consist of
     * multiple parts or components. Although these components might be provided by the
     * manufacturer in separate packaging, the seller must include all components of a
     * given line item in the same package.</span> <br /><br />Before using this call
     * for a given package, you must determine which line items are in the package. If
     * the package has been shipped, you should provide the date of shipment in the
     * request. If not provided, it will default to the current date and time.
     *
     * @param string                     $orderId The unique identifier of the order. Order ID values are
     *                                            shown in My eBay/Seller Hub, and are also returned by the <b>getOrders</b>
     *                                            method in the <b>orders.orderId</b> field. <br/><br/><span
     *                                            class="tablenote"><strong>Note:</strong> A new order ID format was introduced to
     *                                            all eBay APIs (legacy and REST) in June 2019. In REST APIs that return Order
     *                                            IDs, including the Fulfillment API, all order IDs are returned in the new
     *                                            format, but the <strong>createShippingFulfillment</strong> method will accept
     *                                            both the legacy and new format order ID. The new format is a non-parsable
     *                                            string, globally unique across all eBay marketplaces, and consistent for both
     *                                            single line item and multiple line item orders. These order identifiers will be
     *                                            automatically generated after buyer payment, and unlike in the past, instead of
     *                                            just being known and exposed to the seller, these unique order identifiers will
     *                                            also be known and used/referenced by the buyer and eBay customer support.
     *                                            </span>
     * @param ShippingFulfillmentDetails $Model   fulfillment payload
     *
     * @return object
     */
    public function create(string $orderId, ShippingFulfillmentDetails $Model): object
    {
        return $this->request(
        'createShippingFulfillment',
        'POST',
        "order/$orderId/shipping_fulfillment",
        $Model->getArrayCopy(),
        [],
        []
        );
    }

    /**
     * Use this call to retrieve the contents of a fulfillment based on its unique
     * identifier, <b>fulfillmentId</b> (combined with the associated order's
     * <b>orderId</b>). The <b>fulfillmentId</b> value was originally generated by the
     * <b>createShippingFulfillment</b> call, and is returned by the
     * <b>getShippingFulfillments</b> call in the <b>members.fulfillmentId</b> field.
     *
     * @param string $fulfillmentId The unique identifier of the fulfillment. This
     *                              eBay-generated value was created by the <b>Create Shipping Fulfillment</b> call,
     *                              and returned by the <b>getShippingFulfillments</b> call in the
     *                              <b>fulfillments.fulfillmentId</b> field; for example,
     *                              <code>9405509699937003457459</code>.
     * @param string $orderId       The unique identifier of the order. Order ID values are
     *                              shown in My eBay/Seller Hub, and are also returned by the <b>getOrders</b>
     *                              method in the <b>orders.orderId</b> field. <br/><br/><span
     *                              class="tablenote"><strong>Note:</strong> A new order ID format was introduced to
     *                              all eBay APIs (legacy and REST) in June 2019. In REST APIs that return Order
     *                              IDs, including the Fulfillment API, all order IDs are returned in the new
     *                              format, but the <strong>getShippingFulfillment</strong> method will accept both
     *                              the legacy and new format order ID. The new format is a non-parsable string,
     *                              globally unique across all eBay marketplaces, and consistent for both single
     *                              line item and multiple line item orders. These order identifiers will be
     *                              automatically generated after buyer payment, and unlike in the past, instead of
     *                              just being known and exposed to the seller, these unique order identifiers will
     *                              also be known and used/referenced by the buyer and eBay customer support.
     *                              </span>
     *
     * @return ShippingFulfillment
     */
    public function get(string $fulfillmentId, string $orderId): ShippingFulfillment
    {
        return $this->request(
        'getShippingFulfillment',
        'GET',
        "order/$orderId/shipping_fulfillment/$fulfillmentId",
        null,
        [],
        []
        );
    }
}
