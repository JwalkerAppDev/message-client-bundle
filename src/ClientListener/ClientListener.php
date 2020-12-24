<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\ClientListener;

use React\Promise\ExtendedPromiseInterface as Promise;
use StocksApiBundles\MessageClientProtocol\Packet;

/**
 * Interface ClientListener.
 */
interface ClientListener
{
    const TAG = 'stocks-api.message-client.client-listener';

    /**
     * @return mixed
     */
    public function getSubscribedTopics();

    /**
     * @return mixed
     */
    public function getExchangeName();

    /**
     * @param Packet  $packet
     * @param Channel $channel
     *
     * @return Promise
     */
    public function consume(Packet $packet, Channel $channel): Promise;
}
