<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Sell\Base\Account as Request;
use Laravie\Codex\Contracts\Response;

abstract class KYC extends Request
{
    public function list(): Response
    {
        return $this->send('GET', 'kyc', $this->getApiHeaders());
    }
}
