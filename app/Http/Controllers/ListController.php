<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListController extends Controller
{
	public function __construct()
	{
		$this->maxpage = ceil(DB::table('writings')->count() / 3);
	}

	public function show(Request $request)
	{
		$id = $request->query('id', 1);

		if($this->maxpage == 0) {
			$pages = range(1, 1);
		} else if($id == 1){
			$pages = range($id, min($this->maxpage, 3));			
		} else if ($id == $this->maxpage){
			$pages = range(max($id - 2, 1), $id);
		} else {
			$pages = range($id-1, min($this->maxpage, $id+1));
		}


		$list = DB::table('writings')
			->select('id', 'subject', 'writer', 'numbers_of_view', 'recommendations', 'created_at')
			->offset(($id-1)*3)
			->limit(3)
			->orderBy('id', 'desc')
			->get();
		return view('list', ['list' => $list, 'pages' => $pages, 'id' => $id, 'maxpage' => $this->maxpage]);
	}
}
