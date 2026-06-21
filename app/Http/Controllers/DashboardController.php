<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Criteria;

class DashboardController extends Controller
{
    public function index()
{
    $totalHotels = Hotel::count();
    $totalCriterias = Criteria::count();
    $hotels = Hotel::whereNotNull('latitude')->whereNotNull('longitude')->get();

    return view('dashboard.index', compact('totalHotels', 'totalCriterias', 'hotels'));
}
}