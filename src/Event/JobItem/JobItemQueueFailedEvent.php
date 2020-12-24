<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\JobItem;

use StocksApiBundles\MessageClient\Event\AbstractJobItemFailedEvent;

class JobItemQueueFailedEvent extends AbstractJobItemFailedEvent
{
    const EVENT_NAME = 'job-item.queue';
}
