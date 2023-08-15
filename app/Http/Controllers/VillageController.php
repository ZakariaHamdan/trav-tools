<?php

namespace App\Http\Controllers;

use App\Models\TradeRoute;
use App\Models\Troop;
use App\Models\Village;
use App\Models\VillageTroop;
use App\Services\VillageService;
use Illuminate\Http\Request;

class VillageController extends Controller
{

    public function __construct(protected VillageService $villageService)
    {
    }

    public function index()
    {
        $villages = auth()->user()->villages;
        return view('village.index')->with([
            'villages' => $villages
        ]);
    }


    public function create()
    {
        return view('village.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:villages'
        ]);
        $text = $request->text;

        $villageData = $request->except('_token');
        $villageData['user_id'] = auth()->id();
        $villageData['net_lumber'] = $request->lumber;
        $villageData['net_clay'] = $request->clay;
        $villageData['net_iron'] = $request->iron;
        $villageData['net_crop'] = $request->crop;

        Village::create($villageData);

        return redirect()->route('villages.index');
    }


    public function show(Village $village)
    {
        $troops = Troop::where('tribe', auth()->user()->tribe)->get();
        $villages = auth()->user()->villages;
        $incomingRoutes = $village->inRoutes;
        $outRoutes = $village->outRoutes;
        $villageTroops = $village->troops;

        return view('village.show')
            ->with([
                'village' => $village,
                'villages' => $villages,
                'troops' => $troops,
                'incomingRoutes' => $incomingRoutes,
                'outRoutes' => $outRoutes,
                'villageTroops' => $villageTroops,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Village $village)
    {
        return view('village.edit')
            ->with([
                'village' => $village
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Village $village)
    {
        $resText = request()->res_text;
        if (isset($resText)) {
            $resources = $this->villageService->extractRes($resText);
            $village->updateRess($resources);
        } else {
            $resources = request()->resources;
            $village->updateRess($resources);

            $incomingRoutes = $this->villageService->seperateInputByIndex($request->incomingTradeRoute)
                ->filter(
                    fn($s) => $s['from_village_id'] != 'Select Village'
                );

            $village->syncTroops(request()->village_troops);

            $village->syncIncomingRoutes($incomingRoutes);
        }

        return redirect()->route('villages.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Village $village)
    {
        //
    }

    public function createMany()
    {
        return view('village.create-many');
    }

    public function storeMany()
    {
        $inputText = request()->text;
        $villages = $this->villageService->extractVillagesFromText($inputText);
        foreach ($villages as $village) {
            Village::firstOrCreate(
                [
                    'name' => $village['name'],
                    'user_id' => auth()->id()
                ],
                [
                    'x' => $village['x'],
                    'y' => $village['y'],
                ]
            );
        }
        return redirect()->route('villages.index');
    }
}
