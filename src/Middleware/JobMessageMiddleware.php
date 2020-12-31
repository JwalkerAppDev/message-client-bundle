<?php


namespace StocksApiBundles\MessageClient\Middleware;

use App\Entity\Manager\JobEntityManager;
use StocksApiBundles\MessageClient\Service\JobService;
use StocksApiBundles\MessageClient\Stamp\JobStamp;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Middleware\StackInterface;
use Symfony\Component\Messenger\Stamp\ReceivedStamp;

/**
 * Class JobMessageMiddleware.
 */
class JobMessageMiddleware extends AbstractMessageMiddleware
{
    /**
     * @var JobEntityManager
     */
    private $jobEntityManager;

    /**
     * @var
     */
    private $jobService;

    /**
     * JobMessageMiddleware constructor.
     *
     * @param JobService       $jobService
     * @param JobEntityManager $jobEntityManager
     */
    public function __construct(JobService $jobService, JobEntityManager $jobEntityManager)
    {
        $this->jobEntityManager = $jobEntityManager;
        $this->jobService;
    }

    /**
     * @param Envelope       $envelope
     * @param StackInterface $stack
     *
     * @return Envelope
     */
    public function handle(Envelope $envelope, StackInterface $stack): Envelope
    {

        if(null !== $envelope->last(ReceivedStamp::class)) {
            $envelope = $envelope->with(new JobStamp());
        }
        return $stack->next()->handle($envelope, $stack);
    }
}