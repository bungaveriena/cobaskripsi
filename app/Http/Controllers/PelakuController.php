<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class PelakuController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->paginate(10);
        return view('pelaku.index', compact('locations'));
    }
}
