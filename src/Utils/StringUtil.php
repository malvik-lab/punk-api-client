<?php

namespace MalvikLab\PunkApiClient\Utils;

use MalvikLab\PunkApiClient\Client;

class StringUtil
{
    public static function url(null | string $path = null, array $params = []): string
    {
        $url = 'https://api.punkapi.com';

        if ( !is_null($path) )
        {
            $url .= $path;
        }

        if ( count($params) > 0 )
        {
            $url .= '?' . http_build_query($params);
        }

        return $url;
    }

    /**
     * @param string $message
     * @return string
     */
    public static function exception(string $message): string
    {
        return sprintf('[ %s ] %s',
            Client::NAME,
            $message
        );
    }
}