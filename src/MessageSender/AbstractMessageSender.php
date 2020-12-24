<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\MessageSender;

use Symfony\Component\Messenger\Transport\Sender\SenderInterface;

/**
 * Class AbstractMessageSender.
 */
abstract class AbstractMessageSender implements SenderInterface
{
}
