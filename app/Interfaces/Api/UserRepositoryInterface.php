<?php

namespace App\Interfaces\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

interface UserRepositoryInterface{


    public function getAllCities(): JsonResponse;
    public function register(Request $request): JsonResponse;
    public function login(Request $request);
    public function getProfile(Request $request): JsonResponse;
    public function updateProfile(Request $request): JsonResponse;
    public function changePassword(Request $request): JsonResponse;
    public function logout(): JsonResponse;
    public function deleteAccount(): JsonResponse;

}
