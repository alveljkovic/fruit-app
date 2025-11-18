<?php

namespace MassdataFruits\Services;

use MassdataFruits\Components\FruitContainer;
use MassdataFruits\Components\JuicerStrainer;
use MassdataFruits\Exceptions\ContainerEmptyException;
use MassdataFruits\Exceptions\CannotJuiceException;
use MassdataFruits\Services\Log;

class Juicer
{
    /**
     * Fruit container object
     *
     * @var FruitContainer
     */
    private FruitContainer $container;

    /**
     * Juice strainer object
     *
     * @var JuicerStrainer
     */
    private JuicerStrainer $strainer;

    /**
     * Total juice in strainer
     *
     * @var float
     */
    private float $totalJuice = 0.0;

    public function __construct(float $containerCapacity)
    {
        $this->container = new FruitContainer($containerCapacity);
        $this->strainer = new JuicerStrainer();
        Log::info("--- JUICER STARTING (Container volume: $containerCapacity L) ---");
    }

    /**
     * Getter method for fruit container
     *
     * @return FruitContainer
     */
    public function getContainer(): FruitContainer
    {
        return $this->container;
    }

    /**
     * Getter method for total juice volume
     *
     * @return float
     */
    public function getTotalJuice(): float
    {
        return $this->totalJuice;
    }

    /**
     * Simulate fruit sqeezing action
     *
     * @return void
     */
    public function performSqueezeAction(): void
    {
        try {
            $fruit = $this->container->takeFruit();
            $juice = $this->strainer->squeeze($fruit);
            $this->totalJuice += $juice;
        } catch (ContainerEmptyException $e) {
            Log::error("ACTION SKIPPED: " . $e->getMessage());
        } catch (CannotJuiceException $e) {
            Log::error("ACTION SKIPPED: " . $e->getMessage());
        }
    }
}
