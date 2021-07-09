<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Sell\Base\Account as Request;
use Laravie\Codex\Contracts\Response;

class SalesTax extends Request
{
    public function list(string $countryCode): Response
    {
        return $this->send('GET', 'sales_tax', $this->getApiHeaders(), [
            'country_code' => $countryCode
        ]);
    }

    public function get(string $countryCode, string $judisdictionId): Response
    {
        return $this->send('GET', "sales_tax/{$countryCode}/{$judisdictionId}", $this->getApiHeaders());
    }

    public function createOrReplace(string $countryCode, string $judisdictionId, array $requestBody): Response
    {
        return $this->send('PUT', "sales_tax/{$countryCode}/{$judisdictionId}", $this->getApiHeaders(), $requestBody);
    }

    public function destroy(string $countryCode, string $judisdictionId): Response
    {
        return $this->send('DELETE', "sales_tax/{$countryCode}/{$judisdictionId}", $this->getApiHeaders());
    }
}
