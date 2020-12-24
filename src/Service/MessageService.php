<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Service;

use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Class MessageService.
 */
class MessageService
{
    /**
     * @var MessageBusInterface
     */
    protected $bus;

    /**
     * MessageService constructor.
     *
     * @param MessageBusInterface $bus
     */
    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }
}
