<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\MovieInfoModel;

class MoviesModel extends Model
{
    protected $table = 'movies';
    protected $allowedFields = ['title', 'slug', 'imdb_id', 'download_link', 'trailer_link', 'genres', 'extras', 'popularity', 'release_date','views'];

    public function getMovies($slug = false,$limit = 10)
    {
        $movieInfo = new MovieInfoModel();
        if ($slug === false) {
            $this->orderBy('popularity', 'DESC');
            $this->limit($limit);
            $movies = $this->find();
            $nom = sizeof($movies);
            if(!$nom) return;
            foreach ($movies as $key => $m) {
                $movieInfo->setImdbId($m["imdb_id"]);
            }
            $mi = $movieInfo->getMultiMovieInfo();
            for ($x = 0; $x < $nom; $x++) {
                $result[$x] = array_merge($movies[$x], $mi[$x]);
            }
            return $result;
        }
        
        $movie = $this->asArray()->where(['slug' => $slug])->first();

        if(empty($movie)) return null;
        return array_merge($movie, $movieInfo->getSingleMovieInfo($movie['imdb_id']));
    }

    public function incrementViewCount($slug = false){
        if(empty($slug)) return;
        $this->where('slug',$slug);
        $this->set('views', 'views+1', FALSE);
        $this->update();
    }

    public function getSimilarMovies($movie, $genres, $slug){
        if(empty($movie) && empty($genres) && empty($slug)) return;

        $movieInfoModel = new MovieInfoModel();
        $genres = explode(',',$genres);

        //DB Query
        $this->where('slug !=' , $slug);
        $this->groupStart()
        ->like('title', $movie);
        foreach($genres as $genre){
            $this->orLike('genres', $genre);
        }
        $this->groupEnd();
        $this->orderBy('popularity', 'DESC');
        $this->limit(6);
        $similar_movies = $this->find();

        if(empty($similar_movies)) return;
        if(sizeof($similar_movies)==1){
            return array_merge($similar_movies[0], $movieInfoModel->getSingleMovieInfo($similar_movies[0]['imdb_id']));
        }

        foreach($similar_movies as $m ){
            $movieInfoModel->setImdbId($m['imdb_id']);
        }

        $mi= $movieInfoModel->getMultiMovieInfo();
        for ($x = 0; $x < sizeof($similar_movies); $x++) {
            $result[$x] = array_merge($similar_movies[$x], $mi[$x]);
        }
        return $result;
    }
}
