
        <div class="container">
            <div class="flex">
                <a href="<?= BASEURL . '/history/show/' . $data['iduser'] ?>"><img class="prevnav" src="<?= BASEURL ?>/img/prevnav.png"></a>
                <div id="title"><?= $data['userreview']['name'] ?></div>
            </div>
            
            <?php if(empty($data['userreview']['content'])){?>
                <form action="<?= BASEURL . '/history/insert/' . $data['iduser'] ?>" method="POST">
                <div id="dom-target" style="display: none;">
                    <?php
                        echo htmlspecialchars(0); /* You have to escape because the result */
                    ?>
                </div>
                    <div class="flex" id="flexrating">
                        <div class="leftcontent" id="leftcontentstyle">Add Rating</div>
                        <div class="rightcontent" id="rightcontentstyle">
                            <div class="reviewstar">
                                <input type="radio" name="star" id="star1" value="10"><label for="star1"></label>
                                <input type="radio" name="star" id="star2" value="9"><label for="star2"></label>
                                <input type="radio" name="star" id="star3" value="8"><label for="star3"></label>
                                <input type="radio" name="star" id="star4" value="7"><label for="star4"></label>
                                <input type="radio" name="star" id="star5" value="6"><label for="star5"></label>
                                <input type="radio" name="star" id="star6" value="5"><label for="star6"></label>
                                <input type="radio" name="star" id="star7" value="4"><label for="star7"></label>
                                <input type="radio" name="star" id="star8" value="3"><label for="star8"></label>
                                <input type="radio" name="star" id="star9" value="2"><label for="star9"></label>
                                <input type="radio" name="star" id="star10" value="1"><label for="star10"></label>
                            </div>
                        </div>
                    </div> 
                    <div class="flex" id="flexreview">
                        <div class="leftcontent" id="leftcontentstyle">Add Review</div>
                        <div class="rightcontent" id="rightcontentstyle">
                            <div class="flex">
                                <textarea id="reviewcontent" name="content" placeholder="Write something..."></textarea>
                            </div>
                            <div class="flex" id="button">
                            <button type="reset" value ="Reset" class="leftcontent" id="buttoncancel"><strong>Cancel</strong></button>
                            <button type="submit" name="idmovie" value="<?= $data['idmovie'] ?>" class="rightcontent" id="buttonsubmit"><strong>Submit</strong></button>
                        </div>
                    </div>
                </form>
            <?php }else{ ?>
                <form action="<?= BASEURL . '/history/update/' . $data['iduser'] ?>" method="POST">
                <div id="dom-target" style="display: none;">
                    <?php
                        echo htmlspecialchars($data['userreview']['rating']); /* You have to escape because the result */
                    ?>
                </div>
                    <div class="flex" id="flexrating">
                        <div class="leftcontent" id="leftcontentstyle">Add Rating</div>
                        <div class="rightcontent" id="rightcontentstyle">
                            <div class="reviewstar">
                                <input type="radio" name="star" id="star1" value="10"><label for="star1"></label>
                                <input type="radio" name="star" id="star2" value="9"><label for="star2"></label>
                                <input type="radio" name="star" id="star3" value="8"><label for="star3"></label>
                                <input type="radio" name="star" id="star4" value="7"><label for="star4"></label>
                                <input type="radio" name="star" id="star5" value="6"><label for="star5"></label>
                                <input type="radio" name="star" id="star6" value="5"><label for="star6"></label>
                                <input type="radio" name="star" id="star7" value="4"><label for="star7"></label>
                                <input type="radio" name="star" id="star8" value="3"><label for="star8"></label>
                                <input type="radio" name="star" id="star9" value="2"><label for="star9"></label>
                                <input type="radio" name="star" id="star10" value="1"><label for="star10"></label>
                            </div>
                        </div>
                    </div> 
                    <div class="flex" id="flexreview">
                        <div class="leftcontent" id="leftcontentstyle">Add Review</div>
                        <div class="rightcontent" id="rightcontentstyle">
                            <div class="flex">
                                <textarea id="reviewcontent" name="content" placeholder="Write something..."><?= $data['review']['content']?></textarea>
                            </div>
                            <div class="flex" id="button">
                            <button type="reset" value ="Reset" class="leftcontent" id="buttoncancel"><strong>Cancel</strong></button>
                            <button type="submit" name="idmovie" value="<?= $data['idmovie'] ?>" class="rightcontent" id="buttonsubmit"><strong>Submit</strong></button>
                        </div>
                    </div>
                </form>
            <?php } ?>    
        </div>