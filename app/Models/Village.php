<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $hidden = ['user_id'];

    public function outRoutes()
    {
        return $this->hasMany(TradeRoute::class, 'from_village_id');
    }

    public function inRoutes()
    {
        return $this->hasMany(TradeRoute::class, 'to_village_id');
    }

    public function troops()
    {
        return $this->hasMany(VillageTroop::class);
    }

    public function updateRess(array $resources)
    {
        $res = ['lumber', 'clay', 'iron', 'crop'];

        foreach ($res as $value) {
            $resourceDiff = $resources[$value] - $this->{$value};

            if (isset($resources["needed_$value"])) {
                $resourceDiff += $this->{"needed_$value"} - $resources["needed_$value"];
            }

            $this->increment("net_$value", $resourceDiff);
        }

        $this->update($resources);
    }

    public function syncTroops($villageTroops = [])
    {
        VillageTroop::where('village_id', $this->id)->delete();
        foreach ($villageTroops ?? [] as $troopId) {
            VillageTroop::create([
                'village_id' => $this->id,
                'troop_id' => $troopId
            ]);
        }
    }

    public function syncIncomingRoutes($incomingRoutes)
    {
        TradeRoute::where('to_village_id', $this->id)->get()->each(fn($s) => $s->delete());
        foreach ($incomingRoutes as $route) {
            $route['to_village_id'] = $this->id;
            TradeRoute::create($route);
        }
    }
}
