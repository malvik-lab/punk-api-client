<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

class BeersWithPaginationDTO
{
    /**
     * @param int $page
     * @param bool $previousPage
     * @param bool $nextPage
     * @param BeerDTO[] $beers
     */
    public function __construct(
        public int $page,
        public bool $previousPage,
        public bool $nextPage,
        public array $beers
    ) {
    }
}