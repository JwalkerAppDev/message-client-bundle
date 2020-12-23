<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Protocol;

/**
 * Interface FrameType.
 */
interface FrameType
{
    /**
     * @return string
     */
    public function getType(): string;

    /**
     * @return mixed
     */
    public function __toString();

    /**
     * @return mixed
     */
    public function toString();
}
