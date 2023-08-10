<?php

namespace App\Http\Controllers;

use App\Models\Troop;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TroopController extends Controller
{

    public function index()
    {
        $troops = Troop::all();
        return view('troop.index')->with([
            'troops' => $troops
        ]);
    }


    public function create()
    {
        return view('troop.create');
    }


    public function store(Request $request)
    {
        $request->validate(['name' => 'unique:troops']);
        Troop::create($request->except('_token'));
        
        return redirect()->route('troops.index')->with('message','Created successfully!');
    }


    public function show(Troop $troop)
    {
        //
    }


    public function edit(Troop $troop)
    {
        return view('troop.edit')->with([
            'troop' => $troop
        ]);
    }


    public function update(Request $request, Troop $troop)
    {
        $request->validate([
            'name' => Rule::unique('troops')->ignore($troop->id)
        ]);
        
        $troop->update($request->except('_token'));
        return redirect()->route('troops.index');
    }


    public function destroy(Troop $troop)
    {
        //
    }
}
