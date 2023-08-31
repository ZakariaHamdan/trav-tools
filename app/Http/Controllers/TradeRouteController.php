<?php

namespace App\Http\Controllers;

use App\Models\TradeRoute;
use Illuminate\Http\Request;

class TradeRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = TradeRoute::all();
        
        return view('route.index')
            ->with([
                'routes' => $routes->load('toVillage', 'fromVillage')
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(TradeRoute $tradeRoute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TradeRoute $tradeRoute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TradeRoute $tradeRoute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tradeRouteId)
    {
        $tradeRoute = TradeRoute::find($tradeRouteId);
        $tradeRoute->delete();
        
        return redirect()->route('routes.index');
    }
}
