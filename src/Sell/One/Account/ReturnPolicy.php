<?php

namespace Ebay\Sell\One\Account;

use Ebay\Sell\Base\Account\ReturnPolicy as Request;
use Laravie\Codex\Contracts\Response;

class ReturnPolicy extends Request
{
    /**
     * Version namespace.
     *
     * @var string
     */
    protected $version = 'v1';
}
