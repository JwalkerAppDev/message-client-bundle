<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Entity;

use StocksApiBundles\MessageClient\Entity\Interfaces\EntityGuidInterface;
use StocksApiBundles\MessageClient\Entity\Traits as Traits;

class AbstractGuidEntity extends AbstractDefaultEntity implements EntityGuidInterface
{
    use Traits\EntityGuidTrait;
}
