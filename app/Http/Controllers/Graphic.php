<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class Graphic extends Controller
{
    public function graph()
	{
		
		//$saves = DB::table('saves')->get();
		return view('auth/graphic');	
	}

	public function getTime($date='2016-10-19')
	{
        
        $idArray = DB::table('saves')
                    ->select('idUser','user')
                    ->groupBy('idUser')
                    ->lists('user','idUser');
   
        $json['datasets'] = [];
         
        foreach ($idArray as $id => $value) 
        {
    		$dataTime = DB::table('saves')
                        ->select(DB::raw('count(*)*5 as c, HOUR(created_at) as h'))
                        ->where('status', '=', 'Online')
                        ->whereDate('created_at', 'like', $date.'%')
                        ->where('idUser','=',$id)
                        ->groupBy('h')
                        ->lists('c','h');
            $name = $value;
            $r = strval(mt_rand(0,255)); 
            $g = strval(mt_rand(0,255));
            $b = strval(mt_rand(0,255));
            $color = "rgba(".$r.",".$g.",".$b.",1)";
            $json['labels'] = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23];
            $map = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
            $timeline = array();
            $count = count($dataTime);
            $dataTime = array_replace($map, $dataTime);
            $json['datasets'][$id] = array (
                                            'label'=> $name,
                                            'fillColor'=> "rgba(0,0,0,0)",
                                            'strokeColor' => $color,
                                            'pointColor'=>$color,
                                            'pointStrokeColor'=>$color,
                                            'pointHighlightFill'=> $color,
                                            'pointHighlightStroke' => "rgba(0,0,0,0)",
                                            'data'=> $dataTime
                                            );
        } 
        $js = json_encode($json, JSON_NUMERIC_CHECK|JSON_UNESCAPED_UNICODE);
        return $js;              
	}

    
}
