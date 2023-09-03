$("#inputIMDbID").on("input", function() {
    var ip = $(this).val();
    if (ip.length >= 7) {
        const settings = {
            "async": true,
            "crossDomain": true,
            "url": "https://api.themoviedb.org/3/movie/" + ip + "?api_key=d9e51b4521e26c3f9debcdc9c73cd781&language=en-US&external_source=imdb_id",
            "method": "GET",
        };

        $.ajax(settings).done(function(response) {
            if (response.original_title) {
                /*
                let v = response.rating_votes;
                let c = 7.0
                let m = 25000
                let r = response.rating(v / (v + m)) * r + (m / (v + m)) * c;
*/
                var pop = response.popularity;
                console.log(pop);
                $("#inputMovieTitle").val(response.original_title);
                $("#inputPopularity").val(pop);
            }
            if (response.genres) {
                var gen = response.genres;
                var genStr = '';
                gen.forEach(element => {
                    genStr += element.name + ",";
                });
                genStr = genStr.slice(0, -1)
                $("#inputGenres").val(genStr);
            }
            if (response.release_date) {
                $("#inputReleaseYear").val(response.release_date);
            }
            console.log(response)
        });
    }
});

$(document).on('click', '.add-link-btn', function() {
    var m = `<div class="form-group col-md-2">
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
</div>`;
    $("#inputDownloadSection").append(m);
});