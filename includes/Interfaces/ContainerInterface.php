<?php

namespace MassdataFruits\Interfaces;

use MassdataFruits\Interfaces\FruitInterface;
use MassdataFruits\Exceptions\ContainerFullException;

interface ContainerInterface
{
    /**
     * Adding fruit into container
     *
     * @throws ContainerFullException
     */
    public function addFruit(FruitInterface $fruit): void;

    /**
     * Get fruit count from the container
     *
     * @return integer
     */
    public function getFruitCount(): int;

    /**
     * Get conainer capacity
     *
     * @return float
     */
    public function getCapacity(): float;

    /**
     * Get free space available
     *
     * @return float
     */
    public function getSpaceLeft(): float;

    /**
     * Fetching fruit from the container
     *
     * @return FruitInterface
     */
    public function takeFruit(): FruitInterface;
}
