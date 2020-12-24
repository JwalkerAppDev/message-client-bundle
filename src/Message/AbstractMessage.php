<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Message;

/**
 * Class AbstractMessage.
 */
abstract class AbstractMessage
{
    /**
     * @var string
     */
    private $message;

    /**
     * AbstractMessage constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
