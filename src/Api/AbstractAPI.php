<?php

namespace Ebay\Sell\Fulfillment\Api;

use Ebay\Sell\Fulfillment\ResponseHandlerStack;
use OpenAPI\Runtime\AbstractAPI as BaseClass;

class AbstractAPI extends BaseClass implements APIInterface
{
    protected string $responseHandlerStackClass = ResponseHandlerStack::class;

    public function __construct(?HttpClientInterface $client = null)
    {
        parent::__construct($client);
    }
}
