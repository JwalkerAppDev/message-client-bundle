<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Exception;

class InvalidMessage extends Exception
{
    const MESSAGE = 'Invalid Message, must be json serializable.';
}
