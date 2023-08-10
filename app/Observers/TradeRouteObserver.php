<?php

namespace App\Observers;

use App\Models\TradeRoute;

class TradeRouteObserver
{
    /**
     * Handle the TradeRoute "created" event.
     */
    public function created(TradeRoute $tradeRoute): void
    {
        $toVillage = $tradeRoute->toVillage;
        $fromVillage = $tradeRoute->fromVillage;
        $lumber = $tradeRoute->lumber;
        $clay = $tradeRoute->clay;
        $iron = $tradeRoute->iron;
        $crop = $tradeRoute->crop;

        $toVillage->increment('net_lumber', $lumber);
        $toVillage->increment('net_clay', $clay);
        $toVillage->increment('net_iron', $iron);
        $toVillage->increment('net_crop', $crop);

        $fromVillage->decrement('net_lumber', $lumber);
        $fromVillage->decrement('net_clay', $clay);
        $fromVillage->decrement('net_iron', $iron);
        $fromVillage->decrement('net_crop', $crop);
    }

    /**
     * Handle the TradeRoute "updated" event.
     */
    public function updated(TradeRoute $tradeRoute): void
    {
        //
    }

    /**
     * Handle the TradeRoute "deleted" event.
     */
    public function deleted(TradeRoute $tradeRoute): void
    {
        $toVillage = $tradeRoute->toVillage;
        $fromVillage = $tradeRoute->fromVillage;
        $lumber = $tradeRoute->lumber;
        $clay = $tradeRoute->clay;
        $iron = $tradeRoute->iron;
        $crop = $tradeRoute->crop;

        $toVillage->decrement('net_lumber', $lumber);
        $toVillage->decrement('net_clay', $clay);
        $toVillage->decrement('net_iron', $iron);
        $toVillage->decrement('net_crop', $crop);

        $fromVillage->increment('net_lumber', $lumber);
        $fromVillage->increment('net_clay', $clay);
        $fromVillage->increment('net_iron', $iron);
        $fromVillage->increment('net_crop', $crop);
    }

    /**
     * Handle the TradeRoute "restored" event.
     */
    public function restored(TradeRoute $tradeRoute): void
    {
        //
    }

    /**
     * Handle the TradeRoute "force deleted" event.
     */
    public function forceDeleted(TradeRoute $tradeRoute): void
    {
    }
}
