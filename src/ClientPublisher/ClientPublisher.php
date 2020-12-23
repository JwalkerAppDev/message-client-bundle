<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\ClientPublisher;

use App\MessageClient\Exception\PublishException;
use App\MessageClient\Protocol\Packet;

interface ClientPublisher
{
    /**
     * @param Packet $packet
     *
     * @throws PublishException
     *
     * @return bool|int|\React\Promise\PromiseInterface
     */
    public function publish(Packet $packet);
}
