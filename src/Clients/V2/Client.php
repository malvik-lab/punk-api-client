<?php

namespace MalvikLab\PunkApiClient\Clients\V2;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use MalvikLab\PunkApiClient\Clients\AbstractClient;
use MalvikLab\PunkApiClient\Clients\V2\DTO\BeersWithPaginationDTO;
use MalvikLab\PunkApiClient\Utils\StringUtil;
use MalvikLab\PunkApiClient\Exceptions\InvalidInputException;
use MalvikLab\PunkApiClient\Exceptions\ElementNotFoundException;
use MalvikLab\PunkApiClient\Clients\V2\Makers\BeerMaker;
use MalvikLab\PunkApiClient\Clients\V2\DTO\BeerDTO;

class Client extends AbstractClient
{
    public function __construct(private null | HttpClient $httpClient = null)
    {
        if ( is_null($httpClient) )
        {
            $this->httpClient = new HttpClient();
        }
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return BeerDTO[]
     * @throws GuzzleException
     * @throws InvalidInputException
     */
    public function beers(int $page = 1, int $perPage = 25): array
    {
        if ( !filter_var($page, FILTER_VALIDATE_INT) || $page < 1 )
        {
            throw new InvalidInputException(
                StringUtil::exception('Requested Page is invalid')
            );
        }

        if ( !filter_var($perPage, FILTER_VALIDATE_INT) || $perPage < 1 )
        {
            throw new InvalidInputException(
                StringUtil::exception('Requested Per Page is invalid')
            );
        }

        $beers = [];

        $res = $this->httpClient->get(StringUtil::url('/v2/beers', [
            'page' => $page,
            'per_page' => $perPage
        ]));

        $items = json_decode($res->getBody(), true);

        foreach ( $items as $item )
        {
            $beers[] = BeerMaker::make($item);
        }

        return $beers;
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return BeersWithPaginationDTO
     * @throws GuzzleException
     * @throws InvalidInputException
     */
    public function beersWithPagination(int $page = 1, int $perPage = 25): BeersWithPaginationDTO
    {
        if ( !filter_var($page, FILTER_VALIDATE_INT) || $page < 1 )
        {
            throw new InvalidInputException(
                StringUtil::exception('Requested Page is invalid')
            );
        }

        if ( !filter_var($perPage, FILTER_VALIDATE_INT) || $perPage < 1 )
        {
            throw new InvalidInputException(
                StringUtil::exception('Requested Per Page is invalid')
            );
        }

        $previousPage = false;
        $nextPage = false;

        if ( $page > 1 )
        {
            $previousPage = true;
        }

        if ( count($this->beers($page + 1, $perPage)) > 0 )
        {
            $nextPage = true;
        }

        return new BeersWithPaginationDTO(
            $page,
            $previousPage,
            $nextPage,
            $this->beers($page, $perPage)
        );
    }

    /**
     * @param int $id
     * @return BeerDTO
     * @throws GuzzleException
     * @throws ElementNotFoundException
     * @throws InvalidInputException
     */
    function beer(int $id): BeerDTO
    {
        if ( !filter_var($id, FILTER_VALIDATE_INT) || $id < 1 )
        {
            throw new InvalidInputException(
                StringUtil::exception('Requested Id is invalid')
            );
        }

        $res = $this->httpClient->get(StringUtil::url('/v2/beers/' . $id));
        $data = json_decode($res->getBody(), true);

        if ( count($data) < 1 )
        {
            throw new ElementNotFoundException(
                StringUtil::exception('Element not found')
            );
        }

        return BeerMaker::make($data[0]);
    }

    /**
     * @return BeerDTO
     * @throws GuzzleException
     */
    public function randomBeer(): BeerDTO
    {
        $res = $this->httpClient->get(StringUtil::url('/v2/beers/random'));
        $data = json_decode($res->getBody(), true);

        return BeerMaker::make($data[0]);
    }
}