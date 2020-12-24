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
 * Trait EntityMessageHandlerTrait.
 */
trait EntityMessageHandlerTrait
{
    /**
     * @var ManagerRegistry
     */
    protected $managerRegistry;

    /**
     * @return ManagerRegistry
     */
    public function getManagerRegistry(): ManagerRegistry
    {
        return $this->managerRegistry;
    }

    /**
     * @param ManagerRegistry $managerRegistry
     *
     * @return EntityMessageHandlerTrait
     */
    public function setManagerRegistry(ManagerRegistry $managerRegistry): EntityMessageHandlerTrait
    {
        $this->managerRegistry = $managerRegistry;

        return $this;
    }

    /**
     * @param EntityMessageAwareInterface $entityMessage
     * @param array                       $criteria
     *
     * @return EntityInterface|null
     */
    public function findEntity(EntityMessageAwareInterface $entityMessage, $criteria = []): ?EntityInterface
    {
        $criteria = ['guid' => $entityMessage->getEntityIdentifier()];

        return $this->getManagerRegistry()->getRepository($entityMessage->getEntityClass())->findOneBy($criteria);
    }
}
