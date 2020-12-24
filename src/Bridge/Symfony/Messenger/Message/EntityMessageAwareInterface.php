<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message;

use Ramsey\Uuid\UuidInterface;

/**
 * Interface EntityMessageAwareInterface.
 */
interface EntityMessageAwareInterface extends MessageAwareInterface
{
    /**
     * @return string
     */
    public function getEntityClass(): string;

    /**
     * @param string $entityClass
     *
     * @return EntityMessageAwareInterface
     */
    public function setEntityClass(string $entityClass): EntityMessageAwareInterface;

    /**
     * @return UuidInterface
     */
    public function getEntityIdentifier(): UuidInterface;

    /**
     * @param UuidInterface $entityIdentifier
     *
     * @return EntityMessageAwareInterface
     */
    public function setEntityIdentifier(UuidInterface $entityIdentifier): EntityMessageAwareInterface;
}
