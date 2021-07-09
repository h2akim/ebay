<?php

namespace Ebay;

use Laravie\Codex\Contracts\Filterable;
use Laravie\Codex\Filter\WithSanitizer;

abstract class Request extends \Laravie\Codex\Request implements Filterable
{
    use WithSanitizer;

    protected $apiPath = '';

    protected function getApiHeaders(): array
    {
        if (! \is_null($accessToken = $this->client->getAccessToken())) {
            $headers['Authorization'] = "Bearer {$accessToken}";
        }

        return $headers;
    }
}
