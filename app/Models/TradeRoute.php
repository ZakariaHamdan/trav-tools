<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeRoute extends Model
{
    use HasFactory;

    public function toVillage()
    {
        return $this->belongsTo(Village::class, 'to_village_id');
    }
    public function fromVillage()
    {
        return $this->belongsTo(Village::class, 'from_village_id');
    }
}
