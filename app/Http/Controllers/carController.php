<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


class carController extends Controller
{
	public function main()
	{
		$json = file_get_contents('/var/www/laravel/laravel/public/js/casperjs/output.json');
		
		$data = json_decode($json, true);

		$urls = array();
	   	$url = $data['url'];
	   	
	   	$infoLabel = array();
	   	$infoText = array();

	   	$infoLabel = $data['infoLabel'];
	   	$infoText = $data['infoText'];

	   	$new = array_combine($infoLabel,$infoText);
	   
	   
	   	$path = '/var/www/laravel/laravel/public/js/casperjs/';
  		

		$images = scandir($path);
		if (false !== $images) 
		{
    		$images = preg_grep('/\\.(?:png|gif|jpe?g)$/', $images);
    
		}

	return view('auth/car')->with('url',$url)->with('new',$new)->with('images',$images);
	}
    
}
