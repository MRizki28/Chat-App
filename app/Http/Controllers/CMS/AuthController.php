<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Repositories\AuthRepositories;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $AuthRepo;

    public function __construct(AuthRepositories $AuthRepo)
    {
        $this->AuthRepo = $AuthRepo;
    }

    public function register(AuthRequest $request)
    {
        return $this->AuthRepo->register($request);
    }

    public function login(Request $request)
    {
        return $this->AuthRepo->login($request);
    }
}
