<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class MethodDTO
{
    /**
     * @param MashTempDTO[] $mashTemp
     */
    public function __construct(
        public array $mash_temp,
        public FermentationDTO $fermentation,
        public null | string $twist
    ) {
    }
}
