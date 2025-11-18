<?php

namespace MassdataFruits\Models;

use MassdataFruits\Models\Fruit;

class Apple extends Fruit
{
    /**
     * Marks apple as rotten
     *
     * @var boolean
     */
    private bool $isRotten;

    public function __construct(string $color, float $volume, bool $isRotten)
    {
        parent::__construct($color, $volume);
        $this->isRotten = $isRotten;
    }

    /**
     * Check if apple is juiceable
     *
     * @return boolean
     */
    public function isJuiceable(): bool
    {
        return !$this->isRotten;
    }

    /**
     * Fetch juice yield volume
     *
     * @return float
     */
    public function getJuiceYield(): float
    {
        return $this->isRotten ? 0.0 : parent::getJuiceYield();
    }

    /**
     * Check if apple is rotten
     *
     * @return boolean
     */
    public function isRotten(): bool
    {
        return $this->isRotten;
    }
}
