<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Allocate;
use App\Notice;

class HomeController2 extends Controller
{
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	
	/**
	* Show the application dashboard.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$user_id = 8;
		//$hosteller = Allocate::where('user_id', $user_id)->first();
		if(1){
			// $count = Message::where([
				// 	['user_id', '=', $user_id],
				// 	['admin', '=', 1]
				// ])->count();
				// View::share('count', $count);
				$hostel_id = 13;
				$notices = Notice::where('hostel_id', $hostel_id)->orderBy('created_at', 'desc')->get();

				return view('home2')->withNotices($notices);
			}
			return redirect()->route('allocate.index');
		}
		
		public function showProfile($id){
			if($id == auth()->user()->id){
				$student = Allocate::where('user_id', $id)->first();
				return view('student.profile')->with('student', $student);
			}else{
				return back();
			}
			
		}
		
	}