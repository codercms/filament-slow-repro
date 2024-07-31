<?php

$fileContent = file_get_contents('X0b7ddab2d5375ecc75fb39de1a4ce0e0.json');
$json = json_decode($fileContent, false, flags: JSON_THROW_ON_ERROR);

$measures = [];

foreach ($json->time->measures as $measure) {
    if (!array_key_exists($measure->label, $measures)) {
        $measures[$measure->label] = [
            'count' => 0,
            'total_time' => 0.0,
        ];
    }

    $measures[$measure->label]['count']++;
    $measures[$measure->label]['total_time'] += $measure->duration;
}

uasort($measures, static function ($a, $b) {
    return $b['total_time'] <=> $a['total_time'];
});

file_put_contents('measures.json', json_encode($measures));
