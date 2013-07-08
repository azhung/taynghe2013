<!--Tác vụ đơn giản ngắn gọn như thêm sửa xóa ở đây hết, vì dùng ajax toàn bộ -->
<style type="text/css">
    #tags-manager-wrapper{font:"Arial";}
    a{text-decoration: none}
    a:hover{text-decoration: underline}
    .tag, .tm-add-tag{margin-left: 15px }
    .tm-tag-items > a { color: #93842b}
    .btn{ font-weight: bold;color: #ae1d1d!important;}


</style>
<?php include_once('view/_header.php'); ?>
<div id='tags-manager-wrapper'>

<?php
    if ($_SESSION['user'] == 'admin')
    {?>

        <h1>Gordon&#39;s Crown Tags Manager</h1>
        <div id="sidebar">
            <h2>Jump to ...</h2>
            <ul>
                <?php
                foreach ($menu as $mn){ ?>
                    <li><a href="#<?php echo $mn['link']; ?>" onclick="goToByScroll('<?php echo $mn['link']; ?>');"><?php echo $mn['name']; ?></a></li>
                <?php }
                ?>
            </ul>
        </div>


<!--        //lai copy tag form sang-->
        <div id="tagform" style="visibility: collapse; height: 0;">
            <form action="" method="post" id="newtagform">
                <input type="hidden" id="idMenu" value="<?php echo $article['food_id'];?>">
                <!--__________  Thêm thẻ input này phục vụ validate #newTag _________-->
                <input type="hidden" id="textOk" value="true">
                <!--__________  End Thêm thẻ input phục vụ validate #newTag _________-->
                <fieldset class="input">
                    <div class="text" id="tag_list">
                        <label for="taglist">Add an existing tag:</label>
                        <select id="taglist">
                            <option value="0">-select-</option>

<!--                            Doan nay dung ajax de hien thi danh sach -->

                        </select>
                        <span class="message"></span>
                    </div>
                    <div class="text" id="tag_add">
                        <label for="tagnew">Add a new tag:</label>
                        <input type="text" id="tagnew" onkeyup="Tag.validateNewTag();"/>
                        <span class="message"></span>
                    </div>
                </fieldset>
                <fieldset class="submit">
                    <div class="submit">
                        <input type="submit" value="Submit tag" />
                        <span class="message"></span>
                    </div>
                </fieldset>
            </form>
        </div>

        <div id="foods">
            <?php foreach ($menu as $mn){ ?>

                <h2><a class="category" name="<?php echo $mn['link']; ?>"><?php echo $mn['name']; ?></a></h2>
                <h3 class="rating">Rating:<?php foreach($menuRate->showRateCategory($mn['menu_id']) as $rc){ echo round($rc['tong'], 2).' ('.$rc['col'].' ratings)'; } ?></h3>
                <div class="category">
                    <div class="foodcategory_image">
                        <img src="<?php echo $root.'public/menu/'.$mn['image']; ?>" alt="<?php echo $mn['title']; ?>" />
                    </div>
                    <ul>



                        <?php
                        $title = $item->getCategory($mn['menu_id']);
                        foreach ($title as $tit)
                        {
                            $foodId = $tit['food_id'];
                            $tag = $foodModel->getTags($foodId); //foodModel khoi tao o contruct controller roi

                            ?>

                            <li>
                                <a href="<?php echo ROOT.'article/'.$tit['alias']; ?>" title="<?php echo $tit['title'].'-'.$tit['price']; ?>"><?php echo $tit['title']; ?></a>
                                <a href="#" class="tm-add-tag btn food<?php echo $foodId;?>" onclick="toggleAddTagForm()" title="Add a new tag for this food"> (+)</a>
                            </li>



                            <!--Doan nay copy div#tag-wrapper ben file admin/index.php roi them code nhu sau-->
                            <div class="tags-wrapper">

                            <?php

                            foreach($tag as $tg){ ?>
                                    <div class="tag" id="tag<?php echo $tg['tag_id']; ?>">
                                        <span class="tm-tag-items">
                                            <a href="<?php echo ROOT . 'tags/' . $tg['name']; ?>"
                                               title="Show where this tag is being used"><?php echo $tg['name']; ?></a>
                                            (<a href="#" class="btn" onclick="Tag.editTag(<?php echo $tg['tag_id'] . ',' . $foodId; ?>); return false;" title="Edit tag on the left">E</a>
                                             <a href="#" class="btn" onclick="Tag.deleteTag(<?php echo $tg['tag_id'] .','. $foodId; ?>); return false;" title="Remove tag on the left">X</a>)
                                        </span>

                                    </div>
                                <?php } ?>
                                <div class="message"></div>
                            </div>


                            <!--end copy ben admin/index-->


                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>
        </div>


    <?php
    }
    else{
        echo '<script>window.location = "'.ROOT.'login/tagsmanager";</script>';
    }
?>

</div>
<?php include_once('view/_footer.php'); ?>