<?php

namespace MassdataFruits\Components;

use MassdataFruits\Interfaces\JuicerStrainerInterface;
use MassdataFruits\Interfaces\FruitInterface;
use MassdataFruits\Exceptions\CannotJuiceException;
use MassdataFruits\Services\Log;
use MassdataFruits\Traits\FruitHelperTrait;

class JuicerStrainer implements JuicerStrainerInterface
{
    use FruitHelperTrait;

    /**
     * Get juice amount if fruit is juiceable
     *
     * @param FruitInterface $fruit
     * @return float
     */
    public function squeeze(FruitInterface $fruit): float
    {
        if (!$fruit->isJuiceable()) {
            throw new CannotJuiceException("Fruit is not juiceable.");
        }

        $juiceAmount = $fruit->getJuiceYield();

        $type = $this->getClassName($fruit);
        Log::info("Juicer: {$type} (volume: {$fruit->getVolume()}L). total: " . $juiceAmount . "L juice.");

        return $juiceAmount;
    }
}
