<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\Event\Job;

use StocksApiBundles\MessageClient\Event\AbstractJobEvent;

/**
 * Class JobReceivedEvent.
 */
class JobReceivedEvent extends AbstractJobEvent
{
    const EVENT_NAME = 'job.received';
}
