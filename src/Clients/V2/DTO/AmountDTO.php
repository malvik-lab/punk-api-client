<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class AmountDTO
{
    public function __construct(
        public int | float $value,
        public string $unit
    ) {
    }
}
