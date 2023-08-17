<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use Carbon\Carbon;

class ReserveController extends Controller
{
    public function index(Request $request)
    {
        $data['reserves'] = Reserve::orderBy('id', 'asc')->paginate(5);

        return view('reserve.index', $data);
    }

    public function create()
    {
        return view('reserve.create');
    }

    public function store(Request $request)
    {
        $reserve = new Reserve;
        $reserve->name = $request->name;
        $reserve->time = $request->time;
        $reserve->save();

        return redirect()->route('reserve.index')->with('success', 'Room has been created successfully.');
    }
}
