<?php

namespace App\Services;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Http\Client\RequestException;

class ClientRequestHandler
{
    /**
     * The base URL for the API.
     */
    const BASE_URL = 'https://dummyjson.com/';

    const GET = 'get';
    const POST = 'post';
    const PUT = 'put';
    const DELETE = 'delete';
    const HEADERS =[
        'Accept' => 'application/json',
        'Access-Control-Allow-Origin' => '*',
    ];

    private $options = [];

    public function withOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

    /**
     * Make an HTTP request.
     *
     * @param string $method
     * @param string $endpoint
     * @param array $data
     *
     * @return Response
     */
    public function request(string $method, string $endpoint, array $data = []): Response
    {
        try {
            $url = $this->buildUrl($endpoint);
            return Http::withOptions($this->options)->withHeaders(self::HEADERS)->$method($url, $data);
        } catch (RequestException $e) {
            // Handle the exception (e.g., log the error, return a custom response)
            // You may want to throw a custom exception or handle it based on your requirements.
            // For now, rethrowing the original exception.
            throw $e;
        }
    }

    /**
     * Make a GET request.
     *
     * @param string $endpoint
     * @param array $queryParameters
     *
     * @return Response
     */
    public function get(string $endpoint, array $queryParameters = []): Response
    {
        return $this->request(self::GET, $endpoint, $queryParameters);
    }

    /**
     * Make a POST request.
     *
     * @param string $endpoint
     * @param array $data
     *
     * @return Response
     */
    public function post(string $endpoint, array $data): Response
    {
        return $this->request(self::POST, $endpoint, $data);
    }

    /**
     * Make a PUT request.
     *
     * @param string $endpoint
     * @param array $data
     *
     * @return Response
     */
    public function put(string $endpoint, array $data): Response
    {
        return $this->request(self::PUT, $endpoint, $data);
    }

    /**
     * Make a DELETE request.
     *
     * @param string $endpoint
     *
     * @return Response
     */
    public function delete(string $endpoint): Response
    {
        return $this->request(self::DELETE, $endpoint);
    }

    /**
     * Build the full URL for the request.
     *
     * @param string $endpoint
     * @param array $queryParameters
     *
     * @return string
     */
    private function buildUrl(string $endpoint, array $queryParameters = []): string
    {
        $url = self::BASE_URL . $endpoint;

        if (!empty($queryParameters)) {
            $url .= '?' . http_build_query($queryParameters);
        }

        return $url;
    }

    /**
     * Make a pool of HTTP requests.
     *
     * @param array $requests
     * @param array $options
     *
     * @return array
     */
    public function pool(array $requests, array $options = []): array
    {
        try {
            return Http::pool(function (Pool $pool) use ($requests, $options) {
                return array_map(function ($request) use ($pool, $options) {
                    return $pool->as($request['as'])->withOptions($options)->withHeaders(self::HEADERS)->{$request['method']}($this->buildUrl($request['url']));
                }, $requests);
            });
        } catch (RequestException $e) {
            // Handle the exception (e.g., log the error, return a custom response)
            // You may want to throw a custom exception or handle it based on your requirements.
            // For now, rethrowing the original exception.
            throw $e;
        }
    }
}
