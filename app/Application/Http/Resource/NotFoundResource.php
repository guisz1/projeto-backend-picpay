<?php

declare(strict_types=1);

namespace Application\Http\Resource;

use Application\Constants\ErrorCode;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\Resource\Json\JsonResource;
use Hyperf\Resource\Response\Response;
use Psr\Http\Message\ResponseInterface;

class NotFoundResource extends JsonResource
{
    public ?string $wrap = null;

    public function toArray(): array
    {
        return [];
    }

    public function toResponse(): ResponseInterface
    {
        return (new Response($this))
            ->toResponse()
            ->withBody(new SwooleStream(''))
            ->withStatus(ErrorCode::NOT_FOUND);
    }
}
