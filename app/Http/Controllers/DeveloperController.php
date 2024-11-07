<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;

class DeveloperController extends Controller
{
    public function start(){

        $developer = Developer::find(1);
        
        return view('developer', [ 'developer' => $developer ]);

    }
}
