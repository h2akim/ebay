<?php

namespace Ebay\Sell\One\Account;

use Ebay\Sell\Base\Account\PaymentPolicy as Request;
use Laravie\Codex\Contracts\Response;

class PaymentPolicy extends Request
{
    /**
     * Version namespace.
     *
     * @var string
     */
    protected $version = 'v1';
}
