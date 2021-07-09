<?php

namespace Ebay\Sell\One\Account;

use Ebay\Sell\Base\Account\FulfillmentPolicy as Request;
use Laravie\Codex\Contracts\Response;

class FulfillmentPolicy extends Request
{
    /**
     * Version namespace.
     *
     * @var string
     */
    protected $version = 'v1';
}
