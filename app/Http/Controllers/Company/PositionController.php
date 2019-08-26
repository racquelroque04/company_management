<?php

namespace App\Http\Controllers\Company;

use App\Company;
use App\Http\Transformer\PositionTransformer;
use App\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;

class PositionController extends Controller
{
    private  $fractal;

    private  $positionTransformer;

    function __construct(Manager $fractal, PositionTransformer $positionTransformer)
    {
        $this->fractal = $fractal;
        $this->positionTransformer = $positionTransformer;
    }

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
                'company_id' => $company_id
            ]);
        }

        return redirect('home');
    }

    public function getPosition(Request $request)
    {
        $companyId = $request->get('company_id');

        $positions = Company::find($companyId)->position;

        $positions = new Collection($positions, $this->positionTransformer);

        $positions = $this->fractal->createData($positions);

        return $positions->toArray();
    }
}
