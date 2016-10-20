<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class Timeline extends Controller
{
    public function take()
	{
		$saves = DB::table('saves')
                    ->select('user','status','created_at','version')
                    ->get('user','status','version','created_at');
		return view('auth/timeline', compact('saves'));
	}
}
