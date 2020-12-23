<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Exception;

class InvalidCredentials extends Exception
{
    const MESSAGE = 'invalid credentials';
}
