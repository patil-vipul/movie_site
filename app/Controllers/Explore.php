<?php

namespace App\Controllers;

use App\Models\MoviesModel;

class Explore extends BaseController
{
	public function index()
	{
		echo view('templates/header', ['title'=>'MOVIE SITE']);
        echo view('explore');
        echo view('templates/footer');
	}
}
