<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Protocol;

interface Credentials
{
    public function getCredentials(): array;
}
