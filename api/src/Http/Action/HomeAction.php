<?php

declare(strict_types=1);

namespace App\Http\Action;

use App\Http\JsonResponse;
use Override;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use stdClass;

readonly class HomeAction implements RequestHandlerInterface
{
    #[Override] public function handle(ServerRequestInterface $request): Response
    {
        return new JsonResponse(new stdClass());
    }
}