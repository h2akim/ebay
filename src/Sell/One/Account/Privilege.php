<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Sell\Base\Account as Request;
use Laravie\Codex\Contracts\Response;

class Privilege extends Request
{
    public function list(): Response
    {
        return $this->send('GET', 'privilege', $this->getApiHeaders());
    }
}
