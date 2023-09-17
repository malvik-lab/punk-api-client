# Punk Api Client

Unofficial Punk Api Client.\
You can find all the documentation on the official website: [https://www.punkapi.com](https://www.punkapi.com)


## Installation
```sh
composer require malvik-lab/punk-api-client
```

## Instantiate the client
```php
<?php

require 'vendor/autoload.php';

use MalvikLab\PunkApiClient\Makers\ClientMaker;

$client = ClientMaker::make('v2');

// or

$httpClient = new \GuzzleHttp\Client();
$client = ClientMaker::make('v2', $httpClient);
```

## Available methods

### Beers
```php
<?php

// ...

$page = 1;
$perPage = 25;
$beers = $client->beers($page, $perPage);
```

### Beers with pagination
This method works like the previous one, adding information on pagination (current page, the previous page if present and the next page if present).
```php
<?php

// ...

$page = 1;
$perPage = 25;
$data = $client->beersWithPagination($page, $perPage);
```

### Beer
```php
<?php

// ...

$beerId = 1;
$beer = $client->beer($beerId);
```

### Random beer
```php
<?php

// ...

$beer = $client->randomBeer();
```

## Output example
```php

MalvikLab\PunkApiClient\Clients\V2\DTO\BeerDTO Object
(
    [id] => 58
    [name] => Coffee Imperial Stout
    [tagline] => Beats a Cup of Joe.
    [first_brewed] => 11/2008
    [description] => This beer was released as both as "Danish Beerhouse Coffee Imperial Stout" and "BrewDog Coffee Imperial Stout". Deep, dark, roasted flavours make this a perfect Sunday brunch beer.
    [image_url] => https://images.punkapi.com/v2/58.png
    [abv] => 9
    [ibu] => 65
    [target_fg] => 1019
    [target_og] => 1080
    [ebc] => 97
    [srm] => 49
    [ph] => 4.4
    [attenuation_level] => 76
    [volume] => MalvikLab\PunkApiClient\Clients\V2\DTO\VolumeDTO Object
        (
            [value] => 20
            [unit] => litres
        )

    [boil_volume] => MalvikLab\PunkApiClient\Clients\V2\DTO\BoilVolumeDTO Object
        (
            [value] => 25
            [unit] => litres
        )

    [method] => MalvikLab\PunkApiClient\Clients\V2\DTO\MethodDTO Object
        (
            [mash_temp] => Array
                (
                    [0] => MalvikLab\PunkApiClient\Clients\V2\DTO\MashTempDTO Object
                        (
                            [temp] => MalvikLab\PunkApiClient\Clients\V2\DTO\TempDTO Object
                                (
                                    [value] => 64
                                    [unit] => celsius
                                )

                            [duration] => 90
                        )

                )

            [fermentation] => MalvikLab\PunkApiClient\Clients\V2\DTO\FermentationDTO Object
                (
                    [temp] => MalvikLab\PunkApiClient\Clients\V2\DTO\TempDTO Object
                        (
                            [value] => 19
                            [unit] => celsius
                        )

                )

            [twist] => Coffee added after boil. Aged on French oak chips., Dark muscovado sugar: 312.5g for 20mins
        )

    [ingredients] => MalvikLab\PunkApiClient\Clients\V2\DTO\IngredientsDTO Object
        (
            [malt] => Array
                (
                    [0] => MalvikLab\PunkApiClient\Clients\V2\DTO\MaltDTO Object
                        (
                            [name] => Extra Pale
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 7.5
                                    [unit] => kilograms
                                )

                        )

                    [1] => MalvikLab\PunkApiClient\Clients\V2\DTO\MaltDTO Object
                        (
                            [name] => Dark Crystal
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 0.63
                                    [unit] => kilograms
                                )

                        )

                    [2] => MalvikLab\PunkApiClient\Clients\V2\DTO\MaltDTO Object
                        (
                            [name] => Chocolate
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 0.31
                                    [unit] => kilograms
                                )

                        )

                    [3] => MalvikLab\PunkApiClient\Clients\V2\DTO\MaltDTO Object
                        (
                            [name] => Roasted Barley
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 0.31
                                    [unit] => kilograms
                                )

                        )

                )

            [hops] => Array
                (
                    [0] => MalvikLab\PunkApiClient\Clients\V2\DTO\HopsDTO Object
                        (
                            [name] => Chinook
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 25
                                    [unit] => grams
                                )

                            [add] => start
                            [attribute] => bitter
                        )

                    [1] => MalvikLab\PunkApiClient\Clients\V2\DTO\HopsDTO Object
                        (
                            [name] => Galena
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 25
                                    [unit] => grams
                                )

                            [add] => start
                            [attribute] => bitter
                        )

                    [2] => MalvikLab\PunkApiClient\Clients\V2\DTO\HopsDTO Object
                        (
                            [name] => Galena
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 25
                                    [unit] => grams
                                )

                            [add] => end
                            [attribute] => flavour
                        )

                    [3] => MalvikLab\PunkApiClient\Clients\V2\DTO\HopsDTO Object
                        (
                            [name] => First Gold
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 25
                                    [unit] => grams
                                )

                            [add] => end
                            [attribute] => flavour
                        )

                    [4] => MalvikLab\PunkApiClient\Clients\V2\DTO\HopsDTO Object
                        (
                            [name] => Coffee
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 9.4
                                    [unit] => grams
                                )

                            [add] => end
                            [attribute] => flavour
                        )

                    [5] => MalvikLab\PunkApiClient\Clients\V2\DTO\HopsDTO Object
                        (
                            [name] => Coffee
                            [amount] => MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO Object
                                (
                                    [value] => 9.4
                                    [unit] => grams
                                )

                            [add] => dry hop
                            [attribute] => aroma
                        )

                )

            [yeast] => Wyeast 1056 - American Ale™
        )

    [food_pairing] => Array
        (
            [0] => Gooey chocolate brownies
            [1] => Chicken fried steak with cheesy mash
            [2] => Spicy chicken empanadas
        )

    [brewers_tips] => Grind the coffee as if making an espresso to really get the most out of it.
    [contributed_by] => Sam Mason <samjbmason>
)

```

## Running Test
```sh
vendor/bin/phpunit tests --testdox
```