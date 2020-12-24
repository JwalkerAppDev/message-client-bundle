<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Entity\Manager;

use StocksApiBundles\MessageClient\Entity\Job;

/**
 * Class JobEntityManager.
 */
class JobEntityManager extends AbstractEntityManager
{
    const ENTITY_CLASS = Job::class;
}
