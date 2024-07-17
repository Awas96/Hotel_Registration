<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FinishRequestEvent;
use Symfony\Component\HttpKernel\Exception\TooManyRequestsHttpException;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\RateLimiter\RateLimiterFactory;

final class RequestRateLimiterEventListener
{

    public function __construct(
        private readonly RateLimiterFactory $anonymousApiLimiter
    )
    {
    }

    #[AsEventListener(event: KernelEvents::FINISH_REQUEST)]
    public function onKernelFinishRequest(FinishRequestEvent $event): void
    {
        $request = $event->getRequest();
        $limiter = $this->anonymousApiLimiter->create($request->getClientIp());

        $limiter->reserve(1)->wait();

    }
}
