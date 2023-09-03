<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            
            <div class="carousel-inner">
            <?php $i=0;
                if(!isset($movies)) return;
            ?>

                <?php foreach($movies as $movie):?>
                    
                   <?php if($i==5) break ?>
                <div class="carousel-item <?= $i?" ":"active"?> h-carousel">
                    <div style="filter: brightness(0.4) ">
                        <img src="https://image.tmdb.org/t/p/w400/<?= esc($movie['backdrop_path'],'raw')?>" class="h-carousel w-100" style="object-fit:cover;filter: blur(10px);transform: scale(1.1)">
                    </div>
                    <div class="d-flex" style="position:absolute;top:2rem;left:9rem">
                        <img src="https://image.tmdb.org/t/p/w500<?= esc($movie['poster_path'],'raw')?>" style="height: 290px;width:195px;">
                        <div class="ml-5">
                            <p class="mb-0 text-white"><img src="images/star.svg" style="vertical-align: sub;" class="mr-3"><?= esc($movie['popularity'])?> / 10</p>
                            <p class="h1 text-white"><?= esc($movie['title'])?></>
                            <p class="text-white" style="width: 32rem;"><?= esc($movie['overview'])?></p>
                            <p class="text-white font-weight-bold">

                                <?php 
                                  print_r($movie['genres']);
                                  /*
                                    //$genres = explode(',',$movie['genres']);
                                    $j=0;
                                  
                                    foreach($genres as $genre){
                                        echo ($j++?" / ":"")."<a class='text-warning'>". ucfirst($genre) ."</a>";
                                    }*/
                                ?>
                                 

                            </a></p>
                            <button class="btn btn-danger rounded-pill pl-3 pr-3"><a class="text-white text-decoration-none" style="vertical-align: top;" href="https://www.youtube.com/watch?v=<?= esc($movie['trailer_link'])?>"><img height="15px" style="vertical-align: middle;" src="images/play.svg"> <span style="vertical-align: middle;" class="ml-2">Watch Trailer</span></a></button>
                        </div>
                    </div>
                </div>
                <?php $i++?>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>