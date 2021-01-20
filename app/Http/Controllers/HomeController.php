<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // !empty($request->all()) && 
        $data = \file_get_contents("php://input");
        Log::info($request->all());
        Log::error($data);
        return 1;
    }
}
