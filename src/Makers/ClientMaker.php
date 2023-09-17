<?php

namespace MalvikLab\PunkApiClient\Makers;

use GuzzleHttp\Client as HttpClient;
use MalvikLab\PunkApiClient\Client;
use MalvikLab\PunkApiClient\Clients\AbstractClient;
use MalvikLab\PunkApiClient\Exceptions\InvalidClientVersionException;

class ClientMaker
{
    /**
     * @throws InvalidClientVersionException
     */
    public static function make(
        string $version,
        null | HttpClient $httpClient = null
    ): AbstractClient
    {
        $build = new Client($version, $httpClient);

        return $build->getClient();
    }
}
