<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Entity\Factory;

use StocksApiBundles\MessageClient\Entity\Job;

/**
 * Class JobFactory.
 */
class JobFactory extends AbstractFactory
{
    /**
     * @param TagAwareCacheInterface $jobCache
     *
     * @return Job
     */
    public static function create(): Job
    {
        return new Job();
    }
}
