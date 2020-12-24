<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\JobItem;

use StocksApiBundles\MessageClient\Event\AbstractJobItemEvent;
use StocksApiBundles\MessageClient\Event\Job\JobEventTrait;

class JobItemCancelledEvent extends AbstractJobItemEvent
{
    use JobEventTrait;

    const EVENT_NAME = 'job-item.cancelled';
}
