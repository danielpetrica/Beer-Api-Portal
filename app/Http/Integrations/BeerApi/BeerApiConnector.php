<?php

namespace App\Http\Integrations\BeerApi;

use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AcceptsJson;

class BeerApiConnector extends Connector
{
    use AcceptsJson;

    /**
     * The Base URL of the API
     */
    public function resolveBaseUrl(): string
    {
        return 'https://api.punkapi.com/v2/';
    }

    /**
     * Default headers for every request
     */
    protected function defaultHeaders(): array
    {
        return [];
    }

    /**
     * Default HTTP client options
     */
    protected function defaultConfig(): array
    {
        return [];
    }
}
