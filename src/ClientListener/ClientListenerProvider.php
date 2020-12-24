<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\ClientListener;

/**
 * Interface ClientListenerProvider.
 */
interface ClientListenerProvider
{
    /**
     * @return mixed
     */
    public function registerListeners();

    /**
     * @return array
     */
    public function getListeners(): array;
}
