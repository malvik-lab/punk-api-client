<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class IngredientsDTO
{
	/**
     * @param MaltDTO[] $malt
     * @param HopsDTO[] $hops
     */
	public function __construct(
    public array $malt,
    public array $hops,
    public null | string $yeast
    ) {
    }
}
