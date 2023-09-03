<?php

namespace App\Controllers;

use App\Models\AnalyticsModel;
use App\Models\MoviesModel;

class Analytics extends BaseController
{
	public function index()
	{
        $model = new AnalyticsModel();
        $data['views'] = $model->getPageViewCount();
		echo view('templates/header', ['title'=>'MOVIE SITE', 'canonical_url'=>'analytics']);
        echo view('analytics', $data);
	}
}
