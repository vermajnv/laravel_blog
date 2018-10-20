<?php

namespace App\Http\Controllers\Master;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MasterController extends Controller
{
    public function dashboard() {
        return view('master.dashboard');
    }
}
