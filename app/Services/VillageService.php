<?php

namespace App\Services;

class VillageService
{
    public function extractVillagesFromText($inputText): array
    {
        $villages = [];
        preg_match('/Villages/', $inputText, $match);
        

        $start = strpos($inputText, $match[0]) + strlen($match[0]) + 1;
        $textAfterTasks = substr($inputText, $start);
        $taskOverviewPosition = strpos($textAfterTasks, "Task overview");
        $dirtyVillagesText = substr($textAfterTasks, 0, $taskOverviewPosition);

        $cleanedText = preg_replace('/[^\x20-\x7E]/', '', $dirtyVillagesText);


        $cleanedText = explode(" ", $cleanedText, 2)[1];
        $villagesText = array_filter(explode(")",$cleanedText));
        
        foreach($villagesText as $villageText){
            $village = [];
            $villageDetails = explode("(", $villageText);
            $coordinates = explode("|", $villageDetails[1]);
            $village['name'] = $villageDetails[0];
            $village['x'] = $coordinates[0];
            $village['y'] = $coordinates[1];
            $villages[] = $village;
        }

        return $villages;
    }

    public function seperateInputByIndex($data): \Illuminate\Support\Collection
    {
        $details = collect();

        for ($i = 0; $i < count(reset($data)); $i++) {
            $item = array_map(fn($values) => $values[$i], $data);
            $details->push($item);
        }
        return $details;
    }
}