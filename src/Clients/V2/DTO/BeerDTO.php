<?php

namespace MalvikLab\PunkApiClient\Clients\V2\DTO;

final readonly class BeerDTO
{
    /**
     * @param int $id
     * @param string $name
     * @param string $tagline
     * @param string $first_brewed
     * @param string $description
     * @param string|null $image_url
     * @param float $abv
     * @param float|null $ibu
     * @param float|null $target_fg
     * @param float|null $target_og
     * @param float|null $ebc
     * @param float|null $srm
     * @param float|null $ph
     * @param float|null $attenuation_level
     * @param VolumeDTO $volume
     * @param BoilVolumeDTO $boil_volume
     * @param MethodDTO $method
     * @param IngredientsDTO $ingredients
     * @param array $food_pairing
     * @param string $brewers_tips
     * @param string $contributed_by
     */
    public function __construct(
        public int $id,
        public string $name,
        public string $tagline,
        public string $first_brewed,
        public string $description,
        public null | string $image_url,
        public float $abv,
        public null | float $ibu,
        public null | float $target_fg,
        public null | float $target_og,
        public null | float $ebc,
        public null | float $srm,
        public null | float $ph,
        public null | float $attenuation_level,
        public VolumeDTO $volume,
        public BoilVolumeDTO $boil_volume,
        public MethodDTO $method,
        public IngredientsDTO $ingredients,
        public array $food_pairing,
        public string $brewers_tips,
        public string $contributed_by
    ) {
    }
}
