<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecommendController extends Controller
{
	public function show(Request $request)
	{
		$id = $request->query('id');
		$yo = $request->query('yo');

		if($yo == 1){
			DB::table('writings')
			->where('id','=',$id)
			->increment('recommendations', 1);
		} else if($yo == 0) {
			DB::table('writings')
			->where('id','=',$id)
			->decrement('recommendations', 1);
		}
		return 'yo!';
	}
}
