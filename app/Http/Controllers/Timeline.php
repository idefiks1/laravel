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

	public function data($id, $status, $datePick, $version)
	{
		$saves = Saves::
        select('idUser','user','created_at','status','version')
        ->where('idUser', '=', $id)
        ->where('status', 'like', $status.'%')
        ->where('created_at', 'like', $datePick.'%')
        ->where('version', '=', $version)
        ->get('idUser','user','created_at','status','version')->toArray();
        $json['data'] = [];
        foreach ($saves as $save) 
        {
           	$json['data'][]=[$save['user'],$save['created_at'],$save['status'],$save['version']];
       					
        }
                    
       
        $js = json_encode($json, JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE);
        return $js;  
	}

	public function dataAll()
	{
		$saves = Saves::
        select('user','created_at','status','version')
        ->get('idUser','created_at','user','status','version')->toArray();
        $json['data'] = [];
        foreach ($saves as $save) 
        {
           	$json['data'][]=[$save['user'],$save['created_at'],$save['status'],$save['version']];
       					
        }
        $js = json_encode($json, JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE);
        return $js; 
	}

	public function categories()
	{
	    $categories = Saves::
                    select('idUser','user')
                    ->groupBy('idUser')
                    ->get('user','idUser');
                    $json['categories'] = $categories;
         
	   return view('auth/timeline')->with('categories', $categories);
	}
}
