<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'ean' => $faker->unique()->ean13,
        'naam' => $faker->word,
        'merk' => $faker->word,
        'foto' => 'https://static.ah.nl/image-optimization/static/product/AHI_434d50313631353231_2_LowRes_JPG.JPG',
        'prijs' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 20),
        'btw_id' => 1,
        'categorie_id' => 1,
        'gewicht' => $faker->numberBetween($nbDigits = NULL, $min, 100, $max = 1000),
        'aantal' => 0,
        'korteomschrijving' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'omschrijving' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'ingredienten' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'allergieinfo' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'kenmerken' => 'Vegan',
        'gebruik' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'bewaren' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'oorsprong' => $faker->country,
        'voorraadcode' => '111'
    ];
});
