<?php

namespace MalvikLab\PunkApiClient\Clients\V2\Makers;

use MalvikLab\PunkApiClient\Clients\V2\DTO\AmountDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\BeerDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\BoilVolumeDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\FermentationDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\HopsDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\IngredientsDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\MaltDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\MashTempDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\MethodDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\TempDTO;
use MalvikLab\PunkApiClient\Clients\V2\DTO\VolumeDTO;

class BeerMaker
{
    public function __construct()
    {
    }

    public static function make(array $data): BeerDTO
    {
        $volumeDTO = new VolumeDTO(
            $data['volume']['value'],
            $data['volume']['unit']
        );

        $boilVolumeDTO = new BoilVolumeDTO(
            $data['boil_volume']['value'],
            $data['boil_volume']['unit']
        );

        $mashTempDTO = [];
        foreach ( $data['method']['mash_temp'] as $mashTemp )
        {

            $mashTempDTO[] = new MashTempDTO(
                new TempDTO(
                    $mashTemp['temp']['value'],
                    $mashTemp['temp']['unit']
                ),
                $mashTemp['duration']
            );
        }

        $methodDTO = new MethodDTO(
            $mashTempDTO,
            new FermentationDTO(
                new TempDTO(
                    $data['method']['fermentation']['temp']['value'],
                    $data['method']['fermentation']['temp']['unit']
                )
            ),
            $data['method']['twist']
        );

        $maltDTO = [];
        foreach ( $data['ingredients']['malt'] as $m )
        {
            $maltDTO[] = new MaltDTO(
                $m['name'],
                new AmountDTO(
                    $m['amount']['value'],
                    $m['amount']['unit']
                )
            );
        }

        $hopsDTO = [];
        foreach ( $data['ingredients']['hops'] as $h )
        {
            $hopsDTO[] = new HopsDTO(
                $h['name'],
                new AmountDTO(
                    $h['amount']['value'],
                    $h['amount']['unit']
                ),
                $h['add'],
                $h['attribute']
            );
        }

        $ingredientsDTO = new IngredientsDTO(
            $maltDTO,
            $hopsDTO,
            $data['ingredients']['yeast']
        );

        return new BeerDTO(
            $data['id'],
            $data['name'],
            $data['tagline'],
            $data['first_brewed'],
            $data['description'],
            $data['image_url'],
            $data['abv'],
            $data['ibu'],
            $data['target_fg'],
            $data['target_og'],
            $data['ebc'],
            $data['srm'],
            $data['ph'],
            $data['attenuation_level'],
            $volumeDTO,
            $boilVolumeDTO,
            $methodDTO,
            $ingredientsDTO,
            $data['food_pairing'],
            $data['brewers_tips'],
            $data['contributed_by']
        );
    }
}
