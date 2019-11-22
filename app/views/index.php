        <div class="container">
            <div id="title">
                <br>
                <h1>Hello, <span id="username"><?php echo $_COOKIE["username"] ?></span> ! </h1>
                <br>
                <h2>Now Playing </h2>
            </div>

            <div id="movie-list">
                <?php $img_source = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" ?>
                <?php foreach($data as $mov) : 
                    if (DateTime::createFromFormat("Y-m-d", $mov['release_date']) >= date("Y-m-d")) {?>
                    <div class="movie-item" id=<?php echo $mov['id'] ?>>
                        <img class="cover-movie" id="photo-<?php echo $mov['poster_path'] ?>" src="<?php echo $img_source . $mov['poster_path'] ?>">
                        <h3 class="movie_name"><a class='btn detail-link' href='<?php echo BASEURL ?>/detail/show/<?php echo $mov['id'] ?> '><?php echo $mov['title'] ?></a></h3>
                        <h4 class="rating"><span><img id="star" src="<?php echo BASEURL ?>/img/star.png">  <?php echo $mov['vote_average'] ?></h4></span>
                        
                    </div>
                    <?php }
                endforeach;?>
            </div>
        </div>
        </body>
    <script src="<?php echo BASEURL ?>/js/user.js"></script>
</html>
