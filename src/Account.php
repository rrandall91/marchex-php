<?php

namespace Marchex;

use GuzzleHttp\Client;

/**
 * Class Account
 *
 * @package Marchex
 **/
class Account
{
    /**
     * Retrieves the list of accounts accessible by the user.
     * @return Collection
     */
    public static function list()
    {
        $client = new Client();
        $response = $client->request('POST', Marchex::getBaseUrl(), [
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Basic ' . Marchex::getCredentials()
            ],
            'json' => [
                'jsonrpc' => '2.0',
                'id' => '1',
                'method' => 'acct.list',
                'params' => []
            ]
        ]);

        $output = json_decode($response->getBody(), true);
        return $output['result'];
    }
}
