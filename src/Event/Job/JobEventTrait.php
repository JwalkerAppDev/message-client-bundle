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
trait JobEventTrait
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
     * @return array|null
     */
    public function getJobMessage(): array
    {
        return $this->jobMessage;
    }
}
