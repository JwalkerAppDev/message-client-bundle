<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Protocol\FrameType;

class UnsubscribeAckType extends BaseType
{
    const TYPE = 'UNSUBSCRIBE_ACK';
}
