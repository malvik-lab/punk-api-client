<?php

namespace MalvikLab\PunkApiClient\Clients\V2\Rules;

class BeerRule
{
    public static function get(): array
    {
        return [
            'id' => [
                'required',
                'numeric',
                'min:1'
            ],
        ];
    }
}

