    <div class="container">
        <div class="topcontent">
            <a href="<?= BASEURL . '/detail/show/' . $data['idmovie'] ?>"><img class="prevnav" src="<?= BASEURL ?>/img/prevnav.png"></a>
            <div class="top-content-wrapper">
                <div id="film-title"><?= $data['movie']['name'] ?></div>
                <?php $temp['date']=array();?>
                <?php $temp['date'] = date('F j, Y - h.i A', strtotime($data['movie']['date_of_play']))?>
                <div id="film-schedule"><?= substr($temp['date'],0)?></div>
            </div>
        </div>
        <div class="topborder"></div>
        <div class="botcontent">
            <div class="botcontent-left">
                <div class="seatsselect">
                    <form id="form-seats" action="<?= BASEURL . '/buyticket/insert_watches'?>" method="POST" onsubmit="return insertWatch();">
                        <input type="hidden" name="idschedule" value="<?= $data['idschedule'] ?>">
                        <input type="hidden" name="iduser" value="<?= $data['iduser'] ?>">
                            
                        <div class="seatsrow">
                            <?php for($i=0; $i<=9; $i++){ ?>
                                <?php if($data['seats'][$i]['vacant']==1){ ?>
                                    <input type="radio" name="seats" id="seats-<?=$i+1?>" value="<?=$i+1?>" onclick="afterclick()"><label for="seats-<?=$i+1?>"><?= $i+1 ?></label>
                                <?php } else { ?>
                                    <input disabled="disabled" type="radio" name="seats" id="seats-<?=$i+1?>" value="<?=$i+1?>"><label class="disable" for="seats-<?=$i+1?>"><?= $i+1 ?></label>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="seatsrow">
                            <?php for($i=10; $i<=19; $i++){ ?>
                                <?php if($data['seats'][$i]['vacant']==1){ ?>
                                    <input type="radio" name="seats" id="seats-<?=$i+1?>" value="<?=$i+1?>" onclick="afterclick()"><label for="seats-<?=$i+1?>"><?= $i+1 ?></label>
                                <?php } else { ?>
                                    <input disabled="disabled" type="radio" name="seats" id="seats-<?=$i+1?>" value="<?=$i+1?>"><label class="disable" for="seats-<?=$i+1?>"><?= $i+1 ?></label>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="seatsrow">
                            <?php for($i=20; $i<=29; $i++){ ?>
                                <?php if($data['seats'][$i]['vacant']==1){ ?>
                                    <input type="radio" name="seats" id="seats-<?=$i+1?>" value="<?=$i+1?>" onclick="afterclick()"><label for="seats-<?=$i+1?>"><?= $i+1 ?></label>
                                <?php } else { ?>
                                    <input disabled="disabled" type="radio" name="seats" id="seats-<?=$i+1?>" value="<?=$i+1?>"><label class="disable" for="seats-<?=$i+1?>"><?= $i+1 ?></label>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="screen">Screen</div>
                    </form>
                </div>
            </div>
            <div class="midborder"></div>
            <div class="botcontent-right">
                <div id="bookingsummary">Booking Summary</div>
                <div id="beforebooking">You haven't selected any seat yet. Please click on one of the seat provided</div>
                <div class="contentbooking">
                    <div id="bookingfilmtitle"><?= $data['movie']['name'] ?></div>
                    <div id="bookingfilmschedule"><?= substr($temp['date'],0)?></div>
                    <div class="booking-seatprice">
                        <div id="seat-booking"></div>
                        <?php $temp['price'] = array(); ?>
                        <?php $temp['price'] = $data['movie']['price'] ?>
                        <div id="booking-price">Rp. <?= substr($data['movie']['price'],0,-3) . '.' . substr($data['movie']['price'],-3) ?></div>
                    </div>
                    <button class="trigger" type="button" id="bookbutton">Buy Ticket</button>
                    <div class="modal">
                        <div class="modal-content">
                            <h1>Payment Succes!</h1>
                            <div>Thank you for purchasing! You can view your purchase now.</div>
                            <button type="submit" name="submit" form="form-seats" class="close-button">Go to transaction history</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>modal()</script>
<script>beforeclick()</script>