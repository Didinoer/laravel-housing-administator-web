<?php

namespace App\Http\Controllers;

use App\Models\block;
use Illuminate\Http\Request;

class blockController extends Controller
{
    public function index(){
        $data = block::with(['resident']) -> get();
        return view('blocks' , ['data_block' => $data] );

    }
}
