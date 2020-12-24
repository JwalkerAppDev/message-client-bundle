<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\MessageHandler;

use Doctrine\Persistence\ManagerRegistry;
use StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message\EntityMessageAwareInterface;
use StocksApiBundles\MessageClient\Entity\Interfaces\EntityInterface;

/**
 * Interface EntityMessageHandlerInterface.
 */
interface EntityMessageHandlerInterface
{
    /**
     * @return ManagerRegistry
     */
    public function getManagerRegistry(): ManagerRegistry;

    /**
     * @param ManagerRegistry $managerRegistry
     *
     * @return EntityMessageHandlerInterface
     */
    public function setManagerRegistry(ManagerRegistry $managerRegistry): EntityMessageHandlerInterface;

    /**
     * @param EntityMessageAwareInterface $entityMessage
     * @param array                       $criteria
     *
     * @return EntityInterface|null
     */
    public function findEntity(EntityMessageAwareInterface $entityMessage, $criteria = []): ?EntityInterface;
}
