<?php

namespace App\Http\Controllers\Single;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TryCsController extends Controller
{
    //
    public function index() {

        return view('trycs/index');
    }
}
