<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SanazController extends Controller
{
    public function sanaz(){
		$ehsan = Image::all();
		return view ('welcome',compact('ehsan'));

		}
}
