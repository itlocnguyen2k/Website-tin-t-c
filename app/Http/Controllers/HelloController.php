<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function sayHello(){
    	echo "<h1>Hello world</h1>";
    }
}
