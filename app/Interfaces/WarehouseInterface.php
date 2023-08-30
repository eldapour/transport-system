<?php

namespace App\Interfaces;

Interface WarehouseInterface {

    public function index($request);

    public function delete($request);

    public function create();

    public function store($request);

    public function edit($warehouse);

    public function update($request, $id);

}
