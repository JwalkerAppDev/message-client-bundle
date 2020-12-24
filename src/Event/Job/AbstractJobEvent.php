<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\Job;

use StocksApiBundles\MessageClient\Entity\Job;
use StocksApiBundles\MessageClient\Entity\JobItem;
use StocksApiBundles\MessageClient\Event\AbstractEvent;

/**
 * Class AbstractJobEvent.
 */
class AbstractJobEvent extends AbstractEvent
{
    use JobEventTrait;

    /**
     * AbstractJobEvent constructor.
     *
     * @param JobItem $jobItem
     */
    public function __construct(Job $job, ?JobItem $jobItem = null)
    {
        $this->job = $job;
        $this->jobItem = $jobItem;
    }
}
