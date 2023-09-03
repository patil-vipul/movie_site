<div class="container">
    <h1 class="mt-4 h2">New Movies</h1>
    <p>Recently Added Movies</p>
    <div class="row border-bottom">
        <?php
        if (isset($movies)) :
            foreach ($movies as $movie_item) : ?>
                <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 overflow-hidden">
                    <div class="text-center">
                        <div class="overflow-hidden rounded">
                            <a href="titles/<?= esc($movie_item['slug'], 'url') ?>"><img class="vertical-poster hover-zoom t-600" src="https://image.tmdb.org/t/p/w400<?= esc($movie_item['poster_path'], 'raw') ?>"></a>
                        </div>
                        <p class="mt-2"><?= esc($movie_item['title']) ?></p>
                    </div>
                </div>
            <?php endforeach;
        else : ?>
            <div class="col-12">
                <h4 class="text-warning">No Movies Found</h4>
            </div>
        <?php
        endif;
        ?>
    </div>

        <!--

    <h2 class="mt-4">New Series</h2>
    <p>Recently Added Movies</p>
    <div class="row"></div>
    <h2 class="mt-4">New Animes</h2>
    <p>Recently Added Movies</p>
    <div class="row"></div>
    <h2 class="mt-4">Top Rated Movies</h2>
    <p>Recently Added Movies</p>
    <div class="row"></div>
    <h2 class="mt-4">Top Rated Series</h2>
    <p>Recently Added Movies</p>
    <div class="row"></div>
    <h2 class="mt-4">Top Rated Animes</h2>
    <p>Recently Added Movies</p>
    <div class="row"></div>
    -->
</div>