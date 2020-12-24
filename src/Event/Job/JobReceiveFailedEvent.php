<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\Job;

use StocksApiBundles\MessageClient\Event\AbstractJobFailedEvent;

/**
 * Class JobReceivedFailedEvent.
 */
class JobReceiveFailedEvent extends AbstractJobFailedEvent
{
    use JobFailedEventTrait;

    const EVENT_NAME = 'job.receive';
}
