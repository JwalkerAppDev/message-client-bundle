<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Entity\Interfaces;

interface CreatedAtInterface
{
    public function getCreatedAt(): \DateTime;

    /**
     * @return mixed
     */
    public function setCreatedAt(\DateTime $createdAt);
}
