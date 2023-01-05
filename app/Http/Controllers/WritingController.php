<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class WritingController extends Controller
{
	public function write(Request $request)
	{
		DB::table('writings')->insert(
			['subject'=>$request->subject, 
			'body'=>$request->body,
			'writer'=>Auth::user()->name,
			'IP'=>$request->ip(),
			'numbers_of_view'=>0,
			'recommendations'=>0,	
			'created_at' => now()]
		);
		return redirect('/list?id=1');
	}
}
