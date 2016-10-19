<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Saves;

class Online extends Controller
{
	public function write($user, $status, $version, $userId)
	{
		$userStatus = new Saves;
		$userStatus->user = $user;
		$userStatus->status = $status;
		$userStatus->version = $version;
		$userStatus->idUser = $userId;
		$userStatus->save();
	}
    
}
