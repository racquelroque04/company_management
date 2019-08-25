<?php

namespace App\Http\Controllers\Company;

use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{
    public function index()
    {
        return view('admin.position.create');
    }

    public function store(Request $request)
    {
        $positions =  $request->input('position');

        $company_id = auth()->user()->company->id;

        foreach ($positions as $position) {

            Position::create([
                'name' => $position,
                'company_id' => 1
            ]);
        }

        return redirect('home');
    }
}
