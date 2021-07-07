<?php

namespace Ebay;

use Http\Client\HttpClient;
use Laravie\Codex\Discovery;

class Client extends \Laravie\Codex\Client
{
	protected $defaultVersion = 'v1';

	protected $marketplaceId = 'EBAY_US';

	protected $supportedVersions = [
		'v1' => 'One'
	];

	protected $apiEndpoint = 'https://api.ebay.com';

	public function __construct(HttpClient $http, string $marketplaceId, string $accessToken)
	{
        $this->http = $http;
        $this->marketplaceId = $marketplaceId;
		
        $this->setAccessToken($accessToken);
	}

	public static function make(?string $marketplaceId = '', ?string $accessToken = '')
	{
        return new static(Discovery::client(), $marketplaceId, $accessToken);
	}

	final public function oauth()
	{
		$class = sprintf('%s\%s\%s', $this->getResourceNamespace(), 'OAuth', 'Grant');
        return $this->via(new $class($this));
	}

	final public function setAccessToken(string $accessToken)
	{
        $this->accessToken = $accessToken;

        return $this;
	}

	final public function sandbox(): self
	{
        return $this->useCustomApiEndpoint('https://api.sandbox.ebay.com');
	}

	public function sell(string $resource, $version)
	{
        return $this->uses(sprintf('%s.%s', 'Sell', $resource), $version);
	}

	public function buy(string $resource, $version)
	{
        return $this->uses(sprintf('%s.%s', 'Sell', $resource), $version);
	}

	public function commerce(string $resource, $version)
	{
        return $this->uses(sprintf('%s.%s', 'Sell', $resource), $version);
	}

	public function developer(string $resource, $version)
	{
        return $this->uses(sprintf('%s.%s', 'Sell', $resource), $version);
	}

	protected function getResourceNamespace(): string { 
        return __NAMESPACE__;
	}
}