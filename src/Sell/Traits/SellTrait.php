<?php

namespace Ebay\Sell\Traits;

use Laravie\Codex\Contracts\Endpoint;

trait SellTrait
{
    /**
     * Get URI Endpoint.
     *
     * @param  array|string  $path
     */
    protected function getApiEndpoint($path = []): Endpoint
    {
        return parent::getApiEndpoint([$this->apiPath, $this->getVersion(), $path]);
    }
}
