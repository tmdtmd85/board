<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReadController extends Controller
{
	public function show(Request $request)
	{
		$id = $request->query('id');

		DB::table('writings')
			->where('id', '=', $id)
			->increment('numbers_of_view', 1);

		$writing= DB::table('writings')
			->select('subject', 'body')
			->where('id', '=', $id)
			->first();

		$comments = DB::table('comments')
			->select('writer', 'comment')
			->where('writing_id', '=', $request->query('id'))
			->get();

		return view('read', 
			['writing' => $writing, 'comments' => $comments, 'id' => $id]);
	}
}
