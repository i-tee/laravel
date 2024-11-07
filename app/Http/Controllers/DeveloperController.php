<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use Carbon\Carbon;

class DeveloperController extends Controller
{

    public function start(){

        $developer = Developer::find(1);

        $set['age'] = Carbon::parse($developer->birthdate)->diffInYears(Carbon::now());
        $set['experience'] = Carbon::parse($developer->experiencedate)->diffInYears(Carbon::now());
        
        return view('developer', [ 'developer' => $developer , 'set' => $set]);

    }
}
