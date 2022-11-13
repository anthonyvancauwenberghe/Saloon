<?php declare(strict_types=1);

namespace Saloon\Http\Responses;

use Saloon\Repositories\ArrayStore;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\ResponseInterface;

class PsrResponse extends Response
{
    /**
     * The raw response from the sender.
     *
     * @var ResponseInterface
     */
    protected ResponseInterface $rawResponse;

    /**
     * Get the body of the response as string.
     *
     * @return string
     */
    public function body(): string
    {
        return (string)$this->stream();
    }

    /**
     * Get the body as a stream. Don't forget to close the stream after using ->close().
     *
     * @return StreamInterface
     */
    public function stream(): StreamInterface
    {
        return $this->rawResponse->getBody();
    }

    /**
     * Get the headers from the response.
     *
     * @return ArrayStore
     */
    public function headers(): ArrayStore
    {
        return new ArrayStore($this->rawResponse->getHeaders());
    }

    /**
     * Get the status code of the response.
     *
     * @return int
     */
    public function status(): int
    {
        return $this->rawResponse->getStatusCode();
    }

    /**
     * Create a PSR response from the raw response.
     *
     * @return ResponseInterface
     */
    public function getPsrResponse(): ResponseInterface
    {
        return $this->rawResponse;
    }
}