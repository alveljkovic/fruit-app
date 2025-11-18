<?php

namespace MassdataFruits\Components;

use MassdataFruits\Interfaces\ContainerInterface;
use MassdataFruits\Interfaces\FruitInterface;
use MassdataFruits\Exceptions\ContainerFullException;
use MassdataFruits\Exceptions\ContainerEmptyException;
use MassdataFruits\Services\Log;
use MassdataFruits\Models\Apple;
use MassdataFruits\Traits\FruitHelperTrait;

class FruitContainer implements ContainerInterface
{
    use FruitHelperTrait;

    /**
     * Container capacity
     *
     * @var float
     */
    private float $capacity;

    /**
     * Container filled volume
     *
     * @var float
     */
    private float $currentVolume = 0.0;

    /**
     * Fruits in container
     *
     * @var array
     */
    private array $fruits = [];

    public function __construct(float $capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * Add fruit into container
     *
     * @param FruitInterface $fruit
     * @return void
     */
    public function addFruit(FruitInterface $fruit): void
    {
        if ($this->currentVolume + $fruit->getVolume() > $this->capacity) {
            throw new ContainerFullException(
                "Container is full. Fruit volume can not be added: " . $fruit->getVolume()
            );
        }

        $this->fruits[] = $fruit;
        $this->currentVolume += $fruit->getVolume();
        $type = $this->getClassName($fruit);

        $log = "Add $type (color: {$fruit->getColor()}, volume: {$fruit->getVolume()}L). ";
        if ($fruit instanceof Apple && $fruit->isRotten()) {
            $log .= "ROTTEN!";
        }

        Log::info($log);
    }

    /**
     * Fetching fruit from the container
     *
     * @return FruitInterface
     */
    public function takeFruit(): FruitInterface
    {
        if (empty($this->fruits)) {
            throw new ContainerEmptyException("Container is empty. No fruits for juicer.");
        }
        $fruit = array_shift($this->fruits);
        $this->currentVolume -= $fruit->getVolume();

        return $fruit;
    }

    /**
     * Fruit count
     *
     * @return integer
     */
    public function getFruitCount(): int
    {
        return count($this->fruits);
    }

    /**
     * Fruit capacity
     *
     * @return float
     */
    public function getCapacity(): float
    {
        return $this->capacity;
    }

    /**
     * Fruit container free space
     *
     * @return float
     */
    public function getSpaceLeft(): float
    {
        return $this->capacity - $this->currentVolume;
    }
}
