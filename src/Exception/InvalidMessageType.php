<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Exception;

class InvalidMessageType extends Exception
{
    const MESSAGE = 'invalid message type';
}
