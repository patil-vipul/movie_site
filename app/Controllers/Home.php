<?php

namespace App\Controllers;

use App\Models\AnalyticsModel;
use App\Models\MoviesModel;

class Home extends BaseController
{
	public function index()
	{
		$movieModel  = new MoviesModel();
		$analyticsModel = new AnalyticsModel();
		$analyticsModel->incrementPageCount('home');
		
		$data = [
            'movies'  => $movieModel->getMovies(),
            'title' => 'MOVIES SITE',
        ];
		
		echo view('templates/header', $data);
		echo view('templates/carousel_poster', $data);
        echo view('home',$data);
        echo view('templates/footer',$data);
	}
}
