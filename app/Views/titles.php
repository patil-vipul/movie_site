<div class="container mt-4">
    <div class="border-bottom">
        <h1 class="d-inline"><?= esc($movie['original_title']) ?></h1> <span>(<?= esc($movie['release_date']) ?>)</span>
        <div class="mt-3"><a>Action</a> / <a>Adventure</a></div>
        <p class="mt-2"><img src="<?= base_url() ?>/images/star.svg" style="vertical-align: sub;" class="mr-3">8.4/10</p>
    </div>
    <div class="row mt-4 border-bottom pb-3">
        <div class="col-12 col-md-6 col-lg-3 col-xl-3">
            <img src="https://image.tmdb.org/t/p/w500/<?= esc($movie['poster_path'], 'raw') ?>" class="w-100">
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-4">
            <!--
            <div class="border-bottom">
              <h4>Cast</h4>
              <p>
              <?php /*
              $i = 0;
              foreach($movie['cast'] as $cast){
                  if($i>3) break;
                  echo ($i++?", ":"").$cast['actor'];

              }*/
               ?>
              </p>
            </div> -->
            <h4 class="">Plot</h4>
            <p><?= esc($movie['overview']) ?></p>
        </div>
        <div class="col-12 col-md-12 col-lg-5 col-xl-5">
            <h4>Trailer</h4>
            <iframe class="youtube-player" allowfullscreen width="100%" src="https://www.youtube.com/embed/<?= esc($movie['trailer_link']) ?>">
            </iframe>
        </div>
    </div>
    <div class="mt-4">
        <h3>Links</h3>
        <table class="table table-responsive-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">Language</th>
      <th scope="col">Quality</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $links = explode('<',$movie['download_link']);
        foreach($links as $link):
            $l = explode('>',$link);
      ?>
    <tr>
      <th scope="row"></th>
      <td><a href="<?= esc($l[1],'raw')?>" target="_blank"><div class="d-flex align-items-center text-dark"> <img src="<?= base_url()?>/images/play-button.svg" width="20" height="20" class="d-inline-block p-1 mr-2" alt=""> <?= esc($l[0])?> <img src="<?= base_url()?>/images/foreign.svg" width="20" height="20" class="d-inline-block p-1 ml-2" alt=""></div></a></td>
      <td><?= esc(ucfirst($l[2]))?></td>
      <td><?= esc($l[3])?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>


    </div>

</div>