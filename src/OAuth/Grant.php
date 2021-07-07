<?php

namespace Ebay\OAuth;

use Ebay\Request;
use Laravie\Codex\Common\Endpoint;

class Grant extends Request
{
    public function clientCredentialsGrant(string $clientId, string $clientSecret, array $scopeList)
    {
        $credentials = base64_encode(sprintf('%s:%s', $clientId, $clientSecret));
        $body = [
            'grant_type' => 'client_credentials',
            'scope' => urlencode(implode($scopeList))
        ];
        
        return $this->sendGrantRequest($credentials, $body);
    }

    public function authorizationCodeGrant(string $clientId, string $clientSecret, string $authorizationCode, string $redirectUri)
    {
        $credentials = base64_encode(sprintf('%s:%s', $clientId, $clientSecret));
        $body = [
            'grant_type' => 'authorization_code',
            'code' => $authorizationCode,
            'redirect_uri' => $redirectUri
        ];
        
        return $this->sendGrantRequest($credentials, $body);
    }

    public function getAuthorizeUrl(string $clientId, string $redirectUri, string $state, array $scopeList)
    {
        $this->client->useCustomApiEndpoint('https://auth.sandbox.ebay.com');
        $query = [
            'client_id' => $clientId,
            'redirect_uri' => $redirectUri,
            'response_type' => 'code',
            'state' => $state,
            'scope' => urlencode(implode($scopeList)),
            'prompt' => 'login'
        ];
        return (string) new Endpoint($this->client->getApiEndpoint(), 'oauth2/authorize', $query);
    }

    private function sendGrantRequest(string $credentials, array $body)
    {
        return $this->send('POST', 'identity/v1/oauth2/token', [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Basic '.$credentials
        ], $body);
    }
}
