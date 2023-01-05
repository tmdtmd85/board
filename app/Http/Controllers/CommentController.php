<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
	public function add(Request $request)
	{

		$list = DB::table('comments')
			->insert(
				['writer'=>Auth::user()->name,
				'writing_id'=>$request->query('id'),
				'comment'=>$request->one_comment]
			);
		return $request->one_comment;
	}
}
