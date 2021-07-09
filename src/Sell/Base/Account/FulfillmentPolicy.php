<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Marketplace;
use Ebay\Request;
use Ebay\Sell\Traits\SellTrait;
use InvalidArgumentException;
use Laravie\Codex\Contracts\Response;

abstract class FulfillmentPolicy extends Request
{
    use SellTrait;
    
    protected $apiPath = 'sell/account';

    public function list(): Response
    {
        return $this->send('GET', 'fulfillment_policy', $this->getApiHeaders(), [
            'marketplace_id' => $this->client->getMarketplaceId()
        ]);
    }

    public function get(string $id): Response
    {
        return $this->send('GET', "fulfillment_policy/{$id}", $this->getApiHeaders());
    }

    public function getByName(string $name): Response
    {
        return $this->send('GET', "fulfillment_policy/get_by_policy_name", $this->getApiHeaders(), [
            'marketplace_id' => $this->client->getMarketplaceId(),
            'name' => $name
        ]);
    }

    public function create(array $requestBody): Response
    {
        return $this->send('POST', "fulfillment_policy", $this->getApiHeaders(), $requestBody);
    }

    public function update(string $id, array $requestBody): Response
    {
        return $this->send('PUT', "fulfillment_policy/{$id}", $this->getApiHeaders(), $requestBody);
    }

    public function destroy(string $id): Response
    {
        return $this->send('DELETE', "fulfillment_policy/{$id}", $this->getApiHeaders());
    }
}
