<?php

namespace MassdataFruits\Interfaces;

interface FruitFactoryInterface
{
    /**
     * Creates random fruit
     *
     * @return FruitInterface
     */
    public static function createRandom(): FruitInterface;

    /**
     * Creates defined fruit
     *
     * @param float $volume
     * @param string $color
     * @param boolean $isRotten
     * @return FruitInterface
     */
    public static function create(float $volume, string $color, bool $isRotten = false): FruitInterface;
}
