<?php

namespace MassdataFruits\Interfaces;

use MassdataFruits\Exceptions\CannotJuiceException;

interface JuicerStrainerInterface
{
    /**
     * Squeeze fruit action
     * @throws CannotJuiceException
     */
    public function squeeze(FruitInterface $fruit): float;
}
