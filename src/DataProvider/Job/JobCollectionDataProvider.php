<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\DataProvider\Job;

use ApiPlatform\Core\DataProvider\ContextAwareCollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use StocksApiBundles\MessageClient\Entity\Job;
use StocksApiBundles\MessageClient\Entity\Manager\JobEntityManager;
use StocksApiBundles\MessageClient\Service\JobService;
use Doctrine\ORM\EntityManagerInterface;

class JobCollectionDataProvider implements ContextAwareCollectionDataProviderInterface, RestrictedDataProviderInterface
{
    const RESOURCE_CLASS = Job::class;
    const OPERATION_NAME = 'get';

    /**
     * @var JobEntityManager
     */
    private $entityManager;

    /**
     * @var JobService
     */
    private $jobService;

    /**
     * JobCollectionDataProvider constructor.
     *
     * @param JobEntityManager $entityManager
     * @param JobService       $jobService
     */
    public function __construct(
        JobEntityManager $entityManager,
        JobService $jobService
    ) {
        $this->entityManager = $entityManager;
        $this->jobService = $jobService;
    }

    /**
     * @param string      $resourceClass
     * @param string|null $operationName
     * @param array       $context
     *
     * @return bool
     */
    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return self::RESOURCE_CLASS === $resourceClass && self::OPERATION_NAME === $operationName;
    }

    /**
     * @param string      $resourceClass
     * @param string|null $operationName
     * @param array       $context
     *
     * @return iterable|void
     */
    public function getCollection(string $resourceClass, string $operationName = null, array $context = []): iterable
    {
        $jobs = $this->entityManager->findAll();

        foreach ($jobs as $job) {
            $this->jobService->calculateJobPercentageComplete($job);
        }

        return $jobs;
    }
}
