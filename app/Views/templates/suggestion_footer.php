<div style="background-color: #2f2f2f;">
    <div class="container pt-4 text-white">
    <h3>More Like This...</h3>
        <div class="row mt-3">
            <?php
            if (isset($similar_movies)) :
               
                if (!empty($similar_movies['poster_path'])) :
            ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 overflow-hidden">
                        <div class="text-center">
                            <div class="overflow-hidden rounded">
                                <a href="<?= base_url() ?>/titles/<?= esc($similar_movies['slug'], 'url') ?>"><img class="vertical-poster hover-zoom t-600" src="https://image.tmdb.org/t/p/w400<?= esc($similar_movies['poster_path'], 'raw') ?>"></a>
                            </div>
                            <p class="h5"><?= esc($similar_movies['title']) ?></p>
                        </div>
                    </div>
                    <?php else :
                    foreach ($similar_movies as $k => $s) : ?>

                        <div class="col-6 col-sm-4 col-md-3 col-lg-3 col-xl-2 overflow-hidden">
                            <div class="text-center">
                                <div class="overflow-hidden rounded">
                                    <a href="<?= base_url() ?>/titles/<?= esc($s['slug'], 'url') ?>"><img class="vertical-poster hover-zoom t-600" src="https://image.tmdb.org/t/p/original/<?= esc($s['poster_path'], 'raw') ?>"></a>
                                </div>
                                <p class="h5"><?= esc($s['title']) ?></p>
                            </div>
                        </div>
                <?php endforeach;
                endif;
            else :
                ?>
                <div class="col pb-4">
                    <h5 class="text-muted">No similar movies found</h5>
                </div>

            <?php endif; ?>

        </div>
    </div>

</div>