<?php

namespace App\Controllers;

use App\Models\AnalyticsModel;
use App\Models\MoviesModel;

class Pages extends BaseController
{
	public function dmca(){
        
        $analytics = new AnalyticsModel();
		$analytics->incrementPageCount('dmca');
        echo view('templates/header', ['title'=>"MOVIES SITE", "canonical_url"=>'dmca']);
        echo view('pages/dmca');
    }
}
