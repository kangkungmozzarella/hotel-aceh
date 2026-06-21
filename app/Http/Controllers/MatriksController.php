<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Criteria;
use App\Models\Alternative;
use Illuminate\Http\Request;

class MatriksController extends Controller
{
    public function normalisasi()
    {
        $hotels = Hotel::all();
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

        return response()->json([
            'hotels'     => $hotels,
            'criterias'  => $criterias,
            'normalisasi' => $normalisasi,
        ]);
    }
}