<div class="container">
    <div class="flex">
        <?php $img_source = "https://image.tmdb.org/t/p/w185_and_h278_bestv2" ?>
        <div class="leftcontent"><img class="image" src=<?= $img_source . $data['content']['poster_path'] ?>></div>
        <div class="rightcontent">
            <div class="title"><?= $data['content']['original_title'] ?></div>
            <div class="genre-time"><?= $data['content']['genres'][0]["name"] . " | " . $data['content']['runtime'] . " mins" ?></div>
            <div class="released"><?= "Released date: " . $data['content']['release_date']; ?></div>
            <div class="rating"><?= "⭐" . $data['content']['vote_average'] . " / 10"; ?></div>
            <div class="synopsis">
                <p><?= $data['content']['overview']; ?></p>
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="leftcontent">
            <div class="schedule">
                <p class="contenttitle">Schedules</p>
                <div class="flex" id="attribute">
                    <span id="date">Date</span>
                    <span id="filmtime">Time</span>
                    <span id="seat">Available Seats</span>
                </div>
                <ul>
                    <?php foreach ($data['schedule'] as $sch) : ?>
                        <?php if ($sch['date_of_play'] >= $data['currentDateTime']) { ?>
                            <li>
                                <?php $temp['date'] = array(); ?>
                                <div class="flex" id="attribute">
                                    <?php $temp['date'] = date('F j, Y', strtotime($sch['date_of_play'])) ?>
                                    <span id="datevalue"><?= substr($temp['date'], 0) ?></span>
                                    <?php $temp['date'] = date('h.i A', strtotime($sch['date_of_play'])) ?>
                                    <span id="filmtimevalue"><?= substr($temp['date'], 0) ?></span>
                                    <span id="seatvalue"><?= $sch['vacant'] ?></span>
                                    <?php if ($sch['vacant'] == 0) { ?>
                                        <span id="notavail">Not Available<img src="<?= BASEURL ?>/img/notavailable.png"></span>
                                    <?php } else { ?>
                                        <span id="avail">Book Now<a href="<?= BASEURL ?>/buyticket/show/<?= $sch['idmovie'] . '/' . $sch['id_schedule'] ?>" s><img src="<?= BASEURL ?>/img/booknow.png"></a></span>
                                    <?php } ?>
                                </div>
                            </li>
                        <?php } ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="rightcontent">
            <div class="review">
                <p class="contenttitle">Critics</p>
                <ul>
                    <?php foreach ($data['critics'] as $rev) : ?>
                        <li>
                            <div class="rightcontent" id="reviewborder">
                                <div class="flex-vertical">
                                    <div id="username"><?= $rev['author'] ?></div>
                                    <div id="userreview">
                                        <p><?= $rev['content'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="review">
                <p class="contenttitle">Reviews</p>
                <ul>
                    <?php foreach ($data['review'] as $rev) : ?>
                        <li>
                            <div class="flex">
                                <div class="leftcontent"><img class="userimage" src="<?= BASEURL ?>/img/<?= $rev['photo'] ?>"></div>
                                <div class="rightcontent" id="reviewborder">
                                    <div id="username"><?= $rev['username'] ?></div>
                                    <div id="userrating"><?= '⭐ ' . $rev['rating'] . ' / 10' ?></div>
                                    <div id="userreview">
                                        <p><?= $rev['content'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>