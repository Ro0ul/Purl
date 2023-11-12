<?php declare(strict_types=1);

namespace Roul\Purl\Http\Response;
/**
 * [The Response Interface that defines the structure of the Response Class]
 */
interface ResponseInterface
{
    public function getBody(): string;

    public function getHeaders(): array;

    public function getStatusCode(): int;
}