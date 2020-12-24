<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message;

use Ramsey\Uuid\UuidInterface;
use StocksApiBundles\MessageClient\Bridge\Symfony\Messenger\Message\Traits\EntityMessageAwareTrait;

/**
 * Class AbstractEntityMessage.
 */
abstract class AbstractEntityMessage extends AbstractMessage implements EntityMessageAwareInterface
{
    use EntityMessageAwareTrait {
        EntityMessageAwareTrait::__construct as private __entityMessageConstructor;
    }

    /**
     * AbstractEntityMessage constructor.
     *
     * @param string        $entityClass
     * @param UuidInterface $entityIdentitfer
     * @param UuidInterface $identifier
     */
    public function __construct(string $entityClass, UuidInterface $entityIdentitfer, UuidInterface $identifier)
    {
        $this->__entityMessageConstructor($entityClass, $entityIdentitfer);
        parent::__construct($identifier);
    }
}
