<?php

namespace MalvikLab\PunkApiClient\Interfaces;

interface ClientInterface
{
    public function beers(int $page, int $perPage): array;

    public function beersWithPagination(int $page, int $perPage);

    public function beer(int $id);

    public function randomBeer();
}