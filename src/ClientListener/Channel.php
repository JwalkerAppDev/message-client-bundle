<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\ClientListener;

use React\Promise\ExtendedPromiseInterface as Promise;
use StocksApiBundles\MessageClientProtocol\Packet;

/**
 * Interface Channel.
 */interface Channel
{
    /**
     * @param Packet $packet
     *
     * @return Promise
     */
    public function publish(Packet $packet): Promise;

    /**
     * @param $packet
     * @param bool $multiple
     *
     * @return Promise
     */
    public function ack($packet, bool $multiple = false): Promise;

    /**
     * @param $packet
     * @param bool $multiple
     * @param bool $requeue
     *
     * @return Promise
     */
    public function nack($packet, bool $multiple = false, bool $requeue = true): Promise;

    /**
     * @param $packet
     * @param bool $requeue
     *
     * @return Promise
     */
    public function reject($packet, bool $requeue = true): Promise;
}
