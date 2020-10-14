<?php

namespace App\Http\Controllers;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
        # code...
        $abc = User::all();
        return response()->json($abc,200);
    }
}
