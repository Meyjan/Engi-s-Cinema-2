        <div class="container">
            <div id="title">
                <br>
                <h1>Hello, <span id="username"><?= $_COOKIE["username"] ?></span> ! </h1>
                <br>
                <h2>Now Playing </h2>
            </div>

            <div id="movie-list">
                <?php $img_source = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" ?>
                <?php foreach($data as $mov) : 
                    if (DateTime::createFromFormat("Y-m-d", $mov['release_date']) >= date("Y-m-d")) {?>
                    <div class="movie-item" id=<?= $mov['id'] ?>>
                        <img class="cover-movie" id="photo-<?= $mov['poster_path'] ?>" src="<?= $img_source . $mov['poster_path'] ?>">
                        <h3 class="movie_name"><a class='btn detail-link' href='<?= BASEURL ?>/detail/show/<?= $mov['id'] ?> '><?= $mov['title'] ?></a></h3>
                        <h4 class="rating"><span><img id="star" src="<?= BASEURL ?>/img/star.png">  <?= $mov['vote_average'] ?></h4></span>
                        
                    </div>
                    <?php }
                endforeach;?>
            </div>
        </div>
        </body>
    <script src="<?= BASEURL ?>/js/user.js"></script>
</html>