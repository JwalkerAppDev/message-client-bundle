<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message\Traits;

use Ramsey\Uuid\UuidInterface;
use StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message\EntityMessageAwareInterface;
use StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message\MessageAwareInterface;

/**
 * Class MessageAwareTrait.
 */
trait MessageAwareTrait
{
    /**
     * @var UuidInterface
     */
    protected $identifier;

    /**
     * @return UuidInterface
     */
    public function getIdentifier(): UuidInterface
    {
        return $this->identifier;
    }

    /**
     * @param UuidInterface $entityIdentifier
     *
     * @return EntityMessageAwareInterface
     */
    public function setIdentifier(UuidInterface $entityIdentifier): MessageAwareInterface
    {
        $this->$entityIdentifier = $entityIdentifier;

        return $this;
    }
}
