<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
	public function index()
	{
		return view('welcome');
	}

	//Lesson 04 - L5 Fundamentals
	public function about()
	{
		// [1]
		// $name = "<span style='color:red'>Zyten</span>";
		// return view('pages.about')->with(['name', $name);

		// [2]
		// return view('pages.about')->with([
		// 	'fname' => 'Ruban',
		// 	'lname' => 'Selvarajah'
		// ]);

		// [3]
		// $data = [];
		// $data['fname'] = "Ruban";
		// $data['lname'] = "Selvarajah";
		// return view('pages.about', $data);

		// [4]
		// $fname = "Ruban";
		// $lname = "Selvarajah";
		// return view('pages.about', ['fname' => $fname, 'lname' => $lname]);

		// [5]

		$people = [
			'Me', 'You', 'Them'
		];

		$fname = "Ruban";
		$lname = "Selvarajah";
		return view('pages.about', compact('fname', 'lname', 'people'));
	}

	public function contact()
	{
		return view('pages.contact');
	}
}
