<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Entity\Interfaces;

interface ModifiedAtInterface
{
    /**
     * @return mixed
     */
    public function getModifiedAt(): \DateTime;

    /**
     * @return mixed
     */
    public function setModifiedAt(\DateTime $modifiedAt);
}
