<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MoviesModel;
use App\Models\AnalyticsModel;

class Titles extends Controller
{
	public function index($slug)
	{
        //Initiliaze required models
		$movieModel  = new MoviesModel();
        //
        $analyticsModel = new AnalyticsModel();
        $analyticsModel->incrementPageCount('titles');

        $movie = $movieModel->getMovies($slug);
        if (empty($movie)) throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find your movie: ' . $slug);

        //Update movie views
       $movieModel->incrementViewCount($slug);
        //Store Data
		$data = [
            'movie'  => $movie,
            'title' => 'MOVIES SITE',
            'canonical_url' => "titles/".$slug,
            'similar_movies' => $movieModel->getSimilarMovies($movie['title'],$movie['genres'], $movie['slug'])
        ];
        
        //Call Views
		echo view('templates/header', $data);
	    echo view('templates/fixed_poster', $data);
        echo view('titles',$data);
        echo view('templates/suggestion_footer',$data);
        echo view('templates/footer',$data);
	}
    //Clean below code
    public function add(){
        $model = new MoviesModel();
        if ($this->request->getMethod() === 'post') {
            $data['title'] =  $this->request->getPost('inputMovieTitle');
            $data['slug'] = strtolower( preg_replace(["/[^a-zA-Z\s]/","/\s/"], ["","-"], $data['title']));
            $data['imdb_id'] =  $this->request->getPost('inputIMDbID');
            $data['popularity'] = $this->request->getPost('inputPopularity');
            $data['trailer_link'] = $this->request->getPost('inputTrailerID');
            $data['genres'] =  strtolower( $this->request->getPost('inputGenres'));
            $data['release_date'] = $this->request->getPost('inputReleaseYear');
            $dlinks = $this->request->getPost('inputDownloadLink');
            $dnames = $this->request->getPost('inputLinkName');
            $dquality = $this->request->getPost('inputQuality');
            $dlanguage = $this->request->getPost('inputLanguage');
            $download_link = '';
            foreach($dlinks as $key=>$link){
                $download_link .= "$dnames[$key]>$dlinks[$key]>$dlanguage[$key]>$dquality[$key]<";
            }
            $data['download_link'] = rtrim($download_link, "<");;
            $model->replace($data);
            echo view('templates/header', ['title' => 'MOVIE SITE']);
            echo view('movies/add',['success'=>true]);
            echo view('templates/footer',['script'=>'add.js']);
        } else {
            echo view('templates/header', ['title' => 'MOVIE SITE']);
            echo view('movies/add');
            echo view('templates/footer',['script'=>'add.js']);
        }
    }
}
