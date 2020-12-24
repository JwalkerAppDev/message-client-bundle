<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\Job;

use StocksApiBundles\MessageClient\Event\AbstractJobFailedEvent;

/**
 * Class JobPublishFailedEvent.
 */
class JobPublishFailedEvent extends AbstractJobFailedEvent
{
    const EVENT_NAME = 'job.publish';
}
