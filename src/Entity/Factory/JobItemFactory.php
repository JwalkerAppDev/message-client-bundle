<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Entity\Factory;

use StocksApiBundles\MessageClient\Entity\JobItem;

class JobItemFactory extends AbstractFactory
{
    public static function create(): JobItem
    {
        return new JobItem();
    }
}
