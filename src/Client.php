<?php

namespace Ebay;

use Http\Client\HttpClient;
use InvalidArgumentException;
use Laravie\Codex\Concerns\Passport;
use Laravie\Codex\Discovery;

class Client extends \Laravie\Codex\Client
{
    use Passport;

    protected $defaultVersion = 'v1';

    protected $marketplaceId = 'EBAY_US';

    protected $supportedVersions = [
        'v1' => 'One'
    ];

    protected $isSandbox = false;

    protected $apiEndpoint = 'https://api.ebay.com';
    protected $authorizationEndpoint = 'https://auth.ebay.com';

    protected $sandboxApiEndpoint = 'https://api.sandbox.ebay.com';
    protected $sandboxAuthorizationEndpoint = 'https://auth.sandbox.ebay.com';

    public function __construct(HttpClient $http, ?string $clientId, ?string $clientSecret)
    {
        $this->http = $http;

        $this->setClientId($clientId);
        $this->setClientSecret($clientSecret);
    }

    public static function make(?string $clientId = '', ?string $clientSecret = '')
    {
        return new static(Discovery::client(), $clientId, $clientSecret);
    }

    public static function token(string $accessToken)
    {
        return (new static(Discovery::client(), null, null))->setAccessToken($accessToken);
    }

    final public function setMarketplace(string $marketplaceId)
    {
        if (empty($marketplaceId)) {
            return $this;
        }

        if (! Marketplace::isSupported($marketplaceId)) {
            throw new InvalidArgumentException("Invalid Marketplace ID [{$marketplaceId}]");
        }

        $this->marketplaceId = $marketplaceId;

        return $this;
    }

    final public function getMarketplaceId()
    {
        return $this->marketplaceId;
    }

    final public function useSandbox(): self
    {
        $this->isSandbox = true;

        return $this->useCustomApiEndpoint($this->sandboxApiEndpoint);
    }

    final public function getAuthorizationEndpoint()
    {
        return $this->isSandbox ? $this->sandboxAuthorizationEndpoint : $this->authorizationEndpoint;
    }

    final public function oauth()
    {
        $class = sprintf('%s\%s\%s', $this->getResourceNamespace(), 'OAuth', 'Grant');
        return $this->via(new $class($this));
    }

    final public function sell(string $resource, ?string $version = null)
    {
        return $this->uses(sprintf('%s.%s', 'Sell', ucfirst($resource)), $version);
    }

    final public function buy(string $resource, ?string $version = null)
    {
        return $this->uses(sprintf('%s.%s', 'Buy', ucfirst($resource)), $version);
    }

    final public function commerce(string $resource, ?string $version = null)
    {
        return $this->uses(sprintf('%s.%s', 'Commerce', ucfirst($resource)), $version);
    }

    final public function developer(string $resource, ?string $version = null)
    {
        return $this->uses(sprintf('%s.%s', 'Developer', ucfirst($resource)), $version);
    }

    final protected function prepareRequestHeaders(array $headers = []): array
    {
        $authorization = ! empty($this->getAccessToken()) ? [ 'Authorization' => 'Bearer '.$this->getAccessToken() ] : [];
        return array_merge($headers, $authorization);
    }

    /**
     * Get versioned resource (service).
     *
     * @param  string  $service
     * @param  string|null  $version
     *
     * @throws \InvalidArgumentException
     *
     * @return \Laravie\Codex\Contracts\Request
     */
    final public function uses(string $service, ?string $version = null): \Laravie\Codex\Contracts\Request
    {
        if (\is_null($version) || ! \array_key_exists($version, $this->supportedVersions)) {
            $version = $this->defaultVersion;
        }
        $splitNames = explode('.', $service);
        $splitNames[0] = $splitNames[0].'\\'.$this->supportedVersions[$version];
        $name = implode('\\', $splitNames);
        $class = sprintf('%s\%s', $this->getResourceNamespace(), $name);
        
        if (! class_exists($class)) {
            throw new InvalidArgumentException("Resource [{$service}] for version [{$version}] is not available.");
        }

        return $this->via(new $class($this));
    }

    final protected function getResourceNamespace(): string
    {
        return __NAMESPACE__;
    }
}
