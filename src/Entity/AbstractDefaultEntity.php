<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Entity;

use StocksApiBundles\MessageClient\Entity\Interfaces\CreatedAtInterface;
use StocksApiBundles\MessageClient\Entity\Interfaces\CreatedByInterface;
use StocksApiBundles\MessageClient\Entity\Interfaces\ModifiedAtInterface;
use StocksApiBundles\MessageClient\Entity\Interfaces\ModifiedByInterface;
use StocksApiBundles\MessageClient\Entity\Traits as Traits;

abstract class AbstractDefaultEntity extends AbstractEntity implements CreatedAtInterface, CreatedByInterface, ModifiedAtInterface, ModifiedByInterface
{
    use Traits\CreatedAtTrait;
    use Traits\CreatedByTrait;
    use Traits\DeactivatedAtTrait;
    use Traits\DeactivatedByTrait;
    use Traits\EntityIdTrait;
    use Traits\ModifiedAtTrait;
    use Traits\ModifiedByTrait;
}
