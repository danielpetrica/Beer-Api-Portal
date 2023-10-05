<?php

namespace App\Http\Integrations\BeerApi\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;


class GetBeers extends Request
{
    /**
     * The HTTP method of the request
     */
    protected Method $method = Method::GET;

    protected function defaultQuery(): array
    {
        return [
            'per_page' => $this->perPage,
            'page' => $this->page,
        ];
    }
    public function __construct(int $perPage, int $page)
    {
        $this->perPage = $perPage;
        $this->page = $page;
    }

    /**
     * The endpoint for the request
     */
    public function resolveEndpoint(): string
    {
        return '/beers';
    }
}
