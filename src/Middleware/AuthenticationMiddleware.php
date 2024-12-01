<?php

declare(strict_types=1);

namespace App\Middleware;

use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Authentication middleware
 */
class AuthenticationMiddleware implements MiddlewareInterface
{
    /**
     * Process method.
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request The request.
     * @param \Psr\Http\Server\RequestHandlerInterface $handler The request handler.
     * @return \Psr\Http\Message\ResponseInterface A response.
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $session = $request->getAttribute('session');
        $allowedRoutes = ['/', '/authentications/login'];

        if (!$session->check('User') && !in_array($request->getUri()->getPath(), $allowedRoutes)) {
            return new RedirectResponse('/');
        }

        if($session->check('User') && in_array($request->getUri()->getPath(), $allowedRoutes)){
            return new RedirectResponse('/home');
        }

        return $handler->handle($request);
    }
}
