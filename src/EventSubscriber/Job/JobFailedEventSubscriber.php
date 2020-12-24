<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Job\EventSubscriber;

use StocksApiBundles\MessageClient\EventSubscriber\AbstractJobEventSubscriber;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use StocksApiBundles\MessageClient\Constants\JobConstants;
use StocksApiBundles\MessageClient\Entity\Job;
use StocksApiBundles\MessageClient\Event\Job\AbstractJobFailedEvent;
use StocksApiBundles\MessageClient\Event\Job\JobInitiateFailedEvent;
use StocksApiBundles\MessageClient\Event\Job\JobProcessFailedEvent;
use StocksApiBundles\MessageClient\Event\Job\JobPublishFailedEvent;
use StocksApiBundles\MessageClient\Event\Job\JobReceiveFailedEvent;

/**
 * Class JobFailedEventSubscriber.
 */
class JobFailedEventSubscriber extends AbstractJobEventSubscriber
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            JobInitiateFailedEvent::getEventName() => [
                [
                    'initiate',
                ],
            ],
            JobReceiveFailedEvent::getEventName() => [
                [
                    'receive',
                ],
            ],
            JobProcessFailedEvent::getEventName() => [
                [
                    'process',
                ],
            ],
            JobPublishFailedEvent::getEventName() => [
                [
                    'publish',
                ],
            ],
        ];
    }

    public function initiate(JobInitiateFailedEvent $event)
    {
    }

    /**
     * @param JobReceiveFailedEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function receive(JobReceiveFailedEvent $event)
    {
        $job = $event->getJob();

        if (!$job instanceof Job) {
            $jobMessage = $event->getJobMessage();
            /** @var Job $job */
            $job = $this->jobEntityService
                ->getEntityManager()
                ->getRepository(Job::class)
                ->findOneBy(['guid' => $jobMessage['guid']]);
            $event->setJob($job);
        }

        $this->updateJobStatus($event, JobConstants::JOB_FAILED);
        $this->setJobErrorData($event);
        $this->logError($event);
    }

    /**
     * @param JobProcessFailedEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function process(JobProcessFailedEvent $event)
    {
        $job = $event->getJob();
        $this->setJobErrorData($event);
        $this->logError($event);
    }

    /**
     * @param JobPublishFailedEvent $event
     */
    public function publish(JobPublishFailedEvent $event)
    {
        $this->setJobErrorData($event);
        $this->logError($event);
    }

    /**
     * @param AbstractJobFailedEvent $event
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    protected function setJobErrorData(AbstractJobFailedEvent $event): void
    {
        $exception = $event->getException();
        $job = $event->getJob()
            ->setErrorMessage($exception->getMessage())
            ->setErrorTrace($exception->getTraceAsString())
            ->setStatus(JobConstants::JOB_FAILED);
        $this->jobEntityService->save($job);
    }
}
