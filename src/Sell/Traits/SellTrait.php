<?php

namespace Ebay\Sell\Traits;

use Laravie\Codex\Contracts\Endpoint;

trait SellTrait
{
    protected $rootApi = 'sell';
    /**
     * Get URI Endpoint.
     *
     * @param  array|string  $path
     */
    protected function getApiEndpoint($path = []): Endpoint
    {
        return parent::getApiEndpoint([$this->rootApi, $this->apiPath, $this->getVersion(), $path]);
    }
}
