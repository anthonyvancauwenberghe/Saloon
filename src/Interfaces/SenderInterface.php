<?php

namespace Sammyjo20\Saloon\Interfaces;

use Sammyjo20\Saloon\Http\MockResponse;
use GuzzleHttp\Promise\PromiseInterface;
use Sammyjo20\Saloon\Http\PendingSaloonRequest;
use Sammyjo20\Saloon\Http\Responses\SaloonResponse;

interface SenderInterface
{
    /**
     * Send the request.
     *
     * @param PendingSaloonRequest $pendingRequest
     * @param bool $asynchronous
     * @return SaloonResponse|PromiseInterface
     */
    public function sendRequest(PendingSaloonRequest $pendingRequest, bool $asynchronous = false): SaloonResponseInterface|PromiseInterface;

    /**
     * Process the response
     *
     * @param PendingSaloonRequest $pendingRequest
     * @param SaloonResponse $saloonResponse
     * @param bool $asPromise
     * @return SaloonResponse|PromiseInterface
     */
    public function handleResponse(SaloonResponse $saloonResponse, PendingSaloonRequest $pendingRequest, bool $asPromise = false): SaloonResponseInterface|PromiseInterface;

    /**
     * Handle a mock response.
     *
     * @param MockResponse $mockResponse
     * @param PendingSaloonRequest $pendingRequest
     * @param bool $asPromise
     * @return SaloonResponse|PromiseInterface
     */
    public function handleMockResponse(MockResponse $mockResponse, PendingSaloonRequest $pendingRequest, bool $asPromise = false): SaloonResponseInterface|PromiseInterface;

    /**
     * Return the base response class used to validate the custom response.
     *
     * @return string
     */
    public function getResponseClass(): string;
}