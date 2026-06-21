<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Criteria;
use App\Models\HotelCriteriaValue;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('hotels.index', compact('hotels'));
    }

    public function create()
    {
        $criterias = Criteria::all();
        return view('hotels.create', compact('criterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'           => 'required|string',
            'price_per_night'=> 'required|numeric',
            'star'           => 'required|integer|min:1|max:5',
            'rating'         => 'required|numeric|min:0|max:10',
            'facilities'     => 'required|string',
            'address'        => 'nullable|string',
            'latitude'       => 'nullable|numeric',
            'longitude'      => 'nullable|numeric',
        ]);

        $hotel = Hotel::create($request->only([
            'name', 'price_per_night', 'star', 'rating',
            'facilities', 'address', 'latitude', 'longitude'
        ]));

        // Simpan nilai kriteria
        $criterias = Criteria::all();
        foreach ($criterias as $criteria) {
            $value = $request->input('criteria_' . $criteria->id);
            if ($value !== null) {
                HotelCriteriaValue::create([
                    'hotel_id'    => $hotel->id,
                    'criteria_id' => $criteria->id,
                    'value'       => $value,
                ]);
            }
        }

        return redirect()->route('hotels.index')->with('success', 'Data hotel berhasil ditambahkan.');
    }

    public function edit(Hotel $hotel)
    {
        $criterias = Criteria::all();
        $values = $hotel->criteriaValues->keyBy('criteria_id');
        return view('hotels.edit', compact('hotel', 'criterias', 'values'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $request->validate([
            'name'           => 'required|string',
            'price_per_night'=> 'required|numeric',
            'star'           => 'required|integer|min:1|max:5',
            'rating'         => 'required|numeric|min:0|max:10',
            'facilities'     => 'required|string',
            'address'        => 'nullable|string',
            'latitude'       => 'nullable|numeric',
            'longitude'      => 'nullable|numeric',
        ]);

        $hotel->update($request->only([
            'name', 'price_per_night', 'star', 'rating',
            'facilities', 'address', 'latitude', 'longitude'
        ]));

        // Update nilai kriteria
        $criterias = Criteria::all();
        foreach ($criterias as $criteria) {
            $value = $request->input('criteria_' . $criteria->id);
            if ($value !== null) {
                HotelCriteriaValue::updateOrCreate(
                    ['hotel_id' => $hotel->id, 'criteria_id' => $criteria->id],
                    ['value' => $value]
                );
            }
        }

        return redirect()->route('hotels.index')->with('success', 'Data hotel berhasil diperbarui.');
    }

    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return redirect()->route('hotels.index')->with('success', 'Data hotel berhasil dihapus.');
    }
}