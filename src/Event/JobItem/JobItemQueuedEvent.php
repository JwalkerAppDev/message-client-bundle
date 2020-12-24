<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\JobItem;

use StocksApiBundles\MessageClient\Event\AbstractJobItemEvent;

class JobItemQueuedEvent extends AbstractJobItemEvent
{
    const EVENT_NAME = 'job-item.queued';
}
