<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\JobItem;

use StocksApiBundles\MessageClient\Event\AbstractJobItemFailedEvent;
use StocksApiBundles\MessageClient\Event\Job\JobFailedEventTrait;

/**
 * Class JobItemProcessFailedEvent.
 */
class JobItemProcessFailedEvent extends AbstractJobItemFailedEvent
{
    use JobFailedEventTrait;

    const EVENT_NAME = 'job-item.processed';
}
