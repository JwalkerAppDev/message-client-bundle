<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Message;

/**
 * Class AbstractSmsMessage.
 */
class AbstractSmsMessage extends AbstractMessage
{
    /**
     * @var string
     */
    protected $recipient;

    /**
     * AbstractSmsMessage constructor.
     *
     * @param string $recipient
     * @param string $message
     */
    public function __construct(string $recipient, string $message)
    {
        $this->recipient = $recipient;

        parent::__construct($message);
    }
}
