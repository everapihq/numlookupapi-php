<?php

namespace Numlookupapi;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

/**
 * Exposes the CurrencyAPI library to client code.
 */
class NumlookupapiClient
{
    const BASE_URL = 'https://api.numlookupapi.com/v1/';
    const REQUEST_TIMEOUT_DEFAULT = 15; // seconds

    protected Client $httpClient;

    public function __construct(public string $apiKey, ?array $settings = [])
    {
        $guzzle_opts = [
            'http_errors' => false,
            'headers' => $this->buildHeaders($apiKey),
            'timeout' => $settings['timeout'] ?? self::REQUEST_TIMEOUT_DEFAULT
        ];
        if (isset($settings['guzzle_opts'])) {
            $guzzle_opts = array_merge($guzzle_opts, $settings['guzzle_opts']);
        }
        $this->httpClient = new Client($guzzle_opts);
    }

    /**
     * @throws NumlookupapiException
     */
    private function call(string $endpoint, ?array $query = [])
    {
        $url = self::BASE_URL . $endpoint;

        try {
            $response = $this->httpClient->request('GET', $url, [
                'query' => $query
            ]);
        } catch (GuzzleException $e) {
            throw new NumlookupapiException($e->getMessage());
        } catch (Exception $e) {
            throw new NumlookupapiException($e->getMessage());
        }

        return json_decode($response->getBody(), true);
    }

    /**
     * @throws NumlookupapiException
     */
    public function status()
    {
        return $this->call('status');
    }

    /**
     * @throws NumlookupapiException
     */
    public function validate(string $phoneNumber, ?array $query = [])
    {
        return $this->call('validate/' + $phoneNumber, $query);
    }

    /**
     * Build headers for API request.
     * @return array Headers for API request.
     */
    private function buildHeaders($apiKey)
    {
        return [
            'user-agent' => 'Numlookupapi/PHP/0.1',
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'apikey' => $apiKey,
        ];
    }
}
