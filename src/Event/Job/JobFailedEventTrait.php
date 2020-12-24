<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Event\Job;

use StocksApiBundles\MessageClient\Entity\Job;
use StocksApiBundles\MessageClient\Entity\JobItem;

/**
 * Trait JobEventTrait.
 */
trait JobFailedEventTrait
{
    /**
     * @var Job|null
     */
    protected $job;

    /**
     * @var JobItem|null
     */
    protected $jobItem;

    /**
     * @var array|null
     */
    protected $jobMessage;

    /**
     * @return Job|null
     */
    public function getJob(): ?Job
    {
        return $this->job;
    }

    /**
     * @return JobItem|null
     */
    public function getJobItem(): ?JobItem
    {
        return $this->jobItem;
    }

    /**
     * @return array
     */
    public function getJobMessage(): array
    {
        return $this->jobMessage;
    }
}
