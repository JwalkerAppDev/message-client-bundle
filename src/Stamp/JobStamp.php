<?php

/*
 * Stocks Api
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\Stamp;

use Symfony\Component\Messenger\Handler\HandlerDescriptor;
use Symfony\Component\Messenger\Stamp\StampInterface;

class JobStamp implements StampInterface
{
    /**
     * @var mixed
     */
    private $result;

    /**
     * @var string
     */
    private $handlerName;

    /**
     * JobStamp constructor.
     *
     * @param        $result
     * @param string $handlerName
     */
    public function __construct($result, string $handlerName)
    {
        $this->result = $result;
        $this->handlerName = $handlerName;
    }

    /**
     * @param HandlerDescriptor $handler
     * @param mixed             $result
     *
     * @return static
     */
    public static function fromDescriptor(HandlerDescriptor $handler, $result): self
    {
        return new self($result, $handler->getName());
    }

    /**
     * @return string
     */
    public function getHandlerName(): string
    {
        return $this->handlerName;
    }

    /**
     * @return mixed
     */
    public function getResult()
    {
        return $this->result;
    }
}
