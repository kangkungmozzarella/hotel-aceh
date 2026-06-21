<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Criteria;
use App\Models\Alternative;

class RouteController extends Controller
{
    public function index()
    {
        $hotels = Hotel::whereNotNull('latitude')->whereNotNull('longitude')->get();

        // Hitung ranking MAUT untuk sorting dropdown
        $criterias = Criteria::all();
        $alternatives = Alternative::with(['hotel', 'criteria'])->get()->groupBy('hotel_id');

        $normalisasi = [];
        foreach ($criterias as $criteria) {
            $values = [];
            foreach ($hotels as $hotel) {
                $hotelAlts = $alternatives->get($hotel->id, collect());
                $alt = $hotelAlts->firstWhere('criteria_id', $criteria->id);
                $values[$hotel->id] = $alt ? $alt->value : 0;
            }
            $min = min($values);
            $max = max($values);
            foreach ($hotels as $hotel) {
                $val = $values[$hotel->id];
                if ($max == $min) {
                    $norm = 0;
                } elseif ($criteria->type == 'benefit') {
                    $norm = ($val - $min) / ($max - $min);
                } else {
                    $norm = ($max - $val) / ($max - $min);
                }
                $normalisasi[$hotel->id][$criteria->id] = round($norm, 4);
            }
        }

        $maut = [];
        foreach ($hotels as $hotel) {
            $total = 0;
            foreach ($criterias as $criteria) {
                $norm = $normalisasi[$hotel->id][$criteria->id] ?? 0;
                $total += $norm * $criteria->weight;
            }
            $maut[$hotel->id] = round($total, 4);
        }

        arsort($maut);
        $ranking = [];
        $rank = 1;
        foreach ($maut as $hotel_id => $nilai) {
            $ranking[$hotel_id] = [
                'rank'  => $rank++,
                'nilai' => $nilai,
            ];
        }

        return view('route.index', compact('hotels', 'ranking'));
    }
}