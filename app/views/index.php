        <div class="container">
            <div id="title">
                <br>
                <h1>Hello, <span id="username"><?= $_COOKIE["username"] ?></span> ! </h1>
                <br>
                <h2>Now Playing </h2>
            </div>

            <div id="movie-list">
                <?php foreach($data as $mov) : ?>
                    <div class="movie-item" id="attribute">
                        <img class="cover-movie" id="photo-<?= $mov['photo'] ?>" src="<?= BASEURL ?>/img/<?= $mov['photo'] ?>">
                        <h3 class="movie_name"><a class='btn detail-link' href='<?= BASEURL ?>/detail/show/<?= $mov['id'] ?> '><?= $mov['name'] ?></a></h3>
                        <h4 class="rating"><span><img id="star" src="<?= BASEURL ?>/img/star.png">  <?= $mov['rating'] ?></h4></span>
                        
                    </div>
                <?php endforeach;?>
            </div>
        </div>
        </body>
    <script src="<?= BASEURL ?>/js/user.js"></script>
</html>