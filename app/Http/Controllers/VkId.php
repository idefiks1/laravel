<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class VkId extends Controller
{
    public function getId()
	{
		
		$idVk = DB::table('users')->lists('idVk');
		return $idVk;
	}
	public function getIdUser($id)
	{
		
		$idUser = DB::table('users')
                    ->select('id')
                    ->where('idVk', '=', $id)
                    ->lists('id');
		return $idUser;
	}
}
