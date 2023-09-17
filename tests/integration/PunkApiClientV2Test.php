<?php declare(strict_types=1);

namespace Integration;

use MalvikLab\PunkApiClient\Client;
use MalvikLab\PunkApiClient\Clients\V2\Client as ClientV2;
use MalvikLab\PunkApiClient\Clients\V2\DTO\BeersWithPaginationDTO;
use MalvikLab\PunkApiClient\Exceptions\InvalidClientVersionException;
use MalvikLab\PunkApiClient\Exceptions\ElementNotFoundException;
use MalvikLab\PunkApiClient\Exceptions\InvalidInputException;
use MalvikLab\PunkApiClient\Interfaces\ClientInterface;
use PHPUnit\Framework\TestCase;
use GuzzleHttp\Exception\GuzzleException;
use MalvikLab\PunkApiClient\Clients\V2\DTO\BeerDTO;

final class PunkApiClientV2Test extends TestCase
{
    private ClientV2 $client;

    /**
     * @throws InvalidClientVersionException
     */
    protected function setUp(): void
    {
        $this->client = Client::make(Client::V2);
    }

    /**
     * @throws InvalidClientVersionException
     */
    public function testInvalidClientVersionViaMaker()
    {
        $this->expectException(InvalidClientVersionException::class);
        Client::make('x');
    }

    public function testClientV2()
    {
        $client = new ClientV2();
        $this->assertInstanceOf(ClientInterface::class, $client);
    }

    /**
     * @return void
     * @throws GuzzleException
     * @throws InvalidInputException
     */
    public function testInvalidPage(): void
    {
        $this->expectException(InvalidInputException::class);
        $this->client->beers(0);
    }

    /**
     * @return void
     * @throws GuzzleException
     * @throws InvalidInputException
     */
    public function testInvalidPerPage(): void
    {
        $this->expectException(InvalidInputException::class);
        $this->client->beers(1, 0);
    }

    /**
     * @throws GuzzleException
     * @throws InvalidInputException
     */
    public function testBeers(): void
    {
        $beers = $this->client->beers(mt_rand(1, 5));

        foreach ( $beers as $beer )
        {
            $this->assertInstanceOf(BeerDTO::class, $beer);
        }
    }

    /**
     * @throws GuzzleException
     * @throws InvalidInputException
     */
    public function testWithPaginationInvalidPage()
    {
        $this->expectException(InvalidInputException::class);
        $this->client->beersWithPagination(0);
    }

    /**
     * @throws GuzzleException
     * @throws InvalidInputException
     */
    public function testWithPaginationInvalidPerPage()
    {
        $this->expectException(InvalidInputException::class);
        $this->client->beersWithPagination(mt_rand(1, 5), 0);
    }

    /**
     * @throws GuzzleException
     * @throws InvalidInputException
     */
    public function testWithPagination()
    {
        $data = $this->client->beersWithPagination(mt_rand(1, 5));
        $this->assertInstanceOf(BeersWithPaginationDTO::class, $data);
    }

    /**
     * @throws GuzzleException
     * @throws InvalidInputException
     * @throws ElementNotFoundException
     */
    public function testBeer(): void
    {
        $beer = $this->client->beer(mt_rand(1, 50));

        $this->assertInstanceOf(BeerDTO::class, $beer);
    }

    /**
     * @throws GuzzleException
     */
    public function testRandomBeer(): void
    {
        $beer = $this->client->randomBeer();

        $this->assertInstanceOf(BeerDTO::class, $beer);
    }
}