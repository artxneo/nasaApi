<?php

declare(strict_types=1);

namespace App\NasaApi\Infrastructure;

class NasaApiClient
{
    private const API_KEY = 'N7LkblDsc5aen05FJqBQ8wU4qSdmsftwJagVK7UD';
    private const API_URL = 'https://api.nasa.gov/neo/rest/v1/neo/browse/';

    public function getAsteroidsInfo(): array
    {
        $url = '';
        /*
        * build url
        */
        $curl = \curl_init($url);
        \curl_setopt($curl, CURLOPT_URL, $url);
        \curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = \curl_exec($curl);
        \curl_close($curl);

        if (empty($response)) {
            throw new \RuntimeException('Something wrong with api request');
        }

        return json_decode($response);
    }
}