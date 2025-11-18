<?php

namespace MassdataFruits\Traits;

use MassdataFruits\Interfaces\FruitInterface;
use MassdataFruits\Models\Apple;

trait FruitHelperTrait
{
    /**
     * Get object short name
     *
     * @param object $object
     * @return string
     */
    public function getClassName(object $object): string
    {
        return (new \ReflectionClass($object))->getShortName();
    }
}
