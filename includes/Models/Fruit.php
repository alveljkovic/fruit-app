<?php

namespace MassdataFruits\Models;

use MassdataFruits\Interfaces\FruitInterface;
use InvalidArgumentException;

class Fruit implements FruitInterface
{
    /**
     * Fruit color
     *
     * @var string
     */
    protected string $color;

    /**
     * Fruit volume
     *
     * @var float
     */
    protected float $volume;

    public function __construct(string $color, float $volume)
    {
        if ($volume <= 0) {
            throw new InvalidArgumentException("Fruit volume must be greater than zero");
        }

        $this->color = $color;
        $this->volume = $volume;
    }

    /**
     * Fetch fruit color
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Fetch fruit volume
     *
     * @return float
     */
    public function getVolume(): float
    {
        return $this->volume;
    }

    /**
     * Check if fruit is juiceable
     *
     * @return boolean
     */
    public function isJuiceable(): bool
    {
        return true;
    }

    /**
     * Get fruit juice yield
     *
     * @return float
     */
    public function getJuiceYield(): float
    {
        return $this->volume * 0.5;
    }
}
