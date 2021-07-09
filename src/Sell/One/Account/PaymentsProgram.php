<?php

namespace Ebay\Sell\One\Account;

use Ebay\Sell\Base\Account\PaymentsProgram as Request;
use Laravie\Codex\Contracts\Response;

class PaymentsProgram extends Request
{
    /**
     * Version namespace.
     *
     * @var string
     */
    protected $version = 'v1';
}
