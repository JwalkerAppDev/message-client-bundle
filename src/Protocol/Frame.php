<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Protocol;

interface Frame
{
    public function getType(): FrameType;

    public function getPacket(): Packet;

    public function toArray(): array;

    public function __toString();

    public function toString();
}
