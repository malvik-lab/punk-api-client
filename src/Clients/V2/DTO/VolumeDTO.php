<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class VolumeDTO
{
    public function __construct(
        public int $value,
        public string $unit
    ) {
    }
}
