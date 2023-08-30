<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Interfaces\CityInterface;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected CityInterface $cityInterface;

    public function __construct(CityInterface $cityInterface)
    {
        $this->cityInterface = $cityInterface;
    }

    public function index(Request $request)
    {
        return $this->cityInterface->index($request);
    }


    public function create()
    {
        return $this->cityInterface->create();
    }

    public function store(CityRequest $request)
    {
        return $this->cityInterface->store($request);
    }

    public function edit(City $city)
    {
        return $this->cityInterface->edit($city);
    }

    public function update(CityRequest $request, $id)
    {
        return $this->cityInterface->update($request, $id);
    }

    public function delete(Request $request)
    {
        return $this->cityInterface->delete($request);
    }
}
