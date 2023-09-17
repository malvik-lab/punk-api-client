<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class MashTempDTO
{
    public function __construct(
        public TempDTO $temp,
        public null | int $duration
    ) {
    }
}
