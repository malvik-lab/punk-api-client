<?php

namespace MalvikLab\PunkApiClient;

use GuzzleHttp\Client as HttpClient;
use MalvikLab\PunkApiClient\Interfaces\ClientInterface;
use MalvikLab\PunkApiClient\Clients\V2\Client as ClientV2;
use MalvikLab\PunkApiClient\Exceptions\InvalidClientVersionException;

class Client
{
    public const NAME = 'PUNK API CLIENT';
    public const VERSION = '1.0.2';
    public const V2 = 'v2';

    /**
     * @throws InvalidClientVersionException
     */
    public static function make(
        string $version,
        null | HttpClient $httpClient = null
    ): ClientInterface
    {
        return match ($version) {
            Client::V2 => new ClientV2($httpClient),
            default => throw new InvalidClientVersionException('Invalid Client Version'),
        };
    }
}