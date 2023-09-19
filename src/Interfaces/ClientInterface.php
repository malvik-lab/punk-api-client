<?php

namespace MalvikLab\PunkApiClient\Interfaces;

interface ClientInterface
{
    /**
     * @param int $page
     * @param int $perPage
     * @return array
     */
    public function beers(int $page, int $perPage): array;

    /**
     * @param int $page
     * @param int $perPage
     * @return mixed
     */
    public function beersWithPagination(int $page, int $perPage): mixed;

    /**
     * @param int $id
     * @return mixed
     */
    public function beer(int $id): mixed;

    /**
     * @return mixed
     */
    public function randomBeer(): mixed;
}