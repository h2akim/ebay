<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Sell\Base\Account as Request;
use Laravie\Codex\Contracts\Response;

class RateTable extends Request
{
    public function list(string $countryCode = null): Response
    {
        $query = ! \is_null($countryCode) ? [ 'country_code' => $countryCode ] : [];
        return $this->send('GET', 'rate_table', $this->getApiHeaders(), $query);
    }
}
