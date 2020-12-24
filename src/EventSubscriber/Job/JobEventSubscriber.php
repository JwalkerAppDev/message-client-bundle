<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Job\EventSubscriber;

use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use StocksApiBundles\MessageClient\Constants\Transport\JobConstants;
use StocksApiBundles\MessageClient\Event\Job\JobCancelledEvent;
use StocksApiBundles\MessageClient\Event\Job\JobCompleteEvent;
use StocksApiBundles\MessageClient\Event\Job\JobCreatedEvent;
use StocksApiBundles\MessageClient\Event\Job\JobIncompleteEvent;
use StocksApiBundles\MessageClient\Event\Job\JobInitiatedEvent;
use StocksApiBundles\MessageClient\Event\Job\JobInProgressEvent;
use StocksApiBundles\MessageClient\Event\Job\JobProcessedEvent;
use StocksApiBundles\MessageClient\Event\Job\JobReceivedEvent;

/**
 * Class JobEventSubscriber.
 */
class JobEventSubscriber extends AbstractJobEventSubscriber
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            JobCancelledEvent::getEventName() => [
                [
                    'cancelled',
                ],
            ],
            JobCompleteEvent::getEventName() => [
                [
                    'complete',
                ],
            ],
            JobCreatedEvent::getEventName() => [
                [
                    'created',
                ],
            ],
            JobIncompleteEvent::getEventName() => [
                [
                    'inComplete',
                ],
            ],
            JobInitiatedEvent::getEventName() => [
                [
                    'initiated',
                ],
            ],
            JobInProgressEvent::getEventName() => [
                [
                    'inProgress',
                ],
            ],
            JobProcessedEvent::getEventName() => [
                [
                    'processed',
                ],
            ],
            JobReceivedEvent::getEventName() => [
                [
                    'received',
                ],
            ],
        ];
    }

    /**
     * @param JobCancelledEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function cancelled(JobCancelledEvent $event)
    {
        $this->updateJobStatus($event, JobConstants::JOB_CANCELLED);
    }

    /**
     * @param JobCompleteEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function complete(JobCompleteEvent $event)
    {
        if ($this->jobService->hasFailedJobs($event->getJob())) {
            $this->dispatch(new JobIncompleteEvent($event->getJob()));
        } else {
            $this->updateJobStatus($event, JobConstants::JOB_COMPLETE);
        }
    }

    /**
     * @param JobCreatedEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function created(JobCreatedEvent $event)
    {
        $this->updateJobStatus($event, JobConstants::JOB_PENDING);
    }

    /**
     * @param JobIncompleteEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function inComplete(JobIncompleteEvent $event)
    {
        $this->updateJobStatus($event, JobConstants::JOB_INCOMPLETE);
    }

    /**
     * @param JobInitiatedEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function initiated(JobInitiatedEvent $event)
    {
        $this->updateJobStatus($event, JobConstants::JOB_INITIATED);
    }

    /**
     * @param JobInProgressEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function inProgress(JobInProgressEvent $event)
    {
        $this->updateJobStatus($event, JobConstants::JOB_IN_PROGRESS);
    }

    /**
     * @param JobProcessedEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function processed(JobProcessedEvent $event)
    {
        $this->updateJobStatus($event, JobConstants::JOB_PROCESSED);
    }

    /**
     * @param JobReceivedEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function received(JobReceivedEvent $event)
    {
        $this->updateJobStatus($event, JobConstants::JOB_RECEIVED);
    }
}
