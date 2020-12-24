<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Service\Entity;

use StocksApiBundles\MessageClient\Constants\Transport\JobConstants;
use StocksApiBundles\MessageClient\Entity\AbstractEntity;
use StocksApiBundles\MessageClient\Entity\Job;
use StocksApiBundles\MessageClient\Entity\JobItem;
use StocksApiBundles\MessageClient\Helper\ValidationHelper;
use StocksApiBundles\MessageClient\MessageClient\ClientPublisher\ClientPublisher;
use StocksApiBundles\MessageClient\MessageClient\Exception\InvalidMessage;
use StocksApiBundles\MessageClient\MessageClient\Exception\PublishException;
use StocksApiBundles\MessageClient\MessageClient\Protocol\MessageFactory;
use StocksApiBundles\MessageClient\Service\DefaultTypeService;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Log\LoggerInterface;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

/**
 * Class JobItemEntityService.
 */
class JobItemEntityService extends AbstractEntityService
{
    /**
     * @var ClientPublisher
     */
    private $clientPublisher;

    /**
     * @var EventDispatcherInterface
     */
    private $dispatcher;

    /**
     * @var MessageFactory
     */
    private $messageFactory;

    /**
     * JobItemEntityService constructor.
     *
     * @param ClientPublisher          $clientPublisher
     * @param DefaultTypeService       $defaultTypeService
     * @param EntityManagerInterface   $entityManager
     * @param EventDispatcherInterface $dispatcher
     * @param MessageFactory           $messageFactory
     * @param LoggerInterface          $logger
     * @param ValidationHelper         $validator
     */
    public function __construct(
        ClientPublisher $clientPublisher,
        DefaultTypeService $defaultTypeService,
        EntityManagerInterface $entityManager,
        EventDispatcherInterface $dispatcher,
        MessageFactory $messageFactory,
        LoggerInterface $logger,
        ValidationHelper $validator
    ) {
        $this->clientPublisher = $clientPublisher;
        $this->dispatcher = $dispatcher;
        $this->messageFactory = $messageFactory;
        parent::__construct($defaultTypeService, $entityManager, $logger, $validator);
    }

    /**
     * @param     $data
     * @param Job $job
     *
     * @throws ORMException
     * @throws OptimisticLockException
     *
     * @return AbstractEntity
     */
    public function create($data, Job $job): JobItem
    {
    }

    /**
     * @param JobItem    $jobItem
     * @param \Exception $exception
     *
     *@throws OptimisticLockException
     * @throws ORMException
     *
     * @return JobItem
     */
    public function setError(JobItem $jobItem, \Exception $exception)
    {
        $jobItem
            ->setErrorMessage($exception->getMessage())
            ->setErrorTrace($exception->getTraceAsString());
        $this->save($jobItem);

        return $jobItem;
    }

    /**
     * @param JobItem $jobItem
     * @param string  $status
     *
     *@throws OptimisticLockException
     * @throws ORMException
     *
     * @return JobItem
     */
    public function setStatus(JobItem $jobItem, string $status)
    {
        $jobItem->setStatus($status);
        $this->save($jobItem);

        return $jobItem;
    }

    /**
     * @param JobItem $jobItem
     * @param array   $headers
     * @param string  $topic
     *
     * @throws PublishException
     * @throws InvalidMessage
     */
    public function publishJobItem(JobItem $jobItem, array $headers, string $topic)
    {
        $headers = array_merge($headers, [
            JobConstants::JOB_ID_HEADER_NAME => $jobItem->getJob()->getGuid()->toString(),
        ]);

        $packet = $this->messageFactory->createPacket(
            $topic,
            json_encode($jobItem->getData()),
            $headers
        );
        $this->clientPublisher->publish($packet);
    }
}
