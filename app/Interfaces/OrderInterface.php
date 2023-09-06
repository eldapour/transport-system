<?php

namespace App\Interfaces;

Interface OrderInterface {

    public function complete($request);

    public function waiting($request);

    public function new($request);
    public function show($order);
    public function invoice($order);
}
