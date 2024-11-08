<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use App\Models\Skill;
use App\Models\Skillgroup;
use Carbon\Carbon;

class DeveloperController extends Controller
{

    public function start(){

        $developer = Developer::find(1);
        $skillgroups = Skillgroup::all()->pluck('title', 'id');
        $skills = Skill::where('developer_id', 2)->orderBy('category_id')->get();

        $bootstrap_colors = [
            1 => 'bg-success',
            3 => '',
            4 => 'bg-info'
        ];

        $set['age'] = Carbon::parse($developer->birthdate)->diffInYears(Carbon::now());
        $set['experience'] = Carbon::parse($developer->experiencedate)->diffInYears(Carbon::now());
        
        return view('developer', [ 
            'developer' => $developer , 
            'set' => $set,
            'skills' => $skills,
            'skillgroups' => $skillgroups,
            'bootstrap_colors' => $bootstrap_colors
        ]);

    }
}
