<?php

namespace MalvikLab\PunkApiClient;

use GuzzleHttp\Client as HttpClient;
use MalvikLab\PunkApiClient\Clients\V2\Client as ClientV2;
use MalvikLab\PunkApiClient\Exceptions\InvalidClientVersionException;
use MalvikLab\PunkApiClient\Interfaces\ClientInterface;

class Client
{
    public const NAME = 'PUNK API CLIENT';
    public const VERSION = '1.0.0';
    public const V2 = 'v2';

    private static $client;

    public static function make(
        string $version,
        null | HttpClient $httpClient = null
    ): ClientInterface
    {
        switch ($version) {
            case Client::V2:
                return new ClientV2($httpClient);
            default:
                throw new InvalidClientVersionException('Invalid Client Version');
        }
    }
}