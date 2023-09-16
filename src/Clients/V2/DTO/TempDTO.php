<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class TempDTO
{
    public function __construct(
        public null | int $value,
        public string $unit
    ) {
    }
}
