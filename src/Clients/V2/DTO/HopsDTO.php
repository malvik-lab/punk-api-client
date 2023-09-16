<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class HopsDTO
{
    public function __construct(
        public string $name,
        public AmountDTO $amount,
        public string $add,
        public string $attribute
    ) {
    }
}
