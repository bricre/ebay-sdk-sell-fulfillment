<?php

namespace Ebay\Sell\Fulfillment\Api;

use Ebay\Sell\Fulfillment\Model\IssueRefundRequest;
use Ebay\Sell\Fulfillment\Model\Order as OrderModel;
use Ebay\Sell\Fulfillment\Model\OrderSearchPagedCollection;
use Ebay\Sell\Fulfillment\Model\Refund;
use OpenAPI\Runtime\UnexpectedResponse;

class Order extends AbstractAPI
{
    /**
     * Use this call to retrieve the contents of an order based on its unique
     * identifier, <i>orderId</i>. This value was returned in the <b> getOrders</b>
     * call's <b>orders.orderId</b> field when you searched for orders by creation
     * date, modification date, or fulfillment status. Include the optional
     * <b>fieldGroups</b> query parameter set to <code>TAX_BREAKDOWN</code> to return a
     * breakdown of the taxes and fees. <br /><br /> The returned <b>Order</b> object
     * contains information you can use to create and process fulfillments, including:
     * <ul> <li>Information about the buyer and seller</li> <li>Information about the
     * order's line items</li> <li> The plans for packaging, addressing and shipping
     * the order</li> <li>The status of payment, packaging, addressing, and shipping
     * the order</li> <li>A summary of monetary amounts specific to the order such as
     * pricing, payments, and shipping costs</li> <li>A summary of applied taxes and
     * fees, and optionally a breakdown of each </li></ul>.
     *
     * @param string $orderId The unique identifier of the order. Order ID values are
     *                        shown in My eBay/Seller Hub, and are also returned by the <b>getOrders</b>
     *                        method in the <b>orders.orderId</b> field. <br/><br/><span
     *                        class="tablenote"><strong>Note:</strong> A new order ID format was introduced to
     *                        all eBay APIs (legacy and REST) in June 2019. In REST APIs that return Order
     *                        IDs, including the Fulfillment API, all order IDs are returned in the new
     *                        format, but the <strong>getOrder</strong> method will accept both the legacy and
     *                        new format order ID. The new format is a non-parsable string, globally unique
     *                        across all eBay marketplaces, and consistent for both single line item and
     *                        multiple line item orders. These order identifiers will be automatically
     *                        generated after buyer payment, and unlike in the past, instead of just being
     *                        known and exposed to the seller, these unique order identifiers will also be
     *                        known and used/referenced by the buyer and eBay customer support. </span>
     * @param array  $queries options:
     *                        'fieldGroups'	string	The response type associated with the order. The only
     *                        presently supported value is <code>TAX_BREAKDOWN</code>. This type returns a
     *                        breakdown of tax and fee values associated with the order.
     *
     * @return OrderModel|UnexpectedResponse
     */
    public function get(string $orderId, array $queries = [])
    {
        return $this->request(
        'getOrder',
        'GET',
        "order/$orderId",
        null,
        $queries,
        []
        );
    }

    /**
     * Use this call to search for and retrieve one or more orders based on their
     * creation date, last modification date, or fulfillment status using the
     * <b>filter</b> parameter. You can alternatively specify a list of orders using
     * the <b>orderIds</b> parameter. Include the optional <b>fieldGroups</b> query
     * parameter set to <code>TAX_BREAKDOWN</code> to return a breakdown of the taxes
     * and fees. <br /><br /> The returned <b>Order</b> objects contain information you
     * can use to create and process fulfillments, including: <ul> <li>Information
     * about the buyer and seller</li> <li>Information about the order's line
     * items</li> <li>The plans for packaging, addressing and shipping the order</li>
     * <li>The status of payment, packaging, addressing, and shipping the order</li>
     * <li>A summary of monetary amounts specific to the order such as pricing,
     * payments, and shipping costs</li> <li>A summary of applied taxes and fees, and
     * optionally a breakdown of each </li></ul> <br /><br /> <span
     * class="tablenote"><strong>Important:</strong> In this call, the
     * <b>cancelStatus.cancelRequests</b> array is returned but is always empty. Use
     * the <b>getOrder</b> call instead, which returns this array fully populated with
     * information about any cancellation requests.</span>.
     *
     * @param array $queries options:
     *                       'fieldGroups'	string	The response type associated with the order. The only
     *                       presently supported value is <code>TAX_BREAKDOWN</code>. This type returns a
     *                       breakdown of tax and fee values associated with the order.
     *                       'filter'	string	One or more comma-separated criteria for narrowing down the
     *                       collection of orders returned by this call. These criteria correspond to
     *                       specific fields in the response payload. Multiple filter criteria combine to
     *                       further restrict the results. <br /><br /> <span
     *                       class="tablenote"><strong>Note:</strong> Currently, <b>filter</b> returns data
     *                       from only the last 90 days. If the <b>orderIds</b> parameter is included in the
     *                       request, the <b>filter</b> parameter will be ignored.</span> <br /><br /> The
     *                       available criteria are as follows: <dl>
     *                       <dt><code><b>creationdate</b></code></dt> <dd>The time period during which
     *                       qualifying orders were created (the <b>orders.creationDate</b> field). In the
     *                       URI, this is expressed as a starting timestamp, with or without an ending
     *                       timestamp (in brackets). The timestamps are in ISO 8601 format, which uses the
     *                       24-hour Universal Coordinated Time (UTC) clock.For example: <ul>
     *                       <li><code>creationdate:[2016-02-21T08:25:43.511Z..]</code> identifies orders
     *                       created on or after the given timestamp.</li>
     *                       <li><code>creationdate:[2016-02-21T08:25:43.511Z..2016-04-21T08:25:43.511Z]</code>
     *                       identifies orders created between the given timestamps, inclusive.</li> </ul>
     *                       </dd> <dt><code><b>lastmodifieddate</b></code></dt> <dd>The time period during
     *                       which qualifying orders were last modified (the <b>orders.modifiedDate</b>
     *                       field).  In the URI, this is expressed as a starting timestamp, with or without
     *                       an ending timestamp (in brackets). The timestamps are in ISO 8601 format, which
     *                       uses the 24-hour Universal Coordinated Time (UTC) clock.For example: <ul>
     *                       <li><code>lastmodifieddate:[2016-05-15T08:25:43.511Z..]</code> identifies orders
     *                       modified on or after the given timestamp.</li>
     *                       <li><code>lastmodifieddate:[2016-05-15T08:25:43.511Z..2016-05-31T08:25:43.511Z]</code>
     *                       identifies orders modified between the given timestamps, inclusive.</li> </ul>
     *                       <span class="tablenote"><strong>Note:</strong> If <b>creationdate</b> and
     *                       <b>lastmodifieddate</b> are both included, only <b>creationdate</b> is
     *                       used.</span> <br /><br /></dd>
     *                       <dt><code><b>orderfulfillmentstatus</b></code></dt> <dd>The degree to which
     *                       qualifying orders have been shipped (the <b>orders.orderFulfillmentStatus</b>
     *                       field). In the URI, this is expressed as one of the following value
     *                       combinations: <ul>
     *                       <li><code>orderfulfillmentstatus:{NOT_STARTED|IN_PROGRESS}</code> specifies
     *                       orders for which no shipping fulfillments have been started, plus orders for
     *                       which at least one shipping fulfillment has been started but not completed.</li>
     *                       <li><code>orderfulfillmentstatus:{FULFILLED|IN_PROGRESS}</code> specifies orders
     *                       for which all shipping fulfillments have been completed, plus orders for which
     *                       at least one shipping fulfillment has been started but not completed.</li> </ul>
     *                       <span class="tablenote"><strong>Note:</strong> The values
     *                       <code>NOT_STARTED</code>, <code>IN_PROGRESS</code>, and <code>FULFILLED</code>
     *                       can be used in various combinations, but only the combinations shown here are
     *                       currently supported.</span> </dd> </dl> Here is an example of a <b>getOrders</b>
     *                       call using all of these filters: <br /><br /> <code>GET
     *                       https://api.ebay.com/sell/v1/order?<br
     *                       />filter=<b>creationdate</b>:%5B2016-03-21T08:25:43.511Z..2016-04-21T08:25:43.511Z%5D,<br
     *                       /><b>lastmodifieddate</b>:%5B2016-05-15T08:25:43.511Z..%5D,<br
     *                       /><b>orderfulfillmentstatus</b>:%7BNOT_STARTED%7CIN_PROGRESS%7D</code> <br /><br
     *                       /> <span class="tablenote"><strong>Note:</strong> This call requires that
     *                       certain special characters in the URI query string be percent-encoded: <br />
     *                       &nbsp;&nbsp;&nbsp;&nbsp;<code>[</code> = <code>%5B</code>
     *                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>]</code> = <code>%5D</code>
     *                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>{</code> = <code>%7B</code>
     *                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>|</code> = <code>%7C</code>
     *                       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<code>}</code> = <code>%7D</code> <br />
     *                       This query filter example uses these codes.</span> For implementation help,
     *                       refer to eBay API documentation at
     *                       https://developer.ebay.com/api-docs/sell/fulfillment/types/api:FilterField
     *                       'limit'	string	The number of orders to return per page of the result set. Use
     *                       this parameter in conjunction with the <b>offset</b> parameter to control the
     *                       pagination of the output. <br /><br />For example, if <b>offset</b> is set to
     *                       <code>10</code> and <b>limit</b> is set to <code>10</code>, the call retrieves
     *                       orders 11 thru 20 from the result set. <br /><br /> If a limit is not set, the
     *                       <b>limit</b> defaults to 50 and returns up to 50 orders. If a requested limit is
     *                       more than 200, the call fails and returns an error.<br ><br> <span
     *                       class="tablenote"><strong>Note:</strong> This feature employs a zero-based list,
     *                       where the first item in the list has an offset of <code>0</code>. If the
     *                       <b>orderIds</b> parameter is included in the request, this parameter will be
     *                       ignored.</span> <br /><br /> <b>Maximum:</b> <code>200</code> <br />
     *                       <b>Default:</b> <code>50</code>
     *                       'offset'	string	Specifies the number of orders to skip in the result set before
     *                       returning the first order in the paginated response.  <p>Combine <b>offset</b>
     *                       with the <b>limit</b> query parameter to control the items returned in the
     *                       response. For example, if you supply an <b>offset</b> of <code>0</code> and a
     *                       <b>limit</b> of <code>10</code>, the first page of the response contains the
     *                       first 10 items from the complete list of items retrieved by the call. If
     *                       <b>offset</b> is <code>10</code> and <b>limit</b> is <code>20</code>, the first
     *                       page of the response contains items 11-30 from the complete result set.</p>
     *                       <p><b>Default:</b> 0</p>
     *                       'orderIds'	string	A comma-separated list of the unique identifiers of the orders
     *                       to retrieve (maximum 50). If one or more order ID values are specified through
     *                       the <b>orderIds</b> query parameter, all other query parameters will be ignored.
     *                       <br/><br/><span class="tablenote"><strong>Note:</strong> A new order ID format
     *                       was introduced to all eBay APIs (legacy and REST) in June 2019. In REST APIs
     *                       that return Order IDs, including the Fulfillment API, all order IDs are returned
     *                       in the new format, but the <strong>getOrders</strong> method will accept both
     *                       the legacy and new format order ID. The new format is a non-parsable string,
     *                       globally unique across all eBay marketplaces, and consistent for both single
     *                       line item and multiple line item orders. These order identifiers will be
     *                       automatically generated after buyer payment, and unlike in the past, instead of
     *                       just being known and exposed to the seller, these unique order identifiers will
     *                       also be known and used/referenced by the buyer and eBay customer support.
     *                       </span>
     *
     * @return OrderSearchPagedCollection|UnexpectedResponse
     */
    public function gets(array $queries = [])
    {
        return $this->request(
        'getOrders',
        'GET',
        'order',
        null,
        $queries,
        []
        );
    }

    /**
     * This method allows a seller to issue a full or partial refund to a buyer for an
     * order. Full or partial refunds can be issued at the order level or line item
     * level.<br/><br/>The refunds issued through this method are processed
     * asynchronously, so the refund will not show as 'Refunded' right away. A seller
     * will have to make a subsequent <a
     * href="https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/methods/getOrder"
     * target="_blank">getOrder</a> call to check the status of the refund.  The status
     * of an order refund can be found in the <a
     * href="https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/methods/getOrder#response.paymentSummary.refunds.refundStatus"
     * target="_blank">paymentSummary.refunds.refundStatus</a> field of the <a
     * href="https://developer.ebay.com/api-docs/sell/fulfillment/resources/order/methods/getOrder"
     * target="_blank">getOrder</a> response.
     *
     * @param string             $order_id The unique identifier of the order. Order IDs are
     *                                     returned in the <b>getOrders</b> method (and <b>GetOrders</b> call of Trading
     *                                     API). The <b>issueRefund</b> method supports the legacy API Order IDs and REST
     *                                     API order IDs.<br/><br/><span class="tablenote"><strong>Note:</strong> In the
     *                                     Trading API (and other legacy APIs), Order IDs are transitioning to a new
     *                                     format. The new format is a non-parsable string, globally unique across all eBay
     *                                     marketplaces, and consistent for both single line item and multiple line item
     *                                     orders. These order identifiers will be automatically generated after buyer
     *                                     payment, and unlike in the past, instead of just being known and exposed to the
     *                                     seller, these unique order identifiers will also be known and used/referenced by
     *                                     the buyer and eBay customer support.<br/><br/>For developers and sellers who are
     *                                     already integrated with the Trading API's order management calls, this change
     *                                     shouldn't impact your integration unless you parse the existing order
     *                                     identifiers (e.g., <b>OrderID</b> or <b>OrderLineItemID</b>), or otherwise infer
     *                                     meaning from the format (e.g., differentiating between a single line item order
     *                                     versus a multiple line item order). Because we realize that some integrations
     *                                     may have logic that is dependent upon the identifier format, eBay is rolling out
     *                                     the Trading API change with version control to support a transition period of
     *                                     approximately 9 months before applications must switch to the new format
     *                                     completely. See the <a
     *                                     href="https://developer.ebay.com/devzone/XML/docs/Reference/eBay/GetOrders.html#Request.OrderIDArray.OrderID"
     *                                     target="_blank">OrderID field description</a> in the <b>GetOrders</b> call for
     *                                     more details and requirements on transitioning to the new Order ID
     *                                     format.</span>
     * @param IssueRefundRequest $Model
     *
     * @return Refund|UnexpectedResponse
     */
    public function issueRefund(string $order_id, IssueRefundRequest $Model)
    {
        return $this->request(
        'issueRefund',
        'POST',
        "order/$order_id/issue_refund",
        $Model->getArrayCopy(),
        [],
        []
        );
    }
}
