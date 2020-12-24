<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\Job;

use StocksApiBundles\MessageClient\Event\AbstractJobFailedEvent;

class JobCancelFailedEvent extends AbstractJobFailedEvent
{
    const EVENT_NAME = 'job.cancel';
}
