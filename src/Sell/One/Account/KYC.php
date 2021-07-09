<?php

namespace Ebay\Sell\One\Account;

use Ebay\Sell\Base\Account\KYC as Request;
use Laravie\Codex\Contracts\Response;

class KYC extends Request
{
    /**
     * Version namespace.
     *
     * @var string
     */
    protected $version = 'v1';
}
