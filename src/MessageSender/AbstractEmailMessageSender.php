<?php

/*
 * Message Client Bundle
 */

declare(strict_types=1);

namespace StocksApiBundles\MessageClient\MessageSender;

use Symfony\Component\Mailer\MailerInterface;

/**
 * Class AbstractEmailMessageSender.
 */
abstract class AbstractEmailMessageSender extends AbstractMessageSender
{
    /**
     * @var MailerInterface
     */
    protected $mailer;

    /**
     * @var string
     */
    protected $toEmail;

    /**
     * AbstractEmailMessageSender constructor.
     *
     * @param MailerInterface $mailer
     * @param string          $toEmail
     */
    public function __construct(MailerInterface $mailer, string $toEmail)
    {
        $this->mailer = $mailer;
        $this->toEmail = $toEmail;
    }
}
