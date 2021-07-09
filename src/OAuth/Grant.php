<?php

namespace Ebay\OAuth;

use Laravie\Codex\Common\Endpoint;
use Laravie\Codex\Contracts\Filterable;
use Laravie\Codex\Filter\WithSanitizer;
use RuntimeException;

class Grant extends \Laravie\Codex\Request implements Filterable
{
    use WithSanitizer;

    public function clientCredentialsGrant(?array $scopeList = [])
    {
        $credentials = base64_encode(sprintf('%s:%s', $this->client->getClientId(), $this->client->getClientSecret()));
        $body = [
            'grant_type' => 'client_credentials',
            'scope' => implode(' ', $scopeList)
        ];
        $this->sendGrantRequest($credentials, $body);
        return $this->client;
    }

    public function authorizationCodeGrant(string $authorizationCode, string $redirectUri)
    {
        $credentials = base64_encode(sprintf('%s:%s', $this->client->getClientId(), $this->client->getClientSecret()));
        $body = [
            'grant_type' => 'authorization_code',
            'code' => $authorizationCode,
            'redirect_uri' => $redirectUri
        ];
        
        $this->sendGrantRequest($credentials, $body);
        return $this->client;
    }

    public function getAuthorizeUrl(string $redirectUri, string $state, array $scopeList)
    {
        $this->client->useCustomApiEndpoint($this->client->getAuthorizationEndpoint());
        $query = [
            'client_id' => $this->client->getClientId(),
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'state' => $state,
            'scope' => implode(' ', $scopeList),
            'prompt' => 'login'
        ];
        
        return (string) new Endpoint($this->client->getApiEndpoint(), 'oauth2/authorize', $query);
    }

    private function sendGrantRequest(string $credentials, array $body)
    {
        return $this->send('POST', 'identity/v1/oauth2/token', [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic '.$credentials
        ], $body)->validateWith(function ($statusCode, $response) {
            if ($statusCode !== 200) {
                throw new RuntimeException('Failed to generate access token');
            }
            $this->client->setAccessToken($response->toArray()['access_token']);
        });
    }
}
