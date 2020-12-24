<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message\Traits\MessageAwareTrait;

/**
 * Class AbstractMessage.
 */
abstract class AbstractMessage implements MessageAwareInterface
{
    use MessageAwareTrait;

    /**
     * AbstractMessage constructor.
     *
     * @param UuidInterface|null $identifier
     */
    public function __construct(UuidInterface $identifier = null)
    {
        $this->setIdentifier($identifier ?? Uuid::uuid4());
    }
}
