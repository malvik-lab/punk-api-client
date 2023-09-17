<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class FermentationDTO
{
    public function __construct(public TempDTO $temp)
    {
    }
}
