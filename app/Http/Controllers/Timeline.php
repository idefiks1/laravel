<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

use App\Saves;
class Timeline extends Controller
{
    public function take()
	{
		$data = DB::table('saves')
                    ->select('user','status','created_at','version')
					->get('user','status','created_at','version');
		//return view('auth/timeline')->with('data', $data);
					$json['data'] = $data;
        $js = json_encode($json, JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE);
        return $js; 
	}

	public function data($id, $status)
	{
		
					$saves = Saves::
                    select('idUser','user','status','version')
                    ->where('idUser', '=', $id)
                    ->where('status', 'like', $status.'%')
                    ->get('idUser','user','status','version')->toArray();
                     $json['data'] = [];
                   foreach ($saves as $save) {
                   	 $json['data'][]=[$save['user'],'',$save['status'],$save['version']];
                   	
                   }
                    
       
        $js = json_encode($json, JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE);
        return $js;  
	}

	public function categories()
	{
	    $categories = DB::table('saves')
                    ->select('idUser','user')
                    ->groupBy('idUser')
                    ->get('user','idUser');
                    $json['categories'] = $categories;
         
	   return view('auth/timeline')->with('categories', $categories);
	}
}
