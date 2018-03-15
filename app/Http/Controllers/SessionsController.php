<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\College;
use Carbon\Carbon;
use Auth;
use DB;

class SessionsController extends Controller
{
	public function main()
	{
		$schedules = DB::table('schedule')->get();
		// return $schedules;
		$colleges = College::get();
		return view('app.main',compact('colleges','schedules'));
	}

	public function create(){

	}
}



