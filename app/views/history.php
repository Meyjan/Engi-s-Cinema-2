        <div class="container">
            <div id="transaction">Transaction History</div>
            <ul id="history">
                <?php foreach($data['history'] as $hs): ?>
                    <?php $temp['date']=array();?>
                    <?php $temp['date'] = date('F j, Y - h.i A', strtotime($hs['date_of_play']))?>
                    <?php if(in_array($hs['id_movie'],$data['reviewed'])){ ?>
                        <li>
                            <div class="flex">
                                <div class="leftcontent"><img class="imagehistory" src="<?= BASEURL ?>/img/<?=$hs['photo']?>"></div>
                                <div class="rightcontent" id="rightcontenttime">
                                    <div class="filmtitle"><?= $hs['name']?></div>
                                    <div class="time">Schedule:
                                        <span>
                                            <?= substr($temp['date'],0)?>
                                        </span>
                                    </div>
                                    <a href="<?= BASEURL ?>/review/show/<?= $hs['id_user']?>/<?= $hs['id_movie']?>" class="edit_review">Edit Review</a>
                                    <a href="<?= BASEURL ?>/history/delete/<?= $hs['id_user'] . '/' . $hs['id_movie']?>" class="delete_review">Delete Review</a>
                                </div>
                            </div>
                        </li>
                    <?php }else{ ?>
                        <?php if($data['currentDateTime'] >= $hs['date_of_play']){ ?>
                            <li>
                                <div class="flex">
                                    <div class="leftcontent"><img class="imagehistory" src="<?= BASEURL ?>/img/<?=$hs['photo']?>"></div>
                                    <div class="rightcontent" id="rightcontenttime">
                                        <div class="filmtitle"><?= $hs['name']?></div>
                                        <div class="time">Schedule:
                                            <span>
                                                <?= substr($temp['date'],0)?>
                                            </span>
                                        </div>
                                        <a href="<?= BASEURL ?>/review/show/<?= $hs['id_user'] . '/' . $hs['id_movie']?>" class="add_review">Add Review</a>
                                    </div>
                                </div>
                            </li>
                        <?php }else{ ?>
                            <li>
                                <div class="flex">
                                    <div class="leftcontent"><img class="imagehistory" src="<?= BASEURL ?>/img/<?=$hs['photo']?>"></div>
                                    <div class="rightcontent" id="rightcontenttime">
                                        <div class="filmtitle"><?= $hs['name']?></div>
                                        <div class="time">Schedule:
                                            <span>
                                                <?= substr($temp['date'],0)?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    <?php }?>
                <?php endforeach; ?>
            </ul>
        </div>
   