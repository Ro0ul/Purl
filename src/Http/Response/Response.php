<?php declare(strict_types=1);

namespace Roul\Purl\Http\Response;

/**
 * [Response Class]
 */
class Response implements ResponseInterface
{
    protected $statusCode;
    protected $headers = [];
    protected $body;

    public function __construct(
        private string $response
    ){
        [$header, $body] = explode("\r\n\r\n", $this->response, 2);

        $this->body = $body;
        foreach (explode("\r\n", $header) as $i => $line)
        if ($i === 0)
            $headers['http_code'] = $line;
        else
        {
            list ($key, $value) = explode(': ', $line);

            $headers[$key] = $value;
        }
        $this->headers = $headers;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

}