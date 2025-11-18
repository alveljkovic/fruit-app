<?php

namespace MassdataFruits\Bootstrap;

use MassdataFruits\Services\Juicer;
use MassdataFruits\Services\Log;
use MassdataFruits\Exceptions\ContainerFullException;
use MassdataFruits\Traits\FruitHelperTrait;
use MassdataFruits\Factories\AppleFactory;

class App
{
    use FruitHelperTrait;

    /**
     * Juicer object
     *
     * @var Juicer
     */
    private Juicer $juicer;

    public function __construct(float $volume = 20.0)
    {
        $this->juicer = new Juicer($volume);
    }

    /**
     * Run fruit simulation
     *
     * @param string $fruit
     * @return void
     */
    public function run(string $fruit = 'Apple'): void
    {
        switch ($fruit) {
            case 'Apple':
                $this->runAppleSimulation();
                break;
            default:
                Log::info("--- ADD FRUIT SIMULATION METHOD ---");
                break;
        }
    }

    /**
     * Apple specific simulation
     *
     * @return void
     */
    public function runAppleSimulation(): void
    {
        // Adding initial 5 apples
        for ($i = 0; $i < 5; $i++) {
            try {
                $this->juicer->getContainer()->addFruit(AppleFactory::createRandom());
            } catch (ContainerFullException $e) {
                Log::error("Process should not be stopped: " . $e->getMessage());
                break;
            }
        }

        Log::info("--- START 100 ACTIONS ---");

        for ($i = 1; $i <= 100; $i++) {
            // Adding apple on every 9. step
            if ($i % 9 === 0) {
                try {
                    Log::info("Adding apple (action $i)...");
                    $this->juicer->getContainer()->addFruit(AppleFactory::createRandom());
                    /**
                     * We can also use
                     * $this->juicer->getContainer()->addFruit(AppleFactory::create($volume = 1.5, $color = 'Green'));
                     * if we want to add specific apple
                     */
                } catch (ContainerFullException $e) {
                    Log::error($e->getMessage());
                }
            }

            // Squeeze action
            $this->juicer->performSqueezeAction();

            // Log container status
            Log::info(sprintf(
                "STATUS: Fruits in container: %d | Free container space: %.2f L | Total juice amount: %.2f L",
                $this->juicer->getContainer()->getFruitCount(),
                $this->juicer->getContainer()->getSpaceLeft(),
                $this->juicer->getTotalJuice()
            ));
        }

        Log::info("--- SIMULATION END. Total juice squeezed: " . $this->juicer->getTotalJuice() . " L ---");
    }
}
