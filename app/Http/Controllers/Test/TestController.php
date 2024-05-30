<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;


class TestController extends Controller
{
    public function index()
    {
        return Test::all();
    }
}
