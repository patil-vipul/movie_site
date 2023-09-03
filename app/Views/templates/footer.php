</div>
<footer>
    <div class="text-white p-0" style="background-color: #1b1b1b;">
        <div class="container">
            <div class="row pt-4 pb-4">
                <div class="col-12 col-md-12 col-lg-3 col-xl-6">
                    <h4>About</h4>
                </div>
                <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                    <h4>Explore</h4>
                    <!--
                    <div class="mt-4">
                        <p class="mb-1"><a>Top Movies</a></p>
                        <p class="mb-1"><a>Top Series</a></p>
                        <p class="mb-1"><a>Top Animes</a></p>
                    </div>
                    -->
                </div>
                <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                    <h4> Genres</h4>
                    <!--
                    <div class="mt-4">
                        <p class="mb-1"><a>Action</a></p>
                        <p class="mb-1"><a>Adventure</a></p>
                        <p class="mb-1"><a>Drama</a></p>
                        <p class="mb-1"><a>Romance</a></p>
                        <p class="mb-1"><a>Sci-Fi</a></p>
                        <p class="mb-1"><a>Comedy</a></p>
                    </div>
                    -->
                </div>
                <div class="col-12 col-md-12 col-lg-2 col-xl-2">
                    <h4>Pages</h4>
                    <div class="mt-4">
                        <p class="mb-1"><a class="text-white" href="/dmca">DMCA</a></p>
                        <p class="mb-1"><a>Contact Us</a></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center p-2" style="background-color:#080808;">
            <strong>Copyright &copy; 2021 <?= $_SERVER['SERVER_NAME'] ?></strong>
        </div>
    </div>
</footer>



<!-- Core Scripts - Include with every page -->
<script src="<?= base_url()?>/scripts/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url()?>/scripts/bootstrap.min.js" type="text/javascript"></script>

<?php if(isset($script)) echo "<script src='".base_url()."/scripts/$script' type='text/javascript'></script>"; ?>
</body>

</html>