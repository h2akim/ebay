<?php

namespace Ebay\Sell\One\Account;

use Ebay\Sell\Base\Account\Privilege as Request;
use Laravie\Codex\Contracts\Response;

class Privilege extends Request
{
    /**
     * Version namespace.
     *
     * @var string
     */
    protected $version = 'v1';
}
