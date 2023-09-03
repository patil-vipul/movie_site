<div class="container my-4 py-4">
    <?php if(isset($success)) echo "<p>Movie Added Successfully</p>";?>
    <h1>Add New Title</h1>

    <form class="mt-4 needs-validation" action="<?= base_url()?>/titles/add" method="post">
        <?= csrf_field() ?>
        <input type="hidden" id="inputPopularity" name="inputPopularity">
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="inputMovieTitle">Movie Title</label>
                <input type="text" class="form-control" readonly name="inputMovieTitle" id="inputMovieTitle" placeholder="Title will populate automatically" required>
                <div class="invalid-feedback">
                    Please provide a valid movie title.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="inputIMDbID">IMDb ID</label>
                <input type="text" class="form-control" id="inputIMDbID" name="inputIMDbID" placeholder="e.g. tt0111161" required>
                <div class="invalid-feedback">
                    Please provide a valid IMDb ID.
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="inputTrailerID">Youtube Trailer ID</label>
                <input type="text" class="form-control" id="inputTrailerID" name="inputTrailerID" placeholder="e.g. 6hB3S9bIaco" required>
                <div class="invalid-feedback">
                    Please provide a valid Youtube video ID.
                </div>
            </div>
        </div>
        <fieldset>
            <div class="form-row">
                <div class="col">
                    <label for="inputGenres">Genres</label>
                    <input type="text" id="inputGenres" name="inputGenres" class="form-control" placeholder="e.g. Action, Adventure">
                </div>
                <div class="col">
                    <label for="inputReleaseYear">Release Year</label>
                    <input type="text" readonly id="inputReleaseYear" name="inputReleaseYear" class="form-control" placeholder="Release year will be populated automatically">
                </div>
            </div>
        </fieldset>

        <div class="form-row mt-3" id="inputDownloadSection">
            <div class="form-group col-md-2">
                <label for="inputLinkName">Link Name</label>
                <input type="text" class="form-control inputLinkName" id="inputLinkName" name="inputLinkName[]" placeholder="e.g. 1080p WebRip" required>
            </div>
            <div class="form-group col-md-5">
                <label for="inputDownloadLink">Download Link</label>
                <input type="text" class="form-control inputDownloadLink" id="inputDownloadLink" name="inputDownloadLink[]" placeholder="Download Link" required>
            </div>

            <div class="form-group col-md-2">
                <label for="inputQuality">Quality</label>
                <select id='inputQuality' name="inputQuality[]" class='form-control inputQuality' required>
                    <option selected disabled>Select </option>
                    <option value="2160p">2160p</option>
                    <option value="1080p">1080p</option>
                    <option value="720p">720p</option>
                    <option value="480p">480p</option>
                    <option value="CAM">CAM</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputLanguage">Language</label>
                <input type="text" class="form-control inputLanguage" placeholder="e.g English / Hindi" id="inputLanguage" name="inputLanguage[]" required>
            </div>
            <div class="form-group col-md">
                <label for="add-link-btn">Add Link</label><br>
                <button class="btn btn-primary add-link-btn" type="button" id="add-link-btn">+</button>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Title</button>
    </form>
</div>