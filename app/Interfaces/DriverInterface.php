<?php

namespace App\Interfaces;

use App\Http\Requests\UserRequest;

Interface DriverInterface {

    public function index($request);

    public function delete($request);

    public function create();

    public function store($request);

    public function edit($driver);

    public function update(UserRequest $request, $id);

}
