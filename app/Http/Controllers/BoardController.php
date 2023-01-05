<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
	public function __construct()
	{
		$this->maxpage = ceil(DB::table('writings')->count() / 3);
	}

	public function show(Request $request)
	{
/*
		$id = $request->query('id', 1)-1;

		$list = DB::table('writings')
			->select('id', 'subject', 'writer', 'numbers_of_view', 'recommendations', 'created_at')
			->offset($id*3)
			->limit(3)
			->get();
*/
		return $this->maxpage;
	}
}
