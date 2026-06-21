<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()
    {
        $criterias = Criteria::all();
        return view('criterias.index', compact('criterias'));
    }

    public function create()
    {
        return view('criterias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string',
            'type'   => 'required|in:benefit,cost',
            'weight' => 'required|numeric|min:0|max:1',
        ]);

        Criteria::create($request->only(['name', 'type', 'weight']));

        return redirect()->route('criterias.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    public function edit(Criteria $criteria)
    {
        return view('criterias.edit', compact('criteria'));
    }

    public function update(Request $request, Criteria $criteria)
    {
        $request->validate([
            'name'   => 'required|string',
            'type'   => 'required|in:benefit,cost',
            'weight' => 'required|numeric|min:0|max:1',
        ]);

        $criteria->update($request->only(['name', 'type', 'weight']));

        return redirect()->route('criterias.index')->with('success', 'Kriteria berhasil diperbarui.');
    }

    public function destroy(Criteria $criteria)
    {
        $criteria->delete();
        return redirect()->route('criterias.index')->with('success', 'Kriteria berhasil dihapus.');
    }
}