<?php

namespace Ebay\Sell\Base\Account;

use Ebay\Sell\Base\Account as Request;
use Laravie\Codex\Contracts\Response;

class ReturnPolicy extends Request
{
    public function list(): Response
    {
        return $this->send('GET', 'return_policy', $this->getApiHeaders(), [
            'marketplace_id' => $this->client->getMarketplaceId()
        ]);
    }

    public function get(string $id): Response
    {
        return $this->send('GET', "return_policy/{$id}", $this->getApiHeaders());
    }

    public function getByName(string $name): Response
    {
        return $this->send('GET', "return_policy/get_by_policy_name", $this->getApiHeaders(), [
            'marketplace_id' => $this->client->getMarketplaceId(),
            'name' => $name
        ]);
    }

    public function create(array $requestBody): Response
    {
        return $this->send('POST', "return_policy", $this->getApiHeaders(), $requestBody);
    }

    public function update(string $id, array $requestBody): Response
    {
        return $this->send('PUT', "return_policy/{$id}", $this->getApiHeaders(), $requestBody);
    }

    public function destroy(string $id): Response
    {
        return $this->send('DELETE', "return_policy/{$id}", $this->getApiHeaders());
    }
}
