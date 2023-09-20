<?php declare(strict_types=1);

namespace Tests\Integration;

use MalvikLab\PunkApiClient\Client;
use MalvikLab\PunkApiClient\Clients\V2\Client as ClientV2;
use MalvikLab\PunkApiClient\Clients\V2\DTO\BeersWithPaginationDTO;
use MalvikLab\PunkApiClient\Exceptions\InvalidClientVersionException;
use MalvikLab\PunkApiClient\Exceptions\ElementNotFoundException;
use MalvikLab\PunkApiClient\Exceptions\ValidationException;
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
     * @throws ValidationException
     */
    public function testInvalidPage(): void
    {
        $this->expectException(ValidationException::class);
        $this->client->beers(0);
    }

    /**
     * @return void
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function testInvalidPerPage(): void
    {
        $this->expectException(ValidationException::class);
        $this->client->beers(1, 0);
    }

    /**
     * @throws GuzzleException
     * @throws ValidationException
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
     * @throws ValidationException
     */
    public function testWithPaginationInvalidPage()
    {
        $this->expectException(ValidationException::class);
        $this->client->beersWithPagination(0);
    }

    /**
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function testWithPaginationInvalidPerPage()
    {
        $this->expectException(ValidationException::class);
        $this->client->beersWithPagination(mt_rand(1, 5), 0);
    }

    /**
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function testWithPagination()
    {
        $data = $this->client->beersWithPagination(mt_rand(1, 5));
        $this->assertInstanceOf(BeersWithPaginationDTO::class, $data);
    }

    /**
     * @return void
     * @throws ElementNotFoundException
     * @throws GuzzleException
     * @throws ValidationException
     */
    public function testInvalidBeer(): void
    {
        $this->expectException(ValidationException::class);
        $beer = $this->client->beer(0);
    }

    /**
     * @return void
     * @throws ElementNotFoundException
     * @throws GuzzleException
     * @throws ValidationException
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