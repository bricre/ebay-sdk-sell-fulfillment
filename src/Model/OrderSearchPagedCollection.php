<?php

namespace Ebay\Sell\Fulfillment\Model;

use OpenAPI\Runtime\AbstractModel;

/**
 * This type contains the specifications for the collection of orders that match
 * the search or filter criteria of a <b>getOrders</b> call. The collection is
 * grouped into a result set, and based on the query parameters that are set
 * (including the <strong>limit</strong> and <strong>offset</strong> parameters),
 * the result set may included multiple pages, but only one page of the result set
 * can be viewed at a time.
 */
class OrderSearchPagedCollection extends AbstractModel
{
    /**
     * The URI of the <b>getOrders</b> call request that produced the current page of
     * the result set.
     *
     * @var string
     */
    public $href = null;

    /**
     * The maximum number of orders returned per page of the result set. The
     * <strong>limit</strong> value can be passed in as a query parameter, or if
     * omitted, its value defaults to <code>50</code>. <br /><br /><span
     * class="tablenote"><strong>Note:</strong> If this is the last or only page of the
     * result set, the page may contain fewer orders than the <strong>limit</strong>
     * value.  To determine the number of pages in a result set, divide the
     * <b>total</b> value (total number of orders matching input criteria) by this
     * <strong>limit</strong> value, and then round up to the next integer. For
     * example, if the <b>total</b> value was <code>120</code> (120 total orders) and
     * the <strong>limit</strong> value was <code>50</code> (show 50 orders per page),
     * the total number of pages in the result set is three, so the seller would have
     * to make three separate <strong>getOrders</strong> calls to view all orders
     * matching the input criteria. </span><b>Default:</b> <code>50</code>.
     *
     * @var int
     */
    public $limit = null;

    /**
     * The <b>getOrders</b> call URI to use if you wish to view the  next page of the
     * result set. For example, the following URI returns records 41 thru 50 from the
     * collection of orders: <br /><br /><code><i>path</i>/order?limit=10&offset=40
     * </code><br/><br/>This field is only returned if there is a next page of results
     * to view based on the current input criteria.<br />.
     *
     * @var string
     */
    public $next = null;

    /**
     * The number of results skipped in the result set before listing the first
     * returned result. This value can be set in the request with the <b>offset</b>
     * query parameter. <p class="tablenote"><strong>Note: </strong>The items in a
     * paginated result set use a zero-based list where the first item in the list has
     * an offset of <code>0</code>.</p>.
     *
     * @var int
     */
    public $offset = null;

    /**
     * This array contains one or more orders that are part of the current result set,
     * that is controlled by the input criteria. The details of each order include
     * information about the buyer, order history, shipping fulfillments, line items,
     * costs, payments, and order fulfillment status. <br /><br />By default, orders
     * are returned according to creation date (oldest to newest), but the order will
     * vary according to any filter that is set in request.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Order[]
     */
    public $orders = null;

    /**
     * The <b>getOrders</b> call URI for the previous result set. For example, the
     * following URI returns orders 21 thru 30 from the collection of orders: <br /><br
     * /><code><i>path</i>/order?limit=10&offset=20</code><br/><br/>This field is only
     * returned if there is a previous page of results to view based on the current
     * input criteria.
     *
     * @var string
     */
    public $prev = null;

    /**
     * The total number of orders in the results set based on the current input
     * criteria.<br /><br /><span class="tablenote"><strong>Note:</strong> If no orders
     * are found, this field is returned with a value of <code>0</code>.</span>.
     *
     * @var int
     */
    public $total = null;

    /**
     * This array is returned if one or more errors or warnings occur with the call
     * request.
     *
     * @var \Ebay\Sell\Fulfillment\Model\Error[]
     */
    public $warnings = null;
}
