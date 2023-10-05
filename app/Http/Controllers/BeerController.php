<?php

namespace App\Http\Controllers;

use App\Http\Integrations\BeerApi\BeerApiConnector;
use App\Http\Integrations\BeerApi\Requests\GetBeers;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $connector = new BeerApiConnector();
        $request =  new GetBeers(perPage: $request->input('per_page', 25), page: $request->input('page', 1));

        try {
            $response = $connector->send($request);
            return response()->json($response->json(), $response->status());
        } catch (\ReflectionException|\Throwable|\Exception $e) {
            return response("There were an error while fetching the beers", 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
