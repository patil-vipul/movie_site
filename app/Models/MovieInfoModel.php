<?php

namespace App\Models;

class MovieInfoModel
{
    private $curl;
    private $IDs = array();
    private $apiHost = "https://api.themoviedb.org/3/movie/";
    private $apiKey = "?api_key=d9e51b4521e26c3f9debcdc9c73cd781&language=en-US&external_source=imdb_id";
    private $options = array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
       
    );
    function __construct()
    {
    }
    function __destruct()
    {
    }
    public function getSingleMovieInfo($movieId)
    {
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_URL, $this->apiHost . $movieId . $this->apiKey);
        curl_setopt_array($this->curl, $this->options);
        $response = curl_exec($this->curl);
        $err = curl_error($this->curl);
        curl_close($this->curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $r = json_decode($response,true);
            $genres = $r["genres"];
            $f = "";
            foreach($genres as $g){
                $f .= $g['name'].",";
            }
            $r['genres'] = $f;
            return  $r;
        }
    }
    public function setImdbId($i)
    {
        array_push($this->IDs, $i);
    }
    public function getMultiMovieInfo()
    {
        $multiCurl = array();
        $result = array();
        $mh = curl_multi_init();
        foreach ($this->IDs as $i => $id) {
            $multiCurl[$i] = curl_init();
            curl_setopt($multiCurl[$i], CURLOPT_URL, $this->apiHost . $id . $this->apiKey);
            curl_setopt_array($multiCurl[$i], $this->options);
            curl_multi_add_handle($mh, $multiCurl[$i]);
        }
        $index = null;
        do {
            curl_multi_exec($mh, $index);
        } while ($index > 0);
        foreach ($multiCurl as $k => $ch) {
            $result[$k] = json_decode(curl_multi_getcontent($ch), true);
            $genres = $result[$k]["genres"];
            $f = "";
            foreach($genres as $g){
                $f .= $g['name'].",";
            }
            $result[$k]['genres'] = $f;
            curl_multi_remove_handle($mh, $ch);
        }
        curl_multi_close($mh);
        return $result;
    }
}
