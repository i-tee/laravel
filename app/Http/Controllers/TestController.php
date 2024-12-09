<?php

namespace App\Http\Controllers;

use Calc395\Calc395;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {

        $calc = new Calc395();

        if(isset($_GET['ajax']) and $_GET['ajax'] == true){

            $calc->add($_GET['data']);
            $data = $calc->getResult();
            
            header('Content-Type: application/json');
            echo json_encode($data);

        }else{

            return view('calc395');

        }
    }
}
