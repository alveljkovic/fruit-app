<?php

namespace MassdataFruits\Factories;

use MassdataFruits\Models\Apple;
use MassdataFruits\Interfaces\FruitInterface;
use MassdataFruits\Interfaces\FruitFactoryInterface;

class AppleFactory implements FruitFactoryInterface
{
    /**
     * Creates radnom apple
     *
     * @return FruitInterface
     */
    public static function createRandom(): FruitInterface
    {
        // Random apple volume
        $volume = mt_rand(10, 50) / 10;

        // Random apple color
        $colors = ['Red', 'Green', 'Yellow'];
        $color = $colors[array_rand($colors)];

        // 20% chance of being rotten
        $isRotten = (mt_rand(1, 10) <= 2);

        return new Apple($color, $volume, $isRotten);
    }

    /**
     * Creates apple object
     *
     * @param float $volume
     * @param string $color
     * @param boolean $isRotten
     * @return FruitInterface
     */
    public static function create(float $volume, string $color, bool $isRotten = false): FruitInterface
    {
        return new Apple($color, $volume, $isRotten);
    }
}
