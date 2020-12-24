<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Exception;

class InvalidPacket extends Exception
{
    const MESSAGE = 'invalid packet';
}
