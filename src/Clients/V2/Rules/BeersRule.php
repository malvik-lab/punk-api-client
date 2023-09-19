<?php

namespace MalvikLab\PunkApiClient\Clients\V2\Rules;

class BeersRule
{
    public static function get(): array
    {
        return [
            'page' => [
                'required',
                'numeric',
                'min:1'
            ],

            'perPage' => [
                'required',
                'numeric',
                'min:1',
                'max:80'
            ],
        ];
    }
}

