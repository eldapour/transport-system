<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Interfaces\Api\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller{


    public UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface)
    {

        $this->userRepositoryInterface = $userRepositoryInterface;

    }

    public function getAllCities(): JsonResponse{

        return $this->userRepositoryInterface->getAllCities();
    }

    public function register(Request $request): JsonResponse{

        return $this->userRepositoryInterface->register($request);

    }

    public function login(Request $request): JsonResponse{

        return $this->userRepositoryInterface->login($request);

    }

    public function getProfile(Request $request): JsonResponse{

        return $this->userRepositoryInterface->getProfile($request);

    }


    public function updateProfile(Request $request): JsonResponse{

        return $this->userRepositoryInterface->updateProfile($request);

    }

    public function changePassword(Request $request): JsonResponse{

        return $this->userRepositoryInterface->changePassword($request);

    }


    public function logout(): JsonResponse
    {

       return $this->userRepositoryInterface->logout();
    }

    public function deleteAccount(): JsonResponse
    {

        return $this->userRepositoryInterface->deleteAccount();
    }


}
