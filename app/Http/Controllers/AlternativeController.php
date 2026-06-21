<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Hotel;
use App\Models\Criteria;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        $criterias = Criteria::all();
        $alternatives = Alternative::with(['hotel', 'criteria'])->get()
            ->groupBy('hotel_id');

        return view('alternatives.index', compact('hotels', 'criterias', 'alternatives'));
    }

    public function create()
    {
        $hotels = Hotel::all();
        $criterias = Criteria::all();
        return view('alternatives.create', compact('hotels', 'criterias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'values'   => 'required|array',
        ]);

        // Hapus data lama untuk hotel ini
        Alternative::where('hotel_id', $request->hotel_id)->delete();

        // Simpan nilai baru
        foreach ($request->values as $criteria_id => $value) {
            if ($value !== null && $value !== '') {
                Alternative::create([
                    'hotel_id'    => $request->hotel_id,
                    'criteria_id' => $criteria_id,
                    'value'       => $value,
                ]);
            }
        }

        return redirect()->route('alternatives.index')->with('success', 'Data alternatif berhasil disimpan.');
    }

    public function edit($hotel_id)
    {
        $hotel = Hotel::findOrFail($hotel_id);
        $criterias = Criteria::all();
        $values = Alternative::where('hotel_id', $hotel_id)->get()->keyBy('criteria_id');
        return view('alternatives.edit', compact('hotel', 'criterias', 'values'));
    }

    public function destroy($hotel_id)
    {
        Alternative::where('hotel_id', $hotel_id)->delete();
        return redirect()->route('alternatives.index')->with('success', 'Data alternatif berhasil dihapus.');
    }
}