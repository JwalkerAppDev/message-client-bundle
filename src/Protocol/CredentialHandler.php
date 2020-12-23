<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Protocol;

interface CredentialHandler
{
    public function getCredentials($token): Credentials;
}
