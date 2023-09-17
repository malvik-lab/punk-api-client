<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class MaltDTO
{
    public function __construct(
        public string $name,
        public AmountDTO $amount
    ) {
    }
}
