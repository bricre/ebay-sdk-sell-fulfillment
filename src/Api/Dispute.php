<?php

namespace Ebay\Sell\Fulfillment\Api;

use Ebay\Sell\Fulfillment\Model\AcceptPaymentDisputeRequest;
use Ebay\Sell\Fulfillment\Model\AddEvidencePaymentDisputeRequest;
use Ebay\Sell\Fulfillment\Model\AddEvidencePaymentDisputeResponse;
use Ebay\Sell\Fulfillment\Model\ContestPaymentDisputeRequest;
use Ebay\Sell\Fulfillment\Model\DisputeSummaryResponse;
use Ebay\Sell\Fulfillment\Model\FileEvidence;
use Ebay\Sell\Fulfillment\Model\PaymentDispute;
use Ebay\Sell\Fulfillment\Model\PaymentDisputeActivityHistory;
use Ebay\Sell\Fulfillment\Model\UpdateEvidencePaymentDisputeRequest;
use OpenAPI\Runtime\UnexpectedResponse;

class Dispute extends AbstractAPI
{
    /**
     * This method retrieves detailed information on a specific payment dispute. The
     * payment dispute identifier is passed in as path parameter at the end of the call
     * URI.<br/><br/>Below is a summary of the information that is
     * retrieved:<ul><li>Current status of payment dispute</li><li>Amount of the
     * payment dispute</li><li>Reason the payment dispute was opened</li><li>Order and
     * line items associated with the payment dispute</li><li>Seller response options
     * if an action is currently required on the payment dispute</li><li>Details on the
     * results of the payment dispute if it has been closed</li><li>Details on any
     * evidence that was provided by the seller to fight the payment dispute</li></ul>.
     *
     * @param string $payment_dispute_id This is the unique identifier of the payment
     *                                   dispute. This path parameter must be passed in at the end of the call URI to
     *                                   identify the payment dispute to retrieve. This identifier is automatically
     *                                   created by eBay once the payment dispute comes into the eBay system. The unique
     *                                   identifier for payment disputes is returned in the
     *                                   <strong>paymentDisputeId</strong> field in the
     *                                   <strong>getPaymentDisputeSummaries</strong> response.
     *
     * @return PaymentDispute|UnexpectedResponse
     */
    public function get(string $payment_dispute_id)
    {
        return $this->request(
        'getPaymentDispute',
        'GET',
        "payment_dispute/$payment_dispute_id",
        null,
        [],
        []
        );
    }

    /**
     * This call retrieves a specific evidence file for a payment dispute. The
     * following three identifying parameters are needed in the call
     * URI:<ul><li><strong>payment_dispute_id</strong>: the identifier of the payment
     * dispute. The identifier of each payment dispute is returned in the
     * <strong>getPaymentDisputeSummaries</strong>
     * response.</li><li><strong>evidence_id</strong>: the identifier of the evidential
     * file set. The identifier of an evidential file set for a payment dispute is
     * returned under the <strong>evidence</strong> array in the
     * <strong>getPaymentDispute</strong> response.</li><li><strong>file_id</strong>:
     * the identifier of an evidential file. This file must belong to the evidential
     * file set identified through the <strong>evidence_id</strong> query parameter.
     * The identifier of each evidential file is returned under the
     * <strong>evidence.files</strong> array in the <strong>getPaymentDispute</strong>
     * response.</li></ul><p>An actual binary file is returned if the call is
     * successful. An error will occur if any of three identifiers are invalid.</p>.
     *
     * @param string $payment_dispute_id The identifier of the payment dispute. The
     *                                   identifier of each payment dispute is returned in the
     *                                   <strong>getPaymentDisputeSummaries</strong> response. This identifier is passed
     *                                   in as a path parameter at the end of the call URI.
     * @param array  $queries            options:
     *                                   'evidence_id'	string	The identifier of the evidential file set. The identifier
     *                                   of an evidential file set for a payment dispute is returned under the
     *                                   <strong>evidence</strong> array in the <strong>getPaymentDispute</strong>
     *                                   response.<br><br>Below is an example of the syntax to use for this query
     *                                   parameter:<br/><br/><code>evidence_id=12345678</code>
     *                                   'file_id'	string	The identifier of an evidential file. This file must belong to
     *                                   the evidential file set identified through the <strong>evidence_id</strong>
     *                                   query parameter. The identifier of each evidential file is returned under the
     *                                   <strong>evidence.files</strong> array in the <strong>getPaymentDispute</strong>
     *                                   response. <br><br>Below is an example of the syntax to use for this query
     *                                   parameter:<br/><br/><code>file_id=12345678</code>
     *
     * @return UnexpectedResponse
     */
    public function fetchEvidenceContent(string $payment_dispute_id, array $queries = []): UnexpectedResponse
    {
        return $this->request(
        'fetchEvidenceContent',
        'GET',
        "payment_dispute/$payment_dispute_id/fetch_evidence_content",
        null,
        $queries,
        []
        );
    }

    /**
     * This method retrieve a log of activity for a payment dispute. The identifier of
     * the payment dispute is passed in as a path parameter. The output includes a
     * timestamp for each action of the payment dispute, from creation to resolution,
     * and all steps in between.
     *
     * @param string $payment_dispute_id This is the unique identifier of the payment
     *                                   dispute. This path parameter must be passed in at the end of the call URI to
     *                                   identify the payment dispute for which the user wishes to see all activity. This
     *                                   identifier is automatically created by eBay once the payment dispute comes into
     *                                   the eBay system. The unique identifier for payment disputes is returned in the
     *                                   <strong>paymentDisputeId</strong> field in the
     *                                   <strong>getPaymentDisputeSummaries</strong> response.<br><br>This path parameter
     *                                   is required, and the actual identifier value is passed in right after the
     *                                   <strong>payment_dispute</strong> resource. See the Resource URI above.
     *
     * @return PaymentDisputeActivityHistory|UnexpectedResponse
     */
    public function getActivities(string $payment_dispute_id)
    {
        return $this->request(
        'getActivities',
        'GET',
        "payment_dispute/$payment_dispute_id/activity",
        null,
        [],
        []
        );
    }

    /**
     * This method is used retrieve one or more payment disputes filed against the
     * seller. These payment disputes can be open or recently closed. The following
     * filter types are available in the request payload to control the payment
     * disputes that are returned:<ul><li>Dispute filed against a specific order
     * (<b>order_id</b> parameter is used)</li><li>Dispute(s) filed by a specific buyer
     * (<b>buyer_username</b> parameter is used)</li><li>Dispute(s) filed within a
     * specific date range (<b>open_date_from</b> and/or <b>open_date_to</b> parameters
     * are used)</li><li>Disputes in a specific state (<b>payment_dispute_status</b>
     * parameter is used)</li></ul>More than one of these filter types can be used
     * together. See the request payload request fields for more information about how
     * each filter is used.<br/><br/>If none of the filters are used, all open and
     * recently closed payment disputes are returned.<br/><br/>Pagination is also
     * available. See the <b>limit</b> and <b>offset</b> fields for more information on
     * how pagination is used for this method.
     *
     * @param array $queries options:
     *                       'order_id'	string	This filter is used if the seller wishes to retrieve one or
     *                       more payment disputes filed against a specific order. It is possible that there
     *                       can be more than one dispute filed against an order if the order has multiple
     *                       line items. If this filter is used, any other filters are
     *                       ignored.<br/><br/><span class="tablenote"><strong>Note:</strong> The order
     *                       identifier passed into this field must be an Order ID in the new format. The
     *                       legacy APIs still support the old and new order ID format to identify orders,
     *                       but only the new order ID format is supported in REST-based APIs. eBay rolled
     *                       out a new Order ID format in June 2019.</span>
     *                       'buyer_username'	string	This filter is used if the seller wishes to retrieve one
     *                       or more payment disputes opened by a specific seller. The string that is passed
     *                       in to this query parameter is the eBay user ID of the buyer.
     *                       'open_date_from'	string	The <b>open_date_from</b> and/or <b>open_date_to</b>
     *                       date filters are used if the seller wishes to retrieve payment disputes opened
     *                       within a specific date range. A maximum date range that may be set with the
     *                       <b>open_date_from</b> and/or <b>open_date_to</b> filters is 90 days. These date
     *                       filters use the ISO-8601 24-hour date and time format, and time zone used is
     *                       Universal Coordinated Time (UTC), also known as Greenwich Mean Time (GMT), or
     *                       Zulu.<br><br>The <b>open_date_from</b> field sets the beginning date of the date
     *                       range, and can be set as far back as 18 months from the present time. If a
     *                       <b>open_date_from</b> field is used, but a <b>open_date_to</b> field is not
     *                       used, the <b>open_date_to</b> value will default to 90 days after the date
     *                       specified in the <b>open_date_from</b> field, or to the present time if less
     *                       than 90 days in the past.<br/><br/>The ISO-8601 format looks like this:
     *                       <em>yyyy-MM-ddThh:mm.ss.sssZ</em>. An example would be
     *                       <code>2019-08-04T19:09:02.768Z</code>.
     *                       'open_date_to'	string	The <b>open_date_from</b> and/or <b>open_date_to</b> date
     *                       filters are used if the seller wishes to retrieve payment disputes opened within
     *                       a specific date range. A maximum date range that may be set with the
     *                       <b>open_date_from</b> and/or <b>open_date_to</b> filters is 90 days. These date
     *                       filters use the ISO-8601 24-hour date and time format, and the time zone used is
     *                       Universal Coordinated Time (UTC), also known as Greenwich Mean Time (GMT), or
     *                       Zulu.<br><br>The <b>open_date_to</b> field sets the ending date of the date
     *                       range, and can be set up to 90 days from the date set in the
     *                       <b>open_date_from</b> field. <br/><br/>The ISO-8601 format looks like this:
     *                       <em>yyyy-MM-ddThh:mm.ss.sssZ</em>. An example would be
     *                       <code>2019-08-04T19:09:02.768Z</code>.
     *                       'payment_dispute_status'	string	This filter is used if the seller wishes to only
     *                       retrieve payment disputes in a specific state. More than one value can be
     *                       specified. If no <b>payment_dispute_status</b> filter is used, payment disputes
     *                       in all states are returned in the response. See
     *                       <strong>DisputeStateEnum</strong> type for supported values.
     *                       'limit'	string	The value passed in this query parameter sets the maximum number
     *                       of payment disputes to return per page of data. The value passed in this field
     *                       should be an integer from 1 to 200. If this query parameter is not set, up to
     *                       200 records will be returned on each page of results.<br><br><b>Min</b>: 1;
     *                       <b>Max</b>: 200; <b>Default</b>: 200
     *                       'offset'	string	This field is used to specify the number of records to skip in
     *                       the result set before returning the first payment dispute in the paginated
     *                       response. A zero-based index is used, so if you set the <b>offset</b> value to
     *                       <code>0</code> (default value), the first payment dispute in the result set
     *                       appears at the top of the response. <br/><br/>Combine <b>offset</b> with the
     *                       <b>limit</b> parameter to control the payment disputes returned in the response.
     *                       For example, if you supply an <b>offset</b> value of <code>0</code> and a
     *                       <b>limit</b> value of <code>10</code>, the response will contain the first 10
     *                       payment disputes from the result set that matches the input criteria. If you
     *                       supply an <b>offset</b> value of <code>10</code> and a <b>limit</b> value of
     *                       <code>20</code>, the response will contain payment disputes 11-30 from the
     *                       result set that matches the input criteria.<br><br><b>Min</b>: 0; <b>Max</b>:
     *                       total number of payment disputes - 1; <b>Default</b>: 0
     *
     * @return DisputeSummaryResponse|UnexpectedResponse
     */
    public function getSummaries(array $queries = [])
    {
        return $this->request(
        'getPaymentDisputeSummaries',
        'GET',
        'payment_dispute_summary',
        null,
        $queries,
        []
        );
    }

    /**
     * This method is used if the seller wishes to contest a payment dispute initiated
     * by the buyer. The unique identifier of the payment dispute is passed in as a
     * path parameter, and unique identifiers for payment disputes can be retrieved
     * with the <strong>getPaymentDisputeSummaries</strong> method.<br/><br/><span
     * class="tablenote"><strong>Note:</strong> Before contesting a payment dispute,
     * the seller must upload all evidence files using the <strong>addEvidence</strong>
     * and <strong>updateEvidence</strong> methods. Once the seller has officially
     * contested the dispute (using <strong>contestPaymentDispute</strong>), the
     * <strong>addEvidence</strong> and <strong>updateEvidence</strong> methods can no
     * longer be used. In the <strong>evidenceRequests</strong> array of the
     * <strong>getPaymentDispute</strong> response, eBay prompts the seller with the
     * type of evidence file(s) that will be needed to contest the payment
     * dispute.</span><br><br>If a seller decides to contest a payment dispute, that
     * seller should be prepared to provide evidential documents such as proof of
     * delivery, proof of authentication, or other documents. The type of evidential
     * documents that the seller will provide will depend on why the buyer initiated
     * the payment dispute.<br><br>The <strong>revision</strong> field in the request
     * payload is required, and the <strong>returnAddress</strong> field should be
     * supplied if the seller is expecting the buyer to return the item. See the
     * Request Payload section for more information on theste fields.
     *
     * @param string                       $payment_dispute_id This is the unique identifier of the payment
     *                                                         dispute. This path parameter must be passed into the call URI to identify the
     *                                                         payment dispute for which the user plans to contest. This identifier is
     *                                                         automatically created by eBay once the payment dispute comes into the eBay
     *                                                         system. The unique identifier for payment disputes is returned in the
     *                                                         <strong>paymentDisputeId</strong> field in the
     *                                                         <strong>getPaymentDisputeSummaries</strong> response.<br><br>This path parameter
     *                                                         is required, and the actual identifier value is passed in right after the
     *                                                         <strong>payment_dispute</strong> resource. See the Resource URI above.
     * @param ContestPaymentDisputeRequest $Model
     *
     * @return UnexpectedResponse
     */
    public function contest(string $payment_dispute_id, ContestPaymentDisputeRequest $Model): UnexpectedResponse
    {
        return $this->request(
        'contestPaymentDispute',
        'POST',
        "payment_dispute/$payment_dispute_id/contest",
        $Model->getArrayCopy(),
        [],
        []
        );
    }

    /**
     * This method is used if the seller wishes to accept a payment dispute. The unique
     * identifier of the payment dispute is passed in as a path parameter, and unique
     * identifiers for payment disputes can be retrieved with the
     * <strong>getPaymentDisputeSummaries</strong> method.<br><br>The
     * <strong>revision</strong> field in the request payload is required, and the
     * <strong>returnAddress</strong> field should be supplied if the seller is
     * expecting the buyer to return the item. See the Request Payload section for more
     * information on theste fields.
     *
     * @param string                      $payment_dispute_id This is the unique identifier of the payment
     *                                                        dispute. This path parameter must be passed into the call URI to identify the
     *                                                        payment dispute for which the user plans to accept. This identifier is
     *                                                        automatically created by eBay once the payment dispute comes into the eBay
     *                                                        system. The unique identifier for payment disputes is returned in the
     *                                                        <strong>paymentDisputeId</strong> field in the
     *                                                        <strong>getPaymentDisputeSummaries</strong> response.<br><br>This path parameter
     *                                                        is required, and the actual identifier value is passed in right after the
     *                                                        <strong>payment_dispute</strong> resource. See the Resource URI above.
     * @param AcceptPaymentDisputeRequest $Model
     *
     * @return UnexpectedResponse
     */
    public function accept(string $payment_dispute_id, AcceptPaymentDisputeRequest $Model): UnexpectedResponse
    {
        return $this->request(
        'acceptPaymentDispute',
        'POST',
        "payment_dispute/$payment_dispute_id/accept",
        $Model->getArrayCopy(),
        [],
        []
        );
    }

    /**
     * This method is used to upload an evidence file for a contested payment dispute.
     * The unique identifier of the payment dispute is passed in as a path parameter,
     * and unique identifiers for payment disputes can be retrieved with the
     * <strong>getPaymentDisputeSummaries</strong> method.<br><br><span
     * class="tablenote"><strong>Note:</strong> The <strong>uploadEvidenceFile</strong>
     * only uploads an encrypted, binary image file (using
     * <strong>multipart/form-data</strong> HTTP request header), and does not have a
     * JSON-based request payload.<br><br>Use 'file' as the name of the key that you
     * use to upload the image file. The upload will not be successful if a different
     * key name is used.<br><br>The three image formats supported at this time are
     * <strong>.JPEG</strong>, <strong>.JPG</strong>, and
     * <strong>.PNG</strong>.</span><br><br>Once the file is successfully uploaded, the
     * seller will need to grab the <strong>fileId</strong> value in the response
     * payload to add this file to a new evidence set using the
     * <strong>addEvidence</strong> method, or to add this file to an existing evidence
     * set using the <strong>updateEvidence</strong> method.
     *
     * @param string $payment_dispute_id This is the unique identifier of the payment
     *                                   dispute. This path parameter must be passed into the call URI to identify the
     *                                   payment dispute for which the user plans to upload an evidence file. This
     *                                   identifier is automatically created by eBay once the payment dispute comes into
     *                                   the eBay system. The unique identifier for payment disputes is returned in the
     *                                   <strong>paymentDisputeId</strong> field in the
     *                                   <strong>getPaymentDisputeSummaries</strong> response.<br><br>This path parameter
     *                                   is required, and the actual identifier value is passed in right after the
     *                                   <strong>payment_dispute</strong> resource. See the Resource URI above.
     *
     * @return FileEvidence|UnexpectedResponse
     */
    public function uploadEvidenceFile(string $payment_dispute_id)
    {
        return $this->request(
        'uploadEvidenceFile',
        'POST',
        "payment_dispute/$payment_dispute_id/upload_evidence_file",
        null,
        [],
        []
        );
    }

    /**
     * This method is used by the seller to add one or more evidence files to address a
     * payment dispute initiated by the buyer. The unique identifier of the payment
     * dispute is passed in as a path parameter, and unique identifiers for payment
     * disputes can be retrieved with the <strong>getPaymentDisputeSummaries</strong>
     * method.<br/><br/><span class="tablenote"><strong>Note:</strong> All evidence
     * files should be uploaded using <strong>addEvidence</strong> and
     * <strong>updateEvidence</strong>  before the seller decides to contest the
     * payment dispute. Once the seller has officially contested the dispute (using
     * <strong>contestPaymentDispute</strong> or through My eBay), the
     * <strong>addEvidence</strong> and <strong>updateEvidence</strong> methods can no
     * longer be used. In the <strong>evidenceRequests</strong> array of the
     * <strong>getPaymentDispute</strong> response, eBay prompts the seller with the
     * type of evidence file(s) that will be needed to contest the payment
     * dispute.</span><br><br>The file(s) to add are identified through the
     * <strong>files</strong> array in the request payload.  Adding one or more new
     * evidence files for a payment dispute triggers the creation of an evidence file,
     * and the unique identifier for the new evidence file is automatically generated
     * and returned in the <strong>evidenceId</strong> field of the
     * <strong>addEvidence</strong> response payload upon a successful call.<br><br>The
     * type of evidence being added should be specified in the
     * <strong>evidenceType</strong> field. All files being added (if more than one)
     * should correspond to this evidence type.<br><br>Upon a successful call, an
     * <strong>evidenceId</strong> value is returned in the response. This indicates
     * that a new evidence set has been created for the payment dispute, and this
     * evidence set includes the evidence file(s) that were passed in to the
     * <strong>fileId</strong> array. The <strong>evidenceId</strong> value will be
     * needed if the seller wishes to add to the evidence set by using the
     * <strong>updateEvidence</strong> method, or if they want to retrieve a specific
     * evidence file within the evidence set by using the
     * <strong>fetchEvidenceContent</strong> method.
     *
     * @param string                           $payment_dispute_id This is the unique identifier of the payment
     *                                                             dispute. This path parameter must be passed into the call URI to identify the
     *                                                             payment dispute for which the user plans to add evidence for a contested payment
     *                                                             dispute. This identifier is automatically created by eBay once the payment
     *                                                             dispute comes into the eBay system. The unique identifier for payment disputes
     *                                                             is returned in the <strong>paymentDisputeId</strong> field in the
     *                                                             <strong>getPaymentDisputeSummaries</strong> response.<br><br>This path parameter
     *                                                             is required, and the actual identifier value is passed in right after the
     *                                                             <strong>payment_dispute</strong> resource. See the Resource URI above.
     * @param AddEvidencePaymentDisputeRequest $Model
     *
     * @return AddEvidencePaymentDisputeResponse|UnexpectedResponse
     */
    public function addEvidence(string $payment_dispute_id, AddEvidencePaymentDisputeRequest $Model)
    {
        return $this->request(
        'addEvidence',
        'POST',
        "payment_dispute/$payment_dispute_id/add_evidence",
        $Model->getArrayCopy(),
        [],
        []
        );
    }

    /**
     * This method is used by the seller to update an existing evidence set for a
     * payment dispute with one or more evidence files. The unique identifier of the
     * payment dispute is passed in as a path parameter, and unique identifiers for
     * payment disputes can be retrieved with the
     * <strong>getPaymentDisputeSummaries</strong> method.<br/><br/><span
     * class="tablenote"><strong>Note:</strong> All evidence files should be uploaded
     * using <strong>addEvidence</strong> and <strong>updateEvidence</strong>  before
     * the seller decides to contest the payment dispute. Once the seller has
     * officially contested the dispute (using <strong>contestPaymentDispute</strong>
     * or through My eBay), the <strong>addEvidence</strong> and
     * <strong>updateEvidence</strong> methods can no longer be used. In the
     * <strong>evidenceRequests</strong> array of the
     * <strong>getPaymentDispute</strong> response, eBay prompts the seller with the
     * type of evidence file(s) that will be needed to contest the payment
     * dispute.</span><br><br>The unique identifier of the evidence set to update is
     * specified through the <strong>evidenceId</strong> field, and the file(s) to add
     * are identified through the <strong>files</strong> array in the request payload.
     * The unique identifier for an evidence file is automatically generated and
     * returned in the <strong>fileId</strong> field of the
     * <strong>uploadEvidence</strong> response payload upon a successful call. Sellers
     * must make sure to capture the <strong>fileId</strong> value for each evidence
     * file that is uploaded with the <strong>uploadEvidence</strong>
     * method.<br><br>The type of evidence being added should be specified in the
     * <strong>evidenceType</strong> field.  All files being added (if more than one)
     * should correspond to this evidence type.<br><br>Upon a successful call, an http
     * status code of <code>204 Success</code> is returned. There is no response
     * payload unless an error occurs. To verify that a new file is a part of the
     * evidence set, the seller can use the <strong>fetchEvidenceContent</strong>
     * method, passing in the proper <strong>evidenceId</strong> and
     * <strong>fileId</strong> values.
     *
     * @param string                              $payment_dispute_id This is the unique identifier of the payment
     *                                                                dispute. This path parameter must be passed into the call URI to identify the
     *                                                                payment dispute for which the user plans to update the evidence set for a
     *                                                                contested payment dispute. This identifier is automatically created by eBay once
     *                                                                the payment dispute comes into the eBay system. The unique identifier for
     *                                                                payment disputes is returned in the <strong>paymentDisputeId</strong> field in
     *                                                                the <strong>getPaymentDisputeSummaries</strong> response.<br><br>This path
     *                                                                parameter is required, and the actual identifier value is passed in right after
     *                                                                the <strong>payment_dispute</strong> resource. See the Resource URI above.
     * @param UpdateEvidencePaymentDisputeRequest $Model
     *
     * @return UnexpectedResponse
     */
    public function updateEvidence(string $payment_dispute_id, UpdateEvidencePaymentDisputeRequest $Model): UnexpectedResponse
    {
        return $this->request(
        'updateEvidence',
        'POST',
        "payment_dispute/$payment_dispute_id/update_evidence",
        $Model->getArrayCopy(),
        [],
        []
        );
    }
}
