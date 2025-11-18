<?php

namespace MassdataFruits\Interfaces;

interface FruitInterface
{
    /**
     * Fething fruit color
     *
     * @return string
     */
    public function getColor(): string;

    /**
     * Fetching fruit volume
     *
     * @return float
     */
    public function getVolume(): float;

    /**
     * Can fruit be juiceable
     *
     * @return boolean
     */
    public function isJuiceable(): bool;

    /**
     * Fetching juice yield
     *
     * @return float
     */
    public function getJuiceYield(): float;
}
