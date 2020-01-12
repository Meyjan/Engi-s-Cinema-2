<div class="container">
            <div id="title">
                <br>
                <h3>Showing search result for keyword <?= substr(basename($_SERVER['REQUEST_URI']), strrpos(basename($_SERVER['REQUEST_URI']), '=' )+1) ?></h3>
                <p><?= count($data) ?> results available </p>
                <br>

            </div>

            <div id="dom-target" style="display: none;">
                <?php
                    echo $data;
                ?>
            </div>

            <div id="movie-list">
                   
                    <div class="movie-list" id="attribute">
                    <ul>
                        <?php $img_source = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" ?>
                        <?php foreach($data as $mov) : ?>    
                            <li class="listing_table">
                                <div class="flex" id=<?= $mov['id'] ?>>
                                    <div class="leftcontentsearch" style="display: none;"><img class="imagesearch" id="photo-<?= $mov['poster_path'] ?>" src="<?=$img_source . $mov['poster_path'] ?>"/></div>
                                    <div class="rightcontentsearch" id="rightcontenttime" style="display: none;">
                                        <div class="filmtitlesearch"  style="display: none;"><h2><a class='btn detail-link'><?= $mov['title'] ?> </a></h2></div>
                                        <div class="ratingsearch"  style="display: none;"><h4 class="rating"><img id="star" src="<?= BASEURL ?>/img/star.png">  <?= $mov['vote_average'] ?></h4></span></div>
                                        <div class="descriptionsearch"  style="display: none;"><p class="desc"><?= $mov['overview'] ?></p></div>
                                        <a href="<?= BASEURL ?>/detail/show/<?= $mov['id'] ?>" class="view-detail"  style="display: none;">View Detail  <img id="star" src="<?= BASEURL ?>/img/right-chevron.png"></a>
                                    </div>
                                </div>
                            </li>

                        <?php endforeach;?>
                    </ul>
                    </div>
                    <div class=footnav>
                        <div class=btn_back><a href="javascript:prevPage()" id="btn_prev">Back</a></div>
                        <div class=btn_next><a href="javascript:nextPage()" id="btn_nxt">Next</a></div>
                        <!-- page: <span id="page"></span> -->
                        <label id="page-id"></label>
                    </div>
                </div>
        </div>
        <script src="<?= BASEURL ?>/js/user.js"></script>
        <script src="<?= BASEURL ?>/js/pagination.js"></script>