<?php

namespace MalvikLab\PunkApiClient;

use GuzzleHttp\Client as HttpClient;
use MalvikLab\PunkApiClient\Clients\AbstractClient;
use MalvikLab\PunkApiClient\Exceptions\InvalidClientVersionException;

class Client
{
    public const NAME = 'PUNK API CLIENT';
    public const VERSION = '1.0.0';

    private AbstractClient $client;

    /**
     * @throws InvalidClientVersionException
     */
    public function __construct(
        private readonly string $version,
        private readonly null | HttpClient $httpClient = null
    ) {
        $this->client = match ($version) {
            'v2' => new Clients\V2\Client($httpClient),
            default => throw new InvalidClientVersionException('Invalid Client Version'),
        };
    }

    /**
     * @return AbstractClient
     */
    public function getClient(): AbstractClient
    {
        return $this->client;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @return HttpClient
     */
    public function getHttpClient(): HttpClient
    {
        return $this->httpClient;
    }
}